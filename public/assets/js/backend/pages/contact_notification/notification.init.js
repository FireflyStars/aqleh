
$(document).ready(function () {
    // Multi Selection Datatable
    $table = $('#selection-datatable').DataTable({
		columnDefs: [
			{
			   	targets: 0,
			   	sortable: false,
			},
			{
			   	targets: 8,
         		sortable: false,
         		width: '100px'
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