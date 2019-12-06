<div class="container-fluid" style="overflow-x: scroll;">
    <br>
          <table class="table table-bordered data-table" style="border-color: #4C00FF;" border="1">
            <tr>
                <th rowspan="3"><span style="color: #003366;"><strong>User</strong></span></th>
              <th colspan="54"><strong>Report</strong></th>
            </tr>
            <tr>
              <th colspan="2"><strong>BQ</strong></th>
              <th colspan="2"><strong>KKH</strong></th>
              <th colspan="2"><strong>LKO Monitoring</strong></th>
              <th colspan="2"><strong>NBOT</strong></th>
              <th colspan="2"><strong>Pinjaman VS TOP</strong></th>
              <th colspan="2"><strong>Profile Booking</strong></th>
              <th colspan="2"><strong>Proyeksi VS Target Actual</strong></th>
              <th colspan="2"><strong>Daily Report</strong></th>
              <th colspan="2"><strong>AR Booking ULT</strong></th>
              <th colspan="2"><strong>AR Exclude CX</strong></th>
              <th colspan="2"><strong>AR Murni Booking RT</strong></th>
              <th colspan="2"><strong>Kertas Kerja Management</strong></th>
              <th colspan="2"><strong>Inventory BJ</strong></th>
              <th colspan="2"><strong>PPRI PKBJ</strong></th>
              <th colspan="2"><strong>Risk Indikator</strong></th>
              <th colspan="2"><strong>Risk Rasio PKBJ Booking</strong></th>
              <th colspan="2"><strong>AR Perormance</strong></th>
              <th colspan="2"><strong>Collection Navigation</strong></th>
              <th colspan="2"><strong>Collection Trend</strong></th>
              <th colspan="2"><strong>MPP</strong></th>
              <th colspan="2"><strong>Mutasi Karyawan</strong></th>
              <th colspan="2"><strong>Turn Over, MP Exist</strong></th>
              <th colspan="2"><strong>PPRI</strong></th>
              <th colspan="2"><strong>Compare Expence</strong></th>
              <th colspan="2"><strong>Compare Saldo Bank</strong></th>
              <th colspan="2"><strong>Daily Report TAF</strong></th>
              <th colspan="2"><strong>RAT DINKOP</strong></th>
            </tr>
            <tr>
                <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
                <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
              <th><span class="icon">Visited</span></th>
              <th>Last Visit</th>
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
                <td>@if($data->ptva == 0)
                    -
                  @else
                    {{$data->ptva}}
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
