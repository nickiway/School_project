<?
// Pages work
$numOfRows = 15;
$datemin = date("Y-m-d");
$page_numOrders  = $_GET['avahotels'];
if($page_numOrders == "" || $page_num == "1"){
    $page_numOrders = 0;
}
else{
    $page_numOrders = $page_numOrders * $numOfRows - ($numOfRows-1);
}
$allAvailRows = mysqli_query($connect, "SELECT * FROM propositons ORDER BY id DESC");
$numRowsAva =ceil(mysqli_num_rows($all_rows)/$numOfRows); 
$getAvailableHotels = mysqli_query($connect, "SELECT * FROM propositons  ORDER BY id DESC LIMIT $page_numOrders, $numOfRows");
$getAllHotels = mysqli_query($connect, "SELECT HotelName FROM hotels");

if (isset($_POST['ChangeAvailableHotels'])) {
$inputNum = (count($_POST)/8) -1;
for ($i=0; $i < $inputNum; $i++) 
{ 
    $hotel = $_POST["Hotel$i"];
    $id = $_POST["$i"];
    $dateStart = $_POST["dateStart$i"];
    $dateEnd = $_POST["dateEnd$i"];
    $cost = $_POST["cost$i"];
    $type = $_POST["hotelType$i"];
    $rooms = $_POST["RoomNum$i"];
    $beds = $_POST["BedsNum$i"];
    $breakfast = $_POST["breakfast$i"];
    $pet = $_POST["pet$i"];
    $S = rand(90, 150);
    $smoke = $_POST["smoke$i"];
    $spa = $_POST["spa$i"];
    $condicioner = $_POST["condicioner$i"];
    $available = $_POST["available$i"];
    mysqli_query($connect, "UPDATE `propositons` SET `Hotel`='$hotel',`DateStart`='$dateStart',`DateEnd`='$dateEnd',`Cost`='$cost',`breakfastInclude`='$breakfast',`Type`='$type',`Rooms`='$rooms',`Pet friendly`='$pet',`For smoking`='$smoke',`Spa Salon`='$spa',`Total S`='$S',`Beds`='$beds',`Condicioner`='$condicioner',`Available`='$available' WHERE `id`='$id'");
}
header("Location:\admins_page.php");
}
?>