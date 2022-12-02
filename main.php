<?php
include "init.php";
 ?>
 <!-- HOMEPAGE -->
 <header id="top-section" class="fullbg">
 <div class="jumbotron">
 	<div id="carousel_intro" class="carousel slide fadeing">
 		<div class="carousel-inner">
      <?php
      //Get Category Items
      $select=sql("SELECT * FROM slideshow WHERE activity = 1 ORDER BY id LIMIT 5","fetchAll");
      $num = 1;
      foreach($select As $selectview){
        ?>
      <div class="item" id="slide">
        <div class="carousel-content">
          <div class="animated fadeInDownBig">
      <?php echo "<h1>$selectview[title]</h1>"; ?>
      <?php echo "<p>$selectview[description]</p>"; ?>
      <?php echo "</div>"; ?>
      <?php echo "<a href='#' class='buttonyellow animated fadeInLeftBig' data-toggle='modal' data-target='#myModal'>احجز الان</a>" ?>
      <?php echo "<a class='buttoncolor animated fadeInRightBig link' data-id=$selectview[id] data-page='slideshow'>";?>اقرأ المزيد<?php echo "</a>"; ?>
      <?php echo "</div>"; ?>
      <?php $img = $selectview['image'];
       $src=str_replace("../","",$img);
       echo "<img src='$src' />";
        ?>
      </div>
        <?php
        $num ++;
      }
      ?>
 		</div>
 	</div>
 	<button class="left carousel-control" href="#carousel_intro" data-slide="prev" data-start="opacity: 0.6; left: 0%;" data-250="opacity:0; left: 5%;"><i class="fa fa-chevron-left"></i></button>
 	<button class="right carousel-control" href="#carousel_intro" data-slide="next" data-start="opacity: 0.6; right: 0%;" data-250="opacity:0; right: 5%;"><i class="fa fa-chevron-right"></i></button>
 </div>
 <div class="inner-top-bg">
 </div>
 </header>
 <!-- / HOMEPAGE -->
 <!--  SECTION-1 -->
 <section id="Section-1" class="fullbg">
 <div class="section-divider">
 </div>
 <div class="container">
 <div class="row">
 	<div class="page-header text-center col-sm-12 col-lg-12 color-white animated fade">
    <?php
      $about_page = sql("SELECT * FROM about","fetch");
        $aboutname=str_replace("-","%20",$about_page["title"]);
          ?>
        <a class='link' data-page='about'>
      <h1 class='section-title'><?php echo $about_page['title'] ?></h1>
        </a>

        <p class="lead">
        <?php
        function custom_echo($x, $length)
          {
          if(strlen($x)<=$length)
          {
            echo $x;
          }
          else
          {
            $y=substr($x,0,$length) . '...';
            echo $y;
          }
        }
        custom_echo("<p>$about_page[description]</p>",600);

        // echo "<br /><a style='display:inline-block;' class='start-btn blue link' data-page='about'>";?><?php echo lang('READMORE') ?><?php echo "</a>";
      ?>
</p>
 	</div>
 </div>
 <div class="row color-white">
 	<div class="col-md-12 animated fadeInUpNow">
 		<div class="boxservice">
 			<i class="fa fa-pencil" aria-hidden="true"></i>
 			<h3 class='link' data-page='about'>
        من نحن
      </h3>
 			<p>
 				فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 			</p>
 		</div>
 		<div class="boxservice">
 			<i class="fa fa-camera-retro"></i>
 			<h3 class='link' data-page='video'>المرئيات </h3>
 			<p>
 				فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 			</p>
 		</div>
 		<div class="boxservice rightb">
 			<i class="fa fa-money" aria-hidden="true"></i>
 			<h3 data-toggle="modal" data-target="#myModal">احجز الان</h3>
 			<p>
 				فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 			</p>
 		</div>
 		<div class="boxservice bottomb">
 			<i class="fa fa-users" aria-hidden="true"></i>
 			<h3  class='link' data-page='clients'>شركائنا</h3>
 			<p>
 				فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 			</p>
 		</div>
 		<div class="boxservice bottomb">
 			<i class="fa fa-map-marker" aria-hidden="true"></i>
 			<h3 class='link' data-page='categories'>فروعنا </h3>
 			<p>
 				فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 			</p>
 		</div>
 		<div class="boxservice rightb bottomb">
 			<i class="fa fa-phone" aria-hidden="true"></i>
 			<h3><a href="#contact">
        اتصل بنا
      </a>
      </h3>
 			<p>
 				فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 			</p>
 		</div>
 	</div>
 </div>
 <!-- end row -->
 </div>
 </section>
 <!-- SECTION-2(gallery) -->
 <section id="Section-2" class="fullbg color-white">
 <div class="section-divider">
 </div>
 <div class="container demo-3">
 <div class="row">
 	<div class="page-header text-center col-sm-12 col-lg-12 animated fade">
 		<h1>فروعنا </h1>
 		<p class="lead">
 			فنادق جراند بلازا السياحية تقدم لكم العديد من الخدمات السياحية الممبزة
 		</p>
 	</div>
 </div>
 <div class="row animated fadeInUpNow">
 	<div class="col-sm-12 col-lg-12">
 		<ul class="grid cs-style-4">
      <?php
        $categories = sql("SELECT * FROM categories ORDER BY id","fetchAll");
        foreach ($categories as $cat) {
          ?>
 			<li>
 			<figure>
 			<div>
        <?php
        $img = $cat['image'];
       $src=str_replace("../","",$img);
        echo "<img src='$src' />";
        ?>
 			</div>
 			<figcaption>
 <h4>
 	<?php echo $cat["name"] ?>
 </h4>
 <p>
 	<i class="fa fa-home" aria-hidden="true"></i>
 <span><?php echo $cat["description"] ?></span>
 </p>
 			<a class='link' data-id='<?php echo $cat["id"] ?>' data-page='branch'> تابع المزيد</a>
 			</figcaption>
 			</figure>
 			</li>
      <?php
  }
       ?>
 		</ul>
 	</div>
 </div>
 </div>
 </section>
 
 <!-- SECTION-3(reviews) -->
 <section id="Section-3" class="fullbg color-white">
 <div class="section-divider">
 </div>
 <div class="container">
 <div class="row">
  <div class="page-header text-center col-sm-12 col-lg-12 animated fade">
    <h1>توقيعات الزوار</h1>
    <p class="lead">
    بعض الاراء والتقييمات الخاصة بزوار الموقع
    </p>
  </div>
 </div>
 <div class="row testimonials animated fadeInUpNow">
  <div class="col-sm-12 col-lg-12">
    <div class="arrow">
    </div>
    <div class="testimonials-slider">
      <?php
                      $socialmedia = sql("SELECT * FROM accordion WHERE activity=1 ORDER By id DESC ","fetchAll");
                      foreach ($socialmedia as $social) {
                        ?>
      <div class="slide">
        <div class="testimonials-carousel-thumbnail">
          <img width="120" alt="" src="layout/img/avatar2.jpg">
        </div>
        <div class="testimonials-carousel-context">
          <div class="testimonials-name">
             <h3>
 <?php echo $social["title"] ?>
             </h3>
          </div>
          <div class="testimonials-carousel-content">
            <p>
 <?php echo $social["description"] ?>
            </p>
            <p>
              <a class="btn btn-primary link" data-page='visitors'>لمشاهدة جميع التوقيعات</a>
            </p>
          </div>
        </div>
      </div>
      <?php
    }
 ?>

    </div>
  </div>
 </div>
 </div>
 </section>
 <section id="Section-4" class="fullbg color-white" style="background-position: 50% -4px;">
 <div class="section-divider">
 </div>
 <div class="container demo-3">
 <div class="row">
 	<div class="page-header text-center col-sm-12 col-lg-12 animated fade anim-fade">
 		<h1>شركاؤنا</h1>
 		<p class="lead">
 	نفخر ونسعد دائما بصداقتكم
 		</p>
 	</div>
 </div>
 <div class="row animated fadeInUpNow fadeInUp">
   <?php
   $clients = sql("SELECT * FROM clients WHERE activity = 1 ORDER By id DESC LIMIT 6","fetchAll");
   foreach ($clients as $client) {
     $img = $client['image'];
    $src=str_replace("../","",$img);
   ?>
 	<div class="col-md-2">
 		<div class="thumbnail">
 			<img src=<?php echo $src ?> alt="">
 		</div>
 	</div>
<?php
}
?>
 </div>
 </div>
 </section>
 <!-- SECTION-6 (contact) -->
 <section id="Section-6" class="fullbg">
 <div id="contact" class="section-divider">
 </div>
 <div class="container">
 <div class="row animated fadeInUpNow">
 	<div class="page-header text-center col-sm-12 col-lg-12 color-white animated fade">
 		<h2>اتصل بنا</h2>
 		<p class="lead">
 			هل لديك أفكار إبداعية وآراء ترغب بمشاركتها بكل صدق وصراحة؟
 حان الوقت لتتواصل معنا.
 		</p>
 	</div>
 	<div class="col-md-8">
 	<div class="col-lg-11">
 		<!-- <form action="" class="form" method="post" id="message_form">
 			<input name="name" size="30" type="text" id="name" class="col-lg-6 leftradius" placeholder="الاسم بالكامل">
 			<input name="email" size="30" type="text" id="email" class="col-lg-6 rightradius" placeholder="البريد الالكترونى ">
 			<br/><br/>
 			<textarea id="message" name="message" class="col-lg-12 allradius" placeholder="الرسالة " rows="7"></textarea><br/>
 			<br/>
 			<button value="ارسل الرسالة " type="button" id="Send_message" name="send" class="btn btn-default btn-lg">
 			<br/>
 		</form> -->
    <form class="form" method="post" id="send_message">
    <!--Start title-->
    <input type="text" id="title" name="title" class="col-md-6 leftradius" placeholder="<?php echo lang('TITLE') ?>" required="required" />
    <!--Start email-->
    <input type="email"  id="email" name="email" class="col-md-6 leftradius" placeholder="<?php echo lang('EMAIL') ?>" required="required" ظ>
    <!--Start email-->
    <textarea name="message" id="message" class="col-md-12 leftradius" required="required" rows="7" required="required"></textarea>
    <!--Start Sent-->
    <button type="button" class="start-btn btn-default message-btn"><?php echo lang('INSERT') ?></button>
    </form>
    <script>
    $(document).on('click', '.message-btn', function() {
        var data = new FormData(document.querySelector('#send_message')); // using the FormData API to submit form
        // if( $("#title").val()) {
        $.ajax({
            url: "send.php",
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            dataType: 'html',
            success: function(data) {
              $("#send_message").prepend("<div class='send-msg'>تم ارسال الرسالة بنجاح </div>");
            }
        });
// }else{
//   $("#send_message").prepend("<div class='send-msg'> جميع الحقول مطلوبة </div>");
// }
    });
    </script>
    <!-- <form action="" class="form" method="post" >
    <input type="hidden" name="action" value="submit">
    <label for="fname">Name :
    </label>
    <input type="text" id="name" name="name">
    <label for="country">Email :
    </label>
    <input type="text" id="email" name="email">
    <label for="country">Message :
    </label>
    <textarea name="message">
    </textarea>

    </form> -->

 	</div>
 		</div>
 	<div class="col-md-4">
 	<div class="contact-info">
 <h3>
 	بيانات التواصل
 </h3>
 <?php
 $contact = sql("SELECT * FROM contact","fetch");
 ?>
 <p>
 <i class="fa fa-home" aria-hidden="true"></i>
 <span><?php echo $contact["address"] ?></span>
 </p>
 <p>
 	<i class="fa fa-phone-square" aria-hidden="true"></i>
 <span><?php echo $contact["phone"] ?></span>
 </p>
 <p>
 	<i class="fa fa-envelope" aria-hidden="true"></i>
 	<span><?php echo $contact["email"] ?></span>
 </p>
 </div>
 </div>
 </div>
 </div>
 </section>
              </div>
                </div>
              </div>
<!-- <script>
var len = $("script").filter(function () {
    return ($(this).attr("src") == "layout/js/scripts.js");
}).length;

if (len === 0) {
    $.getScript("layout/js/scripts.js");
}
</script> -->
<script>
  $(".carousel-inner .item:first").addClass("active");
</script>
<script src="<?php echo $js ?>/init.js"></script>
<script src="<?php echo $js ?>/jquery.bxslider.min.js"></script>
