<?
  if (isset($_POST['mailingButton'])) {
      $title = $_POST['title'];
      $massege = $_POST['massege'];
      $s = mail('shkitak@dlit.dp.ua', 'Тема письма', 'Текст письма', 'From: shkitak@dlit.dp.ua');   
      var_dump($s);     
}  
?>