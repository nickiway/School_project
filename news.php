<?
require "php_func/connection.php";
$current_id = $_GET['id'];
$required_news = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM news WHERE Id = $current_id"));
$id = $required_news['Id'];
$title = $required_news['Title'];
$text = $required_news['Text'];
$image  = "images/".$required_news['Image'];
$paragraphs_array = explode(PHP_EOL, $text);
$count_paragraph = count($paragraphs_array);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
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
            <span tooltip="Click to open nav, double click to go home" flow = "right">
                <img src="icons/logo.png" alt="">
                <span class = "menu__sign"><img src="icons/down-arrow.png" alt=""></span>
                </span>
                <div id="menu__more__info">
                </div>
        </div>
            <ul class = "menu__row">
                <li class="menu__item  darked-menu" onclick = "window.location.href='about.php'">About us</li>
                <li class="menu__item  darked-menu"onclick = "window.location.href='about.php'">Order the tour</li>
                <li class="menu__item  darked-menu"onclick = "window.location.href='about.php'">Forum</li>
                <li class="menu__item  darked-menu"onclick = "window.location.href='voting.php'">Vote Page</li>
                <?      if(isset($_SESSION['logged_user']) && $_SESSION['logged_user']['Username'] == 'Admin'):?>  
                    <li class="menu__item  darked-menu"onclick = "window.location.href='admins_page.php'">Admins Page</li>
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
    <div class ='news-more' style = 'background-image:url($image);'>
        <div class ='dark-element'>
            <p class ='dark-element__title wow fadeInLeft news-more__header'>$title</p>
        </div>
    </div>
    <div class = ''>
    ";
    for ($i=0; $i < $count_paragraph; $i++) { 
        echo"<p style= 'margin-top:20px;'>$paragraphs_array[$i]</p>";
    }
   echo "</div>
</div>
";
?>
<script src="js/common.js"></script>
</body>
</html>