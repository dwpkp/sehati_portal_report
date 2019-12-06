<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
/*use App\Transaksi;
use App\Anggota;
use App\Buku;*/
use Auth;
use DB;
use Cache;
use Config;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$transaksi = Transaksi::get();
        $anggota   = Anggota::get();
        $buku      = Buku::get();
        if(Auth::user()->level == 'user')
        {
            $datas = Transaksi::where('status', 'pinjam')
                                ->where('anggota_id', Auth::user()->anggota->id)
                                ->get();
        } else {
            $datas = Transaksi::where('status', 'pinjam')->get();
        }*/


        $user_role = DB::connection('oracle')->table('APPL.RPT_ROLE_V')->where('PERSON_EMPL_ID', [Auth::user()->npk])->first();
        if( $user_role == null )
         {
           return view('resign');;
         }
         elseif ( $user_role->role == 'A' ) {
           $wilayah = DB::connection('oracle')->table('APPL.RPT_AREA_TITTLE_V')->select('area_name as name')->where('APPL.RPT_AREA_TITTLE_V.PERSON_EMPL_ID', [Auth::user()->npk])->first();
         }
         elseif ( $user_role->role == 'S' ) {
           $wilayah = DB::connection('oracle')->table('APPL.RPT_SUB_AREA_TITTLE_V')->select('name as name')->where('APPL.RPT_SUB_AREA_TITTLE_V.PERSON_EMPL_ID', [Auth::user()->npk])->first();
         }
         elseif ( $user_role->role == 'HO' ) {
           $wilayah = collect([
             (object)
              ['name' => 'NASIONAL']
           ]);

           $wilayah = $wilayah->first();
         }
        else {
          $wilayah = DB::connection('oracle')->table('APPL.RPT_ROLE_AREA')->select('area_name as name')->where('PERSON_EMPL_ID',[Auth::user()->npk])->first();
        }

      Config::set('user_role', $user_role);
      $role_menu = DB::table('role_report')->select('report_id')->where('role_id',$user_role->role);
      $menu = DB::table('menu')->select('category', 'menu.id')->join('submenu','menu.id','submenu.id_menu')->wherein('submenu.id',$role_menu->pluck('report_id'))->distinct('category')->orderby('id')->get();
      $submenu = DB::table('submenu')->wherein('submenu.id',$role_menu->pluck('report_id'))->orderby('id')->get();

      $user_cek = DB::connection('oracle')->table('APPL.RPT_ROLE_V')->where('PERSON_EMPL_ID',[Auth::user()->npk])->first();
      Session::forget('user_collection');
      $collection = collect([
        (object)
         ['npk' => $user_cek->person_empl_id,
         'nama' => $user_cek->person_full_name ,
         'job' => $user_cek->job_desc,
         'cabang' => $user_cek->coyoutlet_nick_name,
         'wilayah' => $wilayah->name]
      ]);

      Session::put('user_collection',$collection);


      return view('home', compact('menu','submenu'));
    }
}
