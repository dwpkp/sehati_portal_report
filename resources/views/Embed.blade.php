
 <html>
 <script src="https://microsoft.github.io//PowerBI-JavaScript/demo/node_modules/jquery/dist/jquery.js"></script>
 <script src="https://microsoft.github.io//PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>
 <link rel="stylesheet" href="http://azure-samples.github.io/powerbi-angular-client/app.css">

 <script type="text/javascript">

 window.onload = function () {



 var embedConfiguration = {
     type: 'report',
     accessToken: '{{$token}}',
     embedUrl: '{{$embed_url->report_url}}' ,
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
