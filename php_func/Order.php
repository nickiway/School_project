<?
    require "connection.php";
    #Checking if the user is registered 
    if($_SESSION['logged_user']['Username']== "") header("Location:index.php"); 
    $todayDate = date("Y-m-d");
    #Getting all the cities from DB to fill in Select
    $citySelect = mysqli_query($connect, "SELECT DISTINCT City FROM availablehotels");
    if(isset($_GET['sendOrder'])){
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
            if($isdatebiger == true && $to != ""){
                #Case $to = Anywhere
                if($to == 'Anywhere')
                $orders = mysqli_query($connect, "SELECT * FROM availablehotels WHERE  DateStart >= '$todayDate' AND DateStart >= '$dateFrom' AND DateEnd <= '$dateTo'");
                else
                $orders = mysqli_query($connect, "SELECT * FROM availablehotels WHERE City = '$to' AND DateStart >= '$todayDate'");
            
        }
        
    }
?>



