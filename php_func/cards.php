<?php
require "php_func/connection.php"; 
require "php_func/sorting.php";
require "php_func/currency.php";
$get_elem = mysqli_query($connect ,"SELECT * FROM offers WHERE country LIKE '%$get_search%' OR city LIKE '%$get_search%' ORDER BY $sorting LIMIT 10"); 
foreach ($offers as $offer):
$pressure = $offer['Pressure'];
$humidity = $offer['Humidity'];
$wind_degree = $offer['Wind_degree'];
$wind_speed = $offer['Wind_speed'];
$region = $offer['Region'];  $link = $offer['link'];
$wifi = $offer['WiFi'];$image = $offer['image'];
$degree = round($offer['degree'] * $degree_value + $degree_value_add ,1);
$degree_db = $offer['degree'];
$fun = $offer['fun'];
$safe = $offer['safet'];
$cost = round($offer['cost'] * $currency_value_US / $currency_value);
$id = $offer['ID_offer'];$country = $offer['country'];
$city = $offer['city'];$basic_cost = $offer['cost'];
require "php_func/country_info.php";  
// Front charts colors
$color_cost;
$color_wifi;
$color_fun;
$color_safety;
// Graphics
//Cost Color
if($percent_cost >= 50){$color_cost="green";}
else if($percent_cost < 50 && $percent_cost >= 30){$color_cost ="orange";}
else{$color_cost="red";}  
echo"<div class = 'offers__card' style = 'background-image:url($image)'>"; 
echo "<div class = 'offers__dark__elem'>";

echo "<div class = 'offers__info__block'>
<div class= 'exit-more'>✖</div>";
    echo "
    <div class = 'offers__parent__image' style = 'background-image:url($image)'>
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
 <a class = 'tabs__link' href = '#first/$link'><div id =  '1' class='tabs__items'>Scrores</div></a>
 <a class = 'tabs__link' href = '#second/$link'><div id = '2'class='tabs__items'>Cost Of Living</div></a>
 <a class = 'tabs__link' href = '#third/$link'><div id = '3' class='tabs__items'>Pros And Cons</div></a>
 <a class = 'tabs__link' href = '#fourth/$link'><div id = '4' class='tabs__items'>Paradise Guide</div></a>
 <a class = 'tabs__link' href = '#fifth/$link'><div id = '5' class='tabs__items'>Local Introduction</div></a>
</div>
<div class = 'tabsContent'>
 <div id = 'first/$link'  class='tabContent'>
    <div class =  'graphs__container'>
        <div class =  'graphs__element'>";
        for ($i=0; $i <$count_array/2 ; $i++) { 
            if($the_array_of_percent[$i] >= 50){$charts_color="green";}
            else if($the_array_of_percent[$i] >= 30 && $the_array_of_percent[$i] < 50){
            $charts_color ="#ff9933";}
            else {$charts_color = "red";}
            echo"<div class = 'offers__graphics__more'>
            <div class='offers__graphics-resized'>
                <div class='short-info-charts'>
                    <img src = '$images_href[$i]'>
                    <div class = 'offers__signs-more'>$qualities_names[$i]</div>
                </div>
                
                <div class = 'offers__graphics-body'>
                    <div class ='offers__element-more' style = 'background-color:$charts_color;width:$the_array_of_percent[$i]";echo"%''>
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
            if($the_array_of_percent[$i] > 50){$charts_color="green";}
            else if($the_array_of_percent[$i] > 30 && $the_array_of_percent[$i] < 50){
            $charts_color ="#ff9933";}
            else {$charts_color = "red";}
            echo"<div class = 'offers__graphics__more'>
            <div class='offers__graphics-resized'>
                <div class='short-info-charts'>
                    <img src = '$images_href[$i]'>
                    <div class = 'offers__signs-more'>$qualities_names[$i]</div>
                </div>
                
                <div class = 'offers__graphics-body'>
                    <div class ='offers__element-more' style = 'background-color:$charts_color;width:$the_array_of_percent[$i]";echo"%''>
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
<div class = 'offers__graphics offers__graphics__first'><img src = 'icons/money.svg'><div class = 'offers__signs'>Cost</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element' style = 'background-color:$color_cost;width:$percent_cost";echo"%''></div></div></div>
<div class = 'offers__graphics'><img src = 'icons/internet.svg'><div class = 'offers__signs'>WiFi</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:$color_wifi;width:$percent_wifi";echo"%''></div></div></div>
<div class = 'offers__graphics'><img src = 'icons/happy-hour.svg'><div class = 'offers__signs'>Fun</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:$color_fun;width:$percent_fun";echo"%''></div></div></div>
<div class = 'offers__graphics'><img src = 'icons/safety.svg'><div class = 'offers__signs'>Safety</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:$color_safety;width:$percent_safety";echo"%''></div></div></div>
</a>
<div class = 'offers__close'>✖</div>
<img style  = 'position:absolute; bottom:10px; right:10px;width:30px; fill:red;' src = 'icons/heart.svg'>
</div>
</div>";
?>
<?php endforeach;?>