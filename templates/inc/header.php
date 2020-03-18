<?php
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" href="css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}


span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }

    .dark_window{

    position: fixed;
    width:100%;
    height: 100%;
    background-color: rgba(0,0,0,0.8);
    z-index:10000;
    /* text-align: center; */
  
    /* display: flex; */
    align-items: center;
    justify-content: center;
    display: none;
  }
  
  .dark_box{
    
    max-width: 400px;
    width: 100%;
    background-color: white;
    min-height: 100px;
    border:skyblue 2px solid;
  }
  
  .dark_box img{
    width:35%;
    float:left;
    margin-right:8px;
  }
  
    </style>
   
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Joblist</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li> 
      <?php if(isset($_SESSION['name'])):?>
      <li class="nav-item active"> <a class="nav-link" href="logout.php">logout</a></li>
       <?php endif;?>
       <?php if(isset($role) && $role == 1 || $role == 2):?> 
        <li class="nav-item active"><a class="nav-link" href="create.php">Create Listing</a></li>
        <li class="nav-item active"><a class="nav-link" href="students.php?all_students">See all students</a></li>
        <?php endif;?>
       <?php if(!isset($_SESSION['name'])):?>
      <li class="nav-item active"><a class="nav-link" href="login.php">login</a></li>
      <li class="nav-item active"> <a class="nav-link" href="signup.php">signup</a></li>
      <?php endif;?>
      <?php if(isset($role) && $role == 3):?> 
      <li class="nav-item active">

      <li class="nav-item active"> <a class="nav-link" href="profil.php?id=<?= $_SESSION['id']?>">My profil</a></li>
  
      </li>  <?php endif;?>
      <!-- <?php if(isset($role) && $role == 2):?> 
      <li class="nav-item active"> <a class="nav-link" href="index.php?all_jobs">List all Jobs</a></li>
      <?php endif;?> -->
      <?php if(isset($role) && $role == 3):?>
      <li class="nav-item active float-lg-right">
        <a class="nav-link " onclick="getMessage('<?=$_SESSION['id']?>','messages_from_department_to_student')" href="#"><i class="far fa-comments"><input type="hidden" class="countMessages" value="<?=$_SESSION['id']?>"></i><span class="count"></span></a>
      </li> 
      <?php endif; ?>
      <?php if(isset($role) && $role == 1):?>
      <li class="nav-item active float-lg-right">
        <a class="nav-link " onclick="getMessage('<?=$_SESSION['id']?>','messages_from_department_to_employers')" href="#"><i class="far fa-comments"><input type="hidden" class="countMessagesEm" value="<?=$_SESSION['id']?>"></i><span class="countEm"></span></a>
      </li> 
      <?php endif; ?>
      </ul>
    
  </div>
</nav>
<?php if(isset($_SESSION['message'])):?>
<div class="container col-md-5"> 
<?php displayMessage();?>
</div>
<?php endif?>
<div class="dark_window">
    <div class="dark_box" id="dark_box">
      <p id="id_h2_dark">Your messages</p>
      
      <button onclick="close()" id="close_btn_dark" class="btn btn-danger">close</button>
    </div>
  </div>

    
  



