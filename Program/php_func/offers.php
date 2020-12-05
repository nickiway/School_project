<?php
require "country_info.php";
$get_search = $_GET['search'];  
$sql_offer = "SELECT * FROM offers INNER JOIN votes ON (offers.`id_votes`=votes.`id_votes`) WHERE country LIKE '%$get_search%' OR city LIKE '%$get_search%' ORDER BY $sorting LIMIT 4";
$result = mysqli_query($connect, $sql_offer);
$offers = array();
while($row = mysqli_fetch_assoc($result)){
    $offers [] = $row;
    // Присваиваем все значения бд переменным 
    //  link
    $if_votes_1 = $offers['id_votes']['1'];
    $link = $offers['link'];
// Регион Европа Америка и т.д
   $region = $offers['Region'];  
   //    вайфай
      $wifi = $offers['WiFi'];
   //    картинки
      $image = $offers['image'];
   //    Градус
      $degree = $offers['degree'] * $degree_value + $degree_value_add;
   //    Шкала веселья
      $fun = $offers['fun'];
   //    Шкала безопасности
      $safe = $offers['safet'];
   //    Цена
      $cost = round($offers['cost'] * $currency_value_US / $currency_value);
   //   Айди карточек
      $id = $offers['ID_offer'];
   //   Страна
      $country = $offers['country'];
   //   Город
      $city = $offers['city'];

      //
      $width_cost_mno = 100 * $offers['cost'];
      $width_cost = $width_cost_mno  / $max['maxcost'];
   
      $width_wifi_mno = 100 * $offers['WiFi'];
      $width_wifi = $width_wifi_mno  / $max_cost['maxwifi'];
   
      $width_fun_mno = 100 * $offers['fun'];
      $width_fun = $width_fun_mno  / $max_fun['maxfun'];
   
      $width_safe_mno = 100 * $offers['safet'];
      $width_safe = $width_safe_mno  / $max_safe['maxsafe'];
   //    Цвета для  граффиков
      $color_cost;
      $color_wifi;
      $color_fun;
      $color_safety;
      // Graphics
      if($width_cost > 30 && $width_cost < 50)
      {
          $color_cost = "#ff9933";
      }
      elseif($width_cost < 30)
      {
       $color_cost = "red";
      }
      else{
          $color_cost = "green ";
      }
   
      if($width_wifi < 30)
      {
       $color_wifi = "red";
      }
      elseif($width_wifi>30  && $width_wifi < 50)
      {
          $color_wifi = "#ff9933";
      }
      else{
          $color_wifi = "green";
      }
   
      if($width_safe > 30 & $width_safe < 50){
          $color_safety = "#ff9933";
      }
      elseif($width_safe<30)
      {
          $color_safety = "red";
      }
      else{
          $color_safety = "green";
      }
   
      if($width_fun > 30 & $width_fun < 50){
       $color_fun = "#ff9933";
       }
       elseif($width_fun< 30)
       {
           $color_fun = "red";
       }
       else{
           $color_fun = "green";
       }

    }
  