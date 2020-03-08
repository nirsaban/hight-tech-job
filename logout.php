<?php
include_once 'config/init.php';
session_start();
session_destroy();
redirect('index.php','see you later','success');





?>