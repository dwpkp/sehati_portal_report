<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleReport;
use App\Role;
use App\Report;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        $datas = RoleReport::get();
        return view('rolereport.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $role = Role::orderBy('role_nm', 'asc')->get();
        $report = Report::orderBy('report_nm', 'asc')->get();
        return view('rolereport.create')
            ->with('role', $role)
            ->with('report',$report);
    }

    public function searchUser(Request $request)
    {
        $term = $request->get('name');

        if ( ! empty($term)) {

            // search user by name or email
            $users = User::where('name', 'LIKE', '%' . $term .'%')
                ->orWhere('email', 'LIKE', '%' . $term .'%')
                ->get();

            foreach ($users as $user) {
                $user->label   = $user->name . ' (' . $user->email . ')';
            }

            return $users;
        }

        return Response::json($users);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_id' => 'required|string',
            'report_id' => 'required|string'
        ]);

        DB::table('role_report')->insert([
                'role_report_id' => bcrypt(($request->input('report_id'.'role_id'))),
                'role_id' => $request->get('role_id'),
                'report_id' => $request->get('report_id')
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('rolereport.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = RoleReport::findOrFail($id);

        return view('rolereport.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = RoleReport::findOrFail($id);
        return view('rolereport.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        RoleReport::find($id)->update([
            'role_report_id' => $request->get('role_report_id'),
            'role_id' => $request->get('role_id'),
            'report_id' => $request->get('report_id')
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('rolereport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('rolereport.index');
    }
}
