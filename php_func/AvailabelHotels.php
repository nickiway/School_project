<?
// Pages work
$page_numOrders  = $_GET['avahotels'];
if($page_numOrders == "" || $page_num == "1"){
    $page_numOrders = 1;
}
else{
    $page_numOrders = $page_numOrders * $numOfRows - ($numOfRows-1);
}
$allAvailRows = mysqli_query($connect, "SELECT * FROM propositons ORDER BY id ASC");
$numRowsAva =ceil(mysqli_num_rows($all_rows)/$numOfRows); 
$getAvailableHotels = mysqli_query($connect, "SELECT * FROM propositons WHERE Available = '1' ORDER BY id ASC LIMIT $page_numOrders,$numOfRows ");
?>