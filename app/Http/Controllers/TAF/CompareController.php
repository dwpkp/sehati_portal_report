<?php

namespace App\Http\Controllers\TAF;

use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use App\Userlog;

class CompareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = DB::select('select role_report.report_id from role_report left join report on role_report.report_id = report.report_id WHERE role_report.role_id= ? and report.report_nm = ?', [Auth::user()->role_id,'Compare Expence']);

        foreach ($role as $roles)
        {
            //write user log

            Userlog::create([
                'id' => Auth::user()->id,
                'report_id' => $roles->report_id
            ]);

            $datas = Report::where('report_id', $roles->report_id)->first();

        }
        return view('report', compact('datas'));
    }

}
