(function($) {

    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var base_url = $('meta[name = "baseUrl"]').attr('content');


// send delete action request using bootbox and ajax.
$(".table-delete-action").on("click",
    ".delete-action",
    function() {


        var clickedBtn = $(this);
        var clickedBtnText = $(this).attr('data-text');
        var datatable  = clickedBtn.parents('table').dataTable();
        bootbox.confirm({
            title  : "<div class='text-center'> "+ Lang.get('pages.delete-confirmation') +" </div>",
            message: "<div class=''>"+Lang.get('pages.ru-sure') +" "+ clickedBtnText+" ? </div>",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i>'+Lang.get('pages.cancel-btn')
                },
                confirm: {
                    label    : '<i class="fa fa-check"></i>' + Lang.get('pages.delete-btn'),
                    className: "btn-danger"
                }
            },
            callback: function(result) {
                if (result) {
                    $.ajax({
                        url: clickedBtn.attr("data-url"),
                        method : "POST",
                        data   :{"_method" : "GET"},
                        success: function(responseData) {

                            if (responseData.deleteStatus) {

                                var clickedTr = clickedBtn.parents('tr');
                                clickedTr.fadeOut('slow', function() {
                                    datatable.fnDeleteRow($(this)); //this for clickedTr
                                });

                                $('.alert-msg').text(responseData.message);
                                $("#notification_success").fadeTo(5000, 500).fadeOut(1000, function(){
                                    $("#success-alert").alert('close');
                                });


                            }else{

                                var errorMsg = responseData.message;

                                $('#ajax-messages').html(' <div class="alert alert-danger" role="alert">\n' +
                                    '<button class="close" data-dismiss="alert"></button>\n' +
                                    '<strong>' +Lang.get('pages.danger')+' : </strong>'+errorMsg+
                                    '</div>');
                            }
                        }
                    });
                }
            }
        });

        return false;
    });






    $('body').on('submit', 'form.ajax', function(e) {
        e.preventDefault();
        var form    = $(this);
        var formUrl = form.attr('action');


        var formInputs = $(form.find(':input.form-data-input'));

        var formData = new FormData();

        formInputs.each(function(index, el) {
            var formInput = $(el);



            if (formInput.attr('type') == 'file' && formInput.attr('name').indexOf('[]') >= 0 ) {

                if (formInput[0].files[0]) {

                    for (var i = 0; i < formInput[0].files.length; i++) {
                        formData.append(formInput.attr('name'),formInput[0].files[i]);
                    }

                }else{
                    formData.append(formInput.attr('name'),formInput.val());
                }

            }else if(formInput.attr('type') == 'file'){

                if (formInput.val()) {
                    formData.append(formInput.attr('name'),formInput[0].files[0]);
                }

            }else if(formInput.attr('type') == 'checkbox'){

                if (formInput.is(":checked")) {
                    formData.append(formInput.attr('name'),formInput.val());
                }

            }
            else if(formInput.attr('type') == 'radio'){

                if (formInput.is(":checked")) {
                    formData.append(formInput.attr('name'),formInput.val());
                }

            }else if(formInput[0].type == 'select-multiple'){

                if (formInput.val()) {
                    for (var i = 0; i < formInput.val().length; i++) {
                        formData.append(formInput.attr('name'),formInput.val()[i]);
                    }

                }

            }else{
                formData.append(formInput.attr('name'),formInput.val());
            }

        });

        if ( form.find('input[name="_method"]').length ) {
            formData.append( '_method', form.find('input[name="_method"]').val() );
        }

        if ( form.find('input[name="_token"]').length ) {
            formData.append( '_token', form.find('input[name="_token"]').val() );
        }




        $('.flash-messages').remove();
        $('#ajax-messages').html('');
        $('.val-error').remove();


        $.ajax({
            method: 'POST',
            url: formUrl,
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {

                if (response.requestStatus) {

                    $('#ajax-messages').html(' <div class="alert alert-success alert-styled-left" role="alert">\n' +
                        '<button class="close" data-dismiss="alert"></button>\n' +
                        '<strong>'+Lang.get('pages.success')+': </strong>\n' + response.message +
                        '</div>');
                    if (form.hasClass('create')) {

                        form.trigger("reset");
                        form.find('select').val('').trigger('change');

                      }


                }else{

                    $('#ajax-messages').html(' <div class="alert alert-danger" role="alert">\n' +
                        '<button class="close" data-dismiss="alert"></button>\n' +
                        '<strong>'+Lang.get('pages.danger')+': </strong>\n' + response.message +
                        '</div>');
                }

            },
            error: function (data) {

                if (data.status == 422) { //validation errors
                    console.log(' validation error');
                    validation_errors(data);

                    $('#ajax-messages').html(' <div class="alert alert-danger" role="alert">\n' +
                        '<button class="close" data-dismiss="alert"></button>\n' +
                        '<strong>'+Lang.get('pages.danger')+': </strong>'+Lang.get('pages.input-confirmation')+
                        '</div>');

                }else{
                    console.log('Error');
                }


            },
            complete : function(data) {

            }

        });

        return false;
    });






    function validation_errors(data) {


        var errors = data.responseJSON;
        $.each( errors.errors, function( key, value ) {
            var input = $(':input[name="'+key+'"]');


            if(input.length == 0){
                input = $(':input[name="'+key+'[]"]'); // for multiple inputs
            }

            if (input.length) {

                if(input[0].nodeName == 'SELECT'){
                    input.parent().append("<p class='text-danger val-error'>:"+value[0]+"</p>");
                }else if(input[0].nodeName == 'TEXTAREA'){
                    input.parents('.form-group').append("<p class='text-danger val-error'>:"+value[0]+"</p>");
                }

                else{
                    input.after("<p class='text-danger val-error'>:"+value[0]+"</p>");
                }
            }else{

                var k = key.split(".");
                if(k.length == 2){
                    input = $(':input[name="'+k[0]+'[]"]'); // for multiple inputs
                    input.each(function(index) {
                        if(key == k[0]+'.'+index){
                            $(this).after("<p class='text-danger val-error'>:"+value[0]+"</p>");
                        }

                    });

                }else{

                    console.log(key +' input not found to show its error validation');
                }
            }

        });



    }




    // add more attributes

    $('body').on('click', '.addMoreAttribute', function(e) {

         e.preventDefault();
         var maxGroup = 10;

        //add more fields group

            if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);

            }else{
                // alert('Maximum '+maxGroup+' groups are allowed.');
            }
        });

    //remove fields group
    $("body").on("click",".remove",function(){

        if( $(this).parents(".fieldGroup").is(":first-child")){

            $(this).parents(".fieldGroup").find('input:text').val('');
        }else{

             $(this).parents(".fieldGroup").remove();
        }

    });


    //
    // $('body').on('click','.clicked' , function () {
    //
    //     $.ajax({
    //         method:'GET',
    //         url:base_url+'/users/activeRefreshedTaps',
    //         data:{tap:$(this).attr('href')},
    //         error:function(){
    //             console.log('error active tap');
    //         }
    //     });
    // });









    $('.table').on('change','.show-menu-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){


            $(".create-menu-checkbox[data-index='"+index+"']").prop('disabled',false);

            if( $(".create-menu-checkbox[data-index='"+index+"']").is(':checked')){

                $(".update-menu-checkbox[data-index='"+index+"']").prop('disabled',false);
                $(".delete-menu-checkbox[data-index='"+index+"']").prop('disabled',false);

            }
        }else{

            $(".create-menu-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".update-menu-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-menu-checkbox[data-index='"+index+"']").prop('disabled',true);
        }

        });


    $('.table').on('change','.show-driver-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

                $(".update-driver-checkbox[data-index='"+index+"']").prop('disabled',false);
                $(".delete-driver-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-driver-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-driver-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });



    $('.table').on('change','.show-user-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

            $(".update-user-checkbox[data-index='"+index+"']").prop('disabled',false);
            $(".delete-user-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-user-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-user-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });


    $('.table').on('change','.show-device-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

            $(".update-device-checkbox[data-index='"+index+"']").prop('disabled',false);
            $(".delete-device-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-device-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-device-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });



    $('.table').on('change','.show-geofence-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

            $(".update-geofence-checkbox[data-index='"+index+"']").prop('disabled',false);
            $(".delete-geofence-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-geofence-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-geofence-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });



    $('.table').on('change','.show-container-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

            $(".update-container-checkbox[data-index='"+index+"']").prop('disabled',false);
            $(".delete-container-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-container-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-container-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });



    $('.table').on('change','.show-group-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

            $(".update-group-checkbox[data-index='"+index+"']").prop('disabled',false);
            $(".delete-group-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-group-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-group-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });


    $('.table').on('change','.create-menu-checkbox' , function () {

        var index = $(this).attr('data-index');

        if ($(this).is(':checked')){

            $(".update-menu-checkbox[data-index='"+index+"']").prop('disabled',false);
            $(".delete-menu-checkbox[data-index='"+index+"']").prop('disabled',false);

        }else{

            $(".update-menu-checkbox[data-index='"+index+"']").prop('disabled',true);
            $(".delete-menu-checkbox[data-index='"+index+"']").prop('disabled',true);
        }
    });



})(window.jQuery);