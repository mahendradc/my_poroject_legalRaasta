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

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Subject', 'Percentage'],
          ['Physics',  <?php echo $percentage['Physics']; ?>],
          ['Maths',  <?php echo $percentage['Maths']; ?>],
          ['Bio',  <?php echo $percentage['Bio']; ?>],
          ['SST',  <?php echo $percentage['SST']; ?>]
        ]);

        var chart = new google.visualization.ImageBarChart(document.getElementById('chart_div'));

        chart.draw(data, { title: 'Marks wise <?php echo $percentage['name']; ?>`s chart', width: 400, height: 200, min: 0});
      }
    </script>
  </head>
  <body>
      <!-- <div id="stdName" > </div> -->
    <div id="chart_div" style="width: 400px; height: 240px;"></div>
  </body>
</html>