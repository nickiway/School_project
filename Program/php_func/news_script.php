<?
require "connection.php"; 
$get_news = mysqli_query($connect, "SELECT * FROM news ORDER BY Id DESC LIMIT 3");
for ($i=0; $get_new = mysqli_fetch_assoc($get_news); $i++) { 
    $id = $get_new['Id'];
    $title = mb_strimwidth($get_new['title_news'],0, 60,'...');
    $date = $get_new['Date_news'];
    $text = mb_strimwidth($get_new['text_news'],0,80,'...');
    $Image_src = explode(" ", $get_new['Image_news']);
    $link = $get_new['Link'];
    echo"
    <div class ='news-cards' onclick=\"window.location.href='news.php?id=$id'\">
        <div class = 'news-cards__image' style = 'background-image:url(".The_news_Directory."$Image_src[0])'>
        </div>
        
        <div class='news-cards__text darkBoxShadow' id = '$i'>
            <p class= 'news-cards__title'>$title</p>
            <p class= 'news-cards__description'>$text</p>
            <div class='news-cards__bottom'>
                <span class= 'news-cards__date'>$date</span>
                <button onclick=\"window.location.href='news.php?id=$id'\" class= 'news-cards__more casual_btn'>Read More</button>
            </div>
        </div>
    </div>";
}
?>