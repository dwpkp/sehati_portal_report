@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".role").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('role.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-repeat"></i> Master Role</a></div>
        <h1>Add Role +</h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Role Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" class="form-horizontal" action="{{ route('role.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="control-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label class="control-label">Kode Role</label>
                                <div class="controls">
                                    <input id="role_id" type="text" class="form-control" name="role_id" value="{{ old('role_id') }}" required>
                                    @if ($errors->has('role_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group{{ $errors->has('role_nm') ? ' has-error' : '' }}">
                                <label class="control-label">Nama Role</label>
                                <div class="controls">
                                    <input id="role_nm" type="text" class="form-control" name="role_nm" value="{{ old('role_nm') }}" required>
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
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="submit">
                                    Add Role
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
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