
$('#news-panel').bootstrapWizard();
$parsley = $('form').parsley();

$('#news-desc-en-editor').html($('#edit-news-form input[type="hidden"]#desc').val());
$('#news-desc-ar-editor').html($('#edit-news-form input[type="hidden"]#desc_ar').val());

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click. ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Minimum Best image size 800X608 )',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
    },
    error: {
        'fileSize': 'The file size is too big (2M max).',
        'minWidth': 'The image width is too small (800px min).',
        'minHeight': 'The image height is too small (608px min).',
        'imageFormat': 'The image format is not allowed (jpg png gif only).'        
    }
});
// switchery

$('[data-plugin="switchery"]').each(function (idx, obj) {
    new Switchery($(this)[0], $(this).data());
});

// adding functions
$(document).ready(function(){
    $('#name').on('input', function(){
        $('#page_url').val($(this).val().replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '').toLowerCase().replace(/ +/g, '-'));
    })
    $('#name_ar').on('input', function(){
        $('#page_url_ar').val($(this).val().replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '').toLowerCase().replace(/ +/g, '-'));
    })

    $('#edit-news-form #submit').on('click', function(e){
        
        e.preventDefault();
        if(!$parsley.isValid({group: 'image', force: true})){
            $('a[href="#images"]').click();
        }

        if(!$parsley.isValid({group: 'meta', force: true})){
            $('a[href="#meta"]').click();
        }

        if ($parsley.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#edit-news-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner
            if ($('#edit-news-form input[type="checkbox"]#status').prop('checked')) {
                data.set('status', 1);
            }else
                data.set('status', 0);

            $("#edit-news-form #submit span").addClass('spinner-grow');
            // disabled the submit button
            $("#edit-news-form #submit").prop("disabled", true);

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
                    $("#edit-news-form #submit span").removeClass('spinner-grow');
                    $("#edit-news-form #submit").prop("disabled", false);
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
