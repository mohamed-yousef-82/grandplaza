<?php
 include "init.php";

  function myEmail(){
  $contact = sql("SELECT * FROM contact","fetch");
  $to =$contact['email'];
  return $to;
  }
  $subject =  $_POST['title'];
  $message =  $_POST['message'];
  $email = $_POST['email'];
  $headers = "From: $email.\r\n";
mail(myEmail(), $subject, $message, $headers);

 ?>
 <?php
 // function myEmail(){
 // $contact = sql("SELECT * FROM contact","fetch");
 // $to =$contact['email'];
 // return $to;
 // }
 // $name=$_POST['name'];
 // $email=$_POST['email'];
 // $message=$_POST['message'];
 // if (($name=="")||($email=="")||($message==""))
 // {
 // echo "من فضلك املأ جميع الحقول";
 // }
 // else{
 // $from="From: $name<$email<\r\nReturn-path: $email";
 // mail(myEmail(), $name,$message, $from);
 // echo "تم الارسال بنجاح";
 // }
 ?>
