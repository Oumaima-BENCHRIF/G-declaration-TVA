$(window).on("load", function () {
    info_societe();
});
$(document).ready(function () {});

function info_societe(){
    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url: "./info_societe",
        type: "GET",
        dataType: "json",
        success: function (responce) {
            console.log(responce.get_info);
          jQuery.each(responce.get_info, function (key, item) {
        

          });
        },
        });
}