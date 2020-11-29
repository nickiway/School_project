<?
// Pages work
$numOfRows = 15;
$pageNumOrders  = $_GET['orders'];
if($pageNumOrders == "" || $pageNumOrders == "1"){
    $pageNumOrders = 1;
}
else{
    $pageNumOrders = $pageNumOrders * $numOfRows - ($numOfRows-1);
}

$OrdersAllRows = mysqli_query($connect, "SELECT * FROM usersorders ORDER BY id DESC");
    
$OrdersNumRows =ceil(mysqli_num_rows($OrdersAllRows)/$numOfRows); 
$getOrder = mysqli_query($connect, "SELECT * FROM usersorders ORDER BY id DESC LIMIT $pageNumOrders, $numOfRows "); 
if (isset($_POST['CommitOrder'])) {
    $rowsToUpdate = $_POST['Orderdelete'];
    $count = count($rowsToUpdate);   
    for ($i=0; $i < $count ; $i++) { 
        mysqli_query($connect, "UPDATE `usersorders` SET Examined = '1' WHERE id = '$rowsToUpdate[$i]'");
    }
    header('Location:/admins_page.php');
}

if (isset($_POST['UndefinedOrder'])) {
    $rowsToUpdate = $_POST['Orderdelete'];
    $count = count($rowsToUpdate);   
    for ($i=0; $i < $count ; $i++) { 
        mysqli_query($connect, "UPDATE `usersorders` SET Examined = '0' WHERE id = '$rowsToUpdate[$i]'");
    }
    header('Location:/admins_page.php');
}

if (isset($_POST['RejectOrder'])) {
    $rowsToUpdate = $_POST['Orderdelete'];
    $count = count($rowsToUpdate);   
    for ($i=0; $i < $count ; $i++) { 
        mysqli_query($connect, "UPDATE `usersorders` SET Examined = '2' WHERE id = '$rowsToUpdate[$i]'");
    }
    header('Location:/admins_page.php');
}
?>
