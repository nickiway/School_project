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
$inputNum = (count($_POST)/10) - 1;
for ($i=0; $i < $inputNum ; $i++) 
{ 
    $hotel = $_POST['Hotel'];
    $id = $_POST["$i"];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $cost = $_POST['cost'];
    $type = $_POST['hotelType'];
    $rooms = $_POST['RoomNum'];
    $beds = $_POST['BedsNum'];
    $breakfast = $_POST['breakfast'];
    $pet = $_POST['pet'];
    $S = rand(90, 150);
    $smoke = $_POST['smoke'];
    $spa = $_POST['spa'];
    $condicioner = $_POST['condicioner'];
    $available = $_POST['available'];
}
$s = mysqli_query($connect, "UPDATE `propositons` SET `Hotel`='$hotel',`DateStart`='$dateStart',`DateEnd`='$dateEnd',`Cost`='$cost',`breakfastInclude`='$breakfast',`Type`='$type',`Rooms`='$rooms',`Pet friendly`='$pet',`For smoking`='$smoke',`Spa Salon`='$spa',`Total S`='$S',`Beds`='$beds',`Condicioner`='$condicioner',`Available`='$available' WHERE `id`='$id'");
header("Location:\admins_page.php");
}
?>