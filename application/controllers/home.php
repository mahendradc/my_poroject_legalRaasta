<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['title']='Home';
		$this->load->database();
		$this->load->view('template/header',$data);
		$this->load->view('home');
		$this->load->view('template/footer');
	}
	
	public function uploadFile(){
		$this->load->database();
		$this->load->model('getStudentInfo');
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = FALSE;
        $config['max_size'] = '1024'; //1 MB

        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
								    //   $file = $_FILES['file']['name']; 
                                 
                                 //      include('C:/xampp/htdocs/myproject/uploads/grid.csv');            	
								     $row = 1;
								     $temp=0;

								     $firstLine=TRUE;
								if (($handle = fopen('C:/xampp/htdocs/myproject/uploads/grid.csv', "r")) !== FALSE) {
								    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                        $num=count($data);
								       if($data[ $num-1]!="")
								       {
								       	if($firstLine){
								       	for($i=0;$i< $num;$i++){
								             if($data[$i]=="" && $firstLine==TRUE){

								             }else if($data[$i]!="" && $firstLine==TRUE){
								                $temp=$i;
								             	$firstLine=FALSE;
								             	 
								             //	$newArray[1]=(int)$newArray[1];
								             	//$this->getStudentInfo->insertDatabaseTable2($newArray);
								             }else{
								             	$newArray=array();
								             	$newArray=explode("~", $data[$i]);
								             	 	$newArray[1]=(int)$newArray[1];
								             	$this->getStudentInfo->insertDatabaseTable2($newArray);
								             }
								            
								         }
								        }else {
								        	   $j=0;
								        	   $newArr=array();
                                              for($i=$temp;$i< $num;$i++) 
                                                {
                                                    $newArr[$j]=$data[$i];
                                                    $j++;
                                                }
                                            $this->getStudentInfo->insertDatabase($newArr);
								        }
								       }
								       $row++;
								       
								    }
								    fclose($handle);
								     echo 'File successfully uploaded'; 
								}
    //loop through the csv file and insert into database 
                      
                        echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
                     
                    }
           }
        } 
	     } else {
            echo 'Please choose a file';
        }
	}

	
	
}
