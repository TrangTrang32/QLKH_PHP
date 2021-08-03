<?php 
session_start();

unset($_SESSION['cus_login']);

header('location: index.php');
?>