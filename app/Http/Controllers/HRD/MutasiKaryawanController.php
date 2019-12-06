<?php

namespace App\Http\Controllers\HRD;

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

class MutasiKaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
	  Cache::flush();
      $nickname = collect([
                (object)  [
                    'name' => 'NASIONAL' ,
                    'url' => 'test'
                  ]
                          ])->first();
      $report_name = DB::table('embed_report')->where('report_nm','TurnOver')->where('report_role','N')->first();
    }
        return view('report', compact('report_name','nickname'));
    }

}
