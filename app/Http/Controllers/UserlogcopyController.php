<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\VUserlog;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Charts;
use App\Userlog;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\VUserlogExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $ddrole = DB::table('role')->orderBy('role_nm','ASC')->get();

        //$log = VUserlog::where(DB::raw("EXTRACT(YEAR FROM bq_time)"),date('Y'))->get();

        $users = Userlog::get();//var_dump($users);
        $tittle = 'Report Access';
        $element = 'User';
        $chart = Charts::database($users, 'bar', 'highcharts')
            ->title($tittle)
            ->elementLabel($element)
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('id', 'report_id');

        $datas = VUserlog::paginate(10);
        return view('userlog.index', compact('datas','chart','ddrole'));
    }

    public function export_excel()
    {

        return (new VUserlogExport)->download('log.xlsx');
        //return Excel::download(new VUserlogExport, 'log.xlsx');
    }
}
