

$('#project-panel').bootstrapWizard();
$parsley = $('form').parsley();

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
    
    $('#add-project-form #submit').on('click', function(){
        
        if(!$parsley.isValid({group: 'image', force: true})){
            $('a[href="#images"]').click();
        }

        if ($parsley.validate()) {
            //stop submit the form, we will post it manually.

            // Get form
            var form = $('#add-project-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
            // add spinner
            if ($('#add-project-form input[type="checkbox"]#status').prop('checked')) {
                data.set('status', 1);
            }else
                data.set('status', 0);

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
                    console.log(data)
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
                    toastr["success"]("Successfully Created!")
                    $("#submit span").removeClass('spinner-grow');
                    $("#submit").prop("disabled", false);
                    setTimeout(function(){
                        window. location. reload(true);
                    }, 2000);
                },
                error: function (e) {
                    console.log("ERROR : ", e);
                    $("#submit span").removeClass('spinner-grow');
                    $("#submit").prop("disabled", false);                    
                }
            });            
        }else{
            console.log('failed validation')
            return false;
        }
    });
});

