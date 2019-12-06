@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

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
        </script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('rolereport.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Role Report <b>{{$data->role_nm}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('role_nm') ? ' has-error' : '' }}">
                            <label for="role_nm" class="col-md-4 control-label">Nama Role</label>
                            <div class="col-md-6">
                                <input id="role_nm" type="text" class="form-control" name="role_nm" value="{{ $data->role_nm }}" required>
                                @if ($errors->has('role_nm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_nm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('report_nm') ? ' has-error' : '' }}">
                              <label for="report_nm" class="col-md-4 control-label">Nama Report</label>
                              <div class="col-md-6">
                                  <input id="report_nm" type="text" class="form-control" name="role_start_date" value="{{ $data->report_nm }}" required>
                                  @if ($errors->has('report_nm'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('report_nm') }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('rolereport.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection