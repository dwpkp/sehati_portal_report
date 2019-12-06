@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('wilayah.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-user"></i> Master Wilayah</a></div>
        <h1>Edit Wilayah </h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Wilayah Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ route('wilayah.update', $data->dw_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="control-group{{ $errors->has('dw_id') ? ' has-error' : '' }}">
                                <label class="control-label">Wilayah ID</label>
                                <div class="controls">
                                    <input id="role_id" type="text" class="form-control" name="role_id" value="{{ $data->dw_id }}" disabled>
                                    @if ($errors->has('dw_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dw_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="control-group{{ $errors->has('dw_nm') ? ' has-error' : '' }}">
                                    <label class="control-label">Nama Wilayah</label>
                                    <div class="controls">
                                        <input id="dw_nm" type="text" class="form-control" name="dw_nm" value="{{ $data->dw_nm }}" required autofocus>
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
                                            <option value="1" {{$data->dw_status === "1" ? "selected" : ""}}>Active</option>
                                            <option value="2" {{$data->dw_status === "2" ? "selected" : ""}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" id="submit">
                                        Update
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