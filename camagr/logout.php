<?php
session_start(); 
unset($_SESSION['uid']); 
unset($_SESSION['uname']); 
session_unset(); 
session_destroy();

$url='login.php';
header("Location: $url"); // Page redirecting to login.php 
 
?>