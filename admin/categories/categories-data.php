<?php
/*---Prevent Including Header And Navbar---*/
$noNavbar="";
$noHeader="";
/*---Table---*/
$table = "categories";
$folder = "categories";
/*---Including init.php File---*/
include "../init2.php";
/*---Select Data From Table And View It---*/
$select = sql("SELECT * FROM $table ORDER By id DESC ","fetchAll");
?>
<table class="table">
<thead>
<tr>
  <th><?php echo lang('NUMBER') ?></th>
  <th>اسم الفرع</th>
  <th><?php echo lang('ADDRESS') ?></th>
  <th><?php echo lang('IMAGE') ?></th>
  <th><?php echo lang('GOOGLE MAP') ?></th>
  <th>رابط الفرع</th>
  <th><?php echo lang('CONTROL') ?></th>
</tr>
</thead>
        <?php
        $num = 1;
        foreach ($select as $selectview) {
          ?>
          <tr>
          <td><?php echo $num ?></td>
          <td><?php echo $selectview['name'] ?></td>
          <td><?php echo $selectview['description'] ?></td>
          <td><img style='width:100px;height:100px;' src='../../<?php echo $selectview['image'] ?>' /></td>
          <td class="googlemap"><?php echo $selectview['googlemap'] ?></td>
          <td style="width:150px;word-break:break-all;height:150px;overflow-y:scroll;display:inline-block"><?php echo $selectview['link'] ?></td>
          <td><button class='start-btn green' data-popup-open='popup-<?php echo $selectview['id'] ?>'><i class='fa fa-edit'></i><?php echo lang('EDIT') ?></button>
          <button data-id='<?php echo $selectview['id'] ?>' class='start-btn orangered delete' id='delete'><i class='fa fa-close'></i><?php echo lang('DELETEBTN') ?></button>
          <?php
          if($selectview['activity']==0){
            ?>
            <button data-id='<?php echo $selectview['id'] ?>' class='start-btn dark active'><i class='fa fa-check'></i><?php echo lang('ACTIVATE') ?></button>
            <?php
          }else{
          ?>
          <button data-id='<?php echo $selectview['id'] ?>' class='start-btn blue inactive'><i class='fa fa-hand-paper-o'></i><?php echo lang('INACTIVE') ?></button>
          <?php
        }
        ?>
        </td>
        <!--Edit And Update Data-->
          <td class="popup" data-popup="popup-<?php echo $selectview['id'] ?>">
            <div class="popup-inner">
              <form class="form" method="post" enctype="multipart/form-data">
              <h4 class="form-title"><?php echo lang('Edit ITEM') ?></h4>
              <!--Table Name-->
              <input type="hidden" name="table" value="<?php echo $table ?>">
              <!--Id-->
              <input type="hidden" name="id" value="<?php echo $selectview['id'] ?>">
              <!--NAME-->
              <input type="text" name="name" value="<?php echo $selectview['name'] ?>" >
              <!--Description-->
              <input type="text" name="description" value="<?php echo $selectview['description'] ?>">
              <!--Googlemap-->
              <textarea type="text" name="googlemap"><?php echo $selectview['googlemap'] ?></textarea>
              <!--Link-->
              <input type="url" name="link" value="<?php echo $selectview['link'] ?>" />
              <!--Image-->
              <label><?php echo lang('IMAGE') ?></label>
              <input type="hidden" name="oldfile" value="<?php echo $selectview['image'] ?>">
              <input type="file" name="file" placeholder="Image">
              <!--Update BTN-->
              <button type="submit" class="start-btn blue"><?php echo lang('UPDATEBTN') ?></button>
              </form>
              <!--Close BTN-->
              <button class="popup-close" data-popup-close="popup-<?php echo $selectview['id'] ?>">x</button>
          </div>
            <?php
              $num++;
            }
            ?>
      </td>
      </tr>
      </table>
      <script>
          var table = "<?php echo $table ?>";
          var folder = "<?php echo $folder ?>";
      </script>
<!--Include Js Files-->
<script src="<?php echo"$js" ?>/popup.js"></script>
<script src="<?php echo"$js" ?>/update-data.js"></script>
