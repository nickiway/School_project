<?
require "php_func/connection.php";
$current_id = $_GET['id'];
$required_news = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM news WHERE Id = $current_id"));
$id = $required_news['Id'];
$title = $required_news['title_news'];
$text = $required_news['text_news'];
$image  = $required_news['Image_news'];
$paragraphs_array = explode(PHP_EOL, $text);
$image_arr = explode(" ", $image);
$count_paragraph = count($paragraphs_array);
$newsImageClass = array("floatLeft" , "floatRight");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/helper.css">
    <script src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <title><?=$title?></title>
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
    <div class="menu">
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
            <ul class = "menu__row ">
                <li class="menu__item  darked-text" onclick = "window.location.href='about.php'">About us</li>
                <li class="menu__item  darked-text"onclick = "window.location.href='order_tour.php'">Order the tour</li>
                <li class="menu__item  darked-text"onclick = "window.location.href='Weatherinformation.php'">About Weather</li>
                <li class="menu__item darked-text"onclick = "window.location.href='faq.php'">FAQ</li>
                <?      if(isset($_SESSION['logged_user']) && $_SESSION['logged_user']['Username'] == 'Admin'):?>  
                    <li class="menu__item  darked-text"onclick = "window.location.href='admins_page.php'">Admins Page</li>
                <?endif;?>
            </ul>
            
        </div>
        <?php if(isset($_SESSION['logged_user'])):?>
            <div class="menu__log__in">
                <ul class = "menu__row__active">
                    <li class="profile"><div class = "avatar" style = "background-image:url(<?="../avatars/".$_SESSION['logged_user']['avatar']?>);"></div> Welcome, <?php echo $_SESSION['logged_user']['Username']; ?> 👋 </li>
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
<?php
echo
"<div class ='news'>
    <div class ='news-more' style = 'background-image:url(".The_news_Directory."$image_arr[0]);'>
        <div class ='dark-element'>
            <p class ='dark-element__title wow fadeInLeft news-more__header'>$title</p>
        </div>
    </div>
    <div class = 'new-more__body'>
    ";
    for ($i=0; $i < $count_paragraph; $i++) { 
        if (count($image_arr)-1 > $i) 
        {
                if ($i % 2 == 0) 
                {     
                echo"
                    <p class ='news-more__paragraph'>
                        <img class ='floatLeft' src ='".The_news_Directory."$image_arr[$i]'> 
                    </p>";
                }
                else
                {
                    echo"
                    <p class ='news-more__paragraph'>
                        <img class ='floatRight' src ='".The_news_Directory."$image_arr[$i]'> 
                    </p>";
                }
                echo"<p class ='news-more__paragraph'>$paragraphs_array[$i]</p>";
        }

        else{
            echo"
            <p class ='news-more__paragraph'>$paragraphs_array[$i]</p>
            ";  
        }
    }
   echo "</div>
</div>
";
?>
<script src="js/common.js"></script>
</body>
</html>