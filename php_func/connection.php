<?php
error_reporting(0);
session_start();
define("SERVER",'localhost');
define("LOGIN",'mysql');
define("PASSWORD",'mysql');
define("DATABASE",'paradise_tour');
$connect=mysqli_connect(SERVER,LOGIN,PASSWORD,DATABASE);