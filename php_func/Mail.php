<?
// Pages work
$numOfRows = 15;
$page_num  = $_GET['mail_table'];
if($page_num == "" || $page_num == "1"){
    $page_num = 1;
}
else{
    $page_num = $page_num * $numOfRows - ($numOfRows-1);
}
if(!isset($_SESSION['logged_user']) || $_SESSION['logged_user']['Status'] != 'Admin'){
    header('Location:/index.php');
}
$all_rows = mysqli_query($connect, "SELECT * FROM mailing ORDER BY ID ASC");
$num_rows =ceil(mysqli_num_rows($all_rows)/$numOfRows); 
$get_mail = mysqli_query($connect, "SELECT * FROM mailing ORDER BY ID ASC LIMIT $page_num,$numOfRows");
// Delete block
if(isset($_POST['delete_mail'])){
    $delete_the_email = $_POST['delete'];
    $count = count($delete_the_email);
    for ($i=0; $i < $count ; $i++) { 
        mysqli_query($connect, "DELETE FROM mailing WHERE ID = '$delete_the_email[$i]'");
    }
    header('Location:/admins_page.php');
}
// Edit block
if(isset($_POST['ChangeMail'])){
    $inputNum = (count($_POST)/2) - 1;
    for ($i=0; $i < $inputNum ; $i++) { 
        $emailItem  = $_POST["Email$i"];
        $elemId = $_POST["$i"];
        if (preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$emailItem)) 
        {
            $checkIfEmailExist  = mysqli_num_rows(mysqli_query($connect, "SELECT email FROM mailing WHERE email = '$emailItem'"));
            if($checkIfEmailExist == 0) 
                mysqli_query($connect, "UPDATE mailing SET email = '$emailItem' WHERE ID = '$elemId'");
            else{
                die("you have entered incorect email");
            }
        }
        else{
            continue;
        }
    }
    header('Location:/admins_page.php');
}
?>