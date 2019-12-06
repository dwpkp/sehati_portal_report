
@extends('layouts.app')

@section('content')<div id="content-header">
  <div id="breadcrumb"> <a href="{{route('KKManagement.index')}}" class="tip-bottom"><i class="icon-bar-chart"></i>{{$datas->report_tittle}}</a></div>
</div>
<div class="container-fluid">
  <hr>
  <div class="widget-title"> <span class="icon"><i class="icon-info-sign"></i></span>
    <h5>{{$datas->report_tittle}}</h5>
  </div>
  <iframe width="100%" height="760" src={{$datas->report_url}} frameborder="0" allowFullScreen="true"></iframe>
</div>
@endsection