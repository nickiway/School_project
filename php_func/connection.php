<?php
error_reporting(0);
session_start();
define("The_news_Directory", "News_Images/");
define("ICONDIR", "icons/");
define("ORDERDIR",'Orders_images');
define("SERVER",'localhost');
define("LOGIN",'mysql');
define("PASSWORD",'mysql');
define("DATABASE",'paradise_tour');
$connect=mysqli_connect(SERVER,LOGIN,PASSWORD,DATABASE);