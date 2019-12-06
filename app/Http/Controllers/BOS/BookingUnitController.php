<?php

namespace App\Http\Controllers\BOS;

use App\Http\Controllers\Controller;
use App\Report;
use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use App\Userlog;
use Cache;

class BookingUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
		Cache::flush();
        $role = DB::select('select role_report.report_id from role_report left join report on role_report.report_id = report.report_id WHERE role_report.role_id= ? and report.report_nm = ?', [Auth::user()->role_id,'Booking Unit']);

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
