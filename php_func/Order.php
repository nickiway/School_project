<?
    require "connection.php";
    #Checking if the user is registered 
    if($_SESSION['logged_user']['Username']== "") header("Location:index.php"); 
    $todayDate = date("Y-m-d");
    $CountryTo = $_GET['to'];
    #Getting all the cities from DB to fill in Select
    $countrySelect = mysqli_query($connect, "SELECT DISTINCT Country FROM ordercountries");
            #The City they are going to
            $to = $_GET['to'];
            #Date of starting the rest
            $dateFrom = $_GET['dateFrom'];
            #Date of finishing the rest
            $dateTo = $_GET['dateTo'];
            if(strtotime($dateFrom) != '0000-00-00')  $dateFrom == $todayDate;
            if(strtotime($dateTo) != '0000-00-00')  $dateTo = date('Y-m-d', strtotime('+14 days'));
            #Checking if the date period is correct
            $isdatebiger = $dateFrom < $dateTo;
            
            if($isdatebiger == true && $to != "")
            {
                #Case $to = Anywhere
                if($CountryTo == 'Anywhere')
                {
                 $orders = mysqli_query($connect, "SELECT * FROM ordercountries INNER JOIN availablehotels ON ordercountries.Country = availablehotels.HotelCountry WHERE availablehotels.DateStart > '$dateFrom' AND availablehotels.DateEnd < '$dateTo' AND availablehotels.DateStart > '$todayDate' ORDER BY availablehotels.HotelCountry DESC");
                }
                else if($CountryTo != 'Anywhere')
                {
                 $orders = mysqli_query($connect, "SELECT * FROM ordercountries INNER JOIN availablehotels ON ordercountries.Country = availablehotels.HotelCountry WHERE availablehotels.HotelCountry = '$CountryTo' AND availablehotels.DateStart > '$dateFrom' AND availablehotels.DateEnd < '$dateTo' AND availablehotels.DateStart > '$todayDate'");
                }
            }    

?>



