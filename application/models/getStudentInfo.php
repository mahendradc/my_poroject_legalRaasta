<?php
class GetStudentInfo extends CI_Model {
	function __construct() {
      parent::__construct();
    }

  public function getStudentList(){
  
     $answer= $this->db->query('SELECT studentId,name FROM studentnamemarks WHERE 1');
     return $answer->result();
  }

  public function getAllStudentMarks(){
   $answer= $this->db->query('SELECT * FROM studentnamemarks WHERE 1');
     return $answer->result();
  }

  public function getSubjectMaxMarks(){
    $answer= $this->db->query('SELECT subjectId, subjectName,maxMarks FROM subjectmaxmarks WHERE 1');
     return $answer->result();
  }
   public function getStudentsubMarks($id){
      $answer= $this->db->query('SELECT * FROM studentnamemarks WHERE studentId='.$id);
     return $answer->row_array();
   }
   public function getSubjectName($id){
    $answer= $this->db->query('SELECT subjectId, subjectName,maxMarks FROM subjectmaxmarks WHERE subjectId='.$id);
     return $answer->row_array();
  }

  public function insertDatabase($data){
    // $query="INSERT name, Physics,Maths,Chemistry,Bio,SST Values('".$data[0]."',".$data[1].",".$data[2].",".$data[3].",".$data[4].",".$data[5].")";
    // print_r($query);exit();
      $answer= $this->db->query("INSERT INTO studentnamemarks( name, Physics,Maths,Chemistry,Bio,SST) Values('".$data[0]."',".$data[1].",".$data[2].",".$data[3].",".$data[4].",".$data[5].")");
  }
  
  public function insertDatabaseTable2($data){
  
      $answer= $this->db->query("INSERT INTO subjectmaxmarks( subjectName, maxMarks) Values('".$data[0]."',".$data[1].")");
  }
}