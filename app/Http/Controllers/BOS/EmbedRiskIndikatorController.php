<?php

namespace App\Http\Controllers\BOS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class EmbedRiskIndikatorController extends Controller
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

    $report_name = DB::table('embed_report')->where('report_nm','RRPKBJBooking')->first();
    $user_info = Session::get('user_collection')->first();
    DB::table('userlog')->insert([ 'npk' => $user_info->npk , 'nama' => $user_info->nama , 'job' => $user_info->job , 'cabang' => $user_info->cabang , 'wilayah' => $user_info->wilayah , 'report_tittle' => $report_name->report_name]);

//Condition Pembanding Role
if ($area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_ID')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_id');
$value2 = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('coyoutlet_branch')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('coyoutlet_branch');
$embed_url = DB::table('embed_report')->where('report_nm','RRPKBJBooking.index')->where('report_role','A')->first();
$table='public appl_mst_area_report';
$column='area_id';
$table2='dm dim_cabang';
$column2='coyoutlet_id';
}
elseif ( $sub_area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('SUB_AREA_NAME')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('sub_area_name');
$value2 = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('coyoutlet_id')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('coyoutlet_id');
$embed_url = DB::table('embed_report')->where('report_nm','RRPKBJBooking.index')->where('report_role','A')->first();
$table='public appl_mst_area_report';
$column='sub_area_name';
$table2='dm dim_cabang';
$column2='coyoutlet_id';
}
elseif ( $outlet_id == '[{"person_outlet_id":"0001"}]' )
{
$value = DB::connection('oracle')->table('APPL.APPL_COYOUTLET')->select('APPl.APPL_COYOUTLET.coyoutlet_id')->pluck('coyoutlet_id');
$value2 = DB::connection('oracle')->table('APPL.APPL_COYOUTLET')->select('APPl.APPL_COYOUTLET.coyoutlet_id')->pluck('coyoutlet_id');
$embed_url = DB::table('embed_report')->where('report_nm','RRPKBJBooking.index')->where('report_role','N')->first();
$table='dm dim_cabang';
$column='coyoutlet_id';
$table2='dm dim_cabang';
$column2='coyoutlet_id';
}
else
{
$value = DB::connection('oracle')->table('appl.APPL_COYOUTLET')->join('hrms.hr_people_all','hrms.hr_people_all.PERSON_OUTLET_ID','appl.APPL_COYOUTLET.COYOUTLET_ID')->select('appl.APPL_COYOUTLET.COYOUTLET_BRANCH')->where('hrms.hr_people_all.person_empl_id',[Auth::user()->npk])->get()->pluck('coyoutlet_branch');
$value2 = DB::connection('oracle')->table('appl.APPL_COYOUTLET')->join('hrms.hr_people_all','hrms.hr_people_all.PERSON_OUTLET_ID','appl.APPL_COYOUTLET.COYOUTLET_ID')->select('appl.APPL_COYOUTLET.COYOUTLET_BRANCH')->where('hrms.hr_people_all.person_empl_id',[Auth::user()->npk])->get()->pluck('coyoutlet_branch');
$embed_url = DB::table('embed_report')->where('report_nm','RRPKBJBooking.index')->where('report_role','C')->first();
$table='dm dim_cabang';
$column='coyoutlet_id';
$table2='dm dim_cabang';
$column2='coyoutlet_id';
}
$table='public appl_mst_area_report';

    return view('Embed',compact('value' ,'value2', 'token', 'embed_url','table','column','table2','column2'));

  }
}
