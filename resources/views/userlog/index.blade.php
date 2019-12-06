<!--div id="content-header">
    <div id="breadcrumb"> <a href="{{route('userlog.index')}}" title="Go to User Log" class="tip-bottom"><i class="icon-th-list"></i> User Log</a></div>
</div-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="card">
                <div class="card-header">
                    <h5>Export User Log to Excel</h5>
                </div>
                <div class="card-body">
                        <form method="POST" class="form-horizontal" action="{{ route('export_excel') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Select Date :</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" id="datestart" class="form-control" name="datestart" required />
                                </div>
                                <div class="col-md-3">
                                    <input type="date" id="dateend" name="dateend" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm mt-2" id="submit">Export Excel</button>
                        </form>


                </div>
            </div>

        </div>
    </div>
</div>

