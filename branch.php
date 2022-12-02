<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<!-- <h2 class="page-title"><?php  echo str_replace("-","",$_GET['name']); ?></h2> -->
<div class="row">
<?php
/*--- Get Category Items ---*/
$id = $_POST["id"];
$Items = sql("SELECT * FROM categories WHERE id = $id  AND activity = 1 ORDER BY id","fetch");
if (!empty ($Items)){
  echo "<div class='col-md-6'>";
  $img = $Items['image'];
  $src=str_replace("../","",$img);
  echo"<img class='item-img' src='$src' />";
  echo "<h3>$Items[name]</h3>";
  echo "<p data-page='branch'>$Items[description]</a>";
  echo "<br/><br/><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal'>احجز الان</a>";
  echo "</div>";

}else {
  echo "There In No Items";
}
?>
<div class="col-md-6 single-map">
  <?php
    echo "$Items[googlemap]";
   ?>
</div>
</div>
</div>
</div>
