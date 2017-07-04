<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    exit('No direct script access allowed');
    
}
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectGraph extends CI_Controller {

	
	public function index()
	{
	 $id= $this->input->post('id');
		$this->load->database();
		$this->load->model('getStudentInfo');
		$result=$this->getStudentInfo->getAllStudentMarks();
		 $maxMarks= $this->getStudentInfo->getSubjectName($id);
     $output['subjectName']=$maxMarks['subjectName'];
     $newArray = array();
		 for($i=0;$i<count($result);$i++){
      $newArray[$i]['name']=$result[$i]->name;
              $temp=$result[$i]->$maxMarks['subjectName'];
              $newArray[$i]['subNumber']= ($temp/$maxMarks['maxMarks'])*100;
		 }
		 $output['percentage']= $newArray;
   // print_r($output);exit();
		$response=$this->load->view('subjectGraph',$output, TRUE);
		echo $response;
		
	}
}