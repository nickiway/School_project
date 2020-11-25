<?
require "connection.php";
mysqli_query($connect, "INSERT INTO `news` (title_news,text_news,Image_news,Link,Date_news) VALUES ('We have lots of different things by the time','We have lots of different things by the time','amsterdam.jpg','google.com','10 Dec')");
?>