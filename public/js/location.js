
(function(){

    function district(did) {
        $('.district').empty();

        if(did != ''){
            $.ajax({
                type:"GET",
                url:APP_URL+"/admin/user/ajax-district/"+did,
                dataType:"json",
                success: function (data) {
                    $('.district').empty();
                    $('.district').append("<option value=''>--Select District--</option>");
                    $.each(data, function (i, item) {
                        $('.district').append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
                    });
                },
                complete: function(){

                }
            });
        }else{
            $('.district').append("<option value=''>--Select District--</option>");
        }
    }

    $(document).ready(function () {

        $(document).on('change', '.zone', function(e){

            var zoneId = e.target.value;

            district(zoneId);
        });

    });
})();