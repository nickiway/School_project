<?
// Pages work
$numOfRowsUser = 15;
$pageNumUser  = $_GET['user_table'];
if($pageNumUser == "" || $pageNumUser == "1"){
    $pageNumUser = 1;
}
else{
    $pageNumUser = $pageNumUser * $numOfRowsUser - ($numOfRowsUser-1);
}
$usersAllRows = mysqli_query($connect, "SELECT * FROM users ORDER BY id_user ASC");
$usersNumRows =ceil(mysqli_num_rows($usersAllRows)/$numOfRows); 
$getUser = mysqli_query($connect, "SELECT * FROM users ORDER BY id_user ASC LIMIT $pageNumUser, $numOfRowsUser");

// Delete block
if(isset($_POST['delete_User'])){
    $delete_the_user = $_POST['Userdelete'];
    $count = count($delete_the_user);
    for ($i=0; $i < $count ; $i++) { 
        mysqli_query($connect, "DELETE FROM users WHERE id_user = '$delete_the_user[$i]'");
    }
    header('Location:/admins_page.php');
}
// Edit block
if(isset($_POST['ChangeUser'])){
    $inputNum = (count($_POST)/2) - 1;
    for ($i=0; $i < $inputNum ; $i++) 
    { 
        $nameItem  = $_POST["Name$i"];
        $statusItem  = $_POST["Status$i"];
        $elemId = $_POST["$i"];
            $checkIfEmailExist  = mysqli_num_rows(mysqli_query($connect, "SELECT Email FROM users WHERE Email = '$emailItem'"));
                mysqli_query($connect, "UPDATE users SET Username = '$nameItem' ,  `Status` = '$statusItem' WHERE id_user = '$elemId'");
    }
    header('Location:/admins_page.php');
}
?>
