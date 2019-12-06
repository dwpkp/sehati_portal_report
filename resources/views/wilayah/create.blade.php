@section('js')

    <script type="text/javascript">

        $(document).ready(function() {
            $(".wilayah").select2();
        });

    </script>
@stop

@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('wilayah.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-repeat"></i> Master Wilayah</a></div>
        <h1>Add Wilayah +</h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Role Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal" action="{{ route('wilayah.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="control-group{{ $errors->has('dw_id') ? ' has-error' : '' }}">
                                <label class="control-label">Kode Wilayah</label>
                                <div class="controls">
                                    <input id="dw_id" type="text" class="form-control" name="dw_id" value="{{ old('dw_id') }}" required>
                                    @if ($errors->has('dw_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dw_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('dw_nm') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Wilayah</label>
                                <div class="controls">
                                    <input id="dw_nm" type="text" class="form-control" name="dw_nm" value="{{ old('dw_nm') }}" required>
                                    @if ($errors->has('dw_nm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dw_nm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('dw_status') ? ' has-error' : '' }}">
                                <label class="control-label">Wilayah Status</label>
                                <div class="controls">
                                    <select name="dw_status" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="submit">
                                    Add Wilayah
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                                <a href="{{route('wilayah.index')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection