<?php
require "php_func/connection.php";
$error_mailing = "";
$mailing_warning = "";
if($_POST['submit_mail']){
    $email_mail = substr(htmlspecialchars(trim($_POST['email_mail'])),0,100);
    $check_mail = mysqli_query($connect, "SELECT email FROM mailing WHERE email = '$email_mail'");
    if(mysqli_num_rows($check_mail) < 1){
    if(filter_var($email_mail, FILTER_VALIDATE_EMAIL) && preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$email_mail)){
        $sql_mail = "INSERT INTO mailing (email, date_reg) VALUES ('$email_mail',NOW())";
        mysqli_query($connect, $sql_mail);
        $style_input  ='border-color:green;';
        $error_mailing = "display:block;color:green";
        $mailing_warning = "You have subscriped successfully :)";    
    }
    else{
    $the_text_email = $_POST['email_mail'];
    $error_mailing = "display:block;color:red;";
    $style_input  ='border-color:red;';
    $mailing_warning = "The email is incorect :(";
}
}
else{
    $the_text_email = $_POST['email_mail'];
    $error_mailing = "display:block;color: #ff9999;";
    $style_input  ='border-color:red;';
    $mailing_warning = "This email has been used already";   
}
}
?>