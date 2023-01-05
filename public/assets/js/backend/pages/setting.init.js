/*
Template Name: Adminto - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
File: Form wizard init js
*/
$('#setting-panel').bootstrapWizard();
$parsleyPass = $('form#reset-password-form').parsley();
$parsleyImage = $('form#update-image-form').parsley();
$parsleyLogo = $('form#update-logo-form').parsley();
$parsleyCursor = $('form#update-cursor-form').parsley();
$parsleyOther = $('form#update-other-form').parsley();
$parsleyMeta = $('form#update-meta-form').parsley();
$('[data-plugin="switchery"]').each(function (idx, obj) {
    new Switchery($(this)[0], $(this).data());
});

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click. ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB))',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
    },
    error: {
        'fileSize': 'The file size is too big (2M max).',
        'minWidth': 'The image width is too small (150px min).',
        'minHeight': 'The image height is too small (150px min).',
        'imageFormat': 'The image format is not allowed (jpg png gif only).'     
    }
});    
$(document).ready(function () {
    $('#old-pass').on('input', function(){
        $('#old-pass-error').addClass('d-none');
        $('#old-pass').removeClass('parsley-error');

    })
    $('#reset-password-form #pass-submit').on('click', function(e){
        if ($parsleyPass.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#reset-password-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner

            $("#reset-password-form #pass-submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#reset-password-form #submit").prop("disabled", true);

            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                enctype: 'multipart/form-data',
                url: form.action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 5000,
                success: function (data) {
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "500",
                        "timeOut": "1000",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $("#reset-password-form #pass-submit span").removeClass('spinner-grow');
                    $("#reset-password-form #pass-submit").prop("disabled", false);                    
                    if (data) {
                        toastr["success"]("Successfully Updated!")
                    }else{
                        $('#old-pass').removeClass('parsley-success');
                        $('#old-pass').addClass('parsley-error');
                        $('#old-pass-error').removeClass('d-none');
                        toastr["error"]("Sorry Old Password Incorrect  !")
                    }            
                    
                },
                error: function (e) {
                    console.log(e);
                }
            });            
        }else{
            return false;
        }
    });
    $('#update-image-form #avatar-submit').on('click', function(e){
        
        if ($parsleyImage.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#update-image-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner

            $("#update-image-form #avatar-submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#update-image-form #avatar-submit").prop("disabled", true);

            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                enctype: 'multipart/form-data',
                url: form.action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 5000,
                success: function (data) {
                    console.log(data);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "500",
                        "timeOut": "1000",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }                    
                    toastr["success"]("Successfully Updated!")
                    $("#update-image-form #avatar-submit span").removeClass('spinner-grow');
                    $("#update-image-form #avatar-submit").prop("disabled", false);
                },
                error: function (e) {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "500",
                            "timeOut": "1000",
                            "extendedTimeOut": "500",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }                    
                        toastr["error"]("Sorry It was failed!")                    
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            return false;
        }
    });
    $('#update-logo-form #logo-submit').on('click', function(e){
        
        if ($parsleyLogo.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#update-logo-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner

            $("#update-logo-form #logo-submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#update-logo-form #logo-submit").prop("disabled", true);

            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                enctype: 'multipart/form-data',
                url: form.action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 5000,
                success: function (data) {
                    console.log(data);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "500",
                        "timeOut": "1000",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }                    
                    toastr["success"]("Successfully Updated!")
                    $("#update-logo-form #logo-submit span").removeClass('spinner-grow');
                    $("#update-logo-form #logo-submit").prop("disabled", false);
                },
                error: function (e) {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "500",
                            "timeOut": "1000",
                            "extendedTimeOut": "500",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }                    
                        toastr["error"]("Sorry It was failed!")                    
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            return false;
        }
    });

    $('#update-cursor-form #submit').on('click', function(e){
        
        if ($parsleyCursor.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#update-cursor-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner
            if ($('#update-cursor-form input[type="checkbox"]#cursor_effect').prop('checked')) {
                data.set('cursor_effect', 1);
            }else
                data.set('cursor_effect', 0);
            $("#update-cursor-form #submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#update-cursor-form #submit").prop("disabled", true);

            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                enctype: 'multipart/form-data',
                url: form.action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 5000,
                success: function (data) {
                    console.log(data);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "500",
                        "timeOut": "1000",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }                    
                    toastr["success"]("Successfully Updated!")
                    $("#update-cursor-form #submit span").removeClass('spinner-grow');
                    $("#update-cursor-form #submit").prop("disabled", false);
                },
                error: function (e) {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "500",
                            "timeOut": "1000",
                            "extendedTimeOut": "500",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }                    
                        toastr["error"]("Sorry It was failed!")                    
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            return false;
        }
    });
    $('#update-other-form #other-submit').on('click', function(e){
        
        if ($parsleyOther.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#update-other-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner

            $("#update-other-form #other-submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#update-other-form #other-submit").prop("disabled", true);

            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                enctype: 'multipart/form-data',
                url: form.action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 5000,
                success: function (data) {
                    console.log(data);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "500",
                        "timeOut": "1000",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }                    
                    toastr["success"]("Successfully Updated!")
                    $("#update-other-form #other-submit span").removeClass('spinner-grow');
                    $("#update-other-form #other-submit").prop("disabled", false);
                },
                error: function (e) {
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            $('a[href="#other-info"]').click();
            return false;
        }
    });
    $('#update-meta-form #meta-submit').on('click', function(e){
        
        if ($parsleyMeta.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#update-meta-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner

            $("#update-meta-form #meta-submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#update-meta-form #meta-submit").prop("disabled", true);

            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                enctype: 'multipart/form-data',
                url: form.action,
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 5000,
                success: function (data) {
                    console.log(data);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "500",
                        "timeOut": "1000",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }                    
                    toastr["success"]("Successfully Updated!")
                    $("#update-meta-form #meta-submit span").removeClass('spinner-grow');
                    $("#update-meta-form #meta-submit").prop("disabled", false);
                },
                error: function (e) {
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            $('a[href="#meta"]').click();
            return false;
        }
    });
});
