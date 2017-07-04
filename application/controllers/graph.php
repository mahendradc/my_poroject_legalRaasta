<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    exit('No direct script access allowed');
    
}
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends CI_Controller {

	
	public function index()
	{
	 $id= $this->input->post('id');
		$this->load->database();
		$this->load->model('getStudentInfo');
		$result=$this->getStudentInfo->getStudentsubMarks($id);
		 $maxMarks= $this->getStudentInfo->getSubjectMaxMarks();
		 for($i=0;$i<count($maxMarks);$i++){
              if($maxMarks[$i]->subjectName=="Physics"){
              	$subMaxMarks=$maxMarks[$i]->maxMarks;
              	 $temp = $result['Physics'];
              	  $result['Physics'] =($temp/$subMaxMarks)*100;

              }else if($maxMarks[$i]->subjectName=="Chemistry"){
                  $subMaxMarks=$maxMarks[$i]->maxMarks;
              	 $temp = $result['Chemistry'];
              	  $result['Chemistry'] =($temp/$subMaxMarks)*100;
              }else if($maxMarks[$i]->subjectName=="Maths"){
                  $subMaxMarks=$maxMarks[$i]->maxMarks;
              	 $temp = $result['Maths'];
              	  $result['Maths'] =($temp/$subMaxMarks)*100;
              }else if($maxMarks[$i]->subjectName=="Bio"){
                     $subMaxMarks=$maxMarks[$i]->maxMarks;
              	 $temp = $result['Bio'];
              	  $result['Bio'] =($temp/$subMaxMarks)*100;
              }else if($maxMarks[$i]->subjectName=="SST"){
                   $subMaxMarks=$maxMarks[$i]->maxMarks;
              	 $temp = $result['SST'];
              	  $result['SST'] =($temp/$subMaxMarks)*100;
              }
		 }
		 $output['percentage']= $result;

		$response=$this->load->view('forGraph',$output, TRUE);
		echo $response;
		
	}
}