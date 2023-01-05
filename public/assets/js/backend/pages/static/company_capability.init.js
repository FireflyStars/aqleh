
$('#static-panel').bootstrapWizard();
$parsley = $('form').parsley();

$('#static-desc-en-editor').html($('#edit-static-form input[type="hidden"]#desc').val());
$('#static-desc-ar-editor').html($('#edit-static-form input[type="hidden"]#desc_ar').val());

// adding functions
$(document).ready(function(){

    $('#edit-static-form #submit').on('click', function(e){
        
        e.preventDefault();

        if ($parsley.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#edit-static-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner
            $("#edit-static-form #submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#edit-static-form #submit").prop("disabled", true);

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
                    $("#edit-static-form #submit span").removeClass('spinner-grow');
                    $("#edit-static-form #submit").prop("disabled", false);
                },
                error: function (e) {
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            return false;
        }
    });
});