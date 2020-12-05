<?php
require "php_func/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>FAQ</title>
</head>
<body>
     <!-- Popup info -->
     <div id="introduction">
        <div class="introduction__body">
            <div class="center">
                <div class="introduction__title m-t-40 f-s-20">
                Комунальний заклад освіти  
                «Дніпровський ліцей інформаційних технологій 
                при Дніпровському національному університеті  
                імені Олеся Гончара» 
                </div>
            </div>

            <div class="center m-t-40">
                <div class="introduction__title f-s-20">
                Випускна робота
                </div>
            </div>

            
            <div class="center m-t-40">
                <div class="introduction__title left f-s-20">
                на тему:
                </div>
            </div>

            <div class="center">
                <div class="introduction__title m-t-40 f-s-30">
                «Сайт туристичної фірми “Paradise Travel”»
                </div>  
            </div>

            <div class="center m-t-40">
                <div class="introduction__title  right f-s-20">
                Виконавець: <br>
                ліцеїст 11-В класу<br>  
                Шкітак Нікіта<br>

                </div>
            </div>


            <div class="center m-t-40">
                <div class="introduction__title right f-s-20">
                Науковий керівник:<br>
                Пасько А.І. <br>
                </div>
            </div>

            <div class="center m-t-40">
                <div class="introduction__title f-s-20">
                Дніпрo<br>
                2020<br>
                </div>
            </div>        
            <div class ="introduction__close standartStyle" onclick = "window.location.href= 'index.php'" >CLOSE</div>
        </div>
    </div>
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
            <span tooltip="Double click to go home" flow = "right">
                <img src="icons/logo.png" alt="">
                <span class = "menu__sign"><img src="icons/down-arrow.png" alt=""></span>
                </span>
                <div id="menu__more__info">
                    <div class="more__body">
                        <p class = "more__title text3d">Menu</p>
                        <div class="more__row">
                            <div class="more__column">  
                                <p><img src="icons/homepage.png" alt=""><a href="index.php">Main Page</a></p>
                                <p><img src="icons/travel.png" alt=""><a href="">Order the hotel</a></p>
                                <p><img src="icons/cloudy.png" alt=""><a href="WeaterInformation.php">About Weather</a></p>
                                <p><img src="icons/monitor.png" alt=""><a href="about.php">About Us</a></p>
                            </div>
                            <div class="more__column">
                                <p><img src="icons/verify.png" alt=""><a href="register.php">Autorisation</a></p>
                                <p><img src="icons/login.png" alt=""><a href="login.php">Log In</a></p>
                                <p><img src="icons/admin.png" alt=""><a href="admins_page.php">Admin Page</a></p>
                                <p><img src="icons/verify.png" alt=""><a href="faq.php">FAQ</a></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <ul class = "menu__row" >
                <li class="menu__item" onclick = "window.location.href='about.php'">About us</li>
                <li class="menu__item"onclick = "window.location.href='order_tour.php'">Order the hotel</li>
                <li class="menu__item"onclick = "window.location.href='faq.php'">FAQ</li>
                <li class="menu__item"onclick = "window.location.href='WeaterInformation.php'">About Weather</li>
                <?if(isset($_SESSION['logged_user']) && $_SESSION['logged_user']['Status'] == 'Admin'):?>  
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
    <script src="js/common.js"></script>
</body>
</html>