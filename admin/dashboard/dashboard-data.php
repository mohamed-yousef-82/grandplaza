<?php
/*---Prevent Including Header And Navbar---*/
$noNavbar="";
$noHeader="";
include "../init2.php";
/*---Get Last Admin Users ---*/
$Latest_Admin_Users =getLatest("SELECT * FROM users WHERE level != 2 ORDER BY id DESC LIMIT 5");
/*---Get Last Admin Users ---*/
$Latest_Interface_Users =getLatest("SELECT * FROM users WHERE level = 2 ORDER BY id DESC LIMIT 5");
/*---Get Last Items ---*/
$Latest_Items =getLatest("SELECT * FROM categories ORDER BY id DESC LIMIT 5");
/*---Get Last Items ---*/
$Latest_Comments =getLatest("SELECT * FROM booking ORDER BY id DESC LIMIT 5");
 ?>
<div class="page-container">
<div class="row stats">
      <div class="box box-1">
        <div class="stat">
          <i class="fa fa-users" aria-hidden="true"></i>
          <p><?php echo lang('TOTAL_USERS') ?></p>
          <span><a href="users.php"><?php echo counter('id','users'); ?></a></span>
        </div>
      </div>
      <div class="box box-1">
        <div class="stat">
          <i class="fa fa-user" aria-hidden="true"></i>
          <p><?php echo lang('PENDING_USERS') ?></p>
          <span><a href="users.php?do=manage&page=pending"><?php echo checkItems('activity','users','0'); ?></a></span>
        </div>
      </div>
      <div class="box box-1">
        <div class="stat">
          <i class="fa fa-laptop" aria-hidden="true"></i>
          <p>اجمالى العملاء</p>
          <span><a href="items.php"><?php echo counter('id','clients'); ?></a></span>
        </div>
      </div>
      <div class="box box-1">
        <div class="stat">
          <i class="fa fa-pencil" aria-hidden="true"></i>
          <p>طلبات الحجز </p>
          <span><a href="comments.php"><?php echo counter('id','booking'); ?></a></span>
        </div>
      </div>
      <div class="box box-1">
        <div class="stat">
          <i class="fa fa-building" aria-hidden="true"></i>
          <p><?php echo lang('TOTAL_CATEGORIES') ?></p>
          <span><a href="comments.php"><?php echo counter('id','categories'); ?></a></span>
        </div>
      </div>
    </div>
    <div class="row row-medium top-space">
      <div class="box box-1">
<div class="panel">
        <h3 class="section-title"><i class="fa fa-folder-open" aria-hidden="true"></i>احدث الفروع</h3>
            <ul>
            <?php
            if(!empty($Latest_Items)){
            foreach ($Latest_Items as $selectview) {
              ?>
              <li class="dash-row">
              <span><?php echo $selectview['name']; ?></span>
              <div class="dash-details">
              <img style="width:80px;height:80px;" src="../../<?php echo $selectview['image']; ?>" />
              <div class="dash-control">
              <button class='start-btn green' data-table='items' data-folder='cp-items' data-popup-open='popup-<?php echo $selectview['id'] ?>'><i class='fa fa-edit'></i><?php echo lang('EDIT') ?></button>
              <!--Edit And Update Data-->
                <div class="popup" data-popup="popup-<?php echo $selectview['id'] ?>">
                  <div class="popup-inner">
                    <form class="form form-update" method="post" enctype="multipart/form-data">
                    <h4 class="form-title"><?php echo lang('Edit ITEM') ?></h4>
                    <!--Table Name-->
                    <input type="hidden" name="table" value="categories">
                    <!--Id-->
                    <input type="hidden" name="id" value="<?php echo $selectview['id'] ?>">
                    <!--NAME-->
                    <input type="text" name="name" value="<?php echo $selectview['name'] ?>" >
                    <!--Description-->
                    <input type="text" name="description" value="<?php echo $selectview['description'] ?>">
                    <!--Googlemap-->
                    <textarea type="text" name="googlemap"><?php echo $selectview['googlemap'] ?></textarea>
                    <!--Image-->
                    <label><?php echo lang('IMAGE') ?></label>
                    <input type="hidden" name="oldfile" value="<?php echo $selectview['image'] ?>">
                    <input type="file" name="file" placeholder="Image">
                    <!--Update BTN-->
                    <button type="button" class="start-btn blue data-update" data-table='categories' data-folder='categories'><?php echo lang('UPDATEBTN') ?></button>
                    </form>
                    <!--Close BTN-->
                    <button class="popup-close" data-popup-close="popup-<?php echo $selectview['id'] ?>">x</button>
                </div>
            </div>
              <button data-id=<?php echo $selectview['id'] ?> data-table='categories' class='start-btn orangered dash-delete'><i class='fa fa-close'></i><?php echo lang('DELETEBTN') ?></button>
              <?php
              if($selectview['activity']==0){
                ?>
                <button data-id=<?php echo $selectview['id'] ?> data-table='categories' class='start-btn dark dash-active'><i class='fa fa-check'></i><?php echo lang('ACTIVATE') ?></button>
                <?php
              }else{
              ?>
              <button data-id=<?php echo $selectview['id'] ?> data-table='categories' class='start-btn blue dash-inactive'><i class='fa fa-hand-paper-o'></i><?php echo lang('INACTIVE') ?></button>
              </div>
              <?php
            }
            }
              }
            else{
                echo "<div class='nodata'>No Data To Show</div>";
            }
            ?>

            </div>
            </li>
            </ul>
          </div>
</div>
<div class="box box-1">
<div class="panel">
  <h3 class="section-title"><i class="fa fa-folder-open" aria-hidden="true"></i>احدث طلبات الحجز</h3>
      <ul>
      <?php
      if(!empty($Latest_Comments)){
      foreach ($Latest_Comments as $selectview) {
        ?>
        <li class="dash-row">
        <span><?php echo $selectview['name']; ?></span>
        <div class="dash-details">
        <p><?php echo $selectview['date']; ?></p>
        <div class="dash-control">
        <button class='start-btn green' data-table='comments' data-folder='comments' data-popup-open='popup-<?php echo $selectview['id'] ?>'><i class='fa fa-edit'></i><?php echo lang('EDIT') ?></button>
        <!--Edit And Update Data-->
          <div class="popup" data-popup="popup-<?php echo $selectview['id'] ?>">
            <div class="popup-inner">
              <form class="form form-update" method="post" enctype="multipart/form-data">
              <h4 class="form-title"><?php echo lang('Edit ITEM') ?></h4>
              <!--Table Name-->
              <input type="hidden" name="table" value="booking">
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
              <button type="button" class="start-btn blue data-update" data-table='booking' data-folder='booking'><?php echo lang('UPDATEBTN') ?></button>
              </form>
              <!--Close BTN-->
              <button class="popup-close" data-popup-close="popup-<?php echo $selectview['id'] ?>">x</button>
          </div>
      </div>
        <button data-id=<?php echo $selectview['id'] ?> data-table='booking' class='start-btn orangered dash-delete'><i class='fa fa-close'></i><?php echo lang('DELETEBTN') ?></button>
        <?php
      }
        }
      else{
          echo "<div class='nodata'>No Data To Show</div>";
      }
      ?>

      </div>
      </li>
      </ul>
    </div>
</div>
</div>
</div>
<script src="<?php echo $js ?>/popup.js"></script>
<script src="<?php echo $js ?>/update-data.js"></script>
