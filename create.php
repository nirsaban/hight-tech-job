
<?php 
//include the system that load the classes
include_once 'config/init.php';
?>
<?php
$job = new Job();
$template = new Template('templates/job-create.php');
if(isset($_POST['submit'])){
    $newJob = $_POST;
    if($job->createNewJob($newJob)){
        redirect('index.php','Your job as been listed','success');
    }else{
        redirect('index.php','Somthing warng','error');
    }
}
$template->categories = $job->getCategories();
echo $template;
