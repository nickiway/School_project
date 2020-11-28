<?php
require "php_func/connection.php";
require "php_func/adminAddNews.php";
require "php_func/Mail.php";
require "php_func/Users.php";
require "php_func/UsersOrders.php";
require "php_func/AvailabelHotels.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admins_page.css">
    <link rel="stylesheet" href="css/helper.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/media.css">
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
    <div class="Admin_main"> 
        <div class="main__pannel" >
            <div class="main__user">Master Admin</div>
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
            <hr>
            <div onclick = "get_tabs('mail')"  class="main__pannel__item">
                <img src="../icons/email.svg" alt="">Mailing Table
            </div>
            <div onclick = "get_tabs('users')" class="main__pannel__item"><img src="../icons/profile.svg" alt="">Users Table</div>
            <div onclick = "get_tabs('Usersorder')" class="main__pannel__item"><img src="../icons/country.svg" alt="">Recent Orders</div>
            <div onclick = "get_tabs('availableOrders')" class="main__pannel__item"><img src="../icons/news.png" alt="">Create and post last news</div>
            <hr>
            <div onclick = "get_tabs('create-news')" class="main__pannel__item"><img src="../icons/news.png" alt="">Create and post last news</div>
            <hr>
           
        </div>
        
        <div class="main-statistic">
            <div class="main__header">
                <div class = 'admin__basic-info'>
                    <button id = 'toogleMenuAdmin'>What</button>
                    <img src="<?= "../avatars/".$_SESSION['logged_user']['avatar']?>" alt="avatr">
                    <span><?= $_SESSION['logged_user']['Username']?></span>
                </div>
            </div>
            <!-- USER TABLE -->
            <div class="main__table">
                <div class =  "tabscontent" id="users">
                    <form class = "TableUsers" method = 'post'>
                        <table>
                            <h2 align = center>Users table</h2>
                                <tr>
                                    <th>Tick the user</th>
                                    <th>The user's Id</th>
                                    <th>The user's Name</th>
                                    <th>The user's Password</th>
                                    <th>The user's Email</th>
                                    <th>The user's Status</th>
                                </tr>
                                <?
                                while($user = mysqli_fetch_assoc($getUser)){
                                    $UserEmail = $user['Email'];    
                                    $UserId = $user['id_user'];    
                                    $UserName = $user['Username'];   
                                    $UserPassword = $user['Password_U']; 
                                    $UserAvatar = $user['avatar']; 
                                    $UserStatus = $user['Status']; 
                                echo "
                                    <tr class = 'UserTd' id = '".$UserId.'Us'."'>
                                        <td>
                                            <input type = 'checkbox' class ='checkBoxUser' name = 'Userdelete[]' onclick = 'checkedRowUser($UserId)' id = '$UserId' value = '$UserId'>
                                        </td>
                                        <td>$UserId</td>
                                        <td>$UserName</td>
                                        <td>$UserPassword</td>
                                        <td>$UserEmail</td>
                                        <td>$UserStatus</td>
                                    </tr>";
                                    }
                                ?>
                        </table>
                        <div class="switch__block">
                            <div class="">
                            <p class = "switch__block-item">
                                <?    echo "<span class ='table__switcher'><a  href = 'admins_page.php?user_table=1'><<</a></span>";
                                for ($i=1; $i <= $usersNumRows ; $i++) { 
                                echo "<span class ='table__switcher'><a href = 'admins_page.php?user_table=$i'>$i</a></span>";
                                }
                                echo "<span class ='table__switcher'><a href = 'admins_page.php?user_table=$usersNumRows'>>></a></span>";
                            ?>
                            </p>
                                <div class=" switch__block-item">
                                    <input type="submit" class = "DeleteUser" name = 'delete_User' value = "Delete">
                                    <input type="submit" class = "EditUser" name = 'edit_User' value = "Edit">            
                                    <button  type = "button" id = "CancelUser" value ="Cancel">Cancel</button>
                                    <button  type = "button" id = "ChoseAllUser" value ="Cancel">Choose All</button>
                                </div>
                            </div>    
                        </div>
                            <?

                        if(isset($_POST['edit_User'])){
                            echo"<div class='edits'>
                            <div class='edits__item'>
                            <form method='post'>";
                            $edit = $_POST['Userdelete'];
                            $count  = count($edit);
                            for ($i=0; $i < $count; $i++) { 
                                $nameToCorrect = mysqli_fetch_assoc(mysqli_query($connect, "SELECT Username FROM users WHERE id_user = '$edit[$i]'"));

                                $statusToCorrect = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `Status` FROM users WHERE id_user = '$edit[$i]'"));
                                echo "               
                                <p class ='edit__title'>Edit Parametrs of User Row № ".$edit[$i]."</p>
                                  <input class ='edit__input' name = 'Name$i' placeholder= '$nameToCorrect[Username]' value = '$nameToCorrect[Username]' type='text'>
                                  
                                  <select class = 'edit__input' name='Status".$i."'>
                                    <option value='Standart'>Standart</option>
                                    <option value='Admin'>Admin</option>
                                  </select>
                                  <input  type='text' hidden name = '$i' value = '$edit[$i]'>  
                                  <hr>
                                ";           
                            }
                            echo"
                                <input type = 'submit' class = 'standartStyle' value = 'Commit changes' name = 'ChangeUser'>
                            </form>
                            </div>
                        </div>";
                            }
                        ?>
                    </form>
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
                    <input  placeholder = "Chose images (at least 3)" type="file" id = "file-selector"  name="Images[]" accept=".jpg, .jpeg, .png" multiple>
                    <div class="news-source__input">
                        <label class = 'file-button__lable' for="file-selector"><div class = "file__button" for="file-selector">Ckick here to select files</div></label>
                    </div>

                    <input type="submit" name = "Submit_news" value="Submit">
                </form>
            </div>
        </div>
    </div>
