<?php 
//include the system that load the classes
include_once 'config/init.php';
?>
<?php
$job = new Job();
$job_id = isset($_GET['id']) ? $_GET['id'] : null;
$template = new Template('templates/job-edit.php');
if(isset($_POST['submit'])){
    $editJob = $_POST;
    $id = $_POST['id'];
    if($job->update($job_id,$editJob)){
        redirect("job.php?id=$id",'Your job as been updated','success');
    }else{
        redirect('index.php','Somthing warng','error');
    }
}

$template->job = $job->getJob($job_id);
$template->categories = $job->getCategories();
echo $template;