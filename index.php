<?php
require "php_func/connection.php";
require "php_func/mailing.php";
require "php_func/currency.php";
require "php_func/sorting.php";
require "php_func/offers.php";
require "php_func/weather.php";
require "php_func/country_info.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Paradise Travel — Best travel company</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body>
    <!-- Up button -->
    <a href="#" class="back-to-top"><img src="../icons/up.svg" alt=""></a>
    <!--Pre_loader -->
    <div class="preloader">
        <p class = "preloader__items"><img src="../icons/beach.png"> 𝒲ℯ𝓁𝒸ℴ𝓂ℯ <img src="../icons/beach.png"></p> 
    </div>
    <!-- The menu -->
<div class="intro">
    <div class="menu menu-main">
        <div class="menu__logo">
        <div class="menu__logo__item" onclick = "more_info()" ondblclick="window.location.href='index.php'">
            <span tooltip="Click to open nav, double click to go home" flow = "right">
                <img src="icons/logo.png" alt="">
                <span class = "menu__sign"><img src="icons/down-arrow.png" alt=""></span>
                </span>
                <div id="menu__more__info">
                </div>
        </div>
            <ul class = "menu__row" >
                <li class="search_item">
                    <form method="get">
                        <input type="search" name = "search" autocomplete = "off"  placeholder = "Find The City or Country">
                    </form>
                </li>
                <li class="menu__item" onclick = "window.location.href='about.php'">About us</li>
                <li class="menu__item"onclick = "window.location.href='order_tour.php'">Order the tour</li>
                <li class="menu__item"onclick = "window.location.href='about.php'">Forum</li>
                <li class="menu__item"onclick = "window.location.href='voting.php'">Vote Page</li>
                <?      if(isset($_SESSION['logged_user']) && $_SESSION['logged_user']['Username'] == 'Admin'):?>  
                    <li class="menu__item"onclick = "window.location.href='admins_page.php'">Admins Page</li>
                <?endif;?>
            </ul>
            
        </div>
        <?php if(isset($_SESSION['logged_user'])):?>
            <div class="menu__log__in">
                <ul class = "menu__row__active">
                    <li class="profile"><div class = "avatar" style = "background-image:url(<?="../avatars/".$_SESSION['logged_user']['avatar']?>);"></div> Welcome, <?php echo mb_strimwidth($_SESSION['logged_user']['Username'], 0, 10, "..."); ?> 👋 </li>
                    <li class="menu__item__active" onclick = "window.location.href = 'php_func/logout.php'">Logout 🚪</li>                
                </ul>
            </div>
        <?php else:?>
            <div class="menu__log__in">
                <ul class = "menu__row__active">
                    <li class="menu__item__active" onclick = "window.location.href ='login.php'">Join Paradise Tour</li>
                </ul>
            </div>
        <?endif;?>
    </div>
 <!-- The video intro -->
        <div class="video">
        <svg viewBox="0 0 1440 120" class="wave"><path d="M1440,21.2101911 L1440,120 L0,120 L0,21.2101911 C120,35.0700637 240,42 360,42 C480,42 600,35.0700637 720,21.2101911 C808.32779,12.416393 874.573633,6.87702029 918.737528,4.59207306 C972.491685,1.8109458 1026.24584,0.420382166 1080,0.420382166 C1200,0.420382166 1320,7.35031847 1440,21.2101911 Z"></path></svg>
            <div class="video__dark"></div>
            <video class = "video__media" src="videos/side.mp4" autoplay muted loop></video> 
              <div class="video__text">
                    <div class = "video__div__text wow fadeInLeft">
                        <p  class = "add_disp video__title__intro video__title"><img src = "icons/the_earth.png">Welcome To Our Tour Website</p>    
                        <p class = "add_disp video__subtitle video__title__intro">On the current website you can order the tour in everywhere</p> 
                    </div>
                    <div style = "position:absolute;top:40%;" class = "add_app video__div__text wow fadeInLeft">
                        <p  class = "video__title__intro video__title"><img src = "icons/the_earth.png">𝒲ℯ𝓁𝒸ℴ𝓂ℯ <img src = "icons/the_earth.png"></p>    
                    </div>  
                    <div class = "video__rassilka wow fadeInRight">
                        <div class = "video__media__rassilka">
                            <video class = "video__media video__media__rassilka" src="videos/crimea.mp4" pause controls></video>
                        </div>                        
                        <div class = "video__rassilka__input">
                            <form method = "post">
                                <div class = "warning" style  = "<?=$error_mailing?>"><?=$mailing_warning;?></div>
                                <input name = "email_mail" id = "rassilka__input" class = "video__rassilka__input_input" style = "<?php echo $style_input?>" placeholder = "Enter your email" autocomplete="off" value = "<?echo $the_text_email;?>"type="email">
                                <input class = "video__submit"type="submit" value = "Join Us" name = "submit_mail">
                            </form>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>


    <div class = "filter" >
        <div class = "filter__element__center">
            <div id = "filter__row"> 
                <!-- first block -->
                    <div class="filter__right__block">
                        <button onclick = "filter_up()" class = "filter__button filter__button__active">Filter</button>
                        <button class = "filter__button">Add Filter</button>
                    </div>
                <!-- second block -->
                    <div class = "filter__left__block">    
                    <button style = "width:100px;">SSSS</button>          
                        <form method = 'get' action="">        
                                <select onchange="if (this.value) window.location.href = this.value" name="" id="">
                                <option style = "display:none;"  class = "filter__option" value="current"><?php echo "$sortname";?></option>
                                <optgroup label = "Price">
                                <option value="index.php?search=<?=$_GET['search']?>&sort=price-desc&degree=<?php echo $degree_ab;?>&curr=<?php echo $currname;?>">By price descending</option>
                                <option value="index.php?search=<?=$_GET['search']?>&sort=price-asc&degree=<?php echo $degree_ab;?>&curr=<?php echo $currname;?>">By price ascending</option>
                                </optgroup>
                                <optgroup label = "Alphabet">
                                <option value="index.php?search=<?=$_GET['search']?>&sort=alfabet-asc&degree=<?php echo $degree_ab;?>&curr=<?php echo $currname;?>">Alphabetically аscending</option>
                                <option value="index.php?search=<?=$_GET['search']?>&sort=alfabet-desc&degree=<?php echo $degree_ab;?>&curr=<?php echo $currname;?>">Alphabetically descending</option>
                                </optgroup>
                            </select>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <div class = "offers"> 
        <div id  = "offers"  class = "offers__row"> 
            <div id="filter-item">
                    <form method = "post">
                    <input id="cost" type="range" name = "cost" min = "<?=$cost_min?>" max = "<?=$cost_max?>" value = "<?=$avarage_cost?>">
                    <output id="ong" for="cost"></output>
                    <span for = "america">America</span>
                    <input type="checkbox" id =  "america" name = "America">
                    <input type="submit" name = "filter">
                </form>
            </div>    
            <?php
                require "php_func/cards.php"; 
                ?>
        </div>
        </div>
    </div>

    <div class = "currency">
        <button class = "currency__button" onclick = currency()><?php echo "$currname  - $cost_name  / $degree_name";?></button>
        <div id = "currency__element" class = "currency__element">
        <div class = "currency__row">
            <div class = "currenсy__item">
                <form action="" method =get>
                    <select id = "currency__select" class = "currency__select" onchange="if (this.value) window.location.href = this.value" name="" id="">
                        <option style = "display:none;" value="current"><?php echo "$currname - $cost_name";?></option>
                        <option value="index.php?search=<?=$get_search?>&curr=USD&degree=<?php echo $degree_ab;?>&sort=<?php echo $sortname;?>">USD - $</option>
                        <option value="index.php?search=<?=$get_search?>&curr=EUR&degree=<?php echo $degree_ab;?>&sort=<?php echo $sortname;?>">EUR - €</option>
                        <option value="index.php?search=<?=$get_search?>&curr=UAH&degree=<?php echo $degree_ab;?>&sort=<?php echo $sortname;?>">UAH - ₴</option>
                    </select>
                    <select id = "currency__select" class = "currency__select" onchange="if (this.value) window.location.href = this.value" name="" id="">
                        <option style = "display:none;" value="current"><?php echo "$degree_name";?></option>
                        <option value="index.php?search=<?=$get_search?>&curr=<?php echo $currname;?>&sort=<?php echo $sortname;?>&degree=cels">°C</option>
                        <option value="index.php?search=<?=$get_search?>&curr=<?php echo $currname;?>&sort=<?php echo $sortname;?>&degree=forn">°F</option>
                    </select>
                </form>
            </div>
    </div>
    </div>
    </div>
    <script src="//code-ya.jivosite.com/widget/rAluLeGmjt" async></script>
    <script src = "js/common.js"> </script>
    <?php
    if($get_search == "" ||  mysqli_num_rows($get_elem) < 1){
        require "js/offers_scripts.php";
      }
    ?>
    <script src="js/wow.min.js"></script>
    <script src="js/main_page.js"></script>
    <script>
        new WOW().init();
    </script>
    </body>
</html>