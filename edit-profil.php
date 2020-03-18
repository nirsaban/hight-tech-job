<?php 
//include the system that load the classes
include_once 'config/init.php';
?>
<?php

$post = json_decode(file_get_contents('php://input'));
if(isset($post)){
    $profil = new Profil('foo');
    $id = (int)$post->id;
    $value =  $post->value;
    $item = $post->item;
    $insertItem = $profil->insertItem($item,$id,$value);
    if($insertItem){
        echo 'your cateory Updated successfully';
    }else{
        echo 'echo somthing warng';
    }
}
if(isset($_POST)){
    $profil = new Profil('foo');
    $id = $_POST['id'];
    $id = (int)$_POST['id'];
  if(!empty($_FILES['image'])){
    $value =   $_FILES['image']['name'];
    $item ='image';
  }else{
    $value =   $_FILES['cv']['name'];
    $item ='cv';
  }
    
    // echo $item.' '.$id.' '.$value;die();
    $insertItem = $profil->insertItem($item,$id,$value);
    if($insertItem){
     redirect("profil.php?id=$id");
    }else{
    redirect("index.php");
    }
}
