<?php
require "php_func/connection.php";
require "php_func/Order.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Choose the your dream-trip</title>
</head>
<body class = "darked-body">
    <div class="preloader">
        <p class = "preloader__items"><img src="../icons/beach.png"> 𝒲ℯ𝓁𝒸ℴ𝓂ℯ <img src="../icons/beach.png"></p> 
    </div>
    <div class="order">
        <div class="order__header">
            <!-- Menu -->
            <?require "header.php";?>
            <!-- HeadImage -->
            <div class="present-image contrast" style = 'background-image:url(https://i.pinimg.com/originals/b4/d3/5e/b4d35e1bbedeb9e71e5bf7db382b4ae2.jpg)'>
                <div class="order__field">
                    <form method = 'get'>
                        <div class="order__form">
                            <h2>Find the tour in advance</h2>
                            <div class="order__form-block">
                                <div class="order__input">
                                    <p class = "order__input-header">To</p>
                                    <select name="to" require id="">
                                        <option value="Anywhere">Anywhere</option>
                                        <?
                                        while($city = mysqli_fetch_assoc($citySelect)){
                                            echo "<option value = ".$city['City'].">".$city['City']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="order__input">
                                    <p class = "order__input-header">Date from</p>
                                        <input require name = "datefrom" min = "<?=$todayDate?>"type="date">
                                </div>   
                                <div class="order__input">
                                    <p class = "order__input-header">Date till</p>
                                        <input require name = "dateTo" min = "<?=$todayDate?>"type="date">
                                </div>      
                            </div>

                            <div class="order__form-block">
                                <input type="submit"name = "sendOrder" value = "Find the Hotel" class = "standartStyle">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class = 'order-cards'>
            <div class = 'order-cards__row'>
                <?
                while($row = mysqli_fetch_assoc($orders))
                {
                    #Hotel parametrs:
                    $name = $row['Name'];
                    $cost = $row['Cost'];
                    $city = $row['City'];
                    $imageSource = $row['image_source'];
                    $country = $row['Country'];
                    $dateStart = $row['DateStart'];
                    $dateEnd = $row['DateEnd'];
                    #Echo the cards:
                    echo "
                    <div onclick = \"window.location.href= 'order_tour_more.php#".$row['id']."'\" class = 'order-card__item text3d' style=  'background-image:url(".ORDERDIR."/$imageSource)'>
                        <div class = 'dark-element displayBlock pd-30'>
                            <div class = 'order-card__title'>
                                $name
                            </div>
                            <p class = 'order__inforamation'>The cost for hotel renting :".$cost."$</p>
                            <p class = 'order__inforamation'>The City ".$city." (".$country.")</p>
                            <p class = 'order__inforamation'> Starts from:".$dateStart."</p>
                            <p class = 'order__inforamation'> Ends to:".$dateEnd."</p>
                        </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>
    </div>
            
    <script src = "js/common.js"> </script>
</body>
</html>