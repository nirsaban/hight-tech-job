<?php 
include_once 'config/init.php';?>
<?php

if(isset($_GET['count'])){
    $hackerU = new Department();
   $countMsg = $hackerU->selectCount($_GET['count']);
   echo (int)$countMsg;

}
if(isset($_GET['countEm'])){
    $hackerU = new Department();
    $countMsg = $hackerU->selectCountEm($_GET['countEm']);
    echo (int)$countMsg;

}
if(isset($_GET['getMsg']) && isset($_GET['from'])){
          $hackerU = new Department();
          $message = $hackerU->getMessage($_GET['getMsg'],$_GET['from']);
          $str = json_encode($message);
          echo $str;
  }