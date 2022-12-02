<?php
include "init.php";
?>
<div class="container">
<div class="page-style-one">
<h2 class="page-title">نتائج البحث </h2>
<div class="row row-reverse">
  <?php
$search = $_POST['search'];
	// $search = trim(strip_tags($_GET['search']));

if(empty ($search)){
  echo "<span>Please Insert Search Data<div/>";
}else
{
  $Items = sql("SELECT * FROM categories WHERE name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY id","fetchAll");
  if (!empty ($Items)){
  foreach($Items As $Item){
    echo "<div class='box box-1 category-item'>";
    $img = $Item['image'];
    $src=str_replace("../","",$img);
    echo"<img class='item-img' src='$src' />";
    echo "<a class='link' data-id='$Item[id]' data-page='branch'>$Item[name]</a>";
    echo "<p>$Item[description]</p>";
    echo "</div>";
  }
  }else {
    echo "There In No Data";
  }
}
	?>
</div>
</div>
</div>
