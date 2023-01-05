/*
Template Name: Adminto - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
File: Form wizard init js
*/
$parsley = $('form#history-form').parsley();
$(document).ready(function () {
    $('#history-form #submit').on('click', function(e){
        
        if ($parsley.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#history-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner

            $("#history-form #submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#history-form #submit").prop("disabled", true);

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
                    $("#history-form #submit span").removeClass('spinner-grow');
                    $("#history-form #submit").prop("disabled", false);
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
                        $("#history-form #submit span").removeClass('spinner-grow');
                        $("#history-form #submit").prop("disabled", false);                                      
                    console.log("ERROR : ", e);
                }
            });            
        }else{
            return false;
        }
    });
});
