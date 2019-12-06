<?php

namespace App\Http\Controllers\Acquition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class EmbedpvtController extends Controller
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

    $report_name = DB::table('embed_report')->where('report_nm','pvt')->first();
    $user_info = Session::get('user_collection')->first();
    DB::table('userlog')->insert([ 'npk' => $user_info->npk , 'nama' => $user_info->nama , 'job' => $user_info->job , 'cabang' => $user_info->cabang , 'wilayah' => $user_info->wilayah , 'report_tittle' => $report_name->report_name]);

//Condition Pembanding Role
if ($area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_ID')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_id');
$value2 = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_NAME')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_name');
$embed_url = DB::table('embed_report')->where('report_nm','pvt')->where('report_role','A')->first();
return view('EmbedFilter2',compact('value' , 'value2', 'token', 'embed_url'));
}
elseif ( $sub_area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('AREA_ID')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_id');
$value2 = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('SUB_AREA_NAME')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('sub_area_name');
$embed_url = DB::table('embed_report')->where('report_nm','pvt')->where('report_role','A')->first();
return view('EmbedFilter2',compact('value2','value' , 'token', 'embed_url'));
}
elseif ( $outlet_id == '[{"person_outlet_id":"0001"}]' )
{
$embed_url = DB::table('embed_report')->where('report_nm','pvt')->where('report_role','N')->first();
return view('Embed',compact( 'token', 'embed_url'));
}
else
{
$value = DB::connection('oracle')->table('appl.RPT_ROLE_V')->select('coyoutlet_branch')->where('appl.RPT_ROLE_V.PERSON_EMPL_ID', [Auth::user()->npk])->pluck('coyoutlet_branch');
$value2 = DB::connection('oracle')->table('appl.RPT_ROLE_COY_V')->select('COYOUTLET_NICK_NAME')->where('appl.RPT_ROLE_COY_V.PERSON_EMPL_ID', [Auth::user()->npk])->pluck('coyoutlet_nick_name');
$embed_url = DB::table('embed_report')->where('report_nm','pvt')->where('report_role','C')->first();
return view('EmbedFilter2',compact('value' , 'value2' , 'token', 'embed_url'));
}
  }//
}
