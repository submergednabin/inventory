jQuery( document ).ready( function( $ ) {
    //
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

    //profile slug of category to be automatically generated
    $(function () {

        $(document).on('change', '.category_name' ,function (data) {
            var category_name = $(this).val();

            category_name = category_name.replace(/\s+/g, '-').toLowerCase();

            $('.generate_category_slug').val(category_name);


        });

    });

    //time pciker
    $(document).ready(function () {

        $(".datepicker").datepicker({
            defaultDate: 'now'
        });

        $(".timepicker").timepicker({
            showInputs: false,
        });

        $('.timepicker').val('');

    });


    $(function () {

        $(document).on('change', '.product_sku' ,function (data) {
            var category_name = $(this).val();
            category_name = category_name.toUpperCase();
            $('.generate_parent_sku').val(category_name);


        });

    });

    //Fetch Record According To Selection



    // user edit modal popup - BLOCK
    (function(){

        var url;
        // $('.edit-user-form').on('click',function(){
        //     alert('wow');
        // })
    // console.log('insert');
        // Create course form submission
        $( document ).on('click' , '.edit-user-form' , function(e){

            url = $(this).attr('data-url')

            //console.log(url);

            $('.user-edit').modal();

        });


        $( document ).on('click' , '.user-list .view-payment-details' , function(e){

            url = $(this).attr('data-url');

            if(window.location.href.indexOf("restaurant-payment-requests") > -1){
                if(window.location.href.indexOf("restaurant-payment-requests/all") > -1
                    || window.location.href.indexOf("restaurant-payment-requests/new") > -1
                    || window.location.href.indexOf("restaurant-payment-requests/pending") > -1
                ){
                    var current_payment_event = $(this);
                    current_payment_event.parent().parent().find('.new-payment').html('');
                }
            }

            $('.user-edit').modal();

        });


        $('.user-edit').on('shown.bs.modal', function(){


            $( ".user-edit .modal-body" ).load( url, function(response, status, xhr){

                if(status == 'error'){
                    var msg = 'Sorry but there was an error: ';
                    $( ".ajax-errors" ).html( msg + xhr.status + " " + xhr.statusText );
                }

                $(function () {
                    //Initialize Select2 Elements
                    $(".select2").select2();

                });



                $.each(country_code, function(index, value){
                    $('.fix_country_name').append('<option value="'+value.name+'">'+value.name+'</option>');
                });


                $(document).on('change', '.fix_country_name' ,function (data) {
                    var country = $(this).val();

                    $('.country_name').val(country);

                    $.each(country_code, function(index, value){
                        if(country == value.name){
                            $('.country_code').val(value.dial_code) ;
                            return false;
                        }
                    });
                });


                // $(document).on('change', '.user_select_dropdown' ,function (data) {
                //     var value = $(this).val();
                //
                //     $(this).next('input').val(value);
                // }).change();


            });
        });

        $('.user-edit').on('hidden.bs.modal', function(){

            var prep_content = $('.prep').html();

            $( ".user-edit .modal-body").html(prep_content);

        });

    })();
    // user edit modal popup - BLOCK [ END ]


    ///pop up modal for manage stock
    (function(){

        var url;

        // Create course form submission
        $( document ).on('click' , '.manage-stock-form' , function(e){

            url = $(this).attr('data-url');

            //console.log(url);

            $('.manage-stock').modal();

        });


        $('.manage-stock').on('shown.bs.modal', function(){


            $( ".manage-stock .modal-body" ).load( url, function(response, status, xhr){

                if(status == 'error'){
                    var msg = 'Sorry but there was an error: ';
                    $( ".ajax-errors" ).html( msg + xhr.status + " " + xhr.statusText );
                }

                $(function () {
                    //Initialize Select2 Elements
                    $(".select2").select2();

                });


            });
        });

        $('.manage-stock').on('hidden.bs.modal', function(){

            var prep_content = $('.prep').html();

            $( ".manage-stock .modal-body").html(prep_content);

        });

    })();


    // User update form
    (function(){

        $('.scroll-top').hide();

        $(document).on('submit', '.update-user', function(){

            // remove prior message which might have accumulated during earlier update
            $( '.error-message' ).each(function( ) {
                $(this).removeClass('make-visible');
                $(this).html('');
            });

            $( 'input' ).each(function( ) {
                $(this).removeClass('errors');
            });



            // current form under process
            var current_form = $(this);

            // === Dynamically get all the values of input data
            var request_data = {};

            request_data['_token']  = $(this).find('input[name=_token]').val();
            // request_data['_method'] = $(this).find('input[name=_method]').val();
            // console.log('hello');
            current_form.find('[name]').each(function(){
                request_data[$(this).attr("name")] = $(this).val();
            });

            request_data['product_id_array'] = $(this).find("select[name='product_id\\[\\]']").map(function(){
                return $(this).val();
            }).get();
            request_data['quantity_array'] = $(this).find("input[name='quantity\\[\\]']").map(function(){
                return $(this).val();
            }).get();
            request_data['price_array'] = $(this).find("input[name='price\\[\\]']").map(function(){
                return $(this).val();
            }).get();

            if($('#in').is(":checked"))
            {
                request_data['type']='I';
            }
            if($('#out').is(":checked"))
            {
                request_data['type']='O';
            }

            if($('#choosen').is(":checked"))
            {
                request_data['flag']='O';
            }else{
                request_data['flag']='D';
            }

            if($('#choice').is(":checked"))
            {
                request_data['flag']='O';

            }


            //$("#direct").find("checkbox").each(function(){
            //    if ($(this).prop('checked')==true){
            //        request_data['flag']='O';
            //    }else{
            //        request_data['flag']='D';
            //    }
            //});
            //$(document).on('change', '#direct', function(e){
            //    request_data['flag']=$(this).val();
            //});


            var product_id = $('#product_id').val();

            $.post(
                $(this).prop('action'),
                request_data,
                function(data){

                    // console.log(data);

                    if(data.status == 'success'){

                        $('.scroll-top').hide();

                        $('.user-edit').modal('hide');

                        current_form.find('[name]').each(function(){
                            $(this).val('');
                        });
                        if(window.location.href == data.url+"/create"){
                            window.location.href = data.url;
                        }else if(window.location.href.indexOf("password/reset") > -1){
                            window.location.href = data.url;
                        }else if(window.location.href.indexOf("fromPreviousRecord") > -1){
                            window.location.href = data.url;
                        }else if(data.url.indexOf("load-all-stocks") > -1) {
                            var id = data.product_id;
                            $('#product-lists #product-' + id + ' #stock-qty').replaceWith("<tr id='product" + data.product_id + "'><td id='stock-qty'>" + data.qty + "</td></tr>");
                            $('.manage-stock').modal('hide');
                        }
                        else if(window.location.href ==  APP_URL+"/admin/order/create"){
                            window.location.href = data.url;
                        }else if(window.location.href.indexOf("duplicate-form") > -1){
                            window.location.href = data.url;
                        }else if(data.url == APP_URL+"/admin/user"){
                            window.location.href = data.url;
                        }else if(data.url == APP_URL+"/admin/user/create"){
                            window.location.href = data.url;
                        }else if(data.url == APP_URL+"/admin/order")
                        {
                            $('html, body').animate({
                                scrollTop: $(".scroll-edit-order-note").offset().top
                            }, 200);
                            location.reload();
                        }else{
                            location.reload();
                        }



                    }else if(data.status == 'fails'){
                        // console.log(data.errors);
                        for (var key in data.errors) {

                            // skip loop if the property is from prototype
                            if (!data.errors.hasOwnProperty(key)) continue;

                            var error_message = data.errors[key];

                            current_form.find("[name="+key+"]").addClass('errors');

                            var parent = current_form.find("[name="+key+"]").parent();
                            parent.find('.error-message').addClass('make-visible').html(error_message);

                            if(key == "category_id"){
                                $('#create_category_error').addClass('make-visible').html(error_message);
                                $('#edit_category_error').addClass('make-visible').html(error_message);
                            }
                        }
                        $('.scroll-top').show();

                        $('html, body').animate({
                            scrollTop: $(".scroll-top").offset().top
                        }, 1200);
                    }

                }
            );


            return false;

        });

    })();



    $('.data-table').DataTable();







    // sweet alert delete
    $(document).on('submit', 'form.delete-user-form', function(){

        var current_form = $(this);


        swal({   title: "Are you sure?",
                text: "Are you sure you want to delete this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){

                var request_data = {};

                request_data['_token']  = current_form.find('input[name=_token]').val();
                console.log(request_data['_token']);

                $.ajax({
                    type: current_form.attr('method'),
                    url: current_form.attr('action'),
                    data: request_data,
                    success: function (data) {
                        //console.log(data);
                        if(data.status == 'success') {
                            // console.log('success');
                            location.reload();
                        }
                    }
                });

                swal("Deleted!", "Deleted Successfully!", "success");
            });

        return false;
    }) ;



    (function(){

        ///Activate User Js
        $(document).on('submit', 'form.activate-user-form', function(){

            var current_form = $(this);


            swal({   title: "Are you sure?",
                    text: "Are you sure you want to activate this!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55 ",
                    confirmButtonText: "Yes, Activate it!",
                    closeOnConfirm: false
                },
                function(){

                    var request_data = {};

                    request_data['_token']  = current_form.find('input[name=_token]').val();
                    console.log(request_data['_token']);

                    $.ajax({
                        type: current_form.attr('method'),
                        url: current_form.attr('action'),
                        data: request_data,
                        success: function (data) {
                            //console.log(data);
                            if(data.status == 'success') {
                                // console.log('success');
                                location.reload();
                            }
                            //if(data.hasOwnProperty("message")){
                            //    swal("Success!", data.message)
                            //}
                        }
                    });

                    swal("Activated!", "Activated Successfully!", "success");
                });

            return false;
        }) ;

    })();

    //
    (function(){

        ///Activate User Js
        $(document).on('submit', 'form.soft-delete-user-form', function(){

            var current_form = $(this);


            swal({   title: "Are you sure?",
                    text: "Are you sure you want to delete this!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55 ",
                    confirmButtonText: "Yes, Delete it!",
                    closeOnConfirm: false
                },
                function(){

                    var request_data = {};

                    request_data['_token']  = current_form.find('input[name=_token]').val();
                    console.log(request_data['_token']);

                    $.ajax({
                        type: current_form.attr('method'),
                        url: current_form.attr('action'),
                        data: request_data,
                        success: function (data) {
                            console.log(data);
                            if(data.status == 'success') {
                                // console.log('success');
                                location.reload();
                            }else if(data.status == 'fail'){
                                swal("Error!", data.message)
                            }
                        }
                    });

                    swal("Deleted!", "Deleted Successfully!", "success");
                });

            return false;
        }) ;

    })();





    (function(){
        $(document).on('click', '.machine-key-generate', function(e){
            e.preventDefault();
           var url = $(this).attr('data-url');
            $.get(url, function(responce){
                $('#machine_reference_key').val(responce);
            });
        });
    })();


    (function(){

        var url;

        // Create course form submission
        $( document ).on('click' , '.edit-user-form' , function(e){


            url = $(this).attr('data-url');

            //console.log(url);

            $('.user-edit').modal();

        });



        $('.user-edit').on('shown.bs.modal', function(){


            $( ".user-edit .modal-body" ).load( url, function(response, status, xhr){

                if(status == 'error'){
                    var msg = 'Sorry but there was an error: ';
                    $( ".ajax-errors" ).html( msg + xhr.status + " " + xhr.statusText );
                }

                $(function () {
                    //Initialize Select2 Elements
                    $(".select2").select2();

                });



            });
        });

        $('.user-edit').on('hidden.bs.modal', function(){

            var prep_content = $('.prep').html();

            $( ".user-edit .modal-body").html(prep_content);

        });

    })();


    //for note
    (function(){

        var url;

        // Create course form submission
        $( document ).on('click' , '.user-list .edit-note-form' , function(e){


            url = $(this).attr('data-url');

            //console.log(url);

            $('.note-edit').modal();

        });



        $('.note-edit').on('shown.bs.modal', function(){


            $( ".note-edit .modal-body" ).load( url, function(response, status, xhr){

                if(status == 'error'){
                    var msg = 'Sorry but there was an error: ';
                    $( ".ajax-errors" ).html( msg + xhr.status + " " + xhr.statusText );
                }

            });
        });

        $('.note-edit').on('hidden.bs.modal', function(){

            //$('.note-edit').modal('hide');

            var prep_content = $('.prep').html();

            $( ".note-edit .modal-body").html(prep_content);

        });

    })();



});




//JS for order create








