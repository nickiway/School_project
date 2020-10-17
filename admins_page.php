<?php
require "php_func/connection.php";
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
    <script src = "js/tabs.js"></script>   
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
            <div onclick = "window.location.href = 'index.php'" class="main__pannel__item"><img src="../icons/logout.svg" alt="">Logout the admins page</div>
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
                Hleowekaoekaweokaeokwepaepiawdpoapdmadmasdmasmdsak;dakdaskmda
                </div>
                <div class =  "tabscontent" id="countries">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo impedit deleniti quia, eos, iusto exercitationem magni autem in odit, accusamus aperiam debitis ex? Placeat, excepturi doloribus autem magnam sint illum nam quisquam, ducimus ullam consequatur atque quas, aliquam saepe? Vero, nobis sed eaque dicta, nesciunt illo necessitatibus tenetur, officia ipsum veniam sequi? Aperiam, nisi dolor modi error ullam inventore molestias porro quo tenetur magnam pariatur iusto fuga minus maiores hic fugiat quos aspernatur ipsum! Ducimus, sapiente libero modi saepe natus officia! Accusamus placeat iste, corrupti ipsa soluta dignissimos aliquid incidunt eveniet tempore quod quo quis, tempora similique architecto fugit sunt molestiae ex. Excepturi omnis fugit minus. Sapiente eum aut a repellat laudantium veritatis necessitatibus labore vel dolor iste doloribus deleniti, corporis dolores ea inventore eaque soluta unde eveniet quibusdam ipsum! Eaque culpa explicabo, vitae, dicta voluptatem quam officiis, ratione asperiores ad unde fugit iure nostrum nesciunt dolorem. Exercitationem deserunt fugiat enim vel non suscipit amet quibusdam similique ab optio? Dolorum, accusantium id veniam dolorem voluptas necessitatibus mollitia possimus repellendus vero exercitationem? Doloribus soluta, qui quam amet ipsum ipsa incidunt dolore in nulla dolor odit aliquid veritatis officia minus adipisci sit assumenda iste deleniti alias aperiam. Tenetur ipsa quidem deserunt ducimus officia nihil necessitatibus libero cupiditate quam incidunt eum cumque similique, esse voluptate atque! Eligendi corporis, quaerat obcaecati aperiam quisquam provident nam aspernatur commodi ea! Laborum, molestias nihil. Quisquam soluta fuga architecto aliquam beatae aliquid a animi! Voluptates exercitationem excepturi necessitatibus. Assumenda harum earum aliquid similique unde, voluptate fugiat qui in blanditiis necessitatibus eveniet magni sunt placeat eos dignissimos numquam error impedit maxime sapiente illo ut perspiciatis? Perferendis sit iste voluptates libero saepe deserunt quidem, dolor ipsa obcaecati? Ipsum velit molestiae fugiat repellendus, adipisci ipsam nam consequuntur necessitatibus ab quia non omnis quisquam tempore et. Ab tempore, neque laboriosam libero doloremque excepturi quas consectetur. Repudiandae alias iusto debitis! Ipsum aut sapiente soluta ea quia asperiores ipsa iste eos corrupti consectetur, deleniti, quo nam porro placeat maxime dignissimos? Odit, nobis suscipit maiores nihil vero facere distinctio quo rerum, aperiam quisquam voluptate cupiditate fugit. Non repellendus voluptatem, culpa assumenda hic neque repudiandae, soluta nulla porro esse inventore incidunt ipsa! Vitae, eaque odit? Nemo officia, obcaecati libero recusandae perferendis excepturi repellendus error temporibus, minima accusantium, non modi doloremque et consequuntur. Reprehenderit nam aliquid dolor optio veritatis, magnam doloremque corrupti perspiciatis magni repellendus libero explicabo fugit possimus, tempore odio laboriosam commodi quisquam voluptas maiores ducimus dolore sint laborum, quo voluptates. Voluptas magni beatae aspernatur commodi excepturi maxime, quos praesentium? Quae recusandae possimus accusamus qui fugit accusantium rem voluptas hic quis, sunt minima esse, labore vitae voluptate molestias eum nulla corporis quia rerum suscipit veniam assumenda natus deserunt quibusdam! Vitae odio voluptatum expedita officiis? Magnam blanditiis sunt quia aliquid reprehenderit mollitia saepe, magni nulla totam quibusdam sit alias iure impedit possimus, aut vel dolores molestias veniam atque minima quidem placeat? Facilis deleniti ex illum autem iste itaque voluptatum incidunt laborum saepe soluta et, corporis, facere labore molestiae unde odit. Nobis, temporibus! Iusto sunt tempora et repellendus cupiditate deserunt error possimus veniam eligendi fugit, numquam adipisci soluta laboriosam architecto aliquid recusandae facere accusamus cumque voluptatem ab debitis sint enim qui! Impedit repellendus veritatis illo, consequatur molestias fugiat soluta nulla repellat pariatur ratione vero iste porro id. Laborum unde inventore aliquam quia harum eos ea illo ipsam debitis dicta enim id aliquid tenetur dolore vel impedit nostrum deleniti, quaerat ut labore aperiam? Voluptate tenetur nesciunt incidunt voluptas molestias tempore quidem totam perspiciatis minus fuga? Nihil mollitia maxime modi aperiam exercitationem, quo pariatur nobis reprehenderit atque, voluptatum sint iste. Natus sed debitis sunt suscipit ad, inventore eligendi saepe vel odit a itaque atque, tempore porro perferendis reprehenderit! Quo at optio magni tempore asperiores obcaecati minus reiciendis aliquam sed excepturi est dicta reprehenderit sint quibusdam, ipsa earum perferendis sapiente? Laboriosam, nihil sunt eligendi explicabo minima ullam qui! Architecto doloremque, sapiente facere sed, in corporis facilis aliquid delectus quia dolorum assumenda. Accusamus, est error. Magnam nihil iusto porro quisquam aspernatur, consectetur placeat ullam nam earum ex facere voluptatibus quia ipsum quae ipsam dolores laudantium, at quas odio beatae est. Dolores exercitationem corporis dolorum consequatur quisquam eius tenetur perferendis dicta, adipisci suscipit aut in ratione dolore numquam, consectetur assumenda iusto dolorem quo placeat amet obcaecati minus nostrum ipsum accusamus. Expedita eaque eligendi similique ipsum, accusamus reprehenderit, aliquam corrupti quia nulla maiores ratione earum est explicabo, unde omnis magni? Quae harum maxime sed maiores sit, ab exercitationem aliquam excepturi dignissimos quos dolorum illum in provident quo sapiente suscipit ut autem nesciunt assumenda reiciendis odit placeat? Odio excepturi quia nam dicta debitis, sed quasi in nesciunt. Explicabo debitis delectus vel cupiditate a necessitatibus id at? Aliquid reiciendis cum, labore temporibus error, dicta quia, blanditiis nam accusamus omnis similique suscipit obcaecati amet tempora perspiciatis aliquam minima nihil soluta quibusdam iste doloribus vel ut sunt facilis. Aliquam officia explicabo reprehenderit expedita rerum mollitia voluptas iste ea earum hic quia repudiandae, dolor repellendus architecto veritatis provident fuga cumque. Repellat tenetur nemo obcaecati aperiam voluptatibus tempore nobis libero veniam optio, minima aliquid dignissimos iusto sequi quae pariatur, esse ullam quidem, quibusdam totam et mollitia! Veniam eveniet vitae nesciunt eligendi natus, labore ipsam temporibus, fuga laborum nemo cumque eius. Iste nobis distinctio, in quasi odit perspiciatis soluta sapiente? Odit necessitatibus ratione neque provident doloribus iste debitis reprehenderit illum. Dolorem provident quia inventore nemo architecto! Est magnam libero modi hic exercitationem pariatur provident architecto magni earum quam veritatis officia, dicta nulla ipsa asperiores ea culpa molestias rem voluptas amet natus voluptatem aut! Incidunt accusamus aliquid voluptatibus velit ullam dicta consequatur aperiam consectetur deserunt, rerum eum vero obcaecati cupiditate. Obcaecati sint laudantium itaque impedit beatae, nemo ipsum id odit ad blanditiis esse? Ea omnis quam commodi saepe nihil! Tempore corporis libero laborum fugiat, ullam quaerat molestiae quod similique mollitia debitis harum recusandae necessitatibus rerum soluta iste deleniti porro natus deserunt molestias hic aliquam sunt aspernatur. Molestias, tempore accusamus in optio ipsa corporis veritatis magnam dolore cumque vero sit quasi eius voluptatem tempora repellat amet qui, maxime nostrum deserunt, rerum similique officia.
                </div>
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
<script>
   
</script>  
</body>
</html>