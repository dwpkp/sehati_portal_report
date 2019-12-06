<?php

namespace App\Http\Controllers\BOS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class EmbedDailyReportController extends Controller
{
  public function index()
  {
    $time = Session::get('expire_on');
    $date = strtotime("now");
    $countdown = $time-$date;

    if ( $countdown > '10' )
       {
         // ambil token dari database
          $token = Session::get('access_token');
          //dd ($token);
        }
       else {
          app(\App\Http\Controllers\GenerateToken::class)->index();
          $token = Session::get('access_token');
       }

//Get Parameter pembanding
    $outlet_id = DB::connection('oracle')->table('hrms.hr_people_all')->select('hrms.hr_people_all.person_outlet_id')->join('APPL.APPL_COYOUTLET','APPL.APPL_COYOUTLET.COYOUTLET_ID', 'hrms.hr_people_all.PERSON_OUTLET_ID')->where('hrms.hr_people_all.person_status','AC')->where('hrms.hr_people_all.PERSON_EMPL_ID', [Auth::user()->npk])->get();
    $area_id = DB::connection('oracle')->table('hrms.hr_people_all')->select('appl.APPL_MST_AREA.AREA_ID')->join('APPL.APPL_MST_AREA','hrms.hr_people_all.person_id','appl.APPL_MST_AREA.area_head_id')->where('hrms.hr_people_all.PERSON_EMPL_ID', [Auth::user()->npk])->pluck('area_id');
    $sub_area_id = DB::connection('oracle')->table('hrms.hr_people_all')->select('appl.APPL_MST_SUB_AREA.SUB_AREA_ID')->join('APPL.APPL_MST_SUB_AREA','hrms.hr_people_all.person_id','appl.APPL_MST_SUB_AREA.sub_area_head_id')->where('hrms.hr_people_all.PERSON_EMPL_ID', [Auth::user()->npk])->pluck('sub_area_id');

    $report_name = DB::table('embed_report')->where('report_nm','DailyReport')->first();
    $user_info = Session::get('user_collection')->first();
    DB::table('userlog')->insert([ 'npk' => $user_info->npk , 'nama' => $user_info->nama , 'job' => $user_info->job , 'cabang' => $user_info->cabang , 'wilayah' => $user_info->wilayah , 'report_tittle' => $report_name->report_name]);

//Condition Pembanding Role
if ($area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_NAME')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_name');
$value2 = DB::connection('oracle')->table('APPL.RPT_AREA_V')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->get()->pluck('coyoutlet_nick_name');
$value3 = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_ID')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_id');
$embed_url = DB::table('embed_report')->where('report_nm','DailyReport')->where('report_role','A')->first();
return view('EmbedFilter3',compact('token', 'embed_url','value','value2','value3'));
}
elseif ( $sub_area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('SUB_AREA_NAME')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('sub_area_name');
$value2 = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_1_V')->select('coyoutlet_nick_name')->where('APPL.RPT_SUB_AREA_1_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('coyoutlet_nick_name');
$embed_url = DB::table('embed_report')->where('report_nm','DailyReport')->where('report_role','A')->first();
return view('EmbedFilter2',compact('token', 'embed_url','value','value2'));
}
elseif ( $outlet_id == '[{"person_outlet_id":"0001"}]' )
{
$embed_url = DB::table('embed_report')->where('report_nm','DailyReport')->where('report_role','N')->first();
return view('Embed',compact('token', 'embed_url'));
}
else
{
$value = DB::connection('oracle')->table('appl.RPT_ROLE_V')->where('appl.RPT_ROLE_V.PERSON_EMPL_ID',[Auth::user()->npk])->get()->pluck('coyoutlet_branch');
//$value2 = DB::connection('oracle')->table('appl.rpt_role_v')->select('COYOUTLET_ID')->distinct('COYOUTLET_ID')->where('appl.RPT_ROLE_V.coyoutlet_branch',[$value])->pluck('coyoutlet_id');

$embed_url = DB::table('embed_report')->where('report_nm','DailyReport')->where('report_role','C')->first();

return view('EmbedFilter1', compact( 'value' , 'token', 'embed_url'));
}



  }//
}
