
<?php 

include_once 'config/init.php';
session_start();
?>
<?php


$template = new Template('templates/profil-user.php');
if(isset($_GET['id'])){
    $id =  $_GET['id'];
    $profil = new Profil('foo');
    $user = new User($id);
    $job = new Job();

    $template->myProfil = $profil->getProfil($id);
    $template->user = $user->getUser();
    $template->categories = $job->getCategories();
   if($profil->getProfil($id) != null){
    $present = $profil->getOnlyProfil($id);
    $presentN = (array)$present;
    $arr = [];
     foreach($presentN as $key => $value){
         if($value != null){
        $arr[$key] = $value; 
         }     
    }
    $template->present = json_encode($arr);
    // $x = [];
    // for($i = 2; $i < 10; $i++){
    //     if($arr[$i] != null){
    //         array_push($x,$arr[$i]);
    //     }
    // }
    // print_r($x);die();
    // $all = count($x) * 14.285;
    // $pre = $profil->insertPresent($all,$id);
    // $template->present = $pre;
    // $template->notNull =$profil->getallNoNull($id);
   }

}

echo $template;
