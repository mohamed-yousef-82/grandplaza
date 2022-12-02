<?php
include "../init2.php";
?>
<div class='container'>
<?php
$id = $_POST['id'];
$twitter = $_POST['twitter'];
$table = $_POST['table'];
sql("UPDATE $table SET twitter = '$twitter' WHERE id = '$id'","");
?>
</div>
