<?php
include_once 'config/init.php';
session_start();

$hackerU = new Department();
$job = new Job();
$template = new Template('templates/all-students.php');
$user = new User('foo');
 $template->students = $user->getAllStudent();
 if(isset($_GET['cat_id'])){
    $template = new Template('templates/students-byCat.php');
    $template->studentByCat = $user->getStudentByCat($_GET['cat_id']);

}
if(isset($_GET['id']) && isset($_GET['job_id']) && isset($_GET['table'])){
    $data['id'] = $_GET['id'];
    $data['job-id'] = $_GET['job_id'];
    $data['table'] = $_GET['table'];
    if($hackerU->check($_GET['id'],$_GET['job_id'],$_GET['table'])){
        if($hackerU->sendMessage($data)){
            $_SESSION['check'] = $_GET['id'];
        };
    }else{
        $_SESSION['check'] = 'shit';
        };
   
   
}
    // if( && ){
    //         $bool = $_GET['id'];
    //         return true;
    //     //  $id =  $data['job-id'];
    //     // $cat_id = $job->getCatIdByJobId($id)->category_id;
    //     // redirect("students.php?cat_id=$cat_id&job_id=$id",'this student add in successfully','success');
    // }



 echo $template;

 
 
 



 
 
?>