<?php
session_start();
define("SERVER",'localhost');
define("LOGIN",'mysql');
define("PASSWORD",'mysql');
define("DATABASE",'paradise_tour');
$connect=mysqli_connect(SERVER,LOGIN,PASSWORD,DATABASE);
error_reporting(0);