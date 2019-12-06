<div class="container-fluid" style="overflow-x: scroll;">
    <table class="table table-bordered data-table" style="border-color: #4C00FF;" border="1">
        <tr>
            <td bgcolor="#f0fff0"><strong>NPK</strong></td>
            <td bgcolor="#f0fff0"><strong>Nama</strong></td>
            <td bgcolor="#f0fff0"><strong>Departement</strong></td>
            <td bgcolor="#f0fff0"><strong>Report</strong></td>
            <td bgcolor="#f0fff0"><strong>Date</strong></td>
        </tr>
        @foreach($datas as $data)
        <tr>
            <td>{{$data->npk}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->cabang}}</td>
            <td>{{$data->report}}</td>
            <td>{{$data->waktu_buka_report}}</td>
        </tr>
        @endforeach
    </table>
</div>
