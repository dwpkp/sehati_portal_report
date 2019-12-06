
<style>
section
{
	display: inline-block;
	float: right;
	width: 100%;
	min-height: 100%;
	height: 100%;
	padding: 0px;
	margin: 0;
	border: 0px solid #ddd;
	cursor: pointer;
}

section img
{
	width: 100%;
}

section iframe
{
	margin:1px;
}

section:-webkit-full-screen
{
	float: none;
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	border: 0 none;
	background-color: #2F4F4F;
}

section:-moz-full-screen
{
	float: none;
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	border: 0 none;
}

section:-ms-full-screen
{
	float: none;
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	border: 0 none;
}

section:-o-full-screen
{
	float: none;
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	border: 0 none;
}

section:full-screen
{
	float: none;
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
	border: 0 none;
}



</style>
<div class="card mb-1" style="height:750px">
  
  <div class="card-header">
	<div class="row">
		
		<div class="col-lg-11 col-md-11 col-sm-12" style="text-align: left;">
			<h5>{{$report_name->report_name}} {{$nickname->name}}</h5>
		</div>
		<div style="text-align:right;" class="col-lg-1 col-md-1 col-sm-1 ml-12 d-none d-lg-block">
			<button class="btn btn-sm btn-info" onclick="gofullscreen(e);"><i class="fas fa-expand"></i></button>
		</div>
	</div>
  </div>

	  <div class="card-body " >
	   <section id="fullscreen" >
	  	<iframe style="width:100%;min-height:100%;height:100%" class="mb-1" src=Embed/{{$report_name->report_nm}} frameborder="0" allowFullScreen="true"></iframe>
	  </section>
	  </div>

</div>

<script>
var e = document.getElementById("fullscreen");

 function gofullscreen(e) {

	if (RunPrefixMethod(document, "FullScreen") || RunPrefixMethod(document, "IsFullScreen")) {
		RunPrefixMethod(document, "CancelFullScreen");
	}
	else {
		RunPrefixMethod(e, "RequestFullScreen");
	}

}

var pfx = ["webkit", "moz", "ms", "o", ""];
function RunPrefixMethod(obj, method) {
	
	var p = 0, m, t;
	while (p < pfx.length && !obj[m]) {
		m = method;
		if (pfx[p] == "") {
			m = m.substr(0,1).toLowerCase() + m.substr(1);
		}
		m = pfx[p] + m;
		t = typeof obj[m];
		if (t != "undefined") {
			pfx = [pfx[p]];
			return (t == "function" ? obj[m]() : obj[m]);
		}
		p++;
	}

}

</script>