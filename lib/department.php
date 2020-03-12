<?php

class Department{
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
    $this->db->query("SELECT jobs.contact_email,jobs.job_title,jobs.company,users.name,users.email FROM jobs INNER JOIN users ON users.id = $user_id WHERE jobs.id = $job_id");
    $result = $this->db->resultSet();
    return $this->match = $result;
}
}









?>