<?
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
            die("<a href='javascript:history.go(-1)'>link text here...</a>");
        }
    }
    else
    {
        die("<p align = center>Nug</p>");
    }
}
//The news end
?>