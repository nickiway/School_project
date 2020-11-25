<?php
include "../php_func/connection.php";   
$url = 'http://api.openweathermap.org/data/2.5/weather';
$get_all_countries = mysqli_query($connect,"SELECT city FROM offers");
while($row = mysqli_fetch_assoc($get_all_countries)){
$option = array(
    'q' => $row['city'],
    'appid' => 'f8f8ac46129be9f668c8526b7dec860d',
    'units' => 'metric',
    'lang' => 'en',
);
$ch = curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_URL,$url.'?'.http_build_query($option));
$responce = curl_exec($ch);
curl_close($ch);
$data  = json_decode($responce, true);
$temperature = $data['main']['temp'];
$feels_like = $data['main']['feels_like'];
$preassure = $data['main']['pressure'];
$humidity = $data['main']['humidity'];
$wind_speed = $data['wind']['speed'];
$wind_degree = $data['wind']['deg'];
$update_data_temperature= "UPDATE offers SET degree = $temperature, Feels_like = $feels_like,Pressure = $preassure,Humidity= $humidity,Wind_speed = $wind_speed, Wind_degree= $wind_degree  WHERE city = '$row[city]'";
mysqli_query($connect, $update_data_temperature);
header('Location:../index.php');
}
