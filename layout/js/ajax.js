$.ajaxSetup({ cache: false });
function fetch_data() {
  $('#data').html("");
    $.ajax({
        url: "main.php",
        method: "POST",
        success: function(data) {
            $('#data').empty().html(data);
            // $.getScript("layout/js/scripts.js");
        }
    });
}
$(document).ready(function(){
fetch_data();
});

//   // $(document).on('click', '.item_link', function() {
//   //     var item_id = $(this).attr("data-item");
//   //     // var folder = $(this).attr("data-folder");
//   //   $.ajax({
//   //       url: "items.php",
//   //       method: "POST",
//   //       data: {
//   //           id: item_id,
//   //       },
//   //       dataType: "text",
//   //       success: function(data) {
//   //           $('#data').html(data);
//   //
//   //       }
//   //   });
//   //   });
//

$(document).on('click', '.homepage', function() {
  fetch_data();

});
$(document).on('click', '.link', function() {
    var id = $(this).attr("data-id");
    var page = $(this).attr("data-page")+".php";
    if (this.hasAttribute("data-id")) {
  $.ajax({
      url: page,
      method: "POST",
      data: {
          id:id,
      },
      dataType: "text",
      success: function(data) {
          $('#data').empty().html(data);

      }
  });
}else{
  $.ajax({
      url: page,
      method: "POST",
      success: function(data) {
          $('#data').empty().html(data);
          // $.getScript("layout/js/scripts.js");
        //   if (typeof window.myCustomFlag == 'undefined') {
        // //the flag was not found, so the code has not run
        // $.getScript("layout/js/scripts.js");
        // console.log(myCustomFlag);
        // }
      }
  });
}
  });


$(document).on('click', '.search-button', function() {
    var data = new FormData(document.querySelector('#search-form'));
       $.ajax({
        url: "search.php",
        method: "POST",
        data : data,
        processData: false,
        contentType: false,
        success : function(data)
        {
$('#data').empty().html(data);
        }
    });
  });
  $(document).keypress(function(e) {
    var data = new FormData(document.querySelector('.search-form'));
  if(e.which == 13) {
    $.ajax({
     url: "search.php",
     type: 'post',
     data : data,
     processData: false,
     contentType: false,
     success : function(data)
     {
$('#data').empty().html(data);
     }
 });
 return false;
    }
    });
