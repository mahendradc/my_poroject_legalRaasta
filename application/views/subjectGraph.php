<html>
  <head>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <style type="text/css">
    	#stdName{
    		padding-left: 45px;
	       padding-bottom: 20px;
	       color: #000000;
	       font-size: 35px;
    	}
    </style>
    <script type="text/javascript">
      google.charts.load("current", {packages:["imagebarchart"]});
      google.charts.setOnLoadCallback(drawChart);
        var data1=[];
 var Header= ['StudentName', 'Percentage'];
 data1.push(Header);
 <?php
 $i=0;
 for ( $i=0;$i<count($percentage); $i++) {?>
      var temp=[];
      temp.push('<?php echo $percentage[$i]['name']; ?>');
      temp.push(<?php echo $percentage[$i]['subNumber']; ?>);
      data1.push(temp);
 <?php }
  ?>
//var data = new google.visualization.arrayToDataTable(data1);
     function drawChart() {

        var data = google.visualization.arrayToDataTable(data1);

        var chart = new google.visualization.ImageBarChart(document.getElementById('chart_div'));
        
        chart.draw(data,{ title: '<?php echo $subjectName; ?>', width: 500, height: 400, min: 0});
      }
    </script>
  </head>
  <body>
      <!-- <div id="stdName" ><?php echo $subjectName; ?></div> -->
    <div id="chart_div" style="width: 500px; height: 400px;"></div>
  </body>
</html>