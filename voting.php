<?php
require "php_func/connection.php";
if($_SESSION['logged_user']['Username'] == ""){
    header('Location:/login.php');
}
if(isset($_GET['sub'])){
$results = $_GET['NightLife'];
$id = $_GET['city'];
$result = mysqli_query($connect, "UPDATE `votes` SET `Nightlife` = `Nightlife` + $results, `VotedNum` = `VotedNum` +1 WHERE `id_votes` = $id");
header('Location:/voting.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vote.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/media.css">
    <title> Paradise Travel — Vote the country</title>
</head>
<body>
    <!-- Up button -->
    <a href="#" class="back-to-top"><img src="../icons/up.svg" alt=""></a>
    <!--Pre_loader -->
    <div class="preloader">
        <p class = "preloader__items"><img src="../icons/beach.png"> 𝒲ℯ𝓁𝒸ℴ𝓂ℯ <img src="../icons/beach.png"></p> 
    </div>
    <!-- Menu -->
    <div class = "main">
        <div class="main__gray">
                <?
                require "header.php";
                ?>
                </div>
                <div class="main-title-block">
                    <div class="main__title">Welcome</div>
                    <div class="main__subtitle"> To the voiting page!</div>
                    <div class="line"><hr></div>
                    <div class="main__text">To vote the country u must confirm that u've attended it</div>
                    <div class="main__element"><button onclick = "window.location.href = '#more'">go vote now</button></div>
                </div>
        </div>
    </div>
    <div class="content">
        <p class = "content__title" id = "more">Start Vote easyly.</p>
        <p class="content__subtitle">Take your plasure</p>
        <div class="content__items">
                <form action="voting.php" method = "get">
                    <select name="city" id="city">
                        <?
                        $cities = mysqli_query($connect, "SELECT city FROM offers");
                        while($city = mysqli_fetch_assoc($cities)){
                            echo "<option value = ".$city['id_votes'].">$current_city</option>";
                        }
                        ?>
                    </select>
                    <input type="text" name = "NightLife">
                    <input type="submit" value="sub" name = "sub">
                </form>
        </div>
    </div>
    <script src = "js/common.js"></script>   
</body>
</html>