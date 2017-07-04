<html>
<head></head>
<style>
#sidebar{
 width :200px;
 height:600px;
 background: #D3D3D3;

}
#otherhalf{

}
#heading{
	
	padding: 5px;
	color: #1E90FF;
}	
#studentwise{
	padding: 5px;
	padding-left: 20px;
	padding-top: 20px;
	color: #1E90FF;
}
#subjectwise{
	padding: 5px;
	padding-left: 20px;
	color: #1E90FF;
}
.studentList{
    padding: 5px;
	padding-left: 5px;
	padding-top: 0px;
	color: #000000;
	cursor: pointer;
   
}
.allSubjectList{
	 padding: 5px;
	padding-left: 5px;
	padding-top: 0px;
	color: #000000;
	cursor: pointer;
}
#graph2{
	position:absolute; 
	left:400px; 
	top:100px;
	color: #808000;
}
#graph3{
	position:absolute; 
	left:400px; 
	top:100px;
	color: #808000;
}
.ourStudents:hover{
	 background-color: yellow;
}
.ourSubjects:hover{
	 background-color: yellow;
}
/*
#Choices{
	padding-bottom: 100px;
}*/
</style>

<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/amcharts/amcharts.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="assets/js/jscharts.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.canvasjs.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- <script type="text/javascript" src="https://www.google.com/jsapi?autoload=  
{'modules':[{'name':'visualization','version':'1.1','packages':
['corechart']}]}"></script>-->
<script >
$(document).ready(function() {

    $(".allSubjectList").hide();
	$("#studentwise1").on('click', function(){
    $(".studentList").show();
    $(".allSubjectList").hide();
    
	});

	$("#subjectwise1").on('click', function(){
    $(".studentList").hide();
    $(".allSubjectList").show();
	});
	$(".studentId").on('click', function(){
		
      // var x =document.getElementsByClassName("studentId");
     // google.charts.load('current', {packages: ['corechart', 'bar']});
     // google.charts.setOnLoadCallback(drawBasic);
       var x =this.id ;
     //  alert(x);
       $.ajax({
        type: "POST",
        url:  "http://localhost/myproject/graph",
        data: {id: x},
        
        success: function(data1) {
        	 if(data1)
                $("#graph2").html(data1);
        	       },
         error: function() {
            
        }
      });
});

	$(".subjectId").on('click', function(){
      // var x =document.getElementsByClassName("studentId");
     // google.charts.load('current', {packages: ['corechart', 'bar']});
     // google.charts.setOnLoadCallback(drawBasic);
       var x =this.id ;
     //  alert(x);
       $.ajax({
        type: "POST",
        url:  "http://localhost/myproject/subjectGraph",
        data: {id: x},
        
        success: function(data1) {
        	 if(data1)
                 $("#graph3").html(data1);
        	       },
         error: function() {
            
        }
      });
});
	});
//});
  
</script>	
<body class="container">
     <div id="sidebar">
	   <h2 id="heading"> #Choices</h2>
	   <div id="Choices">
	   	  <div id="studentwise" >
	   	    <button id="studentwise1" >Marks Wise</button>
	   	    <div class="studentList">
	   	    	<?php
	   	    	 // print_r($allStudent[0]->name);
	   	    	   for($i=0;$i<count($allStudent); $i++){?>
	   	    	   <ul class="ourStudents">
	   	    	   	<li > <div class="studentId " id="<?php print_r($allStudent[$i]->studentId); ?>"><?php print_r($allStudent[$i]->name); ?> </div> </li>
	   	    	   	<!-- <br> -->
	   	    	   	</ul>
	   	    	 <?php  }
	   	    	 ?>
	   	    </div>
	   	    <div id="graph2" ></div>
	   	  </div>

	   	  <div id="subjectwise" >
	   	  <button id="subjectwise1" type="button" >Field Wise</button>
	   	   <div class="allSubjectList">
	   	    	<?php
	   	    	 // print_r($allStudent[0]->name);
	   	    	   for($i=0;$i<count($subjectList); $i++){?>
	   	    	   <ul class="ourSubjects">
	   	    	   <li>
	   	    	   	 <div class= "subjectId" id="<?php print_r($subjectList[$i]->subjectId);  ?>" value="<?php print_r($subjectList[$i]->subjectId);  ?>"><?php print_r($subjectList[$i]->subjectName); ?> </div> 
	   	    	   	 </li>
	   	    	   	 </ul>
	   	    	   	<!-- <br> -->
	   	    	 <?php  }
	   	    	 ?>
	   	    </div>
	   	    <div id="graph3" ></div>
	   	   </div>
	   </div>
     </div>
	 <div id="otherhalf">
		
	 </div>
	<!-- <div id="graph2"></div> -->
</body>

</html>
