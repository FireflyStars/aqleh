$parsley = $('#reply-form').parsley();
let contactUrl;
!function ($) {
    "use strict";
    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Parameter
        let url, $row;
        $('.delete').click(function (e) {
			e.preventDefault();
            url = $(this).prop('href');
	        $row = $table.row($(this).parent().parent());

			Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
					$.ajax(
							{
								type: 'post',
								url: url, 
								headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
								success: function (response) {
									if (response == 'success') {
					                    $row.remove().draw();
										Swal.fire({
											title: 'Deleted!',
											type: 'success',
											timer: 2000
										  })
									}
								}
							}
						);
                  } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    // Swal.fire({
                    //   title: 'Cancelled',
                    //   text: 'Your imaginary file is safe :)',
                    //   type: 'error'
                    // })
                  }
            });
        });		
    },
        //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),
function ($) {
	"use strict";
	$.SweetAlert.init()
}(window.jQuery);

$(document).ready(function () {

    // Multi Selection Datatable
    $table = $('#selection-datatable').DataTable({
		columnDefs: [

			{
			   targets: 0,
			},
			{
			   targets: 1,
			   width: '100px'
			},
			{
			   targets: 2,
			},
			{
			   targets: 3,
			   sortable: false,
			   width: '400px'
			},
			{
			   targets: 4,
			   width: '100px'
			},
			{
			   targets: 5,
			   sortable: false,
			},
			{
			   targets: 6,
			   sortable: false,
			},
			{
			   targets: 7,
			   sortable: false,
			},
		 ],	 
		 select: {
			style: 'multi'
		 },     
		 order: [[0, 'asc']],
		 orderable: false
	});
	$('.reply').on('click', function (e) {
		e.preventDefault();
		contactUrl = $(this).prop('href');
		modal = new Custombox.modal({
			content: {
				effect: 'fadein',
				target: '#reply-modal'
			}
		});
		modal.open();		
	})
	$('.send').on('click', function(e){
		e.preventDefault();
        if ($parsley.validate()) {
			// Get form
			var form = $('#reply-form')[0];
			// Create an FormData object 
			var data = new FormData(form);		
			$("#reply-form button[type='submit'] span").addClass('spinner-grow');
			// disabled the submit button
			$("#reply-form button[type='submit']").prop("disabled", true);
			$.ajax(
					{
						type: "POST",
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						enctype: 'multipart/form-data',
						url: contactUrl, 
						data: data,
						processData: false,
						contentType: false,
						cache: false,
						timeout: 50000,					
						success: function (response) {
							$("#reply-form button[type='submit'] span").removeClass('spinner-grow');
							$("#reply-form button[type='submit']").prop("disabled", false);   						
							Custombox.modal.close();
							Swal.fire({
								title: 'Successfully Sent!',
								type: 'success',
								timer: 2000,
							})
						},
						error: function (error){
							$("#reply-form button[type='submit'] span").removeClass('spinner-grow');
							$("#reply-form button[type='submit']").prop("disabled", false);   						
							Custombox.modal.close();						
							Swal.fire({
								title: 'Sorry! Please try again later',
								type: 'error',
								timer: 2000,
							})						
						}
					}
			);
		}else{
			return false;
		}
	});
});