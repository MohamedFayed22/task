(function($) {

    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });





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
                        data   :{"_method" : "DELETE"},
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
                                    '<strong>Danger: </strong>'+errorMsg+
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

                    $('#ajax-messages').html(' <div class="alert alert-success" role="alert">\n' +
                        '<button class="close" data-dismiss="alert"></button>\n' +
                        '<strong>Success: </strong>\n' + response.message +
                        '</div>');
                    if (form.hasClass('create')) {

                        form.trigger("reset");
                        form.find('select').val('').trigger('change');

                      }


                }else{

                    $('#ajax-messages').html(' <div class="alert alert-danger" role="alert">\n' +
                        '<button class="close" data-dismiss="alert"></button>\n' +
                        '<strong>Danger: </strong>\n' + response.message +
                        '</div>');
                }

            },
            error: function (data) {

                if (data.status == 422) { //validation errors
                    console.log(' validation error');
                    validation_errors(data);

                    $('#ajax-messages').html(' <div class="alert alert-danger" role="alert">\n' +
                        '<button class="close" data-dismiss="alert"></button>\n' +
                        '<strong>Danger: </strong>'+Lang.get('pages.input-confirmation')+
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
                    input.parents('.form-group').append("<p class='text-danger val-error'>:"+value[0]+"</p>");
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




})(window.jQuery);