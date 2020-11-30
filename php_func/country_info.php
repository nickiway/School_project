<?php
require "connection.php"; 
// Finding Max Values
$wifi_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(WiFi) as maxwifi FROM offers"));
$cost_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(cost) as maxcost FROM offers"));
$cost_min_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MIN(cost) as mincost FROM offers"));
$fun_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(fun) as maxfun FROM offers"));
$safety_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(safet) as maxsafety FROM offers"));
$degree_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(degree) as maxdegree FROM offers"));
$degree_min_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MIN(degree) as mindegree FROM offers"));
$pressure_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(Pressure) as maxpressure FROM offers"));
$humidity_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(Humidity) as maxhumidity FROM offers"));
$min_percent = 10;
$wind_speed_max_assoc = mysqli_fetch_array(mysqli_query($connect,"SELECT MAX(Wind_speed) as maxwindspeed FROM offers"));
// Adding values to parametr
$wifi_max =  $wifi_max_assoc['maxwifi'];
$cost_max =  $cost_max_assoc['maxcost'];
$cost_min =  $cost_min_assoc['mincost'];
$fun_max =  $fun_max_assoc['maxfun'];
$safety_max =  $safety_max_assoc['maxsafety'];
$degree_max =  $degree_max_assoc['maxdegree'];
$degree_min = $degree_min_assoc['mindegree'];
$pressure_max =  $pressure_max_assoc['maxpressure'];
$humidity_max =  $humidity_max_assoc['maxhumidity'];
$wind_speed_max =  $wind_speed_max_assoc['maxwindspeed'];
$avarage_cost = round(($cost_max + $cost_min)/2 , 0);
// Calculating the %
$percent_wifi = ($wifi / $wifi_max) * 100;
$percent_cost = Round(($cost / ($cost_max * $currency_value_US / $currency_value)) * 100 , 0);
$percent_fun = Round(($fun / $fun_max) * 100 , 0);
$percent_safety = Round(($safe / $safety_max) * 100 , 0);
//Degree count
$deg_conts = $degree_max + abs($degree_min);
$percent_degree = Round((abs($degree_min) + $degree_db) / $deg_conts * 100, 0);
if ($percent_degree < 15) $percent_degree = 15;
$percent_pressure = Round(($pressure / $pressure_max) * 100 , 0);
$percent_humidity = $humidity;
$percent_wind_speed = Round(($wind_speed / $wind_speed_max) * 100 , 0);
//Arrays

//The equals qualities

$the_array_of_qualities = array($cost,$wifi,$fun,$safe,$degree,$pressure,$humidity,$wind_speed);

//The percent charts

$the_array_of_percent = array($percent_cost,$percent_wifi, $percent_fun,$percent_safety,$percent_degree,$percent_pressure,$percent_humidity,$percent_wind_speed);

//The qualities names

$qualities_names = array('Cost for month','Wifi Level','Fun Level','Safe Level','Temperature (now)','Pressure (now)','Humidity (now)','Wind speed (now)');

//The units

$units = array($cost_name,'Mps',' / 10 points',' / 10 points',
$degree_name, 'mil.of.mer','/ 100 %', 'm / s');

//The images links

$images_href = array('../icons/money.svg','../icons/internet.svg','../icons/happy-hour.svg','../icons/safety.svg','../icons/temperature2.png','../icons/barometer.png','../icons/humidity.png','../icons/windsock.png');

//Count array 

$count_array = count($the_array_of_percent);
//Common color

$charts_color;

?>