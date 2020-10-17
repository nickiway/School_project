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
        <div class="menu__item__logo" onclick = "more_info()" ondblclick="window.location.href='index.php'">
            <span tooltip="Click to open nav, double click to go home" flow = "right">
                <img src="icons/logo.png" alt="">
                <span class = "menu__sign"><img src="icons/down-arrow.png" alt=""></span>
                </span>
                <div id="menu__more__info">
                </div>
        </div>
            <ul class = "menu__row">
                <li class="menu__item" onclick = "window.location.href='about.php'">About us</li>
                <li class="menu__item"onclick = "window.location.href='about.php'">Order the tour</li>
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