<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
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

        $datas = Report::paginate(10);
        return view('report.index', compact('datas'));
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

        return view('report.create');
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
            'report_url' => 'required|string',
            'report_nm' => 'required|string',
            'report_status' => 'required|string',
        ]);

        DB::table('report')->insert([
                'report_id' => bcrypt(($request->input('report_nm'))),
                'report_nm' => $request->get('report_nm'),
                'report_url' => $request->get('report_url'),
                'report_status' => $request->get('report_status'),
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('report.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($report_id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = report::findOrFail($report_id);

        return view('report.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($report_id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        /*$data = report::findOrFail($report_id);
        return view('report.edit', compact('data'));*/
        $data = report::where('report_id',$report_id)->first();

        return view('report.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $report_id)
    {

        DB::table('report')
            ->where('report_id', $report_id)
            ->update([
                    'report_nm' => $request->get('report_nm'),
                    'report_status' => $request->get('report_status'),
                    'report_url' => $request->get('report_url'),
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */


    public function destroy($report_id)
    {
        DB::table('report')
            ->where('report_id', $report_id)
            ->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('report.index');
    }
}
