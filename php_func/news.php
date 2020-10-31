<?
require "connection.php"; 
$get_news = mysqli_query($connect, "SELECT * FROM news ORDER BY Id DESC LIMIT 3");
while($get_new = mysqli_fetch_assoc($get_news)){
    $id = $get_new['Id'];
    $title = $get_new['Title'];
    $text = mb_strimwidth($get_new['Text'],0,40,'...');
    $Image_src = $get_new['Image'];
    $link = $get_new['Link'];
    echo"<div class ='news-cards'>
    <div class = 'news-cards__image'>
        <img src = $Image_src>
    </div>
    <p class= 'news-cards__title'>$title</p>
    <p class= 'news-cards__title'><a href = '$link'>$text</a></p>
    </div>";
}
?>