<!-- News Form End -->
<!-- Mailing Table -->
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
                                <tr class = 'MailTd' id = '".$id.'Td'."'>
                                    <td><input type = 'checkbox' class ='checkBox' name = 'delete[]' onclick = 'checkedRow($id)' id = '".$id."Mail' value = '$id'></td>
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
                                <button  type = "button" id = "Cancel" value ="Cancel">Cancel</button>
                                <button  type = "button" id = "ChoseAll" value ="Cancel">Choose All</button>
                            </div>
                            
                            <?
                        //Edit block
                        if(isset($_POST['edit_mail'])){
                            echo"<div class='edits'>
                            <div class='edits__item'>
                                <form method='post'>";
                            $edit = $_POST['delete'];
                            $count  = count($edit);
                            for ($i=0; $i < $count; $i++) { 
                                $mailToCorrect = mysqli_fetch_assoc(mysqli_query($connect, "SELECT email FROM mailing WHERE id = '$edit[$i]'"));
                                echo "                                        
                                <p class ='edit__title'>Edit Mail Row № ".$edit[$i]."</p>
                                  <input class ='edit__input' placeholder= '$mailToCorrect[email]' type='text' name = 'Email".$i."'>
                                  <input  type='text' hidden name = '$i' value = '$edit[$i]'>       
                                ";           
                            }
                            echo"
                                <input type = 'submit' class = 'standartStyle' value = 'Commit changes' name = 'ChangeMail'>
                            </form>
                            </div>
                        </div>";
                            }
                        ?>
                        </div>
                    </form>
                </div>  
                </div>   
<!-- End of Email Table -->

<!-- Order's Table -->
<div  class =  "tabscontent" id="availableOrders">
                    <form class = "TableAdmin" method = 'post'>
                        <table>
                            <h2 align = center>Available hotels table</h2>
                                <tr>
                                    <th>Tick the order you need</th>
                                    <th>The order's Id</th>
                                    <th>The Hotel</th>
                                    <th>Cost (in $)</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Type of the Hotel</th>
                                    <th>Rooms</th>
                                    <th>Breackfast included</th>
                                </tr>
                                    <?while($proposition = mysqli_fetch_assoc($getAvailableHotels)){
                                    $id = $proposition['id'];
                                    $hotel = $proposition['Hotel'];
                                    $cost = $proposition['Cost'];
                                    $dateStart = $proposition['DateStart'];
                                    $dateEnd = $proposition['DateEnd'];
                                    $HotelType = $proposition['Type'];
                                    $rooms = $proposition['Rooms'];
                                    if ($proposition['breakfastInclude'] == 1) {
                                        $breakfastImage = 'yes.png';
                                    }
                                    else{
                                        $breakfastImage ='no.png';
                                    }
                                    if ($proposition['breakfastInclude'] == 1) {
                                        $breakfastImage = 'yes.png';
                                    }
                                    else{
                                        $breakfastImage ='no.png';
                                    }

                            echo "
                                <tr class = 'MailTd' id = '".$id.'Ava'."'>
                                    <td><input type = 'checkbox' class ='checkBoxAvailable' name = 'Availabledelete[]'
                                    id = '".$id."Available' onclick = 'checkedRowAvailable($id)'  value = '$id'></td>
                                    <td>$id</td>
                                    <td>$hotel  </td>
                                    <td>$cost</td>
                                    <td>$dateStart</td>
                                    <td>$dateEnd</td>
                                    <td>$HotelType</td>
                                    <td>$rooms</td>
                                    <td><img src='".ICONDIR."$breakfastImage' alt='Breakfast'></td>

                                </tr>";
                                }
                            ?>
                        </table>
                    <div class="switch__block">
                        <div class="">
                        <p class = "switch__block-item">
                            <?    echo "<span class ='table__switcher'><a  href = 'admins_page.php?avahotels=1'><<</a></span>";
                            for ($i=1; $i <= $numRowsAva ; $i++) { 
                            echo "<span class ='table__switcher'><a href = 'admins_page.php?mail_table=$i'>$i</a></span>";
                            }
                            echo "<span class ='table__switcher'><a href = 'admins_page.php?mail_table=$numRowsAva'>>></a></span>";
                        ?>
                        </p>
                            <div class=" switch__block-item">
                                <input type="submit" class = "Delete" name = 'delete_mail' value = "Delete">
                                <input type="submit" class = "Edit" name = 'edit_mail' value = "Edit">            
                                <button  type = "button" id = "Cancel" value ="Cancel">Cancel</button>
                                <button  type = "button" id = "ChoseAll" value ="Cancel">Choose All</button>
                            </div>
                            
                            <?
                        //Edit block
                        if(isset($_POST['edit_mail'])){
                            echo"<div class='edits'>
                            <div class='edits__item'>
                                <form method='post'>";
                            $edit = $_POST['delete'];
                            $count  = count($edit);
                            for ($i=0; $i < $count; $i++) { 
                                $mailToCorrect = mysqli_fetch_assoc(mysqli_query($connect, "SELECT email FROM mailing WHERE id = '$edit[$i]'"));
                                echo "                                        
                                <p class ='edit__title'>Edit Mail Row № ".$edit[$i]."</p>
                                  <input class ='edit__input' placeholder= '$mailToCorrect[email]' type='text' name = 'Email".$i."'>
                                  <input  type='text' hidden name = '$i' value = '$edit[$i]'>       
                                ";           
                            }
                            echo"
                                <input type = 'submit' class = 'standartStyle' value = 'Commit changes' name = 'ChangeMail'>
                            </form>
                            </div>
                        </div>";
                            }
                        ?>
                        </div>
                    </form>
                </div>  
                </div>   
<!-- End of Order's Table -->

<!-- User's order Table -->
                <div  class =  "tabscontent" id="Usersorder">
                    <form class = "TableOrders" method = 'post'>
                        <table>
                            <h2 align = center>Recent orders of tours</h2>
                                <tr>
                                    <th>Tick the order</th>
                                    <th>Date</th>
                                    <th>Ordered hotel</th>
                                    <th>The users Id</th>
                                    <th>The users Phone</th>                                <th>Recall Time</th>                                
                                    <th>User's Email</th>
                                    <th>Was it exemined?</th>
                                </tr>
                                    <?while($order = mysqli_fetch_assoc($getOrder)){
                                    $email = $order['UsersEmail'];    
                                    $id = $order['id'];   
                                    $phone = $order['Phone']; 
                                    $recallTime = $order['Recall_time'];
                                    $OrderedHotel = $order['Hotel'];
                                    $DateSend = $order['Date'];
                                    $UsersEmail = $order['UsersEmail']; 
                                    $examinedBool = $order['Examined'];
                                    $progressImage = "";
                                    if ($examinedBool == 0) {
                                        $progressImage = "warning.png";
                                    } 
                                    else if($examinedBool == 1){
                                        $progressImage = "yes.png";
                                    }
                                    else{
                                        $progressImage = "no.png";   
                                    }
                            echo "
                                <tr class = 'OrdersTd' id = '".$id.'TrOr'."'>
                                    <td><input type = 'checkbox' class ='checkBoxOrder' name = 'Orderdelete[]' onclick = 'checkedRowOrder($id)' id = '".$id."Or' value = '$id'></td>
                                    <td>$id</td>
                                    <td>$DateSend</td>
                                    <td>$OrderedHotel</td>
                                    <td>$phone</td>
                                    <td>$recallTime</td>
                                    <td>$UsersEmail</td>
                                    <td><img src='".ICONDIR.$progressImage."' alt='result'></td>
                                </tr>";
                                }
                            ?>
                        
                        </table>
                        <p class = "switch__block-item">
                            <?    echo "<span class ='table__switcher'><a  href = 'admins_page.php?orders=1'><<</a></span>";
                            for ($i=1; $i <= $OrdersNumRows ; $i++) { 
                            echo "<span class ='table__switcher'><a href = 'admins_page.php?orders=$i'>$i</a></span>";
                            }
                            echo "<span class ='table__switcher'><a href = 'admins_page.php?orders=$OrdersNumRows'>>></a></span>";
                        ?>
                        </p>
                        <div class="switch__block">

                        <div class=" switch__block-item">
                                <input type="submit" class = "Commit" name = 'CommitOrder' value = "" style = "background-image:url(icons/yes.png)">

                                <input type="submit" class = "Undefined" name = 'UndefinedOrder' value = "" style = "background-image:url(icons/warning.png)">

                                <input type="submit" class = "Reject" name = 'RejectOrder' value = "" style = "background-image:url(icons/no.png)">            

                                <button  type = "button" id = "CancelOrders" value ="Cancel">Cancel</button>

                                <button  type = "button" id = "ChoseAllOrders" value ="Cancel">Choose All</button>
                            </div>
                        </div>
                    </form>

                </div>   
                </div>
            </div>
        </div>
        </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src = "js/common.js"></script> 
<script src = "js/admin.js"></script>   
</body>
</html>