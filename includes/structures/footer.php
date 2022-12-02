
<!-- FOOTER -->
<footer id="foot-sec">
<div class="footerdivide">
</div>
<div class="container ">
<div class="row">
 <div class="text-center color-white col-sm-12 col-lg-12">
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
   <p>
      © جميع الحقوق محفوظة لمجموعة فنادق جراند بلازاللخدمات السياحبة
   </p>
   <p>
     تصميم وتطوير | <a href="#">لمسه لخدمات الويب </a>
   </p>
 </div>
</div>
</div>
   <?php $select = sql("SELECT * FROM twitter ","fetch"); ?>
   <?php
   if ($select['twitter'] !== ""){
     ?>

<div class="twitter-container">
 <div class="iframe">
<a class="twitter-timeline twitter"
 href="<?php echo $select['twitter']; ?>"
 data-width="100%"
 data-height="300">
Tweets by @TwitterDev
</a>
<button><i class="fa fa-twitter" aria-hidden="true"></i></button>
</div>
</div>
<?php
}
?>
</footer>
</body>
</html>
<script src="<?php echo $js ?>/jquery.min.js"></script>
<script src="<?php echo $js ?>/bootstrap.js"></script>
<script src="<?php echo $js ?>/jquery.parallax-1.1.3.js"></script>
<script src="<?php echo $js ?>/jquery.localscroll-1.2.7-min.js"></script>
<script src="<?php echo $js ?>/jquery.scrollTo-1.4.6-min.js"></script>
<script src="<?php echo $js ?>/jquery.bxslider.min.js"></script>
<script src="<?php echo $js ?>/jquery.placeholder.js"></script>
<script src="<?php echo $js ?>/modernizr.custom.js"></script>
<script src="<?php echo $js ?>/toucheffects.js"></script>
<script src="<?php echo $js ?>/animations.js"></script>
<script src="<?php echo $js ?>/init.js"></script>
<script src="<?php echo $js ?>/ajax.js"></script>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
<script>
$(".twitter-container button").click(function(){
$(".twitter-container .iframe").toggleClass("view");
});
</script>
<script>
  $(".dropdown-menu").closest("li").addClass("dropdown");
  $(".carousel-inner .item").addClass("active");
</script>
<script>
$(document).on('click', '.booking-btn', function() {
var data = new FormData(document.querySelector('#booking')); // using the FormData API to submit form
$.ajax({
    url: "booking.php",
    type: 'post',
    data: data,
    processData: false,
    contentType: false,
    dataType: 'html',
    success: function(data) {
    $("#booking").append("<div class='update-msg'>تمت الاضافة بنجاح</div>");
    }
});
});

</script>
<?
ob_end_flush();
?>
