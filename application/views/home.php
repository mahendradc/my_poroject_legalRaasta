<html>
<head></head>
<style type="text/css">
body{
	background-color: #CEEAE6;
}
	#file{
		    font-size: 20px;

	 position: absolute;
    top: 50%;
    left: 47%;

    margin-top: -50px;
    margin-left: -47px;
    width: 120px;
    height: 50px;
  
     cursor: pointer;
   
	}
	#upload{
		    font-size: 20px;

	 position: absolute;
    top: 42%;
    left: 53%;

    margin-top: -42;
    margin-left: -53;
    width: 100px;
    height: 30px;
     cursor: pointer;
   
    
   
	}
.text{
	  font-size: 30px;
     position: absolute;
    top: 41%;
    left: 35%;
    background-color: #291B4F;
    margin-top: -41px;
    margin-left: -35px;

}
.project{
	  font-size: 30px;
	   
     position: absolute;
    top: 10%;
    left: 50%;

    margin-top: -10px;
    margin-left: -50px;
	 font-family: Jazz LET, fantasy;
	 font-stretch: ultra-expanded
}
.disabled {
    color: #999;
}
.button:hover{
	
}
</style>
<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	// $('#cancel').prop('disabled',true).addClass('disabled');
	$("#clickhere").on('click', function(){
     
      document.getElementById("cancel").disabled = false;
       $.ajax({
        type: "POST",
        url:  "http://localhost/myproject/home/uploadFile",
        
        beforeSend: function(){
        	$('#clickhere').text('Loading...');
        },
        success: function() {
        	 window.location.href='http://localhost/myproject/test';
        	       },
         error: function() {
            
        }
      });
});
	$("#upload").on('click', function(){
     var file_data = $('#file').prop('files')[0];
     var form_data = new FormData();
      form_data.append('file', file_data);
       $.ajax({
        type: "POST",
        url:  "http://localhost/myproject/home/uploadFile",
         dataType: 'text', // what to expect back from the server
          cache: false,
          contentType: false,
          processData: false,
         data: form_data,
        
        success: function(response) {
        	  $('#msg').html(response);
        	   window.location.href='http://localhost/myproject/test';
        	       },
         error: function() {
             $('#msg').html(response);
        }
      });
});	
});
</script>
<body>
<div class="container">
<!-- <div class="project"><font color="#291B4F">MY Project</font></div> -->
<div class="text"> <b> <font color="#FCD42B">To upload CSV file to database click below button</font></b></div>
<div class="button">	
 <input id="file" type="file" name="file">  </input>
   </div>
 <div class="button">	
   <button id="upload" type="button"><b>Upload</b></button>
   </div>  
    <p id="msg"></p>
</div>
</body>
</html>
