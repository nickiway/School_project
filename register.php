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
    <link rel="icon" href="../icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/media.css">
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
                <div class="signup__picture" style = "background-image:url(https://v.img.com.ua/b/orig/2/2a/07ad1b7e7dc977d740107ea18ccc32a2.jpg)">
                    <div class="signup__field">
                        <div class = "login">
                        <div class="header">
                            <a href="index.php"><img src="../icons/logo.png" alt=""></a>  
                        </div>    
                        <div class="header">
                            Join us 
                        </div>
                        <div class="success" style = "<?=$succes?>">
                            You successfully registered :)
                            <a href="/login.php"><span>Back on Log In page</span></a>
                        </div>
                        <div class = "login__block" id = "login__field">
                            <form method = "post" enctype = "multipart/form-data">
                                <div class="login__input"><p><label for="email">Email</label></p><input type="email" name ="email" autocomplete = "off" required></input></div>
                                <div class = "login__warning" style  = "<?=$error_email?>"><?=$email_warning;?></div>
                                <div class="login__input"><p><label for="password">Password</label></p><input type="password" name ="password" id = "password-input" placeholder  = "Minimum 7 simbols"autocomplete = "off" required></input><a href="#" class="password-control"></a></div>
                                <div class = "login__warning" style  = "<?=$error_password?>"><?=$password_warning;?></div>
                                <div class="login__input"><p><label for="passwordConfirm">Confirm Password</label></p><input type="password" name ="passwordConfirm"  autocomplete = "off" required></input></div>
                                <div class = "login__warning" style  = "<?=$error_passwordConfirm?>">Your passwords do not match.</div>
                                <div class="login__input"><p><label for="name">Enter your name</label></p><input type="text" name ="name"  autocomplete = "off" required></input></div>
                                <div class = "login__warning" style  = "<?=$error_name?>">Something wrong with your name, you have entered wrong simbols.</div>
                                <div><input id ="avatar" type="file" name ="avatar"></input></div>
                                <div class="login__input">
                                    <label for="avatar"><div class = "file__button" for="avatar">Enter your avatar</div></label>
                                </div>
                                <div class="login__input"><input class = "login__submit"type="submit" name ="submit" value = "Join Paradise Travel"></input></div>
                            </form>
                        </div>
                        <span class = "login__sign">
                                Do you have an account? <a href="login.php">Login!</a>
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
