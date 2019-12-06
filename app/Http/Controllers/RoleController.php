<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Role::get();
        return view('role.index', compact('datas'));
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

        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_id' => 'required|string|max:32',
            'role_nm' => 'required|string',
            'role_status' => 'required|string',
        ]);

        DB::table('role')->insert([
                'role_id' => $request->get('role_id'),
                'role_nm' => $request->get('role_nm'),
                'role_status' => $request->get('role_status'),
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('role.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Role::findOrFail($role_id);

        return view('role.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role_id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        /*$data = Role::findOrFail($role_id);
        return view('role.edit', compact('data'));*/
        $data = Role::where('role_id',$role_id)->first();

        return view('role.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role_id)
    {
        /*
        Role::where('role_id',$role_id)->first()->update([
                    'role_nm' => $request->get('role_nm'),
                    'role_status' => $request->get('role_status'),

                ]);
        */
        DB::table('role')
            ->where('role_id', $role_id)
            ->update(['role_nm' => $request->get('role_nm'),
                'role_status' => $request->get('role_status'),

            ]);
        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($role_id)
    {
        DB::table('role')
            ->where('role_id', $role_id)
            ->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('role.index');
    }
}
