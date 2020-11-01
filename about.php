<?
require "php_func/connection.php";
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
    <title>About Us</title>
</head>
<body class = "darked-body no-overflow-x">
    <?php
    require "header.php";
    ?>
    <div class="about">
        <div class="about-header">
            <div class="dark-element">
                <div class= "dark-element__body wow zoomIn">
                    <p class="dark-element__title">Travel with Us</p>
                    <p class="dark-element__subtitle">About Us and whar do we provide for</p>
                </div>
            </div>
        </div>
        <div class="about-body">
            <h2 class = "wow zoomIn">We take our mission to heart, which means taking to the road.</h2>
            <div class="about-body__row">
                <div class="about-body__img wow slideInLeft">
                    <img src="https://cdn.psychologytoday.com/sites/default/files/styles/amp_metadata_content_image_min_1200px_wide/public/field_blog_entry_teaser_image/2018-05/_happy_jumping_on_beach-40815-144x144-380_22-2301_2303.jpg?itok=7_3G3IvN" alt="">
                </div>
                <div class="about-body__container wow slideInRight">
                    <div class="about-body__text">
                        <p class="about-body__title">the best work perk</p>
                        <hr class="about-body__line">
                        <p class = "about-body__description">
                        As a team of travelers ourselves, the biggest work perk we could get is the chance to continue exploring the world and connecting with others along the way -- and we do! Every year, Go Overseas pays for each team member to take a trip, in order to get to know the programs we host and the travelers who go on them.
                        </p>
                        <p class = "about-body__description">
                        Our annual trip to visit a Go Overseas partner was created to help further our mission, and to actually live it by connecting with humans and taking perspective-changing trips. The travel norm we envision for the world, and live out through these trips, is full of real cultural exchange.
                        </p>
                    </div>
                </div>
            </div>
            <div class="news">        
                    <p class = "news__header wow zoomIn">Get the last news</p>
                </div>
                
                <div class="news__row wow slideInUp">
                    <?php
                        require "php_func/news_script.php";
                    ?>
                </div>
                
            </div>
        </div>
    </div>
    <script src="js/common.js"></script>
</body>
</html>