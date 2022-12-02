<?php
include "../init2.php";
?>
<div class='container'>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$video = $_POST['video'];
$table = $_POST['table'];
sql("UPDATE $table SET name = '$name',video = '$video' WHERE id = '$id'","");
?>
</div>
