<?php
include "../init2.php";
?>
<div class='container'>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$googlemap = $_POST['googlemap'];
$link = $_POST['link'];
$oldfile = $_POST['oldfile'];
$table = $_POST['table'];
upload("file",$oldfile,"../../data/uploads/");
sql("UPDATE $table SET name = '$name',description = '$description',googlemap = '$googlemap',link = '$link',image = '$insert_src'  WHERE id = '$id'","");
?>
</div>
