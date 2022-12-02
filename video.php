<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<div class="row row-medium">

<?php
/*--- Get Category Items ---*/
$items = sql("SELECT * FROM video WHERE activity = 1 ORDER BY id","fetchAll");


if (!empty ($items)){
foreach($items As $item){
  ?>
  <div class="col-md-3 video-page">
  <?php echo $item['video'] ?>
    <p class='client-name'><?php echo $item['name'] ?><p>
    </div>

  <?php
}
}else {
  echo "There In No Items";
}
?>
</div>
</div>
</div>
