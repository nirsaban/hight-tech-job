
<?php 
//include the system that load the classes
include_once 'config/init.php';
?>
<?php
$profil = new Profil('foo');

$template = new Template('templates/profil-user.php');

if(isset($_POST['submit'])||isset($_GET['id'])){
    $id = $_POST['user_id'] ?? $_GET['id'];
    $template->myProfil = $profil->getProfil($id);
    $user = new User($id);
    $template->user = $user->getUser();
}

echo $template;