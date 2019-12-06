<?php

namespace App\Http\Controllers\Acquition;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Report;
use App\Userlog;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Cache;

class lkoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
		Cache::flush();
        $role = DB::select('select role_report.report_id from role_report left join report on role_report.report_id = report.report_id WHERE role_report.role_id= ? and report.report_nm = ?', [Auth::user()->role_id,'LKO Monitoring']);

        foreach ($role as $roles)
        {
            $datas = Report::where('report_id', $roles->report_id)->first();

            //write user log

            Userlog::create([
                'id' => Auth::user()->id,
                'report_id' => $roles->report_id
            ]);

        }
        return view('report', compact('datas'));
    }

}
