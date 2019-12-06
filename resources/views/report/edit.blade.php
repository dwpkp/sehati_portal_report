@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('report.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-user"></i> Master Report</a></div>
        <h1>Edit Role </h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Role Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ route('report.update', $data->report_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="control-group{{ $errors->has('report_id') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Report</label>
                                <div class="controls">
                                    <input id="report_nm" type="text" class="form-control" name="report_nm" value="{{ $data->report_nm }}" required>
                                    @if ($errors->has('report_nm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('report_nm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="control-group{{ $errors->has('report_url') ? ' has-error' : '' }}">
                                    <label class="control-label">Report URL</label>
                                    <div class="controls">
                                        <input id="report_url" type="text" class="span11" name="report_url" value="{{ $data->report_url }}" required autofocus>
                                        @if ($errors->has('report_url'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('report_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group{{ $errors->has('report_status') ? ' has-error' : '' }}">
                                    <label class="control-label">Report Status</label>
                                    <div class="controls">
                                        <select name="role_status" required>
                                            <option value="1" {{$data->report_status === "1" ? "selected" : ""}}>Active</option>
                                            <option value="2" {{$data->report_status === "2" ? "selected" : ""}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" id="submit">
                                        Update
                                    </button>
                                    <a href="{{route('report.index')}}" class="btn btn-light pull-right">Back</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection