<?
$page_num  = $_GET['mail_table'];
if($page_num == "" || $page_num == "1"){
    $page_num = 1;
}
else{
    $page_num = $page_num * 5 - 5;
}
if(!isset($_SESSION['logged_user']) || $_SESSION['logged_user']['Username'] != 'Admin'){
    header('Location:/index.php');
}
$all_rows = mysqli_query($connect, "SELECT * FROM mailing ORDER BY ID ASC");
$num_rows =ceil(mysqli_num_rows($all_rows)/5); 
if(isset($_POST['delete_mail'])){
    $delete_the_email = $_POST['delete'];
    $count = count($delete_the_email);
    for ($i=0; $i < $count ; $i++) { 
        mysqli_query($connect, "DELETE FROM mailing WHERE ID = '$delete_the_email[$i]'");
    }
}
$get_mail = mysqli_query($connect, "SELECT * FROM mailing ORDER BY ID ASC LIMIT $page_num,5");
?>