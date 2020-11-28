 <?php
require "php_func/connection.php";
require "php_func/Order.php";
require "php_func/currency.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
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
                                <!-- Getting the country name -->
                                <div class="order__input">
                                    <p class = "order__input-header">Country To</p>
                                    <select name="to" id="">
                                        <option value="Anywhere">Anywhere</option>
                                        <?
                                        while($country = mysqli_fetch_assoc($countrySelect)){
                                            echo "<option value = ".$country['Country'].">".$country['Country']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Getting the hotel name -->
                                <div class="order__input">
                                    <p class = "order__input-header">Hotel To</p>
                                    <select name="HotelName" id="">
                                        <option value="Anywhere">Anywhere</option>
                                        <?
                                        while($hotel = mysqli_fetch_assoc($getHotel)){
                                            echo "<option value = '".$hotel['HotelName']."'>".$hotel['HotelName']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Getting Date From -->
                                <div class="order__input">
                                    <p class = "order__input-header">Date from</p>
                                    <input name = "dateFrom" min = "<?=$todayDate?>" type="date">
                                </div>   
                                <!-- Getting Date To -->
                                <div class="order__input">
                                    <p class = "order__input-header">Date till</p>
                                        <input name = "dateTo" min = "<?=$todayDate?>" type="date">
                                </div>      

                            </div>
                            <div class="order__form-block">
                                <input type="submit" name = "sendOrder" value = "Find the Hotel" class = "standartStyle">
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
                switch ($row['breakfastInclude']) {
                    case '1':
                        $breakfastInclude = "yes";
                        $breakfastIncludeCard = "Incluted";
                        break;
                    
                    default:
                         $breakfastInclude = "no";
                         $breakfastIncludeCard = "Not Incluted";
                        break;
                }
                
                $NumOfBeds = $row['Beds'];
                $galleryImages = explode(" ", $row['GalleryImage']);
                $imageSource = $row['imageSource'];//Image Backgrpund
                $country = $row['Country'];//Country
                $flag = $row['Flag'];//Flag
                $hotelName = mb_strimwidth($row['HotelName'], 0,20, "...");//Hotel name
                $dateStart =  date("M d", strtotime($row['DateStart'])); //dateStart
                $dateEnd =  date("M d", strtotime($row['DateEnd']));//dateEnd
                $city = $row['City'];//Capital
                $starsNum = $row['Stars'];
                $region = $row['Region'];//Region
                $dateDiff =ceil(abs(strtotime($dateStart) - strtotime($dateEnd)) / 86400);
                $cost = round((intval($row['Cost']) * $currency_value_US / $currency_value)/$dateDiff, 2);//Cost  
                $NumberType = $row['Type'];//Type numbert
                $NumberOfRooms = $row['Rooms'];
                if ($row['Condicioner'] == 1) {
                    $Condicioner = "yes";
                }
                else{
                    $Condicioner = "no";                    
                }
                if ($row['Pet friendly'] == 1) {
                    $Petfriend = "yes";
                }
                else{
                    $Petfriend = "no";                    
                }
                if ($row['For smoking'] == 1) {
                    $Smoking = "yes";
                }
                else{
                    $Smoking = "no";                    
                }
                if ($row['Spa Salon'] == 1) {
                    $Spa = "yes";
                }
                else{
                    $Spa = "no";                    
                }
                $TotalS = $row['Total S'];
                #Echo the cards:
                echo "
<div class='order__send-form' id = '".$row['id']."'>
    <div class='order__send-body'>
        <div class='order__call-form'>
        <h2 class = 'offers-cards__hotel-name'>\"".$hotelName."\"</h2>
        <h3>".$country."( ".$region."  )<img src='".FLAGDIR."/$flag.png' alt='flag'></h3>
        
        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/money.png' alt='money'> Total cost: ".round($cost * $dateDiff)." ".$cost_name." (Cost for a night: ".$cost." ".$cost_name.")</p>


        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/room.png' alt='room'> Number type : $NumberType ($NumberOfRooms rooms, $TotalS m²)</p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/breakfast.png' alt='breakfast'>Breakfast is incluted<span class = 'underlineText'><img src='".ICONDIR.$breakfastInclude.".png' alt='icon'></span> </p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/air-conditioner.png' alt='conditioner'> Condicioner: <img src='".ICONDIR.$Condicioner.".png' alt='icon'></p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/dog.png' alt='dog'> Pet friendly: <img src='".ICONDIR.$Petfriend.".png' alt='icon'></p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/smoking-area.png' alt='smoking'> Smoking area: <img src='".ICONDIR.$Smoking.".png' alt='icon'> </p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/onsen.png' alt='onsen'> Spa salon: <img src='".ICONDIR.$Spa.".png' alt='icon'></p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/beds.png' alt='beds'> Beds: $NumOfBeds</p>

        
        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/city.png' alt='city'> Hotel's city: ".$city."</p>

        <p class = 'order__send-moreinfo'> <img src='".ICONDIR."/moon.png' alt='moon'> Night number: ".$dateDiff." ( From ".$dateStart." and To ".$dateEnd." )</p>
        
        <p class = 'order__send-moreinfo '><img src='".ICONDIR."/mark.png' alt='mark'> Star Rate:";
        for ($i=0; $i < $starsNum ; $i++) { 
            echo "<img class ='stars' src = ".ICONDIR."/star.png>";
        }
        
        echo "
        </p>
    <div class='slider'>
        <ul>";
            for ($i=0; $i < count($galleryImages); $i++) { 
                echo "<li style = 'background-image:url(Orders_images/".$galleryImages[$i].")'>";
            }
        echo "</ul>
    </div>
    <h2 class = 'offers-cards__hotel-name m-t-40'>Please fill in the form if you want to order the tour</h2>
        <form method = 'POST'>

            <div class ='order__inputBlokc'> 
                <p>Your fullname</p>
                <input id = 'fullname' name = 'fullname'  required  type='text'>
            </div>

            <div class ='order__inputBlokc'>
                <p>Your phone</p>
                <input  class ='phone' name = 'phone' required  type='text'>
            </div>

            <div class ='order__inputBlokc'>
                <p>When you convinient we recall you?</p>
                <input name = 'recallTime'  required type='datetime-local'>
                <input name = 'Hotel'  value = '$hotelName' type='hidden'>

               
            </div>
            
            <div class ='order__inputBlokc'><input name = 'SubmitOrder' class = 'standartStyle'type='submit'></div>

        </form>
        </div>
    </div>
</div>

<div class = 'order-card__item' >
<div class='order-card__image text3d' style = 'background-image:url(".ORDERDIR."/$imageSource)'>

<div class='dark-element'>
        <div class='dark-element__up-row'>
            <div class='orderUp_1'>
                <div class = 'order-crad__date'>
                    <p>From</p> 
                    <p>".$dateStart."</p>
                </div>
            </div>
        <div class='orderUp_2'>
            <div class = 'order-crad__date'>
                <p>To</p> 
                <p>".$dateEnd."</p>
            </div>
        </div>
        </div>
        <div class='dark-element__low-row'>     
            <div class='orderUp_1'>
                <div class = 'order-crad__date'> 
                    <p class = 'centerVertical centerHorizontal'>   
                        <img src='".FLAGDIR."/$flag.png' alt='$country'>
                        <span class = 'order-crad__title'>$country</span>   
                    </p>       
                </div>
            </div>                   
            <div class='orderUp_2'>
                <div class = 'order-crad__date'>
                    <p class =  'offers-cards__sign no-margins'>".$dateDiff." Nights</p>
                </div>
            </div>
        </div>
</div>

</div>
<div class='order-cards__description'
    <div class='order-cards__inforamation'>
        <p class =  'offers-cards__hotel-name'>\"".$hotelName."\"</p>
        <p class =  'offers-cards__sign'>Costs for a night: <span class ='contrastSign'>".round($cost)." ".$cost_name."</span></p>

        <p class =  'offers-cards__sign'>Located in: <span class ='contrastSign'>".$city."</span></p>
        <p class =  'offers-cards__sign'>Breakfast is<span class ='contrastSign'> ".$breakfastIncludeCard."</span></p>

        <p class =  'offers-cards__sign'><button onclick = sendTour(".$row['id'].") class= 'standartStyle'>Order the hotel</button></p>
    </div>   
</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class = "currency">
        <button class = "currency__button" onclick = currency()><?php echo "$currname  - $cost_name";?></button>
        <div id = "currency__element" class = "currency__element">
        <div class = "currency__row">
            <div class = "currenсy__item">
                <form action="" method =get>
                    <select id = "currency__select" class = "currency__select" onchange="if (this.value) window.location.href = this.value" name="" id="">
                        <option style = "display:none;" value="current"><?php echo "$currname - $cost_name";?></option>
                        <option value="order_tour.php?curr=USD&to=<?=$CountryTo?>&dateFrom=<?=$dateFrom?>&dateTo=<?=$dateTo?>&HotelName=<?=$hotelComingTo?>">USD - $</option>

                        <option value="order_tour.php?curr=EUR&to=<?=$CountryTo?>&dateFrom=<?=$_GET['dateFrom']?>&dateTo=<?=$dateTo?>&HotelName=<?=$hotelComingTo?>">EUR - €</option>

                        <option value="order_tour.php?curr=UAH&to=<?=$CountryTo?>&dateFrom=<?=$dateFrom?>&dateTo=<?=$dateTo?>&HotelName=<?=$hotelComingTo?>">UAH - ₴</option>
                    </select>
                </form>
                <div class="currency__more">
                    <button class = "standartStyle " onclick = "showCurrency()" >Show today currecy</button>
                </div>
                <div id="currency__information">
                        <p>1$ = <?=$gryvnaPercennt?> UAH - ₴</p>
                        <p>1$ = <?=$eurPercent?> EUR - €</p>
                    </div>
            </div>
    </div>
    </div>
    </div>
    <script src="/includes/js/maskedinput/src/jquery.maskedinput.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script>
   $(document).ready(function() {
 $(".slider").each(function () { // обрабатываем каждый слайдер
  var obj = $(this);
  $(obj).append("<div class='nav'></div>");
  $(obj).find("li").each(function () {
   $(obj).find(".nav").append("<span rel='"+$(this).index()+"'></span>"); // добавляем блок навигации
   $(this).addClass("slider"+$(this).index()).fadeIn("slow");
  });
  $(obj).find("span").first().addClass("on"); // делаем активным первый элемент меню
 });
});
function sliderJS (obj, sl) { // slider function
 var ul = $(sl).find("ul"); // находим блок
 var bl = $(sl).find("li.slider"+obj); // находим любой из элементов блока
 var step = $(bl).width(); // ширина объекта
 $(ul).animate({marginLeft: "-"+step*obj}, 400); // 500 это скорость перемотки
}
$(document).on("click", ".slider .nav span", function() { // slider click navigate
 var sl = $(this).closest(".slider"); // находим, в каком блоке был клик
 $(sl).find("span").removeClass("on"); // убираем активный элемент
 $(this).addClass("on"); // делаем активным текущий
 var obj = $(this).attr("rel"); // узнаем его номер
 sliderJS(obj, sl); // слайдим
 return false;
});
</script>
<script src="js/jquery.mask.min.js"></script>
<script src = "js/common.js"> </script>
<script src = "js/main_page.js"> </script>
<script>
    $(document).ready(function() {
       $('.phone').mask("+380 (99) 999 9999");   
    });
</script>
</body>
</html>