@extends('layouts.app')

@section('content')
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('cluster.index')}}" title="Go to Cluster" class="tip-bottom"><i class="icon-th-list"></i> Master Cluster</a></div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="col-lg-2">
      <a href="{{ route('cluster.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Add Cluster</a>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
              <tr>
                <th>Nama Wilayah</th>
                <th>Nama Cluster</th>
                <th>Status Cluster</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach($datas as $data)
                <tr>
                  <td class="py-1">
                    @php($dwilayah = \App\Wilayah::where('dw_id',$data->dw_id)->first())
                    {{$dwilayah->dw_nm}}
                  </td>
                  <td>
                    {{$data->cluster_nm}}
                  </td>
                  <td>
                    @if($data->cluster_status == '1')
                      Active
                    @else
                      Inactive
                    @endif
                  </td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-primary">Action</button>
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="{{route('cluster.edit', $data->cluster_id)}}"><i class="icon-edit"></i> Edit </a></li>
                        <li class="divider"></li>
                        <li><form action="{{ route('cluster.destroy', $data->cluster_id) }}" class="pull-left"  method="post">
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
