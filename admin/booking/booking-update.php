<?php
include "../init2.php";
?>
<div class='container'>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = $_POST['date'];
$days = $_POST['days'];
$rooms = $_POST['rooms'];
$branch = $_POST['branch'];
$table = $_POST['table'];
upload("file",$oldfile,"../../data/uploads/");
sql("UPDATE $table SET name = '$name',phone = '$phone',email = '$email',date = '$date',days = '$days',rooms = '$rooms',branch = '$branch'
   WHERE id = '$id'","");
?>
</div>
