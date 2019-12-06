<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  

  <title>.SEHATI - BI Report.</title>
  

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sbadmin/css/sb-admin.css') }}" rel="stylesheet">
  
  <link href="{{ asset('sbadmin/css/pace.css') }}" rel="stylesheet">
@section('css')

  @show

  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
  
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top" id="navbar" style="display:none;">

    <a class="navbar-brand mr-1" href="#"><img  src="{{asset('images/backend_images/logo.png')}}"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-12">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Hello, {{Auth::user()->name}} !</a>
          <a class="dropdown-item direct" href="{{route('user.edit', Auth::user()->id)}}">Change Password</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>

        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper" style="display:none;">

    <!-- Sidebar -->
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


	<!-- Sidebar -->

    <div id="content-wrapper">

      <div class="container-fluid" id="konten">

        @yield('content')

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><a href="https://www.pkp.co.id/" target="_blank">PT. Prawathiya Karsa Pradiptha</a>. All rights reserved.</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!--a class="" href="{{ route('logout') }}">Logout</a-->
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sbadmin/js/sb-admin.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('sbadmin/vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('sbadmin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('sbadmin/js/pace.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function()
{

  $('.opendirect a').click(function()
  {
    var page = $(this).attr('idval');
    var menu =  $(this).attr('for');

    //$('#konten').html("<div class='row d-flex h-100 justify-content-center align-items-center' style='margin-top:250px'><img src={{ asset('sbadmin/ajax-loader.gif') }}></div>");

    $.ajax(
    {
        url: page,
        success: function(data)
        {
		  
          $('#konten').load(page);


        },
        error:function(data)
        {
          $('#konten').html("<div class='row d-flex h-100 justify-content-center align-items-center' style='margin-top:150px'><span>Akses Ditolak</span></div>");
        }
    });

  return false;
  });
  
  $('.direct').click(function()
  {
    var page = $(this).attr('href');
    

    $('#konten').html("<div class='row d-flex h-100 justify-content-center align-items-center' style='margin-top:150px'></div>");

    $.ajax(
    {
        url: page,
        success: function(data)
        {

          $('#konten').load(page);


        },
        error:function(data)
        {
          $('#konten').html("<div class='row d-flex h-100 justify-content-center align-items-center' style='margin-top:150px'><span>Akses Ditolak</span></div>");
        }
    });

  return false;
  });
  
  $(".dropdown-item").click( function()
  {

    $('.dropdown-item').removeClass('active');
    $(this).addClass('active');

  });

});
  </script>


  @section('js')

  @show
  <script>
$("#navbar").fadeIn(1000);
$("#wrapper").fadeIn(1000);
</script>
</body>

</html>
