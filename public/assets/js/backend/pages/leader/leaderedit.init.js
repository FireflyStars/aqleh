

$parsley = $('form').parsley();
// $('#leader-en-desc-editor').html($('#edit-news-form input[type="hidden"]#desc').val());
// $('#leader-ar-desc-editor').html($('#edit-news-form input[type="hidden"]#desc_ar').val());
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click. ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Minimum Best image size 370X470 )',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
    },
    error: {
        'fileSize': 'The file size is too big (2M max).',
        'minWidth': 'The image width is too small (370px min).',
        'minHeight': 'The image height is too small (470px min).',
        'imageFormat': 'The image format is not allowed (jpg png gif only).'        
    }
});

// adding functions
$(document).ready(function(){
    $('#edit-leader-form #submit').on('click', function(e){
        
        e.preventDefault();

        if ($parsley.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#edit-leader-form')[0];

            // Create an FormData object 
            var data = new FormData(form);

            $("#edit-leader-form #submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#edit-leader-form #submit").prop("disabled", true);

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
                    $("#edit-leader-form #submit span").removeClass('spinner-grow');
                    $("#edit-leader-form #submit").prop("disabled", false);
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