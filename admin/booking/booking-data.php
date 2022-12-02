<?php
/*---Prevent Including Header And Navbar---*/
$noNavbar="";
$noHeader="";
/*---Table---*/
$table = "booking";
$folder = "booking";
/*---Including init.php File---*/
include "../init2.php";
/*---Select Data From Table And View It---*/
$select = sql("SELECT * FROM $table ORDER By id DESC ","fetchAll");
$select = sql("SELECT $table.*,categories.name AS branch_name
             FROM $table INNER JOIN categories ON categories.id = $table.branch
              ORDER BY id Desc","fetchAll");
?>
<style>
.form input[type=text], .form input[type=password], .form input[type=email], .form input[type=number], .form input[type=file], .form input[type=url], .form select, .form textarea {
    width: 100%;
    padding: 0px 10px;
    margin: 8px 0;
    box-sizing: border-box;
}
</style>
<table class="table">
<thead>
<tr>
  <th><?php echo lang('NUMBER') ?></th>
  <th>الاسم</th>
  <th>البريد الالكترونى </th>
  <th>التليفون</th>
  <th>تاريخ الحجز</th>
  <th>عدد الغرف </th>
  <th>عدد الايام </th>
  <th>الفرع </th>
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
          <td><?php echo $selectview['email'] ?></td>
          <td><?php echo $selectview['phone'] ?></td>
          <td><?php echo $selectview['date'] ?></td>
          <td><?php echo $selectview['rooms'] ?></td>
          <td><?php echo $selectview['days'] ?></td>
          <td><?php echo $selectview['branch_name'] ?></td>
          <td><button class='start-btn green' data-popup-open='popup-<?php echo $selectview['id'] ?>'><i class='fa fa-edit'></i><?php echo lang('EDIT') ?></button>
          <button data-id='<?php echo $selectview['id'] ?>' class='start-btn orangered delete' id='delete'><i class='fa fa-close'></i><?php echo lang('DELETEBTN') ?></button>
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
              <!--Title-->
              <input type="text" name="name" value="<?php echo $selectview['name'] ?>">
              <!--Description-->
              <input type="email" name="email" value="<?php echo $selectview['email'] ?>">
              <!--Description-->
              <input type="text" name="phone" value="<?php echo $selectview['phone'] ?>">
              <!--Description-->
              <input type="number" name="days" value="<?php echo $selectview['days'] ?>">
              <!--Description-->
              <input type="number" name="rooms" value="<?php echo $selectview['rooms'] ?>">
              <!--Description-->
                <label>التاريخ</label>
              <input type="date" name="rooms" value="<?php echo $selectview['date'] ?>">
              <select  name="branch">
                <option value="">اخترالفرع</option>
                <?php
                  $categories = sql("SELECT * FROM categories ORDER BY id","fetchAll");
                  foreach ($categories as $cat) {
                    ?>
                  <option value=<?php echo $cat["id"] ?> <?php if($selectview['branch']==$cat['id']){echo 'selected';}  ?>><?php echo $cat["name"] ?></option>
                <?php
            }
                 ?>
             </select>
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
      var table = <?php echo $table ?>;
      var folder = <?php echo $folder ?>;
  </script>
<!--Include Js Files-->
<script src="<?php echo $js ?>/popup.js"></script>
<script src="<?php echo $js ?>/update-data.js"></script>
