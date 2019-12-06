@extends('layouts.app')

@section('content')

<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('userlog.index')}}" title="Go to User Log" class="tip-bottom"><i class="icon-th-list"></i> User Log</a></div>
</div>
<div class="widget-title"> <span class="icon"><i class="icon-info-sign"></i></span>
  <h5>User Log</h5>
</div>

<div class="container-fluid">
    <span><br></span>
    <label for="role">Select Role:</label>
    <select name="role" class="form-control" style="width:250px">
        <option value="">--- Select Role ---</option>
        @foreach ($ddrole as $data)
            <option value="{{ $data->role_id }}">{{ $data->role_nm }}</option>
        @endforeach
    </select>
</div>
<div class="container-fluid">

    <label for="date">Select Date :</label>
    <input type="date" id="datestart" name="datestart"> <input type="date" id="dateend" name="dateend">
</div>
<div class="container-fluid">{!! $chart->html() !!}</div>
<div class="container-fluid"><a href="/export_excel" class="btn btn-success" target="_blank">EXPORT EXCEL</a></div>
<div class="container-fluid" style="overflow-x: scroll;">
    <br>
          <table class="table table-bordered data-table">
            <tr>
              <th rowspan="3">User</th>
              <th colspan="54">Report</th>
            </tr>
            <tr>
              <th colspan="2">BQ</th>
              <th colspan="2">KKH</th>
              <th colspan="2">LKO Monitoring</th>
              <th colspan="2">NBOT</th>
              <th colspan="2">Pinjaman VS TOP</th>
              <th colspan="2">Profile Booking</th>
              <th colspan="2">Proyeksi VS Target Actual</th>
              <th colspan="2">Daily Report</th>
              <th colspan="2">AR Booking ULT</th>
              <th colspan="2">AR Exclude CX</th>
              <th colspan="2">AR Murni Booking RT</th>
              <th colspan="2">Kertas Kerja Management</th>
              <th colspan="2">Inventory BJ</th>
              <th colspan="2">PPRI PKBJ</th>
              <th colspan="2">Risk Indikator</th>
              <th colspan="2">Risk Rasio PKBJ Booking</th>
              <th colspan="2">AR Perormance</th>
              <th colspan="2">Collection Navigation</th>
              <th colspan="2">Collection Trend</th>
              <th colspan="2">MPP</th>
              <th colspan="2">Mutasi Karyawan</th>
              <th colspan="2">Turn Over, MP Exist</th>
              <th colspan="2">PPRI</th>
              <th colspan="2">Compare Expence</th>
              <th colspan="2">Compare Saldo Bank</th>
              <th colspan="2">Daily Report TAF</th>
              <th colspan="2">RAT DINKOP</th>
            </tr>
            <tr>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
              <th><span class="icon"><i class="icon-certificate" title="Visit"></i></th>
              <th><span class="icon"><i class="icon-time" title="Date Time"></i></th>
            </tr>
            @foreach($datas as $data)
              <tr>
                <td>{{$data->username}}</td>
                <td>@if($data->bq == 0)
                    -
                  @else
                    {{$data->bq}}
                  @endif
                </td>
                <td>@if($data->bq_time == '')
                    -
                  @else
                    {{$data->bq_time}}
                  @endif
                </td>
                <td>@if($data->kkh == 0)
                    -
                  @else
                    {{$data->kkh}}
                  @endif
                </td>
                <td>@if($data->kkh_time == '')
                    -
                  @else
                    {{$data->kkh_time}}
                  @endif
                </td>
                <td>@if($data->lkom == 0)
                    -
                  @else
                    {{$data->lkom}}
                  @endif
                </td>
                <td>@if($data->lkom_time == '')
                    -
                  @else
                    {{$data->lkom_time}}
                  @endif
                </td>
                <td>@if($data->nbot == 0)
                    -
                  @else
                    {{$data->nbot}}
                  @endif
                </td>
                <td>@if($data->nbot_time == '')
                    -
                  @else
                    {{$data->nbot_time}}
                  @endif
                </td>
                <td>@if($data->pvt == 0)
                    -
                  @else
                    {{$data->pvt}}
                  @endif
                </td>
                <td>@if($data->pvt_time == '')
                    -
                  @else
                    {{$data->pvt_time}}
                  @endif
                </td>
                <td>@if($data->profile_booking == 0)
                    -
                  @else
                    {{$data->profile_booking}}
                  @endif
                </td>
                <td>@if($data->profile_booking_time == '')
                    -
                  @else
                    {{$data->profile_booking_time}}
                  @endif
                </td>
                <td>@if($data->pvta == 0)
                    -
                  @else
                    {{$data->pvta}}
                  @endif
                </td>
                <td>@if($data->pvta_time == '')
                    -
                  @else
                    {{$data->pvta_time}}
                  @endif
                </td>
                <td>@if($data->daily_report == 0)
                    -
                  @else
                    {{$data->daily_report}}
                  @endif
                </td>
                <td>@if($data->daily_report_time == '')
                    -
                  @else
                    {{$data->daily_report_time}}
                  @endif
                </td>
                <td>@if($data->ar_booking_ult == 0)
                    -
                  @else
                    {{$data->ar_booking_ult}}
                  @endif
                </td>
                <td>@if($data->ar_booking_ult_time == '')
                    -
                  @else
                    {{$data->ar_booking_ult_time}}
                  @endif
                </td>
                <td>@if($data->ar_exclude_cx == 0)
                    -
                  @else
                    {{$data->ar_exclude_cx}}
                  @endif
                </td>
                <td>@if($data->ar_exclude_cx_time == '')
                    -
                  @else
                    {{$data->ar_exclude_cx_time}}
                  @endif
                </td>
                <td>@if($data->armbrt == 0)
                    -
                  @else
                    {{$data->armbrt}}
                  @endif
                </td>
                <td>@if($data->armbrt_time == '')
                    -
                  @else
                    {{$data->armbrt_time}}
                  @endif
                </td>
                <td>@if($data->kkm == 0)
                    -
                  @else
                    {{$data->kkm}}
                  @endif
                </td>
                <td>@if($data->kkm_time == '')
                    -
                  @else
                    {{$data->kkm_time}}
                  @endif
                </td>
                <td>@if($data->inventory_bj == 0)
                    -
                  @else
                    {{$data->inventory_bj}}
                  @endif
                </td>
                <td>@if($data->inventory_bj_time == '')
                    -
                  @else
                    {{$data->inventory_bj_time}}
                  @endif
                </td>
                <td>@if($data->ppripkbj == 0)
                    -
                  @else
                    {{$data->ppripkbj}}
                  @endif
                </td>
                <td>@if($data->ppripkbj_time == '')
                    -
                  @else
                    {{$data->ppripkbj_time}}
                  @endif
                </td>
                <td>@if($data->risk_indikator == 0)
                    -
                  @else
                    {{$data->risk_indikator}}
                  @endif
                </td>
                <td>@if($data->risk_indikator_time == '')
                    -
                  @else
                    {{$data->risk_indikator_time}}
                  @endif
                </td>
                <td>@if($data->rspb == 0)
                    -
                  @else
                    {{$data->rspb}}
                  @endif
                </td>
                <td>@if($data->rspb_time == '')
                    -
                  @else
                    {{$data->rspb_time}}
                  @endif
                </td>
                <td>@if($data->arperformance == 0)
                    -
                  @else
                    {{$data->arperformance}}
                  @endif
                </td>
                <td>@if($data->arperformance_time == '')
                    -
                  @else
                    {{$data->arperformance_time}}
                  @endif
                </td>
                <td>@if($data->cn == 0)
                    -
                  @else
                    {{$data->cn}}
                  @endif
                </td>
                <td>@if($data->cn_time == '')
                    -
                  @else
                    {{$data->cn_time}}
                  @endif
                </td>
                <td>@if($data->ct == 0)
                    -
                  @else
                    {{$data->ct}}
                  @endif
                </td>
                <td>@if($data->ct_time == '')
                    -
                  @else
                    {{$data->ct_time}}
                  @endif
                </td>
                <td>@if($data->mpp == 0)
                    -
                  @else
                    {{$data->mpp}}
                  @endif
                </td>
                <td>@if($data->mpp_time == '')
                    -
                  @else
                    {{$data->mpp_time}}
                  @endif
                </td>
                <td>@if($data->mk == 0)
                    -
                  @else
                    {{$data->mk}}
                  @endif
                </td>
                <td>@if($data->mk_time == '')
                    -
                  @else
                    {{$data->mk_time}}
                  @endif
                </td>
                <td>@if($data->tompe == 0)
                    -
                  @else
                    {{$data->tompe}}
                  @endif
                </td>
                <td>@if($data->tompe_time == '')
                    -
                  @else
                    {{$data->tompe_time}}
                  @endif
                </td>
                <td>@if($data->ppri == 0)
                    -
                  @else
                    {{$data->ppri}}
                  @endif
                </td>
                <td>@if($data->ppri_time == '')
                    -
                  @else
                    {{$data->ppri_time}}
                  @endif
                </td>
                <td>@if($data->ce == 0)
                    -
                  @else
                    {{$data->ce}}
                  @endif
                </td>
                <td>@if($data->ce_time == '')
                    -
                  @else
                    {{$data->ce_time}}
                  @endif
                </td>
                <td>@if($data->csb == 0)
                    -
                  @else
                    {{$data->csb}}
                  @endif
                </td>
                <td>@if($data->csb_time == '')
                    -
                  @else
                    {{$data->csb_time}}
                  @endif
                </td>
                <td>@if($data->drtaf == 0)
                    -
                  @else
                    {{$data->drtaf}}
                  @endif
                </td>
                <td>@if($data->drtaf_time == '')
                    -
                  @else
                    {{$data->drtaf_time}}
                  @endif
                </td>
                <td>@if($data->ratdinkop == 0)
                    -
                  @else
                    {{$data->ratdinkop}}
                  @endif
                </td>
                <td>@if($data->ratdinkop_time == '')
                    -
                  @else
                    {{$data->ratdinkop_time}}
                  @endif
                </td>
              </tr>
            @endforeach
          </table>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection