<?
    require "php_func/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Nature Factors</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/weather.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/media.css">
</head>
<body class = "darked-body">
<?
    require "header.php";
?>

<div class="nature">
    <p class = "nature__header text3d">Get forecast information easily</p>
    <div class="nature__row">
        <div class="nature__item">
            <p class = "natute__title text3d">Wind Speed Map</p>
            <iframe width="100%" height="600" src="https://embed.windy.com/embed2.html?lat=42.973&lon=9.053&detailLat=45.810&detailLon=15.980&width=1000&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=true&calendar=now&pressure=true&type=map&location=coordinates&detail=true&metricWind=m%2Fs&metricTemp=%C2%B0C&radarRange=-1" frameborder="0"></iframe>    

        </div>
        <div class="nature__item">
            <p class = "natute__title text3d">Storm and Lightning Map</p>
            <iframe width="100%" height="600" src="https://embed.windy.com/embed2.html?lat=45.951&lon=33.750&detailLat=45.951&detailLon=33.750&width=650&height=450&zoom=4&level=surface&overlay=radar&product=radar&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
        </div>
    </div>
    <div class="nature__row">
        <div class="nature__item">
            <p class = "natute__title text3d">Temperature Map</p>
            <iframe width="100%" height="600" src="https://embed.windy.com/embed2.html?lat=45.951&lon=33.750&detailLat=45.951&detailLon=33.750&width=100&height=450&zoom=4&level=surface&overlay=temp&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
        </div>
        <div class="nature__item">
            <p class = "natute__title text3d">Weves Map</p>
            <iframe width="100%" height="600" src="https://embed.windy.com/embed2.html?lat=45.890&lon=33.838&detailLat=45.890&detailLon=33.838&width=100&height=600&zoom=4&level=surface&overlay=waves&product=ecmwfWaves&menu=&message=true&marker=true&calendar=now&pressure=true&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>
        </div>
       
    </div>
</div>



<script src="js/common.js"></script>
</body>
</html>