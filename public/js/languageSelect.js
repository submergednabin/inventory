$(function () {

    $('#lang-select').on('change', function () {
        var lang = $(this).val();
        $.get(APP_URL+"/lang", {lang: lang}, function (responce) {
            console.log(responce);
            location.reload();
        });

    });

});
