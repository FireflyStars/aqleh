$('.single-service-desc').html($('.single-service-desc').text());
$('.overlay-contact-panel').fadeOut();
$('.contact-module-card .close-btn').click(function(){
    $('.contact-module-card').fadeOut(500);
});
$('.contact-module-card .show-overlay-contact').click(function(){
    $('.overlay-contact-panel').fadeIn(1000);
    $(window).scrollTop(0);
});
$('.overlay-contact-panel .close-btn').click(function(){
    $('.overlay-contact-panel').fadeOut(1000);
});

// send message
$('#direct-contact-form #submit').on('click', function(){
    event.preventDefault();
    if ($parsley.validate()) {
        //stop submit the form, we will post it manually.

        // Get form
        var form = $('#direct-contact-form')[0];

        // Create an FormData object 
        var data = new FormData(form);

        $("#submit span").addClass('spinner-grow');
        // disabled the submit button
        $("#submit").prop("disabled", true);

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            enctype: 'multipart/form-data',
            url: form.action,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                console.log(data);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
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
                toastr["success"]("Successfully Sent!")
                $("#submit span").removeClass('spinner-grow');
                $("#submit").prop("disabled", false);
            },
            error: function (e) {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
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
                toastr["Error"]("Sorry Failed!")
                $("#submit span").removeClass('spinner-grow');
                $("#submit").prop("disabled", false);                    
                console.log("ERROR : ", e);
            }
        });            
    }else{
        return false;
    }
});	