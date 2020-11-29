<?php
require "php_func/connection.php";
require "php_func/adminAddNews.php";
require "php_func/Mail.php";
require "php_func/Users.php";
require "php_func/UsersOrders.php";
require "php_func/AvailabelHotels.php";
require "php_func/mailingsender.php";
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
            <div onclick = "get_tabs('availableOrders')" class="main__pannel__item"><img src="../icons/news.png" alt="">Hotels Table</div>
            <hr>
            <div onclick = "get_tabs('create-news')" class="main__pannel__item"><img src="../icons/news.png" alt="">Create and post last news</div>
            <div onclick = "get_tabs('mailing')" class="main__pannel__item"><img src="../icons/news.png" alt="">Mail to everyone</div>
            <hr>
            <button id = 'toogleMenuAdmin2' class = "standartStyle">Get Menu</button>
        </div>
        
        <div class="main-statistic">
            <div class="main__header">
                <div class = 'admin__basic-info'>
                <ul class = "menu__ul">
                    <li class="menu__item darked-text" onclick = "window.location.href='about.php'">About us</li>
                    <li class="menu__item darked-text"onclick = "window.location.href='order_tour.php'">Order the tour</li>
                    <li class="menu__item darked-text"onclick = "window.location.href='WeaterInformation.php'">About Weather</li>
                    <li class="menu__item darked-text"onclick = "window.location.href='index.php'">Main Page</li>
                    <button id = 'toogleMenuAdmin' class = "standartStyle">Get Menu</button>
                </ul>
                    <img src="<?= "../avatars/".$_SESSION['logged_user']['avatar']?>" alt="avatr">
                    <span><?= $_SESSION['logged_user']['Username']?></span>
                </div>
            </div>

    <!-- MAILING -->
                
<div class="main__table">
            <div class =  "tabscontent" id="mailing">
            <div class="add-news">
                <form method = post >
                    <p class = "add-news__title">Title</p>
                    <input require name = 'title' type="text">
                    <p class = "add-news__title">Massege</p>
                    <textarea require name="mailingButton" id="mailingButton" cols="30" rows="10"></textarea>
                    <input type="submit" name= "" value="Send">
                </form>
            </div>  
        </div>

<!-- USER TABLE -->
            
                <div class =  "tabscontent" id="users">
                    <form class = "TableUsers" method = 'post'>
                        <table>
                            <h2 align = center>Users table</h2>
                                <tr>
                                    <th>Tick the user</th>
                                    <th>The user's Id</th>
                                    <th>The user's Name</th>
                                    <th  class = 'AvailableHotelMedia'>The user's Password</th>
                                    <th class = 'AvailableHotelMedia'>The user's Email</th>
                                    <th class = 'AvailableHotelMedia'>The user's Status</th>
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
                                        <td class = 'AvailableHotelMedia'>$UserPassword</td>
                                        <td class = 'AvailableHotelMedia'>$UserEmail</td>
                                        <td class = 'AvailableHotelMedia'>$UserStatus</td>
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
    <p id="file_demo">
    </p>
        <div class="add-news">
            <form method = "post" id = "createNews" enctype="multipart/form-data">
                <div class="add-news__item">
                    <p class = "add-news__title">Add the new's title</p>
                    <input placeholder = "Enter news title" type="text" name = "title">

                    <p class = "add-news__title">Add the new's text</p>
                    <textarea placeholder = "Enter news" name="the_text_of_news" id="" cols="60" rows="10"></textarea>
                    
                    <p class = "add-news__title">Choose at least 3 images</p>
                    <input  placeholder = "Chose images (at least 3)" type="file" id = "file-selector"  name="Images[]" onchange="myFunction()" accept=".jpg, .jpeg, .png" multiple>
                    <div class="news-source__input">
                        <label class = 'file-button__lable' for="file-selector"><div class = "file__button" for="file-selector">Ckick here to select files</div></label>
                    </div>
                    <script>
                        function myFunction(){
                            var x = document.getElementById("file-selector");
                            var txt = "";
                            if ('files' in x) {
                                if (x.files.length == 0) {
                                txt = "Select one or more files.";
                                } else {
                                for (var i = 0; i < x.files.length; i++) {
                                    txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                                    var file = x.files[i];
                                    if ('name' in file) {
                                    txt += "name: " + file.name + "<br>";
                                    }
                                    if ('size' in file) {
                                    txt += "size: " + file.size + " bytes <br>";
                                    }
                                }
                                }
                            } 
                            else {
                                if (x.value == "") {
                                txt += "Select one or more files.";
                                } else {
                                txt += "The files property is not supported by your browser!";
                                txt  += "<br>The path of the selected file: " + x.value; 
                                }
                            }
                            $('#file_demo').fadeIn();
                            document.getElementById("file_demo").innerHTML = txt;
                            }
                    </script>
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
                                    <th class = 'AvailableHotelMedia'>Date Start</th>
                                    <th class = 'AvailableHotelMedia'>Date End</th>
                                    <th class = 'AvailableHotelMedia'>Type of the Hotel</th>
                                    <th class = 'AvailableHotelMedia'>Rooms</th>
                                    <th class = 'AvailableHotelMedia'>Hotel Square (м²)</th>
                                    <th class = 'AvailableHotelMedia'>Beds</th>
                                    <th class = 'AvailableHotelMedia'>Smoking Allowed</th>
                                    <th class = 'AvailableHotelMedia'>Spa Salon</th>
                                    <th class = 'AvailableHotelMedia'>Condicioner</th>
                                    <th class = 'AvailableHotelMedia'>Pet friendly</th>
                                    <th class = 'AvailableHotelMedia'>Breackfast included</th>
                                </tr>
                                    <?while($proposition = mysqli_fetch_assoc($getAvailableHotels)){
                                    $id = $proposition['id'];
                                    $hotel = $proposition['Hotel'];
                                    $cost = $proposition['Cost'];
                                    $dateStart = $proposition['DateStart'];
                                    $dateEnd = $proposition['DateEnd'];
                                    $HotelType = $proposition['Type'];
                                    $rooms = $proposition['Rooms'];
                                    $Pet = $proposition['Pet friendly'];
                                    $Square = $proposition['Total S'];
                                    $beds = $proposition['Beds'];
                                    $Available = $proposition['Available'];
                                    //  Breakfast
                                    if ($proposition['breakfastInclude'] == 1) {
                                        $breakfastImage = 'yes.png';
                                    }
                                    else{
                                        $breakfastImage ='no.png';
                                    }
                                    // Smoking
                                    if ($proposition['For smoking'] == 1) {
                                        $Smoking = 'yes.png';
                                    }
                                    else{
                                        $Smoking ='no.png';
                                    }
                                    // Pet friendly 
                                    if ($proposition['Pet friendly'] == 1) {
                                        $Pet = 'yes.png';
                                    }
                                    else{
                                        $Pet ='no.png';
                                    }
                                    //Smoking
                                    if ($proposition['Spa Salon'] == 1) {
                                        $Spa = 'yes.png';
                                    }
                                    else{
                                        $Spa  ='no.png';
                                    }
                                    //Condicioner
                                    if ($proposition['Condicioner'] == 1) {
                                        $Condidcioner = 'yes.png';
                                    }
                                    else{
                                        $Condidcioner ='no.png';
                                    }
                                    if ($Available == 0 || $dateStart <= date("Y-m-d")) {
                                        $classAvailable = "reded";
                                    }
                                    else{
                                        $classAvailable = "greened";
                                    }
                            echo "
                                <tr class = '$classAvailable AvailableTd' id = '".$id.'Ava'."'>
                                    <td><input type = 'checkbox' class ='checkBoxAvailable' name = 'Availabledelete[]'
                                    id = '".$id."Available' onclick = 'checkedRowAvailable($id)'  value = '$id'></td>
                                    <td>$id</td>
                                    <td>$hotel  </td>
                                    <td>$cost</td>
                                    <td class = 'AvailableHotelMedia'>$dateStart</td>
                                    <td class = 'AvailableHotelMedia'>$dateEnd</td>
                                    <td class = 'AvailableHotelMedia'>$HotelType</td>
                                    <td class = 'AvailableHotelMedia'>$rooms</td>
                                    <td class = 'AvailableHotelMedia'>$Square</td>
                                    <td class = 'AvailableHotelMedia'>$beds</td>
                                    <td class = 'AvailableHotelMedia'><img src='".ICONDIR."$Smoking' alt='Pet'></td>
                                    <td class = 'AvailableHotelMedia'><img src='".ICONDIR."$Spa' alt='Pet'></td>
                                    <td class = 'AvailableHotelMedia'><img src='".ICONDIR."$Condidcioner' alt='Pet'></td>
                                    <td class = 'AvailableHotelMedia'><img src='".ICONDIR."$Pet' alt='Pet'></td>
                                    <td class = 'AvailableHotelMedia'><img src='".ICONDIR."$breakfastImage' alt='Breakfast'></td>
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
                                <input type="submit" class = "CreateAvailable" name = 'CreateAvailable' value = "Create New Order">
                                <input type="submit" class = "EditAvailable" name = 'EditAvailable' value = "Edit">            
                                <button  type = "button" id = "CancelAllAvailable" value ="Cancel">Cancel</button>
                                <button  type = "button" id = "ChoseAllAvailable" value ="Cancel">Choose All</button>
                            </div>
                            
                            <?
                        // Create 
                            if (isset($_POST['CreateAvailable'])) {        
                            echo"
                            <div class='CreateNewOrder'>
                                <div class='CreateNewOrder__body'>
                                    <form method = 'post'>
                                
                                        <p>Hotel Name</p>
                                        <p class = 'Create__item'>
                                            <select name='Hotel'>
                                            ";
                                            while ($row = mysqli_fetch_assoc($getAllHotels)) 
                                                {
                                                echo"<option value='".$row['HotelName']."'>".$row['HotelName']."</option>";
                                                }
                                echo"   </select>
                                        </p>
                                        
                                        <p>Date Start</p>
                                        <p class = 'Create__item'>
                                            <input type='date' name = 'dateStart'min = '$datemin'>
                                        </p>

                                        <p>Date End</p>     
                                        <p class = 'Create__item'>
                                            <input type='date' name = 'dateEnd' min = '$datemin'>
                                        </p>

                                        <p>Full cost</p>
                                        <p class = 'Create__item'>
                                            <input type='number' name = 'cost'>
                                        </p>


                                        <p>Number Type</p>
                                        <div class = 'Create__item'>
                                                <select name='Type'>
                                                    <option value='Standart'>Standart</option>
                                                    <option value='Lux'>Lux</option>
                                                    <option value='VIP'>VIP</option>
                                                </select>
                                        </div>
                                        
                                        <p>Number of Rooms</p>
                                        <p class = 'Create__item'>
                                            <input type='number' name = 'rooms'>
                                        </p>

                                        <p>Number of Beds</p>
                                        <p class = 'Create__item'>
                                            <input type='number' name = 'beds'>
                                        </p>

                                        <p>Breackfast included</p>
                                        <div class = 'Create__item'>
                                            <p class = 'Create__row'>
                                                <label for='breakfast1'>Yes</label>
                                                <input type='radio' id = 'breakfast1' value = '1' name = 'breakfast'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='breakfast0'>No</label>
                                                <input type='radio'id = 'breakfast0' value = '0' name = 'breakfast'>
                                            </p>
                                        </div>


                                        <p>Pet friendly</p>
                                        <div class = 'Create__item'>
                                        
                                            <p class = 'Create__row'>
                                                <label for='pet1'>Yes</label>
                                                <input type='radio' id = 'pet1' value = '1' name = 'pet'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='pet0'>No</label>
                                                <input type='radio'id = 'pet0' value = '0' name = 'pet'>
                                            </p>
                                        </div>


                                        <p>Smoking allowed</p>
                                        <div class = 'Create__item'>
                                        
                                            <p class = 'Create__row'>
                                                <label for='smoking1'>Yes</label>
                                                <input type='radio' id = 'smoking1' value = '1' name = 'smoke'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='smoking0'>No</label>
                                                <input type='radio'id = 'smoking0' value = '0' name = 'smoke'>
                                            </p>
                                        </div>

                                        <p>Spa Salon</p>
                                        <div class = 'Create__item'>
                                            <p class = 'Create__row'>
                                                <label for='spa1'>Yes</label>
                                                <input type='radio' id = 'spa1' value = '1' name = 'spa'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='spa0'>No</label>
                                                <input type='radio'id = 'spa0' value = '0' name = 'spa'>
                                            </p>
                                        </div>
                                    
                                        <p>Condicioner</p>
                                        <div class = 'Create__item'>
                                            <p class = 'Create__row'>
                                                <label for='cond1'>Yes</label>
                                                <input type='radio' id = 'cond1' value = '1' name = 'condicioner'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='cond0'>No</label>
                                                <input type='radio'id = 'cond0' value = '0' name = 'condicioner'>
                                            </p>
                                        </div>
                                        <div class = 'Create__item'>
                                                <input type='submit' name = 'CreateNewOrder' value='Create new Order'>
                                        </div>

                                    </form>
                                </div>
                            </div>";
                                $count = count($rowsToUpdate);   
                                for ($i=0; $i < $count ; $i++) { 
                                    mysqli_query($connect, "UPDATE `usersorders` SET Examined = '0' WHERE id = '$rowsToUpdate[$i]'");
                                }
                                header('Location:/admins_page.php');
                            }
                            if(isset($_POST['CreateNewOrder'])){
                                $getHotel = $_POST['Hotel'];
                                $dateStart = $_POST['dateStart'];
                                $dateEnd = $_POST['dateEnd'];
                                $Cost = $_POST['cost'];
                                $HotelType = $_POST['Type'];
                                $NumberRooms = $_POST['rooms'];
                                $S = rand(50,120);
                                $NumberBeds = $_POST['beds'];
                                $Breakfast = $_POST['breakfast'];
                                $Pet = $_POST['pet'];
                                $Smoke = $_POST['smoke'];
                                $Spa = $_POST['spa'];
                                $condicioner =  $_POST['condicioner'];
                                $s = mysqli_query($connect, "INSERT INTO  `propositons`(`Hotel`, `DateStart`, `DateEnd`, `Cost`, `breakfastInclude`, `Type`, `Rooms`, `Pet friendly`, `For smoking`, `Spa Salon`, `Total S`, `Beds`, `Condicioner`, `Available`) VALUES ('$getHotel','$dateStart','$dateEnd','$Cost', '$Breakfast', '$HotelType', '$NumberRooms','$Pet','$Smoke','$Spa','$S','$NumberBeds','$condicioner','1')");
                            }
                        //Edit block
                        if(isset($_POST['EditAvailable'])){
                            echo"<div class='edits'>
                            <div class='edits__item'>
                                <form method='post'>";
                            $edit = $_POST['Availabledelete'];
                            $count  = count($edit);
                            for ($i=0; $i < $count; $i++) { 
                                $AvailableTourToCorrect = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM propositons WHERE id = '$edit[$i]'"));
                                echo "               
                    <div class=''>                
                    <p class ='edit__title'>Edit № ".$edit[$i]."</p>
                    <div class='edit__availabelHotel'>                          
                            <div class='edit__colone'>
                                <form method = 'post'>
                                    <p>Change date of start</p>
                                    <input name = 'dateStart' required value = '$AvailableTourToCorrect[DateStart]' type='date' min = '$datemin'>

                                    <p>Change date of end</p>
                                    <input name = 'dateEnd' value = '$AvailableTourToCorrect[DateEnd]' type='date' min = '$datemin'>

                                    <p>New cost of the number</p>
                                    <input   required value = '$AvailableTourToCorrect[Cost]'  name = 'cost' type='number'>

                                    <p>The hotel`s type</p>
                                    <select name='hotelType' value = 'VIP'>
                                        <option selected value='Standart'>Standart</option>
                                        <option value='Lux'>Lux</option>
                                        <option value='VIP'>VIP</option>
                                    </select>
                                    
                                    <p>Number of the rooms</p>
                                    <input name = 'RoomNum' required type='text' value = '$AvailableTourToCorrect[Rooms]' >

                                    <p>Number of beds</p>
                                    <input type='number' required name = 'BedsNum' value = '$AvailableTourToCorrect[Beds]' >


                                    <p>Breackfast included</p>
                                        <div class = 'Create__item'>
                                            <p class = 'Create__row'>
                                                <label for='breakfast1'>Yes</label>
                                                <input type='radio' checked id = 'breakfast1' value = '1' name = 'breakfast'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='breakfast0'>No</label>
                                                <input type='radio'id = 'breakfast0' value = '0' name = 'breakfast'>
                                            </p>
                                        </div>

                                </div>
                                <div class='edit__colone'>


                                        <p>Pet friendly</p>
                                        <div class = 'Create__item'>
                                        
                                            <p class = 'Create__row'>
                                                <label for='pet1'>Yes</label>
                                                <input type='radio'checked id = 'pet1' value = '1' name = 'pet'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='pet0'>No</label>
                                                <input type='radio'id = 'pet0' value = '0' name = 'pet'>
                                            </p>
                                        </div>

                                        <p>Smoking allowed</p>
                                        <div class = 'Create__item'>
                                        
                                            <p class = 'Create__row'>
                                                <label for='smoking1'>Yes</label>
                                                <input type='radio'checked id = 'smoking1' value = '1' name = 'smoke'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='smoking0'>No</label>
                                                <input type='radio'id = 'smoking0' value = '0' name = 'smoke'>
                                            </p>
                                        </div>
                                        
                                        <p>Spa Salon</p>
                                        <div class = 'Create__item'>
                                            <p class = 'Create__row'>
                                                <label for='spa1'>Yes</label>
                                                <input type='radio'checked id = 'spa1' value = '1' name = 'spa'>
                                            </p>
                                            <p class = 'Create__row'>
                                                <label for='spa0'>No</label>
                                                <input type='radio'id = 'spa0' value = '0' name = 'spa'>
                                            </p>
                                        </div>
                                    
                                    <p>Condicioner</p>
                                    <div class = 'Create__item'>
                                        <p class = 'Create__row'>
                                            <label for='cond1'>Yes</label>
                                            <input type='radio'checked id = 'cond1' value = '1' name = 'condicioner'>
                                        </p>
                                        <p class = 'Create__row'>
                                            <label for='cond0'>No</label>
                                            <input type='radio'id = 'cond0' value = '0' name = 'condicioner'>
                                        </p>
                                    </div>
                                    <input  type='text' name = '$i' value = '$edit[$i]'>
                                    <input  type='text' hidden name = 'Hotel' value = '$AvailableTourToCorrect[Hotel]'>
                                    <p>Make hotel available?</p>
                                    <div class = 'Create__item'>
                                        <p class = 'Create__row'>
                                            <label for='avai1'>Yes</label>
                                            <input type='radio'checked id = 'avai1' value = '1' name = 'available'>
                                        </p>
                                        <p class = 'Create__row'>
                                            <label for='avai0'>No</label>
                                            <input type='radio'id = 'avai0' value = '0' name = 'available'>
                                        </p>
                                    </div>

                                </div>
                                </div>
                                ";           

                            }
                            echo"
                            </div>
                        <input type = 'submit' class = 'standartStyle2' value = 'Commit changes' name = 'ChangeAvailableHotels'>
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
                                    <th class = 'AvailableHotelMedia'>Date</th>
                                    <th>Ordered hotel</th>
                                    <th class = 'AvailableHotelMedia'>The users Id</th>
                                    <th>The users Phone</th>                                <th>Recall Time</th>                                
                                    <th class = 'AvailableHotelMedia'>User's Email</th>
                                    <th class = 'AvailableHotelMedia'>Was it exemined?</th>
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
                                    <td class = 'AvailableHotelMedia'>$DateSend</td>
                                    <td>$OrderedHotel</td>
                                    <td class = 'AvailableHotelMedia'>$id</td>
                                    <td>$phone</td>
                                    <td>$recallTime</td>
                                    <td class = 'AvailableHotelMedia'>$UsersEmail</td>
                                    <td class = 'AvailableHotelMedia'><img src='".ICONDIR.$progressImage."' alt='result'></td>
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