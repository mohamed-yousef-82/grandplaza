<?php
$noNavbar="";
$noHeader="";
/*---Assign Page Title---*/
$pageTitle ="About Site";
/*---Table---*/
$table = "about";
$folder = "about";
/*---Include init.php File---*/
include "../init2.php";
/*---Isset From The User---*/
?>
<div class="view-data">
  <div class="page-container">
<h3 class='table-title'><span><?php echo lang('ABOUT') ?></span><i class='fa fa-building' aria-hidden='true'></i></h3>
<!--Dev For Fetching Data--->
<div id="data"></div>
</div>
</div>
<script>
    var table = "<?php echo $table ?>";
    var folder = "<?php echo $folder ?>";
</script>
<script src="<?php echo"$js" ?>/data-add.js"></script>
