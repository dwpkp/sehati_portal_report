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

class proyeksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Cache::flush();
        $user_role = DB::connection('oracle')->table('APPL.RPT_ROLE_V')->select('role')->where('APPL.RPT_ROLE_V.PERSON_EMPL_ID', [Auth::user()->npk])->first();

        if ( $user_role->role == 'A' )
        {
          $nickname = DB::connection('oracle')->table('APPL.RPT_AREA_TITTLE_V')->select('area_name as name')->where('APPL.RPT_AREA_TITTLE_V.PERSON_EMPL_ID', [Auth::user()->npk])->first();
          $report_name = DB::table('embed_report')->where('report_nm','proyeksi')->where('report_role','A')->first();
        }
        elseif ( $user_role->role == 'S' )
        {
          $nickname = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_TITTLE_V')->where('APPL.RPT_SUB_AREA_TITTLE_V.PERSON_EMPL_ID', [Auth::user()->npk])->first();
          $report_name = DB::table('embed_report')->where('report_nm','proyeksi')->where('report_role','A')->first();
        }
        elseif ( $user_role->role == 'HO' )
        {
          $nickname = collect([
                    (object)  [
                        'name' => 'NASIONAL' ,
                        'url' => 'test'
                      ]
                              ])->first();
          $report_name = DB::table('embed_report')->where('report_nm','proyeksi')->where('report_role','N')->first();
        }
        else {
          $nickname = DB::connection('oracle')->table('APPL.RPT_BRANCH_NAME_V')->select('coyoutlet_nick_name as name')->where('APPL.RPT_BRANCH_NAME_V.PERSON_EMPL_ID', [Auth::user()->npk])->first();
          $report_name = DB::table('embed_report')->where('report_nm','proyeksi')->where('report_role','C')->first();
        }
    return view('report', compact('report_name','nickname'));
    }

}
