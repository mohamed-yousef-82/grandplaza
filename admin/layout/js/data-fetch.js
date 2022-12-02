function fetch_data() {

    $.ajax({
        url: "../" + folder + "/" + table + "-data.php",
        method: "POST",
        success: function(data) {
            $('#data').html(data);
        }
    });
}
