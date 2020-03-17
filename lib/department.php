<?php

class Department {
private $db;
private $test;
public $match;
public function __construct(){
    $this->db = new Database();
}
public function sendMessage($data){
   $table = $data['table'];
   $this->db->query("INSERT into $table  (user_id,job_id)VALUES(:user_id,:job_id)"); 
   $this->db->bind(':user_id',$data['id']);
   $this->db->bind(':job_id',$data['job-id']);
   if($this->db->execute()){
       return true;
   }else{
       return false;
   }
}
public function check($id,$job_id,$table){
    $this->db->query("SELECT * FROM $table WHERE user_id = :user_id AND job_id = :job_id");
    $this->db->bind(':user_id',$id);
    $this->db->bind('job_id',$job_id);
    if($this->db->single()->id > 0){
           return false;
    }else{
        return true;
    }
}
public function GetAllMatches(){
    $this->db->query("SELECT * from students_messages INNER JOIN employers_messages ON students_messages.user_id = employers_messages.user_id and students_messages.job_id = employers_messages.job_id");
    $result = $this->db->resultSet();
    return $result;
}
public function getDataAboutMatches($user_id,$job_id){
    $this->db->query("SELECT jobs.user_id,jobs.contact_email,jobs.job_title,jobs.company,users.name,users.email,users.id FROM jobs INNER JOIN users ON users.id = $user_id WHERE jobs.id = $job_id");
    $result = $this->db->resultSet();
    return $this->match = $result;
}
public function replayMessage($arr){
    $user_id = $arr['user_id'];
    $jobMsg =$arr['txtJob'];
    $id = $arr['id'];
    $studentMsg =$arr['txtStudent'];
    $this->db->query("INSERT INTO messages_from_department_to_employers (user_id,messages)values(:user_id,:messages)");
   $this->db->bind(':user_id',$user_id);
   $this->db->bind(':messages', $jobMsg);
   if($this->db->execute()){
    $this->db->query("INSERT INTO messages_from_department_to_student (user_id,messages)values(:user_id,:messages)");
    $this->db->bind(':user_id',$id);
    $this->db->bind(':messages',$studentMsg);
    if($this->db->execute()){
        return 'Your messages as been send successfully'; 
    }

   }else{
    return 'somthing warng';
   };
 
 
}
public function selectCount($id){
   
      $sql = "SELECT count(messages) from messages_from_department_to_student WHERE user_id = $id"; 
      $result = $this->db->dbh->prepare($sql); 
      $result->execute(); 
      $number_of_rows = $result->fetchColumn(); 
      return $number_of_rows;
}
public function selectCountEm($id){
   
    $sql = "SELECT count(messages) from messages_from_department_to_employers WHERE user_id = $id"; 
    $result = $this->db->dbh->prepare($sql); 
    $result->execute(); 
    $number_of_rows = $result->fetchColumn(); 
    return $number_of_rows;
}
public function getMessage($id,$table){
    $this->db->query("SELECT * from $table WHERE user_id = :id");
    $this->db->bind(':id',$id);
    if($result = $this->db->resultSet()){
        return $result;
    }else{
        return 'somthing warng';
    }   
}
}









?>