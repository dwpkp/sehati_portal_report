<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cluster;
Use App\Wilayah;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ClusterController extends Controller
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

        $datas = Cluster::paginate(10);
        return view('cluster.index', compact('datas'));
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
        $dw = Wilayah::orderBy('dw_nm', 'asc')->get();
        return view('cluster.create')
            ->with('dw', $dw);

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'dw_id' => 'required|string|max:32',
            'cluster_id' => 'required|string|max:32',
            'cluster_nm' => 'required|string',
            'cluster_status' => 'required|string',
        ]);

        DB::table('cluster')->insert([
            'dw_id' => $request->get('dw_id'),
            'cluster_id' => $request->get('cluster_id'),
            'cluster_nm' => $request->get('cluster_nm'),
            'cluster_status' => $request->get('cluster_status'),
        ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('cluster.index');

    }


    public function edit($cluster_id)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Cluster::where('cluster_id',$cluster_id)->first();
        $wil = Wilayah::orderBy('dw_nm', 'asc')->get();
        return view('cluster.edit', compact('data'))->with('wil', $wil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cluster_id)
    {

        DB::table('cluster')
            ->where('cluster_id', $cluster_id)
            ->update(['cluster_nm' => $request->get('cluster_nm'),
                'dw_id' => $request->get('dw_id'),
                'cluster_status' => $request->get('cluster_status'),

            ]);
        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('cluster.index');
    }

    /**
     * Remove the specified resource from storage
     */


    public function destroy($cluster_id)
    {
        DB::table('cluster')
            ->where('cluster_id', $cluster_id)
            ->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('cluster.index');
    }

}
