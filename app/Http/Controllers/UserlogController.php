<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Charts;
use App\Userlog;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\VUserlogExport;
use Maatwebsite\Excel\Facades\Excel;

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

        $users = Userlog::get();
        $tittle = 'Report Access';
        $element = 'User';
        $chart = Charts::database($users, 'bar', 'highcharts')
            ->title($tittle)
            ->elementLabel($element)
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('npk');


        return view('userlog.index', compact('chart'));
    }

    public function export_excel(Request $request)
    {
        return Excel::download(new VUserlogExport($request->datestart,$request->dateend), 'log.xlsx');
    }
}
