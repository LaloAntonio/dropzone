function viewData(){
    $.ajax({
        url: "showregistro.php",
        success: function (data) {
            $('#noticias').html(data);
        }
    });
}