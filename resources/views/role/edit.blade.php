@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('role.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-user"></i> Master Role</a></div>
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
                        <form action="{{ route('role.update', $data->role_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="control-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label class="control-label">Role ID</label>
                                <div class="controls">
                                    <input id="role_id" type="text" class="form-control" name="role_id" value="{{ $data->role_id }}" disabled>
                                    @if ($errors->has('role_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="control-group{{ $errors->has('role_nm') ? ' has-error' : '' }}">
                                    <label class="control-label">Nama Role</label>
                                    <div class="controls">
                                        <input id="role_nm" type="text" class="form-control" name="role_nm" value="{{ $data->role_nm }}" required autofocus>
                                        @if ($errors->has('role_nm'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('role_nm') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group{{ $errors->has('role_status') ? ' has-error' : '' }}">
                                    <label class="control-label">Role Status</label>
                                    <div class="controls">
                                        <select name="role_status" required>
                                            <option value="1" {{$data->role_status === "1" ? "selected" : ""}}>Active</option>
                                            <option value="2" {{$data->role_status === "2" ? "selected" : ""}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" id="submit">
                                        Update
                                    </button>
                                    <a href="{{route('role.index')}}" class="btn btn-light pull-right">Back</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection