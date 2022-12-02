<?php
include "../init2.php";
$name = $_POST['name'];
$description = $_POST['description'];
$googlemap = $_POST['googlemap'];
$link = $_POST['link'];
$table = $_POST['table'];
upload("file","","../../data/uploads/");
sql("INSERT INTO $table (name,description,googlemap,link,image) VALUES ('$name','$description','$googlemap','$link','$insert_src')","");
?>
