<?php
require "php_func/currency.php";
require "php_func/offers.php";
require "php_func/sorting.php";
require "php_func/connection.php";
require "php_func/mailing.php";
require "php_func/offers.php";
require "php_func/country_info.php";
?>

<script>
var sorting = "<?  echo $sorting; ?>";
$(document).ready(function()
{
    var inprogress = false;
    var num = 4;
    $(window).scroll(function(){
        if($(window).scrollTop()+$(window).height() + 1 >= $(document).height() && !inprogress){
$.ajax({
url:'php_func/offers_on_load.php',
method:'GET',
data:{"num":num,
"sorting":sorting},
beforeSend:function(){
inprogress = true;
}
}).done(function(data){
$('#loadImg').fadeOut("fast");
data = jQuery.parseJSON(data);
if(data.length > 0){
$.each(data, function(index, data){

// Degree
$non_rounded_degree =data.degree * <?echo $degree_value;?> +<?echo $degree_value_add;?>;
//Round Up Function
function roundUp(num, precision) {
  precision = Math.pow(10, precision)
  return Math.ceil(num * precision) / precision
}
//Degree Value
var degree = roundUp($non_rounded_degree, 1);
//Real Cost 
var cost = Math.round(data.cost * <?echo $currency_value_US;?> / <?echo $currency_value;?>) ;
//Width percent
var width_cost = Math.round(100 * data.cost / <?echo $cost_max; ?>);
var cost_color;
// Width Wifi
var width_wifi = Math.round(100 * data.WiFi / <?echo $wifi_max ?>);
var wifi_color;
// Width Fun
var width_fun = Math.round(100 * data.fun / <?echo $fun_max; ?>);
var fun_color;

// Degree Parametrs
var degree_const = <?= $degree_max + abs($degree_min)?>;
var width_degree = Math.round((<?=abs($degree_min)?> + Number(data.degree))/degree_const * 100 ) ;
var degree_color;
if(width_degree < 15) { width_degree == 15;}
// Width Pressure
var width_pressure = Math.round(100 * data.Pressure/ <?=$pressure_max?>);
var pressure_color;
// Width Humidity
var width_humidity = Math.round(data.Humidity);
var humidity_color;
// Width Wind_speed
var width_wind_speed = Math.round(100 * data.Wind_speed/ <?=$wind_speed_max?>);
var wind_speed; 
//Cost units
var cost_units = "<?= $cost_name;?>";
// Degree Units
var degree_units = "<?= $degree_name;?>";   
// Width Safe
var width_safe = Math.round(100 * data.safet / <?echo $safety_max; ?>);
var charts_color;
var safe_color;
// Arrays of charts     
var qualities_names = ['Cost for month','Wifi Level','Fun Level','Safe Level','Temperature (now)','Pressure (now)','Humidity (now)','Wind speed (now)'];
// Percent array
var the_array_of_percent = [width_cost,width_wifi,width_fun,width_safe,width_degree,width_pressure,width_humidity,width_wind_speed];
// Percent Units
var units = [cost_units,'Mps',' / 10 points',' / 10 points',degree_units,'mil.of.mer','/ 100 %', 'm / s'];
// Percent images link
var images_href = ['../icons/money.svg','../icons/internet.svg','../icons/happy-hour.svg','../icons/safety.svg','../icons/temperature2.png','../icons/barometer.png','../icons/humidity.png','../icons/windsock.png'];
// The value of charts
var array_of_qualities = [cost, data.WiFi,data.fun, data.safet,degree ,data.Pressure,data.Humidity,data.Wind_speed];
// Color conditions
// Charts common color 
var charts_color;
// Front charts colors
if(width_fun > 30 & width_fun < 50){
fun_color = "#ff9933";
}
else if(width_fun < 30){
fun_color = "red";
}
else {
fun_color = "green"
}

if(width_safe > 30 & width_safe < 50){
safe_color = "#ff9933";
}
else if(width_safe < 30){
safe_color = "red";
}
else {
safe_color = "green"
}
if(width_cost > 30 & width_cost < 50){
cost_color = "#ff9933";
}
else if(width_cost < 30){
cost_color = "red";
}
else {
cost_color = "green"
}

if(width_wifi > 30 & width_wifi < 50){
wifi_color = "#ff9933";
}
else if(width_wifi < 30){
wifi_color = "red";
}
else {
wifi_color = "green"
}

$(function(){
    var offer = $('.offers__card');
    offer.mouseover(function(){
    $(this).children('.offers__on__hover').hide();
})
offer.mouseout(function(){
$(this).children('.offers__on__hover').show();
})
});
$('.offers__card').click(function() {
$('.offers__info__block').animate({
scrollTop: 0
}, 1);
});
$('.exit-more,.exit-more-phone').click(function(){
var dark = $(".offers__dark__elem"); 
dark.fadeOut("fast");
})

jQuery(function($){
$(document).mouseup(function (e){ 
var dark = $(".offers__dark__elem"); 
var country_popup = $(".offers__info__block"); 
if (!country_popup.is(e.target) 
&& country_popup.has(e.target).length === 0) {
dark.fadeOut("slow");
}
});
});

            $('#offers').append("<div class = 'offers__card' style = 'background-image:url("+ data.image +")' onclick = '$(this).children().show();'>"  + 
                "<div class = 'offers__dark__elem'>"+
                    "<div class = 'offers__info__block'>"+
                        "<div class= 'exit-more'>✖</div>"+
                        "<div class = 'offers__parent__image' style = 'background-image:url("+ data.image +")'><div class= 'exit-more-phone'>✖</div><div class = 'video__dark'></div>"+
                            "<div class  =  'name-center__row'>"+
                                "<div class = 'name-center__element'>"+ data.city +"</div>"+
                                "<div class = 'name-center__element' >"+ data.country +"</div>"+
                                "<div class = 'center-travel_button'><button onclick =\"window.location.href = 'order_tour.php?to="+data.country+"&HotelName=Anywhere&dateFrom=&dateTo=&sendOrder=Find+the+Hotel'\" class = 'travel-button'>Travel to "+ data.country +" </button></div>"+
                            "</div>"+
                        "</div>"+
                        "<div class = 'tabs'>"+
                            " <a class = 'tabs__link' href = '#first/"+ data.link +"'><div id =  '1' class='tabs__items'>Scrores of the city in  graphics</div></a>"+
                        "</div>"+
                        
                        "<div class = 'tabsContent'>"+
                            "<div id = 'first/"+ data.link +"'  class='tabContent'>"+
                                "<div class =  'graphs__container'>"+
                                    "<div id = '1"+data.city+"' class =  'graphs__element'>"+
                                        
                                    "</div>"+
                                    
                                    "<div  id = '2"+data.city+"' class =  'graphs__element'>"+
                                        
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+

                "</div>"+
            "</div>"+
            
            "<div class = 'offers__on__hover'>"+"<div class ='offers__reg'>"+ data.Region+ "</div>"
                + "<div class ='offers__wifi'>" + data.WiFi + " Mbps" + "</div>"
            + "<div class = 'offers__deg'><img src = 'icons/temperature.png'>" +degree + "<?echo $degree_name;?>"+"</div>" +
            "<div class = 'offers__cost'>" + array_of_qualities[0] +" <?echo $cost_name;?>"+" / mo" + "</div>"
            + "<div class = 'offers__country'>"+data.country  +"</div>"
            + "<div class = 'offers__city'>" +data.city + "</div>"
            +  "</div>"
            
            +"<a class = 'be-up' href = '#first/"+ data.link +"'>"+
            "<div class = 'offers__dark'>"+
            "<div class = 'offers__graphics offers__graphics__first'><img src = 'icons/money.svg'><div class = 'offers__signs'>Cost</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element' style = 'background-color:"+cost_color+";width:"+the_array_of_percent[0]+"%''></div></div></div>"
            +"<div class = 'offers__graphics'><img src = 'icons/internet.svg'><div class = 'offers__signs'>WiFi</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+wifi_color+";width:"+the_array_of_percent[1]+"%''></div></div></div>"
            +"<div class = 'offers__graphics'><img src = 'icons/happy-hour.svg'><div class = 'offers__signs'>Fun</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+fun_color+";width:"+the_array_of_percent[2]+"%''></div></div></div>"
            +"<div class = 'offers__graphics'><img src = 'icons/safety.svg'><div class = 'offers__signs'>Safety</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+ safe_color+";width:"+the_array_of_percent[3]+"%''></div></div></div></a>"
            +"<div class = 'offers__close'><button onclick = '$(this).parent().parent().parent().hide();'>✖</button></div>"
            +  "</div>"
            +  "</div>"
            );
$(function () {
for (var i = 0; i < <?=$count_array / 2;?>; i++) {
if(the_array_of_percent[i]>= 50){charts_color = "green";}
else if (the_array_of_percent[i]>= 30 && the_array_of_percent[i]<50){charts_color = "orange";}
else{charts_color = "red";}
$('#1'+ data.city +'').append($("<div class = 'offers__graphics__more'>"+
        "<div class='offers__graphics-resized'>"+
            "<div class='short-info-charts'>"+
                "<img src = '" + images_href[i] + "'>"+
                "<div class = 'offers__signs-more'>"+ qualities_names[i] +"</div>"+
            "</div>"+
            "<div class = 'offers__graphics-body'>"+
                " <div class ='offers__element-more' style = 'background-color:"+charts_color+";width:"+ the_array_of_percent[i] +"%''>"+
                "<span>"+
                array_of_qualities[i] +" "+ units[i]+
                "</span>"+
                "</div>"+
            "</div>"+
        "</div>"+
    "</div>"
));
}
});
$(function () {
for (var i =  <?=$count_array / 2;?>; i < <?=$count_array;?>; i++) {
    if(the_array_of_percent[i]>= 50){charts_color = "green";}
    else if (the_array_of_percent[i]>= 30 && the_array_of_percent[i]<50){charts_color = "orange";}
    else{charts_color = "red";}
$('#2'+ data.city +'').append($("<div class = 'offers__graphics__more'>"+
                    "<div class='offers__graphics-resized'>"+
                        "<div class='short-info-charts'>"+
                            "<img src = '" + images_href[i] + "'>"+
                            "<div class = 'offers__signs-more'>"+ qualities_names[i] +"</div>"+
                        "</div>"+
                        "<div class = 'offers__graphics-body'>"+
                            " <div class ='offers__element-more' style = 'background-color:"+charts_color+";width:"+ the_array_of_percent[i] +"%''>"+
                            "<span>"+
                            array_of_qualities[i] +" "+ units[i]+
                            "</span>"+
                        "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"));
}
});
                    });
                    inprogress = false;
                    num += 4;
            }});
        }
    });
});
</script>   