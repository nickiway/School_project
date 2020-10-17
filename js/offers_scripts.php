<?php
require "php_func/currency.php";
require "php_func/offers.php";
require "php_func/sorting.php";
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
                        var width_cost = 100 * data.cost / <?echo $max['maxcost']; ?>;
                        var cost_color;

                        var width_wifi = 100 * data.WiFi / <?echo $max_cost['maxwifi'] ?>;
                        var wifi_color;
                        
                        var width_fun = 100 * data.fun / <?echo $max_fun['maxfun']; ?>;
                        var fun_color;

                        var width_safe = 100 * data.safet / <?echo $max_safe['maxsafe']; ?>;
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
                        $('.offers__card').on('click', function(){  
                        
                        });
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
                        
                        $('#offers').append("<div onclick = '' class = 'offers__card wow fadeIn' style = 'background-image:url("+ data.image +")'>"  + 
                        "<div class = 'offers__dark__elem'>"+
                        "<div class = 'offers__info__block'>"+
                        "<div class = 'offers__parent__image' style = 'background-image:url("+ data.image +")'><div class = 'video__dark'></div></div>"+
                        "</div>"+
                        "</div>"
                        +
                        "<div class = 'offers__on__hover'>"+"<div class ='offers__reg'>"+ data.Region+ "</div>"
                          + "<div class ='offers__wifi'>" + data.WiFi + " Mbps" + "</div>"
                      + "<div class = 'offers__deg'><img src = 'icons/temperature.png'>" +degree + "<?echo $degree_name;?>"+"</div>" +
                      "<div class = 'offers__cost'>" + cost +" <?echo $cost_name;?>"+" / mo" + "</div>"
                      + "<div class = 'offers__country'>"+data.country  +"</div>"
                      + "<div class = 'offers__city'>" +data.city + "</div>"
                      +  "</div>"
                      +"<div class = 'offers__dark'>"
                      +"<div class = 'offers__graphics offers__graphics__first'><img src = 'icons/money.svg'><div class = 'offers__signs'>Cost</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element' style = 'background-color:"+cost_color+";width:"+width_cost+"%''></div></div></div>"
                      +"<div class = 'offers__graphics'><img src = 'icons/internet.svg'><div class = 'offers__signs'>WiFi</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+wifi_color+";width:"+width_wifi+"%''></div></div></div>"
                      +"<div class = 'offers__graphics'><img src = 'icons/happy-hour.svg'><div class = 'offers__signs'>Fun</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+fun_color+";width:"+width_fun+"%''></div></div></div>"
                      +"<div class = 'offers__graphics'><img src = 'icons/safety.svg'><div class = 'offers__signs'>Safety</div><div style ='background-color:#a6a6a6;width:50%;height:25px;overflow:hidden; border-radius:10px;'><div class ='offers__element'  style = 'background-color:"+ safe_color+";width:"+width_safe+"%''></div></div></div>"
                      +"<div class = 'offers__close'><button onclick = '$(this).parent().parent().parent().fadeOut();'>✖</button></div>"
                      +  "</div>"
                      +  "</div>");
                    });
                    inprogress = false;
                    num += 4;
            }});
        }
    });
});
</script>   