<?php 
//include the system that load the classes
include_once 'config/init.php';
session_start();
?>
<?php

$template = new Template('templates/login-user.php');
$template->errors = [];
if(isset($_POST['submit'])){
    $loginUser = $_POST;
    $user = new User($loginUser);
    if($user->login()){
        $_SESSION['name'] = $user->row->name;
        $_SESSION['id'] = $user->row->id;
        $_SESSION['role'] = $user->row->role;
        $_SESSION['email'] = $user->row->email;
        redirect('index.php','Your login successfully','success');
      }else{
        $template->errors =  $user->errors;
      }; 
}


echo $template;
