
<?php 
session_start();
include_once 'config/init.php';
$hackerU = new Department();
$job = new Job();
$template = new Template('templates/test.php');
$template->bool= 'test';
if(isset($_GET['id']) && isset($_GET['job_id'])){
    $data['id'] = $_GET['id'];
    $data['job-id'] = $_GET['job_id'];
    if($hackerU->sendMessage($data)){
       $template->bool = $_GET['id'];
            return true;
        //  $id =  $data['job-id'];
        // $cat_id = $job->getCatIdByJobId($id)->category_id;
        // redirect("students.php?cat_id=$cat_id&job_id=$id",'this student add in successfully','success');
    }

}














?>