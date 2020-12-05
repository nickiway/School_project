<?php
session_start();
$connect=mysqli_connect('localhost', 'mysql','mysql','paradise_tour');
error_reporting(0);
unset($_SESSION['logged_user']);
header('Location: /');
?>