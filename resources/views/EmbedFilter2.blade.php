
<html>
<script src="https://microsoft.github.io//PowerBI-JavaScript/demo/node_modules/jquery/dist/jquery.js"></script>
<script src="{{asset('powerbi/dist/powerbi.js')}}"></script>
<!--<script src="https://microsoft.github.io//PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>-->
<link rel="stylesheet" href="http://azure-samples.github.io/powerbi-angular-client/app.css">

 <script type="text/javascript">

 window.onload = function () {

   var  Filter = {
      $schema: "http://powerbi.com/product/schema#basic",
     target: {
       table: "{{$embed_url->filter1}}",
       column: "{{$embed_url->column1}}"
     },
   operator: "In",
   values: <?php echo $value ?>,
   filterType: 1 // pbi.models.FilterType.BasicFilter
 };

 var  Filter2 = {
    $schema: "http://powerbi.com/product/schema#basic",
   target: {
     table: "{{$embed_url->filter2}}",
     column: "{{$embed_url->column2}}"
   },
 operator: "In",
 values: <?php echo $value2 ?>,
 filterType: 1 // pbi.models.FilterType.BasicFilter
};

var embedConfiguration = {
    type: 'report',
    accessToken: '{{$token}}' ,
    embedUrl: '{{$embed_url->report_url}}',
    filters:[Filter,Filter2],
    settings: {
          filterPaneEnabled: false,
          navContentPaneEnabled: true
        }
};
var $reportContainer = $('#reportContainer');

var report = powerbi.embed($reportContainer.get(0), embedConfiguration);

}

 </script>

    <div style="height:100%" id="reportContainer"></div>

</html>