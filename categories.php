<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
  <h3 class="page-title">فروعنا</h3>
<!-- <h2 class="page-title"><?php  echo str_replace("-","",$_GET['name']); ?></h2> -->
<div class="row row-reverse">
<?php
/*--- Get Category Items ---*/
$Items = sql("SELECT * FROM categories WHERE activity = 1 ORDER BY id","fetchAll");
if (!empty ($Items)){
foreach($Items As $Item){
  echo "<div class='box box-1 category-item'>";
  $img = $Item['image'];
  $src=str_replace("../","",$img);
  echo"<img class='item-img' src='$src' />";
  echo "<a class='link' data-id='$Item[id]' data-page='branch'>$Item[name]</a>";
  echo "</div>";
}
}else {
  echo "There In No Items";
}
?>
</div>
</div>
</div>
