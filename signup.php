<?php 
//include the system that load the classes
include_once 'config/init.php';

?>
<?php

$template = new Template('templates/signup-user.php');
$template->errors = [];
if(isset($_POST['submit'])){
    $newUser = $_POST;
    $user = new User($newUser);
    if($user->validateForm()){
      if($user->createNewUser($newUser)){
        redirect('login.php','Your registred successfully','success');
      }; 
    }else{
      $template->errors =  $user->errors;
    }
}

echo $template;
