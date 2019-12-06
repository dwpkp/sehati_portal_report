@section('js')

    <script type="text/javascript">

        $(document).ready(function() {
            $(".rolereport").select2();
        });

    </script>
@stop

@extends('layouts.app')

@section('content')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('rolereport.index') }}" title="Go to Role Data" class="tip-bottom"><i class="icon-repeat"></i> Master Role Report</a></div>
        <h1>Add Role Report +</h1>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Role Report Data</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" id="rolereport" class="form-horizontal" action="{{ route('rolereport.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="control-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label class="control-label">Role </label>
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
                            <div class="control-group{{ $errors->has('report_id') ? ' has-error' : '' }}">
                                <label class="control-label">Report </label>
                                <div class="controls">
                                    <select class="form-control" name="report_id">
                                        <option value="">-- Pilih Report --</option>
                                        @foreach($report as $reports)

                                            <option value="{{ $reports->report_id }}"> {{ $reports->report_nm }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('report_id'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('report_id') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="submit">
                                    Add Role Report
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                                <a href="{{route('rolereport.index')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    <script>
        $('#show-user').autocomplete({
            // delay: 500,
            minLength: 2,
            source: function(request, response) {
                $.getJSON("/search-user", {
                    name: request.term,
                }, function(data) {
                    response(data);
                });
            },
            focus: function(event, ui) {
                // prevent autocomplete from updating the textbox
                event.preventDefault();
            },
            select: function(event, ui) {
                // prevent autocomplete from updating the textbox
                event.preventDefault();

                $('input[name="show_user"]').val(ui.item.label);
                $('input[name="user_id"]').val(ui.item.id);
            }
        });
    </script>
@stop