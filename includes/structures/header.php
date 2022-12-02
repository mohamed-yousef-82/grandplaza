<?php
ob_start();
session_start();
$siteuser = "";
  if(isset($_SESSION['user'])){
    $siteuser = $_SESSION['user'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php getTitle() ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $css ?>/bootstrap.min-ar.css" />
  <link rel="stylesheet" href="<?php echo $css ?>/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo $css ?>/style.css" />
  <link rel="stylesheet" href="<?php echo $css ?>/animate.css" />
  <link rel="stylesheet" href="<?php echo $css ?>/skin-orange.css" />
  <link rel="stylesheet" href="<?php echo $css ?>/newstyle.css" />
  <!--[if lt IE 9]>
  <style>
  nav,.container,header#top-section,.carousel,.demobutton {display:none;}
  </style>
  <div id='browserWarning'>
  You are using an outdated version of Internet Explorer. Please, switch to
  <a style="color:red;" href='http://getfirefox.com'>Firefox</a>,
  <a style="color:red;" href='http://www.google.de/chrome'>Google Chrome</a>
  ,
  <a style="color:red;" href='http://www.apple.com/safari/'>Safari</a>
  or the latest version of
  <a style="color:red;" href='http://windows.microsoft.com/en-US/internet-explorer/downloads/ie'>Internet Explorer</a>
  for a
  <span class='bold'>better</span>
  and
  <span class='bold'>safer</span>
  experience.
  </div>
  <![endif]-->
</head>
<!-- /head-->
<body data-spy="scroll" data-target=".navbar">
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">


      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">تذكرة حجز</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="" id="booking" method="post">
            <div class="row">
            <div class="col-md-12">
            <div class="form-group">
              <div class="col-sm-12">
              <option value="">اخترالفرع</option>
              <?php
                $categories = sql("SELECT * FROM categories ORDER BY id","fetchAll");
                foreach ($categories as $cat) {
                  ?>
                  <button style="margin-bottom: 10px;" class="btn btn-default booking-btn" onclick="myFunction()"><?php echo $cat["name"] ?></button>

<script>
function myFunction() {
    window.open("<?php echo $cat["link"] ?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=350,width=600,height=500");
}
</script>
              <?php
          }
               ?>

         </div>
       </div>
            <!-- <div class="form-group">
              <div class="col-sm-12">
              </div>
            </div> -->
            </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button style="background-color: #d8a74e;" type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
      </div>

    </div>
  </div>
<nav id="topnav" class="navbar navbar-fixed-top navbar-default" role="navigation">
	<div class="top-menu">
	<div class="container">
   <div class="row">
		 <div class="col-md-6">
			 <ul class="booking-now">
				 <li><a href="#" data-toggle="modal" data-target="#myModal">احجز الان</a></li>
				 <!-- <li><a href="#">اتصل بنا</a></li> -->

			 </ul>

		 </div>
		 <div class="col-md-6">
			 <form class="search search-form" type="submit" action="" id="search-form">
<input type="text" class="form-control input-sm" id="search" name="search" maxlength="64" placeholder="ادخل كلمة البحث هنا . . " />
<button type="button" class="btn btn-primary btn-sm search-button">بحث</button>
</form>
		 </div>
	 </div>
	</div>
	</div>
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>

      <!-- <img src="layout/img/logo.png" /> -->
		<a class="navbar-brand link" data-page='main'>
            <?php
            $logo = sql("SELECT * FROM logo","fetch");
            echo "<img src='$logo[image]' />";
            ?>
            </a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="container">
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="social-icons">
        <?php
      $socialmedia = sql("SELECT * FROM socialmedia WHERE activity=1 ORDER By id DESC ","fetchAll");
      foreach ($socialmedia as $social) {
      ?>
      <li><a target='_blank' href=<?php echo $social["link"] ?>><i class='<?php echo $social["icon"] ?>'></i></a></li>
      <?php
      }
         ?>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active link" data-page="main"><a href="#top-section">فندق جراند بلازا </a></li>
        <li><a class='link' data-page='about'>من نحن</a></li>
        <li><a class='link' data-page='clients'>شركائنا</a></li>
        <li><a class='link' data-page='categories'>فروعنا</a></li>
        <li><a class='link' data-page='video'>الفيديوهات</a></li>
        <li><a class='link' data-page='visitors'>توقيعات الزوار</a></li>

		</ul>
	</div>
	<!-- /.navbar-collapse -->
</div>
</nav>
