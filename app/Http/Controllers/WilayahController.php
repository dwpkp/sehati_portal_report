<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Wilayah;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class WilayahController extends Controller
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

        $datas = Wilayah::get();
        return view('wilayah.index', compact('datas'));
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

        return view('wilayah.create');
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
            'dw_id' => 'required|string|max:32',
            'dw_nm' => 'required|string',
            'dw_status' => 'required|string',
        ]);

        DB::table('dept_wil')->insert([
            'dw_id' => $request->get('dw_id'),
            'dw_nm' => $request->get('dw_nm'),
            'dw_status' => $request->get('dw_status'),
        ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('wilayah.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dw_id)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Wilayah::findOrFail($dw_id);

        return view('wilayah.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dw_id)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        /*$data = Role::findOrFail($role_id);
        return view('role.edit', compact('data'));*/
        $data = Wilayah::where('dw_id',$dw_id)->first();

        return view('wilayah.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dw_id)
    {

        DB::table('dept_wil')
            ->where('dw_id', $dw_id)
            ->update(['dw_nm' => $request->get('dw_nm'),
                'dw_status' => $request->get('dw_status'),

            ]);
        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($dw_id)
    {
        DB::table('dept_wil')
            ->where('dw_id', $dw_id)
            ->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('wilayah.index');
    }
}
