<?php
define("LINK",'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
$data = file_get_contents(LINK);
$courses =json_decode ($data, true);
$currency = $_GET["curr"];
$standart = $courses['USD']['buy'];
foreach ($courses as $course_EUR) {
    if ($course_EUR['ccy'] == 'EUR') {
        $currency_value_EUR =$course_EUR['buy'];
        break;
    }
}
foreach ($courses as $course) {
    if ($course['ccy'] == $currency) {
        $currency_value =$course['buy'];
        break;
    }
}
foreach ($courses as $course_US) {
    if ($course_US['ccy'] == 'USD') {
        $currency_value_US =$course_US['buy'];
        break;
    }
}
$eurPercent = round(($currency_value_US / $currency_value_EUR),2);
$gryvnaPercennt =round($currency_value_US,2);
switch($currency){
    case 'USD';
    $currname = 'USD';
    $cost_name =  "$";
    break;
    
    case 'EUR';
    $currname = 'EUR';
    $cost_name =  "€";
    break;

    case 'UAH';
    $currname = 'UAH';
    $cost_name =  "₴";
    $currency_value = 1;
    break;
  
    default:
    $currname = 'USD';
    $cost_name =  "$";
    $currency_value = $currency_value_US;
    break;

}
$degrees = $_GET["degree"];
switch($degrees){
    case'cels';
    $degree_value = 1;
    $degree_value_add =  0;
    $degree_name  = '°C';
    $degree_ab = 'cels';
    break;

    case'forn';
    $degree_value = (9/5);
    $degree_name  = '°F';
    $degree_value_add =  32;
    $degree_ab = 'forn';
    break;

    default:
    $degree_value = 1;
    $degree_value_add =  0;
    $degree_name  = '°C';
    $degree_ab = 'cels';
}

?> 