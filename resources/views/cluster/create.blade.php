@section('js')

    <script type="text/javascript">

        $(document).ready(function() {
            $(".cluster").select2();
        });

    </script>
@stop

@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('cluster.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-repeat"></i> Master Cluster</a></div>
        <h1>Add Cluster +</h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Cluster Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal" action="{{ route('cluster.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="control-group{{ $errors->has('dw_id') ? ' has-error' : '' }}">
                                <label class="control-label">Wilayah </label>
                                <div class="controls">
                                    <select class="form-control" name="dw_id">
                                        <option value="">-- Pilih Wilayah --</option>
                                        @foreach($dw as $dws)

                                            <option value="{{ $dws->dw_id }}"> {{ $dws->dw_nm }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('dw_id'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('dw_id') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('cluster_id') ? ' has-error' : '' }}">
                                <label class="control-label">Kode Cluster</label>
                                <div class="controls">
                                    <input id="cluster_id" type="text" class="form-control" name="cluster_id" value="{{ old('cluster_id') }}" required>
                                    @if ($errors->has('cluster_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cluster_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('cluster_nm') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Cluster</label>
                                <div class="controls">
                                    <input id="cluster_nm" type="text" class="form-control" name="cluster_nm" value="{{ old('cluster_nm') }}" required>
                                    @if ($errors->has('cluster_nm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cluster_nm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('cluster_status') ? ' has-error' : '' }}">
                                <label class="control-label">Cluster Status</label>
                                <div class="controls">
                                    <select name="cluster_status" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="submit">
                                    Add Cluster
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
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
