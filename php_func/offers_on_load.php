<?php
$connect = mysqli_connect('localhost', 'mysql', 'mysql', 'paradise_tour');
$num = $_GET['num'];
$sorting = $_GET['sorting'];
$sql_offer = "SELECT * FROM `offers` ORDER BY $sorting LIMIT {$num}, 4";
$result = mysqli_query($connect, $sql_offer);
$offers = array();
while($row = mysqli_fetch_assoc($result)){
    $offers [] = $row;
}
echo json_encode($offers);
?>