
<?php 
//include the system that load the classes
include_once 'config/init.php';
?>
<?php
$job = new Job();
if(isset($_GET['del_id'])){
if($job->delete($_GET['del_id'])){
    redirect('index.php','job deleted','success');
}else{
    redirect('index.php','job No deleted','error');
}
}
$template = new Template('templates/job-single.php');
$job_id = isset($_GET['id']) ? $_GET['id']:null;
$template->job = $job->getJob($job_id);
echo $template;

?>