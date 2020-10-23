<?
require_once ( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'country_info.php');
require_once ( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connection.php');
$num = $_GET['num'];
$sorting = $_GET['sorting'];
$sql_offer = "SELECT * FROM `offers` ORDER BY $sorting LIMIT {$num}, 4";
var_dump($wifi);
echo "<br>";
echo json_encode($images_href);
echo "<br>";
echo json_encode($units);
echo "<br>";
echo json_encode($qualities_names);