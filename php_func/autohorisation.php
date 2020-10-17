<?php
require "php_func/connection.php";
session_start();
$file_diraction = "avatars/";
// Error style
$error_passwordConfirm = "display:none";
$error_password = "display:none";
$email_warning = "";
$password_warning ="";
$succes = "";
$error_email = "display:none";
$error_name = "display:none";
if($_POST['submit']){
        if($_FILES['avatar']['name'] != ""){
        $file_name = $_FILES['avatar']['name'];
        $file_tmp_name = $_FILES['avatar']['tmp_name'];
        }
        else{
        $file_name = "default.png"; 
        $file_tmp_name = $file_name;
        }
        move_uploaded_file($file_tmp_name,$file_diraction.$file_name);
    // Var
    $user_email = $_POST['email'];
    $user_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $user_passwordConfirm = $_POST['passwordConfirm'];
    $user_name = $_POST['name'];
    $register = "INSERT INTO users (Username,Password_U,Email,avatar) VALUES ('$user_name' ,'$user_password', '$user_email', '$file_name')";
    $check_user = "SELECT Email FROM users WHERE Email = '$user_email'";
    $users_info = mysqli_query($connect,$check_user);
    $errors = array();
    if(!password_verify($user_passwordConfirm  , $user_password)){
        $error_passwordConfirm = "display:block";
        $errors [] = 'no';
     }
    if(strlen($user_password) < 7 ){
        $error_password = "display:block";
        $password_warning = "Your password is too short the minimal length is 7 simbols.";
        $errors [] = 'no';
     } 
    if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i" , $user_email) && !filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        $error_email = "display:block";
        $email_warning = "Your email does not exists, try another one.";
        $errors [] = 'no';
    }
    if(!preg_match("/^[a-zA-Zа-яА-Я]+$/ui",$user_name)){
        $errors [] = 'no';
        $error_name = "display:block";
     }  
    if (mysqli_num_rows($users_info) >= 1){
        $errors [] = 'no';
        $error_email = "display:block";
        $email_warning = "This email has already been used, try another one.";
    }
    if(empty($errors) && mysqli_num_rows($users_info) < 1){
        mysqli_query($connect,$register);
         $succes = "display:block";
    }
}
if($_POST['login']){
$email = $_POST['login_email'];
$pass = $_POST['login_password'];
$result = mysqli_query($connect,"SELECT * FROM users WHERE Email = '$email'");
$user = mysqli_fetch_assoc($result);
if(count($user) == 0){
$error_email = "display:block";
$email_warning ="You have entered icorect email or it's does not exists, register if u do not have an account yet ";
}
else{
if(!password_verify($pass,  $user['Password_U'])){
$error_password = "display:block";
$password_warning = "The password is incorect.";
}
if(password_verify($pass,  $user['Password_U'])){
$_SESSION['logged_user'] = $user;
header('Location:/');
} 
}
}
?>