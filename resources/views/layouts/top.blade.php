<li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>Acquition</span></a>
    <ul>
        <li><a class="nav-link" href="{{route('nbot.index')}}">NBOT</a></li>
        <li><a class="nav-link" href="{{route('pvt.index')}}">Pinjaman VS Top</a></li>
        <li><a class="nav-link" href="{{route('profilebooking.index')}}">Profile Booking</a></li>
        <li><a class="nav-link" href="{{route('bq.index')}}">BQ</a></li>
        <li><a class="nav-link" href="{{route('kkh.index')}}">KKH</a></li>
        <li><a class="nav-link" href="{{route('lko.index')}}">LKO Monitoring</a></li>
        <li><a class="nav-link" href="{{route('proyeksi.index')}}">Proyeksi Target VS Aktual Nasional</a></li>
    </ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>BOS</span></a>
    <ul>
        <li><a class="nav-link" href="{{route('ARbooking.index')}}">AR Booking ULT</a></li>
        <li><a class="nav-link" href="{{route('ARexclude.index')}}">AR Exclude CX</a></li>
        <li><a class="nav-link" href="{{route('ARbookingrt.index')}}">AR Murni Booking RT</a></li>
        <li><a class="nav-link" href="{{route('DailyReport.index')}}">Daily Report</a></li>
        <li><a class="nav-link" href="{{route('RiskIndikator.index')}}">Dashboard Risk Indikator</a></li>
        @if (Auth::user()->whereRaw("role_id = '".$role."' and role_id like 'PE%'")->get() != '[]')
            <li><a class="nav-link" href="{{route('KKManagement.index')}}">Kertas Kerja Management</a></li>
        @endif
        <li><a class="nav-link" href="{{route('ppri.index')}}">PPRI PKBJ</a></li>
        <li><a class="nav-link" href="{{route('BookingUnit.index')}}">Booking Unit</a></li>
        <li><a class="nav-link" href="{{route('Inventory.index')}}">Inventory BJ</a></li>
    </ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>Collection</span></a>
    <ul>
        <li><a class="nav-link" href="{{route('ARPerformance.index')}}">AR Performance</a></li>
        <li><a class="nav-link" href="{{route('CollectionNavigation.index')}}">Collection Navigation</a></li>
        <li><a class="nav-link" href="{{route('CollectionTrend.index')}}">Collection Trend</a></li>
    </ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>HRD</span></a>
<ul>
<li><a class="nav-link" href="{{route('MutasiKaryawan.index')}}">Mutasi Karyawan</a></li>
</ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>Recovery</span></a>
    <ul>
        <li><a class="nav-link" href="{{route('Rppri.index')}}">Report PPRI</a></li>
    </ul>
</li>
<li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>TAFT</span></a>
    <ul>
        <li><a class="nav-link" href="{{route('Compare.index')}}">Compare Expence</a></li>
        <li><a class="nav-link" href="{{route('DRT.index')}}">Daily Report TAF</a></li>
        <li><a class="nav-link" href="{{route('LKBH.index')}}">LKBH</a></li>
        <li><a class="nav-link" href="{{route('RAT.index')}}">RAT DINKOP</a></li>
    </ul>
</li>