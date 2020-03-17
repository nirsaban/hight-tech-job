
<?php 
//include the system that load the classes
include_once 'config/init.php';
session_start();
?>
<?php

$job = new Job();
$hackerU = new Department();
$template = new Template('templates/frontpage.php');
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if($role == 1){
    $id  =(int)$_SESSION['id'];
    $template->jobs = $job->getAllJobsByUserId($id);
    $template->title = 'Your jobs lister';
}else if($role == 3){
    $id  =(int)$_SESSION['id'];
    $cat_id = $job->getUserCategory($id);
    if($cat_id !=null){
        $template->jobs = $job->getByCategory((int)$cat_id[0]->category_id);
        $template->title = 'Your jobs Category';
        $template->noProf = false;
    }else{
        $template->title = 'Latest jobs';
        $template->noProf = true;
        $template->jobs = $job->getAllJobs();
    }
  
}else if($role == 2){
    $template->title = 'All matches';
    $row = $hackerU->GetAllMatches();
    $arr = [];
    for($i = 0; $i < count($row); $i++){
        $hackerU->getDataAboutMatches($row[$i]->user_id,$row[$i]->job_id);
           $res  =$hackerU->match;
            array_push($arr,$res);
    }
    // $result = json_decode($res);
    $template->matches =  $arr;
    
}
else{
    $template->title = 'Latest jobs';
    $template->jobs = $job->getAllJobs();
}

$category = isset($_GET['category']) ? $_GET['category']:null;
if($category){
$template->jobs = $job->getByCategory($category);
$template->title = $job->getCategory($category)->name;
}

$template->categories = $job->getCategories();
echo $template;

?>