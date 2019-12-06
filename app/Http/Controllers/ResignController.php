<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ResignController extends Controller
{
    public function index()
     {
       $active_user = DB::connection('oracle')->table('APPL.RPT_ROLE_V')->select('PERSON_EMPL_ID')->pluck('person_empl_id');
       $current_user = DB::table('users')->select('npk')->wherenotin('npk',$active_user)->delete();;


       dd ($current_user);
     }
}
