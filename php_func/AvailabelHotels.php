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
?>