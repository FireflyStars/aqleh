$(document).ready(function () {

    // Multi Selection Datatable
    $table = $('#selection-datatable').DataTable({
		columnDefs: [
			{
			   targets: 0,
			   sortable: false,
			},
			{
			   targets: 1,
			   sortable: false,
			   visible: false
			},
			{
			   targets: 2,
			   sortable: false,
			   visible: false
			},
			{
			   targets: 5,
         sortable: false,
         width: '100px'
			},
			{
			   targets: 6,
			   sortable: false,
			},
			{
			   targets: 7,
			   sortable: false,
			},
			{
			   targets: 9,
			   sortable: false,
			},
		 ],	 
		 select: {
			style: 'multi'
		 },     
		 order: [[0, 'asc']],
		 orderable: false
	});
	$('.detail').on('click', function (e) {
    rowData = $table.row( $(this).parent().parent() ).data();
    console.log(rowData[1].replace(/&lt;/g, '<').replace(/&gt;/g, '>'));
		$('#description-modal .custom-modal-text').html(rowData[1].replace(/&lt;/g, '<').replace(/&gt;/g, '>'));
		var modal = new Custombox.modal({
			content: {
				effect: 'fadein',
				target: '#description-modal'
			}
		});
		
		modal.open();		
  })
  
	$('.detail-ar').on('click', function (e) {
		rowData = $table.row( $(this).parent().parent() ).data();
		$('#description-modal .custom-modal-text').html(rowData[2].replace(/&lt;/g, '<').replace(/&gt;/g, '>'));
		var modal = new Custombox.modal({
			content: {
				effect: 'fadein',
				target: '#description-modal'
			}
		});
		
		modal.open();		
	})
    // table.buttons().container()
    //     .appendTo('#selection-datatable_wrapper .col-md-6:eq(1)').addClass('text-right');
});

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Parameter
        let url, $row;
        $('.sa-params').click(function (e) {
          $row = $table.row($(this).parent().parent());
            e.preventDefault();
            url = $(this).prop('href');
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
                  $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: url,
                    success: function (data) {
                      $row.remove().draw();
                      Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success'
                      })
                    },
                    error: function (e) {
                        console.log("ERROR : ", e);
                    }
                  });   
                } else if (result.dismiss === Swal.DismissReason.cancel) {
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