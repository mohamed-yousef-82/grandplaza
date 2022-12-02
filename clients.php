<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<!-- <h2 class="page-title"><?php  echo str_replace("-","",$_GET['name']); ?></h2> -->
<div class="row row-medium">

<?php
/*--- Get Category Items ---*/
$items = sql("SELECT * FROM clients WHERE activity = 1 ORDER BY id","fetchAll");


if (!empty ($items)){
foreach($items As $item){
  ?>
  <div class="col-md-2">
  <img class='client-img' style="width:100%" src='<?php echo $item['image'] ?>' />
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
