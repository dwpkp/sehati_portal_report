@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('user.index') }}" title="Go to User Data" class="tip-bottom"><i class="icon-th-list"></i> Master User</a></div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="col-lg-2">
      <a href="{{ route('user.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Add User</a>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>User Data</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
              <tr>
                <th>
                  NPK
                </th>
                <th>
                  Nama
                </th>
                <th>
                  User Name
                </th>
                <th>
                  Status
                </th>
                <th>
                  Role
                </th>
                <th>
                  Action
                </th>
              </tr>
              </thead>
              <tbody>
              @foreach($datas as $data)
                <tr>
                  <td class="py-1">
                    {{$data->npk}}
                  </td>
                  <td>
                    <a href="{{route('user.show', $data->id)}}">
                      {{$data->name}}
                    </a>
                  </td>
                  <td>
                    {{$data->username}}
                  </td>
                  <td>
                   @if($data->user_status == '1')
                     Active
                   @else
                     Inactive
                   @endif
                  </td>
                  <td>
                    {{$data->role_id}}
                  </td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-primary">Action</button>
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="{{route('user.edit', $data->id)}}"><i class="icon-edit"></i> Edit </a></li>
                        <li class="divider"></li>
                        <li><form action="{{ route('user.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="clouds-flat-button" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="icon-trash"></i> Delete
                            </button>
                          </form></li>
                      </ul>
                    </div>

                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="pagination pagination-centered">{{$datas->links()}}</div>
      </div>
    </div>
  </div>
@endsection