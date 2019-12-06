@section('js')
    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
@stop

@extends('layouts.app')

@section('content')
<div id="content-header">
   <div id="breadcrumb"> <a href="{{ route('user.index') }}" title="Go to User Data" class="tip-bottom"><i class="icon-user"></i> Master User</a></div>
    <h1>Add User +</h1>
</div>
<div class="container-fluid"><hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>User Data</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="control-group{{ $errors->has('npk') ? ' has-error' : '' }}">
                            <label class="control-label">NPK</label>
                            <div class="controls">
                                <input id="npk" type="text" class="form-control" name="npk" value="{{ old('npk') }}" required>
                                @if ($errors->has('npk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('npk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="control-label">User Name</label>
                            <div class="controls">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label class="control-label">Role User</label>
                            <div class="controls">
                                <select class="form-control" name="role_id">
                                    <option value="">-- Pilih Role --</option>
                                @foreach($role as $roles)

                                    <option value="{{ $roles->role_id }}"> {{ $roles->role_nm }} </option>
                                @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('user_status') ? ' has-error' : '' }}">
                            <label class="control-label">User Status</label>
                            <div class="controls">
                                <select name="user_status" required>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
                                <span id='message'></span>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id="submit">
                                Register
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('user.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection