<?
require "php_func/connection.php";
$current_id = $_GET['id'];
$required_news = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM news WHERE Id = $current_id"));
$id = $required_news['Id'];
$title = $required_news['Title'];
$text = $required_news['Text'];
$image  = "images/".$required_news['Image'];
echo"
<div>
<div style = 'background-image:url($image); background-repeat:no-repeat;background-position:center;background-size:cover;height:500px;'>
</div>
";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <title>Hallo</title>
</head>
<body>
    
</body>
</html>