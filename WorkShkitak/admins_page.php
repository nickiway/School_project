<?php
require "php_func/connection.php";
//The news start
$news_way = "News_Images/";
//If isset Submit news
$images="";
if(isset($_POST['Submit_news']))
{
    $images_array = $_FILES['Images']['name'];
    if(count($images_array) >= 3)
    {
        $news_date = date("M j"); 
        $news_text = $_POST['the_text_of_news'];    
        $news_title = $_POST['title'];
        for ($i=0; $i < count($images_array); $i++) 
        { 
            $file_tmp_name = $_FILES['Images']['tmp_name'][$i];
            $file_name = $_FILES['Images']['name'][$i];
            move_uploaded_file($file_tmp_name,$news_way.$file_name);
            $images .= $_FILES['Images']['name'][$i]." ";  
        }
        if(empty($news_text) || empty($news_title) || empty($images) || empty($news_date))  $counter = 1;
        if($counter != 1){
            mysqli_query($connect, "INSERT INTO `news` (title_news,text_news,Image_news,Link,Date_news) VALUES ('$news_title','$news_text','$images','google.com','$news_date')");
        }
        else
        {
            die("nuh");
        }
    }
    else
    {
        die("<p align = center>Nug</p>");
    }
}
//The news end
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/admins_page.css">
    <link rel="stylesheet" href="css/common.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <title>Admins Page</title>
</head>
<body>
     <!-- Up button -->
     <a href="#" class="back-to-top"><img src="../icons/up.svg" alt=""></a>
    <!--Pre_loader -->
    <div class="preloader">
        <p class = "preloader__items"><img src="../icons/beach.png"> 𝒲ℯ𝓁𝒸ℴ𝓂ℯ <img src="../icons/beach.png"></p> 
    </div>
    <div class="main"> 
        <div class="main__pannel" >
            <div class="main__user"><img src="./avatars/<?=$_SESSION['logged_user']['avatar']?>" alt="">Administarator 🔑</div>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            <hr>
            <div class="main__pannel__item" onclick = "get_tabs('mail')"><a data-toogle = 'tab' href="#mail"><img src="../icons/email.svg" alt="">Mailing Table</a></div>
            <div onclick = "get_tabs('users')" class="main__pannel__item"><img src="../icons/profile.svg" alt="">Users Table</div>
            <div onclick = "get_tabs('countries')" class="main__pannel__item"><img src="../icons/country.svg" alt="">Countries Table</div>
            <hr>
            <div onclick = "get_tabs('create-news')" class="main__pannel__item"><img src="../icons/country.svg" alt="">Create and post last news</div>
            <hr>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            
        </div>
        
        <div class="main-statistic">
            <div class="main__header">
            </div>
            <div class="main__table">
                <div class =  "tabscontent" id="users">
                    <?

                    ?>
                </div>

<!-- News Form Start -->
    <div class =  "tabscontent" id="create-news">
        <div class="add-news">
            <form method = "post" enctype="multipart/form-data">
                <div class="add-news__item">
                    <p class = "add-news__title">Add the new's title</p>
                    <input placeholder = "Enter news title" type="text" name = "title">
                    <p class = "add-news__title">Add the new's text</p>
                    <textarea placeholder = "Enter news" name="the_text_of_news" id="" cols="60" rows="10"></textarea>
                    <p class = "add-news__title">Choose at least 3 images</p>
                    <input  placeholder = "Chose images (at least 3)" type="file"  name="Images[]" accept="image" multiple>
                    <input type="submit" name = "Submit_news" value="Submit">
                </form>
            </div>
        </div>
    </div>
<!-- News Form End -->

                <div  class =  "tabscontent" id="mail">
                    <form method = 'post'>
                        <table border= "1">
                            <Caption>Email Information</Caption>
                                <tr>
                                    <th>Choose</th>
                                    <th>The users Id</th>
                                    <th>The users Email</th>
                                    <th>The Date of registration</th>
                                </tr>
                                    <?while($mail = mysqli_fetch_assoc($get_mail)){
                                    $email = $mail['email'];    
                                    $id = $mail['ID'];   
                                    $date_reg = $mail['date_reg']; 
                            echo "
                                <tr style ='color:red;'>
                                    <td><input type = 'checkbox' name = 'delete[]' value = '$id'></td>
                                    <td>$id</td>
                                    <td>$email</td>
                                    <td>$date_reg</td>
                                </tr>";
                                }
                            ?>
                            </table>
                            <?    echo "<span style= 'margin:10px;'><a  style = 'color:red' href = 'admins_page.php?mail_table=1'><<</a></span>";
                            for ($i=1; $i <= $num_rows ; $i++) { 
                            echo "<span style= 'margin:10px;'><a style = 'color:red' href = 'admins_page.php?mail_table=$i'>$i</a></span>";
                        }
                        echo "<span style= 'margin:10px;'><a style = 'color:red' href = 'admins_page.php?mail_table=$num_rows'>>></a></span>";
                        ?>
                            <input type="submit" name = 'delete_mail'>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src = "js/common.js"></script> 
<script src = "js/tabs.js"></script>   
</body>
</html>