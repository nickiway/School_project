<?php
require "php_func/connection.php"; 
require "php_func/sorting.php";
require "php_func/currency.php";
$get_search = $_GET['search'];
$get_elem = mysqli_query($connect ,"SELECT * FROM offers WHERE country LIKE '%$get_search%' OR city LIKE '%$get_search%' ORDER BY $sorting LIMIT 10"); 
foreach ($offers as $offer):
$pressure = $offer['Pressure'];
$humidity = $offer['Humidity'];
$wind_degree = $offer['Wind_degree'];
$wind_speed = $offer['Wind_speed'];
$region = $offer['Region'];  $link = $offer['link'];
$wifi = $offer['WiFi'];$image = $offer['image'];
$degree = $offer['degree'] * $degree_value + $degree_value_add;
$fun = $offer['fun'];
$safe = $offer['safet'];
$cost = round($offer['cost'] * $currency_value_US / $currency_value);
$id = $offer['ID_offer'];$country = $offer['country'];
$city = $offer['city'];$basic_cost = $offer['cost'];
require "php_func/country_info.php";  
$width_cost_mno = 100 * $offer['cost'];
$width_cost = $width_cost_mno  / $max['maxcost'];      
$width_wifi_mno = 100 * $offer['WiFi'];
$width_wifi = $width_wifi_mno  / $max_cost['maxwifi'];      
$width_fun_mno = 100 * $offer['fun'];
$width_fun = $width_fun_mno  / $max_fun['maxfun'];      
$width_safe_mno = 100 * $offer['safet'];
$width_safe = $width_safe_mno  / $max_safe['maxsafe'];
//arrays
$the_array_of_qualities = array($wifi,$cost,$fun,$safe,$degree,$pressure,$humidity,$wind_speed);

$the_array_of_percent = array($percent_wifi, $percent_cost,$percent_fun,$percent_safety,$percent_degree,$percent_pressure,$percent_humidity,$percent_wind_speed);

$qualities_names = array('Wifi Level','Cost for month','Fun Level','Safe Level','Temperature (now)','Pressure (now)','Humidity (now)','Wind speed (now)');

$units = array('Mps',$cost_name,' / 10 points',' / 10 points',
$degree_name, 'mil.of.mer','/ 100 %', 'm / s');

$images_href = array('../icons/internet.svg','../icons/money.svg','../icons/happy-hour.svg','../icons/safety.svg','../icons/internet.svg','../icons/internet.svg','../icons/internet.svg','../icons/internet.svg','../icons/internet.svg');
//count array 
$count_array = count($the_array_of_percent);
//    Цвета для  граффиков
$color_cost;$color_wifi;
$color_fun;$color_safety;
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
echo"<div class = 'offers__card' style = 'background-image:url($image)'>"; 
echo "<div class = 'offers__dark__elem'>";

echo "<div class = 'offers__info__block'>
<div class= 'exit-more'>✖</div>";
echo "<div class = 'offers__parent__image' style = 'background-image:url($image)'>
<div class= 'exit-more-phone'>✖</div>
<div class ='video__dark'></div>
<div class  =  'name-center__row'>
<div class = 'name-center__element'>$city</div>
<div class = 'name-center__element' >$country</div>
<div class = 'center-travel_button'><button class = 'travel-button'>Travel to $city</button></div>
</div>
</div>";
echo "
<div class = 'tabs'>
 <a class = 'be-up' href = '#first/$link'><div id =  '1' class='tabs__items'>Scrores</div></a>
 <a class = 'be-up' href = '#second/$link'><div id = '2'class='tabs__items'>Cost Of Living</div></a>
 <a class = 'be-up' href = '#third/$link'><div id = '3' class='tabs__items'>Pros And Cons</div></a>
 <a class = 'be-up' href = '#fourth/$link'><div id = '4' class='tabs__items'>Paradise Guide</div></a>
 <a class = 'be-up' href = '#fifth/$link'><div id = '5' class='tabs__items'>Local Introduction</div></a>
</div>
<div class = 'tabsContent'>
 <div id = 'first/$link'  class='tabContent'>
    <div class =  'graphs__container'>
        <div class =  'graphs__element'>";
        for ($i=0; $i <$count_array/2 ; $i++) { 
            echo"<div class = 'offers__graphics__more'>
            <div class='offers__graphics-resized'>
                <div class='short-info-charts'>
                    <img src = '$images_href[$i]'>
                    <div class = 'offers__signs-more'>$qualities_names[$i]</div>
                </div>
                
                <div class = 'offers__graphics-body'>
                    <div class ='offers__element-more' style = 'background-color:$color_cost;width:$the_array_of_percent[$i]";echo"%''>
                    <span>
                    $the_array_of_qualities[$i] $units[$i]</span>
                    </div>
                </div>
            </div>
        </div>";
        }
        echo"</div>

        <div class =  'graphs__element'>";
        for ($i=$count_array/2 ; $i <$count_array ; $i++) { 
            echo"<div class = 'offers__graphics__more'>
            <div class='offers__graphics-resized'>
                <div class='short-info-charts'>
                    <img src = '$images_href[$i]'>
                    <div class = 'offers__signs-more'>$qualities_names[$i]</div>
                </div>
                
                <div class = 'offers__graphics-body'>
                    <div class ='offers__element-more' style = 'background-color:$color_cost;width:$the_array_of_percent[$i]";echo"%''>
                    <span>
                    $the_array_of_qualities[$i] $units[$i]</span>
                    </div>
                </div>
            </div>
        </div>";
        }
                            
    echo"
        </div>
    </div>
 </div>
 <div id = 'second/$link' class='tabContent'>adasdadasdasdasda</div>
 <div id = 'third/$link'class='tabContent'>ddasdadasda</div>
 <div id = 'fourth/$link'class='tabContent'>dsadasdadada</div>
 <div id = 'fifth/$link'class='tabContent'>ddasdadadadasd</div>
</div>
</div>
</div>
<div class = 'offers__on__hover'>
<div class ='offers__reg'>$region</div>
<div class ='offers__wifi'>$wifi Mbps</div>
<div class = 'offers__deg'><img src = 'icons/temperature.png'>$degree $degree_name</div>
<div class = 'offers__cost'>$cost $cost_name / mo</div>
<div class = 'offers__country'>$country</div>
<div class = 'offers__city'>$city</div>
</div>
<a class = 'be-up' href = '#first/$link'><div class = 'offers__dark'>
<div class = 'offers__graphics offers__graphics__first'><img src = 'icons/money.svg'><div class = 'offers__signs'>Cost</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element' style = 'background-color:$color_cost;width:$width_cost";echo"%''></div></div></div>
<div class = 'offers__graphics'><img src = 'icons/internet.svg'><div class = 'offers__signs'>WiFi</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:$color_wifi;width:$width_wifi";echo"%''></div></div></div>
<div class = 'offers__graphics'><img src = 'icons/happy-hour.svg'><div class = 'offers__signs'>Fun</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:$color_fun;width:$width_fun";echo"%''></div></div></div>
<div class = 'offers__graphics'><img src = 'icons/safety.svg'><div class = 'offers__signs'>Safety</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:$color_safety;width:$width_safe";echo"%''></div></div></div>
</a>
<div class = 'offers__close'>✖</div>
<img style  = 'position:absolute; bottom:10px; right:10px;width:30px; fill:red;' src = 'icons/heart.svg'>
</div>
</div>";
?>
<?php endforeach;?>