<?php
session_start();
require_once 'config.php';
require_once 'helpers/system_helpers.php'; 
//create function that load automatic class and reaquire the file that contain the class;
spl_autoload_register(function ($class) {
    include 'lib/' . $class . '.php';
});