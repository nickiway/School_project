<?php 
require "php_func/autohorisation.php";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Paradise Travel — Best travel company</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/media.css">
    </head>
<body>
<!--Pre_loader -->
<div class="preloader">
<p class = "preloader__items"><img src="../icons/beach.png"> 𝒲ℯ𝓁𝒸ℴ𝓂ℯ <img src="../icons/beach.png"></p> 
</div>
<div id =  "signup">
        <div class="login__row">
            <div class="login__field">
               
            </div>
            <div class="login__picture">
            
            </div>    
        </div>
        <div>
            <div class="signup__row">
                <div class="signup__picture" style = "background-image:url(https://klike.net/uploads/posts/2019-11/1572608872_4.jpg)">
                    <div class="signup__field" style = "align-items:center">
                        <div class = "login">
                        <div class="header">
                            <a href="index.php"><img src="../icons/logo.png" alt=""></a>  
                        </div>    
                        <div class="header">
                            Log in Paradise
                        </div>
                        <div class = "login__block" id = "login__field">
                            <form method = "post">
                                <div class="login__input"><p><label for="email">Email</label></p><input type="email" name ="login_email" autocomplete = "off" required value = "<?=$email?>"></input></div>
                                <div class = "login__warning" style  = "<?=$error_email?>"><?=$email_warning;?></div>
                                <div class="login__input"><p><label for="password">Password</label></p><input type="password" name ="login_password" id = "password-input" autocomplete = "off" required value = "<?=$pass?>"></input><a href="#" class="password-control"></a></div>
                                <div class = "login__warning" style  = "<?=$error_password?>"><?=$password_warning;?></div>
                                <div class="login__input"><input  class = "login__submit"type="submit" name ="login" value = "Join Paradise Travel"></input></div>
                            </form>
                        </div>
                        <span class = "login__sign">
                                Do not have an account yet?! <a href="register.php">Sign Up!</a>
                        </span>
                        <span class = "login__sign" style  = "font-size:12px;">
                            We glad to welcom you to our website!<br> We wish you convinient using!
                        </span>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('body').on('click', '.password-control', function(){
	if ($('#password-input').attr('type') == 'password'){
		$(this).addClass('view');
		$('#password-input').attr('type', 'text');
	} else {
		$(this).removeClass('view');
		$('#password-input').attr('type', 'password');
	}
	return false;
});
    </script>
    <script src = "js/common.js"> </script>
</body>
