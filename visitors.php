<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<!-- <h2 class="page-title"><?php  echo str_replace("-","",$_GET['name']); ?></h2> -->
<div class="row row-medium">

<?php
/*--- Get Category Items ---*/
$items = sql("SELECT * FROM accordion WHERE activity = 1 ORDER BY id","fetchAll");


if (!empty ($items)){
foreach($items As $item){
  ?>
  <div class="visitor-row">
  <img class='visitor-img' src='<?php echo $item['image'] ?>' />
  <div class="visitor-text">
    <h4 class='visitor-name'><?php echo $item['title'] ?><h4>
    <p><?php echo $item['description'] ?></p>
    </div>
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
