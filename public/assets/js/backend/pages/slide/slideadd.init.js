

// initialize drag and drop plugin.
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click. ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Minimum Best image size 250 X 250 )',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
    },
    error: {
        'fileSize': 'The file size is too big (2M max).',
        'minWidth': 'The image width is too small (250px min).',
        'minHeight': 'The image height is too small (250px min).',
        'imageFormat': 'The image format is not allowed (jpg png gif only).'        
    }
});

// adding functions
$(document).ready(function(){

    $('#add-slide-form #submit').on('click', function(){
        
        event.preventDefault();
		// Get form
		var form = $('#add-slide-form')[0];

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
					window.location.reload(true);
				}, 1200);
			},
			error: function (e) {
				console.log("ERROR : ", e);
			}
		});            
    });
});
