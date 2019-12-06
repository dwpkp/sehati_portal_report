@php($role = Auth::user()->role_id)

<ul>
    <li><a href="{{url('/')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    @if(Auth::user()->npk == '120020')
    <li class="submenu {{ setActive(['user*', 'report*', 'role*', 'rolereport*']) }}"> <a href="#"><i class="icon icon-th-list"></i> <span>Data Master</span></a>
        <ul>
            <li><a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">Master User</a></li>
            <li>
                <a class="nav-link {{ setActive(['role*']) }}" href="{{route('role.index')}}">Master Role</a>
            </li>
            <li>
                <a class="nav-link {{ setActive(['report*']) }}" href="{{route('report.index')}}">Master Report</a>
            </li>
            <li>
                <a class="nav-link {{ setActive(['rolereport*']) }}" href="{{route('rolereport.index')}}">Master Role Report</a>
            </li>
            <li>
                <a class="nav-link {{ setActive(['wilayah*']) }}" href="{{route('wilayah.index')}}">Master Wilayah</a>
            </li>
            <li>
                <a class="nav-link {{ setActive(['cluster*']) }}" href="{{route('cluster.index')}}">Master Cluster</a>
            </li>
        </ul>
    </li>
    @endif
    @php($drole = \App\RoleReport::where('role_id',$role)->get())
    <li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>Acquition</span></a>
        <ul>
            @foreach($drole as $droles)
                @php($dreport = \App\Report::where('report_id',$droles->report_id)->first())
                @if($dreport->parent_id == '$2y$10$s863BAZMqu/vcmOWKJ5HVOH3UZcStIfZptQg7erPMEZ5xmHJNq9l6' and $dreport->report_status == '1')
                    <li><a class="nav-link" href="{{route($dreport->report_menu)}}">{{$dreport->report_nm}}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>BOS</span></a>
        <ul>
            @foreach($drole as $droles)
                @php($dreport = \App\Report::where('report_id',$droles->report_id)->first())
                @if($dreport->parent_id == '$2y$10$84RFQ4o95KNUFvoyLU/RH.rtIR0JnIWwWUtIVVl.WBLcWXoW2EIgG' and $dreport->report_status == '1')
                    <li><a class="nav-link" href="{{route($dreport->report_menu)}}">{{$dreport->report_nm}}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>Collection</span></a>
        <ul>
            @foreach($drole as $droles)
                @php($dreport = \App\Report::where('report_id',$droles->report_id)->first())
                @if($dreport->parent_id == '$2y$10$6VEEF3L891efdXE6Jjp7BeRASmepVASzOAn0m4uXAploA3FCIbytu' and $dreport->report_status == '1')
                    <li><a class="nav-link" href="{{route($dreport->report_menu)}}">{{$dreport->report_nm}}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
    @if (Auth::user()->whereRaw("role_id = '".$role."' and (role_id like 'HO%' or role_id like 'PE%')")->get() != '[]')
    <li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>HRD</span></a>
    <ul>
            @foreach($drole as $droles)
                @php($dreport = \App\Report::where('report_id',$droles->report_id)->first())
                @if($dreport->parent_id == '$2y$10$nYEy0BAYvAvMUDyzdoioa.2bW0Ysj.sISMF7LAkNdXwV0ovKaYLOy' and $dreport->report_status == '1')
                    <li><a class="nav-link" href="{{route($dreport->report_menu)}}">{{$dreport->report_nm}}</a></li>
                @endif
            @endforeach
    </ul>
    </li>
    @endif
    <li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>Recovery</span></a>
         <ul>
            @foreach($drole as $droles)
                 @php($dreport = \App\Report::where('report_id',$droles->report_id)->first())
                 @if($dreport->parent_id == '$2y$10$pUSE.6Z7I6FfJzo3UsmYgui6qLTaqSsJE35gcBQ/SinAXc5.kWopK' and $dreport->report_status == '1')
                      <li><a class="nav-link" href="{{route($dreport->report_menu)}}">{{$dreport->report_nm}}</a></li>
                 @endif
            @endforeach
         </ul>
    </li>
    @if (Auth::user()->whereRaw("role_id = '".$role."' and (role_id like 'HO%' or role_id like 'PE%')")->get() != '[]')
    <li class="submenu"> <a href="#"><i class="icon icon-th-large"></i> <span>TAFT</span></a>
        <ul>
        @foreach($drole as $droles)
                  @php($dreport = \App\Report::where('report_id',$droles->report_id)->first())
                  @if($dreport->parent_id == '$2y$10$iSaDeIA2DMd6wOALBbC15eNGzjC0.T1GVy4a.IWtP7TBCt1CsOKN2' and $dreport->report_status == '1')
                        <li><a class="nav-link" href="{{route($dreport->report_menu)}}">{{$dreport->report_nm}}</a></li>
                  @endif
             @endforeach
        </ul>
    </li>
    @endif
</ul>
