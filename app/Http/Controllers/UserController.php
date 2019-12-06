<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->npk != '120020') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = User::paginate(10);
        return view('auth.user', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $role = Role::orderBy('role_nm', 'asc')->get();
        return view('auth.register')
            ->with('role', $role);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = User::where('username',$request->input('username'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('user');
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        /*
        if($request->file('gambar') == '') {
            $gambar = NULL;
        } else {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('gambar')->move("images/user", $fileName);
            $gambar = $fileName;
        }*/

        User::create([
            'name' => $request->input('name'),
            'npk' => $request->input('npk'),
            'username' => $request->input('username'),
            'role_id' => $request->input('role_id'),
            'password' => bcrypt(($request->input('password'))),
            'user_status' =>  $request->input('user_status')
        ]);

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = User::findOrFail($id);

        return view('auth.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = User::findOrFail($id);
        $role = Role::orderBy('role_nm', 'asc')->get();

        return view('auth.edit', compact('data'))->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_data = User::findOrFail($id);


        if($request->input('password')) {
        $user_data->level = $request->input('level');
        }

        if($request->input('password')) {
            $user_data->password= bcrypt(($request->input('password')));

        }

        $user_data->update();

        //Session::flash('message', 'Berhasil diubah!');
        //Session::flash('message_type', 'success');
        //return redirect()->to('user');
		exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id != $id) {
            $user_data = User::findOrFail($id);
            $user_data->delete();
            Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success');
        } else {
            Session::flash('message', 'Akun anda sendiri tidak bisa dihapus!');
            Session::flash('message_type', 'danger');
        }
        return redirect()->to('user');
    }
}
