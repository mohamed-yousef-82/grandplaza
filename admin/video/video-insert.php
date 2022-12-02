<?php
include "../init2.php";
$name = $_POST['name'];
$video = $_POST['video'];
$table = $_POST['table'];
sql("INSERT INTO $table (name,video) VALUES ('$name','$video')","");
?>
