$('#form-add-post').submit(function() {
    addNew();
    return false;
});
function addNew() {
    var data = new FormData(document.querySelector('#form-add-post')); // using the FormData API to submit form
    $.ajax({
        url: "../" + folder + "/" + table + "-insert.php",
        type: 'post',
        data: data,
        processData: false,
        contentType: false,
        dataType: 'html',
        success: function(data) {
            fetch_data();
        }
    });
}
