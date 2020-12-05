<?
  if (isset($_POST['mailingButton'])) {
    $title = $_POST['title'];
    $massege = $_POST['massege'];
    $getAllMailAccounts = mysqli_query($connect, "SELECT email FROM mailing");
    while ($row =  mysqli_fetch_assoc($getAllMailAccounts)) {
        mail("$row[email]","$title", "$massege"); 
    }

    }  
?>