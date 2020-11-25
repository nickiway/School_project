<?
    require "connection.php";
    #Checking if the user is registered 
    if($_SESSION['logged_user']['Username']== "") header("Location:index.php"); 
    $todayDate = date("Y-m-d");
    $CountryTo = $_GET['to'];
    #Getting all the countries and hotels from DB to fill in Select
    $getHotel = mysqli_query($connect, "SELECT HotelName FROM hotels");
    $countrySelect = mysqli_query($connect, "SELECT  Country FROM countries");

    #The Hotel they are going to
    $hotelComingTo = $_GET['HotelName']; 
    #Date of starting the rest
    $dateFrom = $_GET['dateFrom'];
    #Date of finishing the rest
    $dateTo = $_GET['dateTo'];
    if(strtotime($dateFrom) != '0000-00-00')  $dateFrom == $todayDate;
    if(empty($dateTo))  $dateTo = date('Y-m-d', strtotime('+ 14 days'));
    #Checking if the date period is correct
    $isdatebiger = $dateFrom < $dateTo;
    if($isdatebiger == true && $CountryTo != "")
    {
        
        #Case $to = Anywhere
        if($CountryTo == 'Anywhere')
        {
            if($hotelComingTo == 'Anywhere'){
            $orders = mysqli_query($connect, "SELECT * FROM countries INNER JOIN hotels ON countries.Country = hotels.HotelCountry INNER JOIN propositons ON hotels.HotelName = propositons.Hotel WHERE propositons.DateStart > '$todayDate' AND propositons.DateStart > '$dateFrom'  AND propositons.DateEnd < '$dateTo' ORDER BY propositons.DateStart ASC LIMIT 40");
            }
            else{
                $orders = mysqli_query($connect, "SELECT * FROM countries INNER JOIN hotels ON countries.Country = hotels.HotelCountry INNER JOIN propositons ON hotels.HotelName = propositons.Hotel WHERE propositons.Hotel = '$hotelComingTo' AND propositons.DateStart > '$todayDate' AND propositons.DateStart > '$dateFrom'  AND propositons.DateEnd < '$dateTo' ORDER BY propositons.DateStart ASC LIMIT 40");
            }
        }

        else if($CountryTo != 'Anywhere')
        {
            #If country only field but hotel not
            if($hotelComingTo == 'Anywhere'){
                $orders = mysqli_query($connect, "SELECT * FROM countries INNER JOIN hotels ON countries.Country = hotels.HotelCountry INNER JOIN propositons ON hotels.HotelName = propositons.Hotel WHERE hotels.HotelCountry = '$CountryTo' AND propositons.DateStart > '$todayDate' AND propositons.DateStart > '$dateFrom'  AND propositons.DateEnd < '$dateTo' ORDER BY propositons.DateStart ASC LIMIT 40" );
                }
            #If both of them are field
            else{
                $orders = mysqli_query($connect, "SELECT * FROM countries INNER JOIN hotels ON countries.Country = hotels.HotelCountry INNER JOIN propositons ON hotels.HotelName = propositons.Hotel WHERE hotels.HotelCountry = '$CountryTo' AND propositons.Hotel = '$hotelComingTo' AND propositons.DateStart > '$todayDate' AND propositons.DateStart > '$dateFrom'  AND propositons.DateEnd < '$dateTo' ORDER BY propositons.DateStart ASC LIMIT 40");
            }
        }
   }    
   if (isset($_POST['SubmitOrder'])) {
        $objection = $_POST['objections'];
        $usersEmail = $_SESSION['logged_user']['Email'];
        $recallTime = $_POST['recallTime'];
        $fullName = $_POST['fullname'];
        $phone = $_POST['phone'];
        mysqli_query($connect, "INSERT INTO usersorders (Fullname, UsersEmail, Phone, Recall_time, Objections) VALUES ('$fullName', '$usersEmail' ,
        '$phone', '$recallTime', '$objection')");
   }
?>



