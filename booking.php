<?php
include "init.php";
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = $_POST['date'];
$days = $_POST['days'];
$rooms = $_POST['rooms'];
$branch = $_POST['branch'];
sql("INSERT INTO booking (name,phone,email,date,days,rooms,branch) VALUES ('$name','$phone','$email','$date','$days','$rooms','$branch')","");
?>
