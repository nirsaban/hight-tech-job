<?php 
include_once 'config/init.php';?>
<?php

    $hackerU = new Department();
    $test = file_get_contents("php://input");
    $arr = json_decode($test);
    $msg =json_decode($test);
    $array['txtJob'] = $msg->txtJob;
    $array['txtStudent'] = $msg->txtStudent;
    $array['user_id'] = (int)$msg->user_id;
    $array['id'] = (int)$msg->id;
    $finito =  $hackerU->replayMessage($array);
    echo $finito;
    $template = new Template('templates/frontpage.php');
   

// echo $template;










?>
