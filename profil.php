
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
    $template->def = 'default.pdf';
}

echo $template;
