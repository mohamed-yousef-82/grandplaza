$('.popup .form').submit(function(){
  var data = new FormData(this);
     $.ajax({
      url: "../" + folder + "/" + table + "-update.php",
      type: 'post',
      data : data,
      processData: false,
      contentType: false,
      dataType : 'html',
      success : function(data)
      {
      $("body").append("<div class='msg'>Updated Successfully</div>");
      $(".msg").delay(2000).fadeOut(2000);
      function fetch_data() {
          $.ajax({
              url: "../" + folder + "/" + table + "-data.php",
              method: "POST",
              success: function(data) {
                  $('#data').html(data);
              }
          });
      }
      fetch_data();
      }
  });
  return false;
});
