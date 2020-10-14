<html>
   <head>
      <title>Highcharts Tutorial</title>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script src = "https://code.highcharts.com/highcharts.js"></script> 
      <script src = "https://code.highcharts.com/modules/data.js"></script>
   </head>
   
   <body>
      <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto"></div>
      <script language = "JavaScript">
         $(document).ready(function() {
            var data = {
               table: 'datatable'
            };
            var chart = {
               type: 'column'
            };
            var title = {
               text: 'Data extracted from a HTML table in the page'   
            };      
            var yAxis = {
               allowDecimals: false,
               title: {
                  text: 'Units'
               }
            };
            var tooltip = {
               formatter: function () {
                  return '<b>' + this.series.name + '</b><br/>' +
                     this.point.y + ' ' + this.point.name.toLowerCase();
               }
            };
            var credits = {
               enabled: false
            };  
            var json = {};   
            json.chart = chart; 
            json.title = title; 
            json.data = data;
            json.yAxis = yAxis;
            json.credits = credits;  
            json.tooltip = tooltip;  
            $('#container').highcharts(json);
         });
      </script>
      
      <table id = "datatable">
         <thead>
            <tr>
               <th></th>
               <th>Jane</th>
               <th>John</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th>Apples</th>
               <td>3</td>
               <td>4</td>
            </tr>
            <tr>
               <th>Pears</th>
               <td>2</td>
               <td>0</td>
            </tr>
            <tr>
               <th>Plums</th>
               <td>5</td>
               <td>11</td>
            </tr>
            <tr>
               <th>Bananas</th>
               <td>1</td>
               <td>1</td>
            </tr>
            <tr>
               <th>Oranges</th>
               <td>2</td>
               <td>4</td>
            </tr>
         </tbody>
      </table>
   </body>
   
</html>