<form class="form" method="post" id="send_message">
<!--Start title-->
<input type="text" name="title" placeholder="<?php echo lang('TITLE') ?>" required="required" />
<!--Start email-->
<input type="email"  name="email" placeholder="<?php echo lang('EMAIL') ?>" required="required" />
<!--Start email-->
<input type="email" name="to" placeholder="<?php echo lang('RECIPIENT') ?>" required="required" />
<!--Start email-->
<textarea name="message" required="required"></textarea>
<!--Start Sent-->
<button type="button" class="start-btn blue message-btn"><?php echo lang('INSERT') ?></button>
</form>
 <script>
 $(document).on('click', '.message-btn', function() {
     var data = new FormData(document.querySelector('#send_message')); // using the FormData API to submit form
     $.ajax({
         url: "send.php",
         type: 'post',
         data: data,
         processData: false,
         contentType: false,
         dataType: 'html',
         success: function(data) {
           $("#send_message").prepend("<div class='send-msg'>Message Send Succefully</div>");
         }
     });

 });
 </script>
<?php
// if(isset($_POST['submit'])){
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//   $to = $_POST['to'];
//   $subject =  $_POST['title'];
//   $message =  $_POST['message'];
//   $email = $_POST['email'];
//   $headers = "From: $email.\r\n";
//   if (mail($to, $subject, $message, $headers)) {
//      echo "SUCCESS";
//   } else {
//      echo "ERROR";
//   }
// }
// }
?>
