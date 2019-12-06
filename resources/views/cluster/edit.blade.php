@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('cluster.index') }}" title="Go to Cluster Data" class="tip-bottom"><i class="icon-user"></i> Master Cluster</a></div>
        <h1>Edit Cluster </h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Cluster Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ route('cluster.update', $data->cluster_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="control-group{{ $errors->has('dw_id') ? ' has-error' : '' }}">
                                <label class="control-label">Wilayah</label>
                                <div class="controls">
                                    <select class="form-control" name="dw_id">
                                        <option value="">-- Pilih Wilayah --</option>
                                        @foreach($wil as $wils)
                                            <option value="{{ $wils->dw_id }}" {{$data->dw_id === $wils->dw_id ? "selected" : ""}}> {{ $wils->dw_nm }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('dw_id'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('dw_id') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                                <div class="control-group{{ $errors->has('cluster_nm') ? ' has-error' : '' }}">
                                    <label class="control-label">Nama Cluster</label>
                                    <div class="controls">
                                        <input id="cluster_nm" type="text" class="form-control" name="cluster_nm" value="{{ $data->cluster_nm }}" required autofocus>
                                        @if ($errors->has('cluster_nm'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('cluster_nm') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group{{ $errors->has('cluster_status') ? ' has-error' : '' }}">
                                    <label class="control-label">Role Status</label>
                                    <div class="controls">
                                        <select name="cluster_status" required>
                                            <option value="1" {{$data->cluster_status === "1" ? "selected" : ""}}>Active</option>
                                            <option value="2" {{$data->cluster_status === "2" ? "selected" : ""}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" id="submit">
                                        Update
                                    </button>
                                    <a href="{{route('cluster.index')}}" class="btn btn-light pull-right">Back</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection