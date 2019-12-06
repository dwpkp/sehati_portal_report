@php($role = Auth::user()->role_id)

<ul class="sidebar navbar-nav">
    <li class="nav-item opendirect">
        <a class="nav-link" href="{{url('/logo')}}" class="nav-link"><i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a>
    </li>
    @if(Auth::user()->npk == '12000000020')
    <!--li class="submenu {{ setActive(['user*', 'report*', 'role*', 'rolereport*']) }} nav-item dropdown"-->
    <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">

          <a class="dropdown-item {{ setActive(['user*']) }}" href="{{route('user.index')}}"><small>Master User</small></a>
          <a class="dropdown-item {{ setActive(['role*']) }}" href="{{route('role.index')}}"><small>Master Role</small></a>
          <a class="dropdown-item {{ setActive(['report*']) }}" href="{{route('report.index')}}"><small>Master Report</small></a>
          <a class="dropdown-item {{ setActive(['rolereport*']) }}" href="{{route('rolereport.index')}}"><small>Master Role Report</small></a>
          <a class="dropdown-item {{ setActive(['wilayah*']) }}" href="{{route('wilayah.index')}}"><small>Master Wilayah</small></a>
          <a class="dropdown-item {{ setActive(['cluster*']) }}" href="{{route('cluster.index')}}"><small>Master Cluster</small></a>
        </div>
      </li>
    @endif

        @foreach($menu as $m)

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>{{$m->category}}</span>
                </a>
                <div class="dropdown-menu opendirect" aria-labelledby="pagesDropdown">
                  @foreach( $submenu as $sm)
                    @if ($sm->id_menu == $m->id)
                  <a class="dropdown-item" href="#" idval="{{$sm->url}}" id=""><small>{{$sm->nama_menu}}</small></a>
                  @endif
                    @endforeach
                </div>
            </li>

        @endforeach

        @if (Auth::user()->whereRaw("role_id = '".$role."' and (role_id like 'HO%' or role_id like 'PE%' or role_id like 'DH%')")->get() != '[]')
            <li class="nav-item opendirect">
            <a class="nav-link" href="#" idval="{{url('/userlog')}}">
              <i class="fas fa-fw fa-user"></i>
              <span>User Log</span></a>
            </li>

    		@endif

</ul>
