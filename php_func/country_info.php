<?php
require "connection.php"; 
// Finding Max Values
$wifi_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(WiFi) as maxwifi FROM offers"));
$cost_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(cost) as maxcost FROM offers"));
$cost_min_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MIN(cost) as mincost FROM offers"));
$fun_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(fun) as maxfun FROM offers"));
$safety_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(safet) as maxsafety FROM offers"));
$degree_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(degree) as maxdegree FROM offers"));
$pressure_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(Pressure) as maxpressure FROM offers"));
$humidity_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(Humidity) as maxhumidity FROM offers"));
$wind_speed_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(Wind_speed) as maxwindspeed FROM offers"));
// Adding values to parametr
$wifi_max =  $wifi_max_assoc['maxwifi'];
$cost_max =  $cost_max_assoc['maxcost'];
$cost_min =  $cost_min_assoc['mincost'];
$fun_max =  $fun_max_assoc['maxfun'];
$safety_max =  $safety_max_assoc['maxsafety'];
$degree_max =  $degree_max_assoc['maxdegree'];
$pressure_max =  $pressure_max_assoc['maxpressure'];
$humidity_max =  $humidity_max_assoc['maxhumidity'];
$wind_speed_max =  $wind_speed_max_assoc['maxwindspeed'];
$avarage_cost = round(($cost_max + $cost_min)/2 , 0);
// Calculating the %
$percent_wifi = ($wifi / $wifi_max) * 100;
$percent_cost = Round(($cost / ($cost_max * $currency_value_US / $currency_value)) * 100 , 0);
$percent_fun = Round(($fun / $fun_max) * 100 , 0);
$percent_safety = Round(($safe / $safety_max) * 100 , 0);
$percent_degree = Round(($degree / ($degree_max * $degree_value + $degree_value_add)) * 100 , 0);
$percent_pressure = Round(($pressure / $pressure_max) * 100 , 0);
$percent_humidity = Round(($humidity / $humidity_max) * 100 , 0);
$percent_wind_speed = Round(($wind_speed / $wind_speed_max) * 100 , 0);
$the_array_of_qualities = array($wifi,$cost,$fun,$safe,$degree,$pressure,$humidity,$wind_speed);

$the_array_of_percent = array($percent_wifi, $percent_cost,$percent_fun,$percent_safety,$percent_degree,$percent_pressure,$percent_humidity,$percent_wind_speed);

$qualities_names = array('Wifi Level','Cost for month','Fun Level','Safe Level','Temperature (now)','Pressure (now)','Humidity (now)','Wind speed (now)');

$units = array('Mps',$cost_name,' / 10 points',' / 10 points',
$degree_name, 'mil.of.mer','/ 100 %', 'm / s');

$images_href = array('../icons/internet.svg','../icons/money.svg','../icons/happy-hour.svg','../icons/safety.svg','../icons/internet.svg','../icons/internet.svg','../icons/internet.svg','../icons/internet.svg','../icons/internet.svg');
//count array 
$count_array = count($the_array_of_percent);

?>