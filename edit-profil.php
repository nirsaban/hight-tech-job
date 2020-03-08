<?php 
//include the system that load the classes
include_once 'config/init.php';
?>
<?php
$profil = new Profil('foo');
$template = new Template('templates/profil-edit.php');
if(isset($_GET['id'])){
    $template->myProfil = $profil->getProfil($_GET['id']);
    $user = new User($_GET['id']);
    $template->user = $user->getUser();
    $job = new Job();
    $template->categories = $job->getCategories();
}
if(isset($_POST['submit'])){

    // $template->check = $_POST
   $profil = new Profil($_POST);
   
    if($profil->editProfil()){
    redirect("profil.php?id=.$user->id.");
    }
}
if(isset($_POST['edit'])){
 
    $profil = new Profil($_POST);

    if($profil->updateProfil()){
    redirect("profil.php?id=.$user->id.");
    }
}
echo $template;