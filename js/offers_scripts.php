<?php
require "php_func/currency.php";
require "php_func/offers.php";
require "php_func/sorting.php";
require "php_func/connection.php";
require "php_func/country_info.php";
?>

<script>
var sorting = "<?  echo $sorting; ?>";
$(document).ready(function()
{
    var inprogress = false;
    var num = 4;
    $(window).scroll(function(){
        if($(window).scrollTop()+$(window).height()+100 >= $(document).height() && !inprogress){
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
                        var width_cost = 100 * data.cost / <?echo $cost_max; ?>;
                        var cost_color;

                        var width_wifi = 100 * data.WiFi / <?echo $wifi_max ?>;
                        var wifi_color;
                        
                        var width_fun = 100 * data.fun / <?echo $fun_max; ?>;
                        var fun_color;

                        var width_safe = 100 * data.safet / <?echo $safety_max; ?>;
                        var safe_color;

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
                        $('.offers__card').on('click', function(){  
                        
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
                            $('.offers__card').on('click', function(){
                            $(this).children().show();
                        });
                        var degree = Math.round(data.degree * <?echo $degree_value;?> +<?echo $degree_value_add;?>) ;
                        var cost = Math.round(data.cost * <?echo $currency_value_US;?> / <?echo $currency_value;?>) ;
                        
                        $('#offers').append("<div class = 'offers__card' style = 'background-image:url("+ data.image +")'>"  + 
                            "<div class = 'offers__dark__elem'>"+
                                "<div class = 'offers__info__block'>"+
                                    "<div class= 'exit-more'>✖</div>"+
                                    "<div class = 'offers__parent__image' style = 'background-image:url("+ data.image +")'><div class = 'video__dark'></div>"+
                                        "<div class  =  'name-center__row'>"+
                                            "<div class = 'name-center__element'>"+ data.city +"</div>"+
                                            "<div class = 'name-center__element' >"+ data.country +"</div>"+
                                            "<div class = 'center-travel_button'><button class = 'travel-button'>Travel to"+ data.city +" </button></div>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class = 'tabs'>"+
                                        " <a class = 'be-up' href = '#first/"+ data.link +"'><div id =  '1' class='tabs__items'>Scrores</div></a>"+
                                        "<a class = 'be-up' href = '#second/"+ data.link +"'><div id = '2'class='tabs__items'>Cost Of Living</div></a>"+
                                        "<a class = 'be-up' href = '#third/"+ data.link +"'><div id = '3' class='tabs__items'>Pros And Cons</div></a>"+
                                        "<a class = 'be-up' href = '#fourth/"+ data.link +"'><div id = '4' class='tabs__items'>Paradise Guide</div></a>"+
                                        "<a class = 'be-up' href = '#fifth/"+ data.link +"'><div id = '5' class='tabs__items'>Local Introduction</div></a>"+
                                    "</div>"+
                                    
                                    "<div class = 'tabsContent'>"+
                                        "<div id = 'first/"+ data.link +"'  class='tabContent'>"+
                                            "<div class =  'graphs__container'>"+
                                                "<div id = '1"+data.city+"' class =  'graphs__element'>"+
                                                    "<div class = 'offers__graphics__more'>"+
                                                        "<div class='offers__graphics-resized'>"+
                                                            "<div class='short-info-charts'>"+
                                                                "<img src = '../icons/up.svg'>"+
                                                                "<div class = 'offers__signs-more'>$qualities_names[$i]</div>"+
                                                            "</div>"+
                                                            "<div class = 'offers__graphics-body'>"+
                                                                ""+
                                                            "</div>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "</div>"+
                                                
                                                "<div  id = '2"+data.city+"' class =  'graphs__element'>"+
                                                    "<div class = 'offers__graphics__more'>"+
                                                        "<div class='offers__graphics-resized'>"+
                                                            "<div class='short-info-charts'>"+
                                                                "<img src = '../icons/up.svg'>"+
                                                                "<div class = 'offers__signs-more'>$qualities_names[$i]</div>"+
                                                            "</div>"+
                                                            "<div class = 'offers__graphics-body'>"+
                                                                ""+
                                                            "</div>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+

                            "</div>"+
                        "</div>"+
                        
                        "<div class = 'offers__on__hover'>"+"<div class ='offers__reg'>"+ data.Region+ "</div>"
                          + "<div class ='offers__wifi'>" + data.WiFi + " Mbps" + "</div>"
                      + "<div class = 'offers__deg'><img src = 'icons/temperature.png'>" +degree + "<?echo $degree_name;?>"+"</div>" +
                      "<div class = 'offers__cost'>" + cost +" <?echo $cost_name;?>"+" / mo" + "</div>"
                      + "<div class = 'offers__country'>"+data.country  +"</div>"
                      + "<div class = 'offers__city'>" +data.city + "</div>"
                      +  "</div>"
                      +"<a class = 'be-up' href = '#first/"+ data.link +"'><div class = 'offers__dark'>"
                      +"<div class = 'offers__graphics offers__graphics__first'><img src = 'icons/money.svg'><div class = 'offers__signs'>Cost</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element' style = 'background-color:"+cost_color+";width:"+width_cost+"%''></div></div></div>"
                      +"<div class = 'offers__graphics'><img src = 'icons/internet.svg'><div class = 'offers__signs'>WiFi</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+wifi_color+";width:"+width_wifi+"%''></div></div></div>"
                      +"<div class = 'offers__graphics'><img src = 'icons/happy-hour.svg'><div class = 'offers__signs'>Fun</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+fun_color+";width:"+width_fun+"%''></div></div></div>"
                      +"<div class = 'offers__graphics'><img src = 'icons/safety.svg'><div class = 'offers__signs'>Safety</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+ safe_color+";width:"+width_safe+"%''></div></div></div></a>"
                      +"<div class = 'offers__close'><button onclick = '$(this).parent().parent().parent().hide();'>✖</button></div>"
                      +  "</div>"
                      +  "</div>"
                      );
                      $(function () {
                        for (var i = 0; i <= 1; i++) {
                            $('#1'+ data.city +'').append($("<div class = 'offers__graphics__more'>"+
                                                        "<div class='offers__graphics-resized'>"+
                                                            "<div class='short-info-charts'>"+
                                                                "<img src = '../icons/up.svg'>"+
                                                                "<div class = 'offers__signs-more'>$qualities_names[$i]</div>"+
                                                            "</div>"+
                                                            "<div class = 'offers__graphics-body'>"+
                                                                ""+
                                                            "</div>"+
                                                        "</div>"+
                                                    "</div>"
                        ));
                        }
                        });
                        $(function () {
                        for (var i = 0; i <= 1; i++) {
                            $('#2'+ data.city +'').append($("<div class = 'offers__graphics__more'>"+
                                                        "<div class='offers__graphics-resized'>"+
                                                            "<div class='short-info-charts'>"+
                                                                "<img src = '../icons/up.svg'>"+
                                                                "<div class = 'offers__signs-more'>$qualities_names[$i]</div>"+
                                                            "</div>"+
                                                            "<div class = 'offers__graphics-body'>"+
                                                                ""+
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