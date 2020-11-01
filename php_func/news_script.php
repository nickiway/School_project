<?
require "connection.php"; 
$get_news = mysqli_query($connect, "SELECT * FROM news ORDER BY Id DESC LIMIT 3");
for ($i=0; $get_new = mysqli_fetch_assoc($get_news); $i++) { 
    $id = $get_new['Id'];
    $title = $get_new['Title'];
    $date = $get_new['Date'];
    $text = mb_strimwidth($get_new['Text'],0,80,'...');
    $Image_src = $get_new['Image'];
    $link = $get_new['Link'];
    echo"
    <div class ='news-cards'>
        <div class = 'news-cards__image'>
            <img src = 'images/$Image_src'>
        </div>
            <p class= 'news-cards__date'>$date</p>
            <p class= 'news-cards__title'>$title</p>
            <p class= 'news-cards__description'>$text</p>
            <span onclick=\"window.location.href='news.php?id=$id'\" class= 'news-cards__more'>Read more -></span>
    </div>";
}

?>