<?php
require "php_func/connection.php";
require "php_func/adminAddNews.php";
require "php_func/Mail.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/admins_page.css">
    <link rel="stylesheet" href="css/helper.css">
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
            <div class="main__user">Master Admin</div>
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
                <div class = 'admin__basic-info'>
                    <img src="<?= "../avatars/".$_SESSION['logged_user']['avatar']?>" alt="avatr">
                    <span><?= $_SESSION['logged_user']['Username']?></span>
                </div>
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
                    <form class = "TableAdmin" method = 'post'>
                        <table>
                            <h2 align = center>Mail distribution table</h2>
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
                                <tr id = '".$id.'Td'."'>
                                    <td><input type = 'checkbox' name = 'delete[]' onclick = 'checkedRow($id)' id = '$id' value = '$id'></td>
                                    <td>$id</td>
                                    <td>$email</td>
                                    <td>$date_reg</td>
                                </tr>";
                                }
                            ?>
                        </table>
                    <div class="switch__block">
                        <div class="">
                        <p class = "switch__block-item">
                            <?    echo "<span class ='table__switcher'><a  href = 'admins_page.php?mail_table=1'><<</a></span>";
                            for ($i=1; $i <= $num_rows ; $i++) { 
                            echo "<span class ='table__switcher'><a href = 'admins_page.php?mail_table=$i'>$i</a></span>";
                            }
                            echo "<span class ='table__switcher'><a href = 'admins_page.php?mail_table=$num_rows'>>></a></span>";
                        ?>
                        </p>
                            <div class=" switch__block-item">
                                <input type="submit" class = "Delete" name = 'delete_mail' value = "Delete">
                                <input type="submit" class = "Edit" name = 'edit_mail' value = "Edit">
                            </div>
                            <?
                        //Edit block
                        if(isset($_POST['edit_mail'])){
                            $edit = $_POST['delete'];
                            $count  = count($edit);
                            for ($i=0; $i < $count; $i++) { 
                                echo "
                            <div class='edit'>
                                <div class='edit__item'>
                                    <p class ='edit__title'>Edit Mail Row № ".$edit[$i]."</p>
                                    <form method='post'>

                                        <input type='text'>
                                    </form>
                                </div>
                            </div>
                                ";
                            }
                            }
                        ?>
                        </div>
                    </div>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
<script src = "js/common.js"></script> 
<script src = "js/tabs.js"></script>   
</body>
</html>