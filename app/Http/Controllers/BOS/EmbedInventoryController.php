<?php

namespace App\Http\Controllers\BOS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;

class EmbedInventoryController extends Controller
{
  public function index()
  {


    //dd ($embed_url);
    //$users = DB::table('users')->select('id')->where('npk', [Auth::user()->npk])->get();


// Refresh Token
    $time = DB::select('select extract(epoch from (now()::timestamp - updated_at::timestamp)) as countdown from token');
    $countdown = $time[0]->countdown;
    //dd ($countdown);
    if ( $countdown < '3600' )
       {
         // ambil token dari database
          $token = DB::table('token')->select('embed_token')->first()->embed_token;
        }
       else {
         //buat ulang
         $client = new \GuzzleHttp\Client();
         $response = $client->request('POST', 'https://login.microsoftonline.com/common/oauth2/token?access_token', [
             'form_params' => [
                 'grant_type' => 'password',
                 'username' => 'sehati1@prawathiyakarsapradiptha.onmicrosoft.com',
                 'password' => 'S3h4t112345',
                 'client_id' => '6126ea36-bc47-4a81-b6be-f6e118363e8d',
                 'resource' => 'https://analysis.windows.net/powerbi/api',
                 'scope' => 'openid',
                 'client_secret' => '[-.z10DA.EUZsiyJuxQUbCkRK2JPScw1'
             ]
         ]);
         $response = $response->getBody()->getContents();
         $response = json_decode($response);
         $access_token = $response->access_token ;
         DB::table('token')->update(['embed_token' => $access_token ]);
         $token = $access_token ;
       }

//Get Parameter pembanding
    $outlet_id = DB::connection('oracle')->table('hrms.hr_people_all')->select('hrms.hr_people_all.person_outlet_id')->join('APPL.APPL_COYOUTLET','APPL.APPL_COYOUTLET.COYOUTLET_ID', 'hrms.hr_people_all.PERSON_OUTLET_ID')->where('hrms.hr_people_all.person_status','AC')->where('hrms.hr_people_all.PERSON_EMPL_ID', [Auth::user()->npk])->get();
    $area_id = DB::connection('oracle')->table('hrms.hr_people_all')->select('appl.APPL_MST_AREA.AREA_ID')->join('APPL.APPL_MST_AREA','hrms.hr_people_all.person_id','appl.APPL_MST_AREA.area_head_id')->where('hrms.hr_people_all.PERSON_EMPL_ID', [Auth::user()->npk])->pluck('area_id');
    $sub_area_id = DB::connection('oracle')->table('hrms.hr_people_all')->select('appl.APPL_MST_SUB_AREA.SUB_AREA_ID')->join('APPL.APPL_MST_SUB_AREA','hrms.hr_people_all.person_id','appl.APPL_MST_SUB_AREA.sub_area_head_id')->where('hrms.hr_people_all.PERSON_EMPL_ID', [Auth::user()->npk])->pluck('sub_area_id');

    $report_name = DB::table('embed_report')->where('report_nm','Inventory')->first();
    $user_info = Session::get('user_collection')->first();
    DB::table('userlog')->insert([ 'npk' => $user_info->npk , 'nama' => $user_info->nama , 'job' => $user_info->job , 'cabang' => $user_info->cabang , 'wilayah' => $user_info->wilayah , 'report_tittle' => $report_name->report_name]);

//Condition Pembanding Role
if ($area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_NAME')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_name');
$value2 = DB::connection('oracle')->table('APPL.RPT_AREA_V')->select('AREA_ID')->where('APPL.RPT_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_id');
$embed_url = DB::table('embed_report')->where('report_nm','Inventory')->where('report_role','A')->first();
return view('EmbedFilter2',compact('value' ,'value2', 'token', 'embed_url'));
}
elseif ( $sub_area_id != '[]')
{
$value = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('sub_area_name')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('sub_area_name');
$value2 = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_V')->select('AREA_ID')->where('APPL.RPT_SUB_AREA_V.PERSON_EMPL_ID', [Auth::user()->npk])->distinct()->pluck('area_id');
$embed_url = DB::table('embed_report')->where('report_nm','Inventory')->where('report_role','A')->first();
return view('EmbedFilter2',compact('value' ,'value2', 'token', 'embed_url'));
}
elseif ( $outlet_id == '[{"person_outlet_id":"0001"}]' )
{
$embed_url = DB::table('embed_report')->where('report_nm','Inventory')->where('report_role','N')->first();
return view('Embed',compact( 'token', 'embed_url'));
}
else
{
$value = DB::connection('oracle')->table('appl.RPT_ROLE_COY_V')->where('appl.RPT_ROLE_COY_V.PERSON_EMPL_ID',[Auth::user()->npk])->get()->pluck('coyoutlet_nick_name');
$embed_url = DB::table('embed_report')->where('report_nm','Inventory')->where('report_role','C')->first();
return view('EmbedFilter1',compact('value' , 'token', 'embed_url'));
}
  }
}
