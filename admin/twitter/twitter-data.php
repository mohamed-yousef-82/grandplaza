<?php
/*---Prevent Including Header And Navbar---*/
$noNavbar="";
$noHeader="";
/*---Table---*/
$table = "twitter";
$folder = "twitter";
/*---Including init.php File---*/
include "../init2.php";
/*---Select Data From Table And View It---*/
$select = sql("SELECT * FROM $table","fetch");
?>
<div class="table">
  <div class="row">
  <div class="box box-1">
  <div class="twitter"><?php echo $select['twitter'] ?></div>
  </div>
</div>
<div>
        <button class='start-btn green' data-popup-open='popup-<?php echo $select['id'] ?>'><i class='fa fa-edit'></i><?php echo lang('EDIT') ?></button>
        </div>
        <!--Edit And Update Data-->
          <div class="popup" data-popup="popup-<?php echo $select['id'] ?>">
            <div class="popup-inner">
              <form class="form" method="post" enctype="multipart/form-data">
              <h4 class="form-title"><?php echo lang('Edit ITEM') ?></h4>
              <!--Table Name-->
              <input type="hidden" name="table" value="<?php echo $table ?>">
              <!--Id-->
              <input type="hidden" name="id" value="<?php echo $select['id'] ?>">
              <!--twitter-->
              <input type="url" name="twitter" <?php if($select['twitter'] !==""){?>value="<?php echo $select['twitter'];?>"<?php } else {?>placeholder="ادخل كود حساب تويتر هنا" <?php } ?> />
              <!--Update BTN-->
              <button type="submit" class="start-btn blue"><?php echo lang('UPDATEBTN') ?></button>
              </form>
              <!--Close BTN-->
              <button class="popup-close" data-popup-close="popup-<?php echo $select['id'] ?>">x</button>
          </div>

      </div>
      </div>
      <script>
          var table = "<?php echo $table ?>";
          var folder = "<?php echo $folder ?>";
      </script>
<!--Include Js Files-->
<script src="<?php echo"$js" ?>/popup.js"></script>
<script src="<?php echo"$js" ?>/update-data.js"></script>
