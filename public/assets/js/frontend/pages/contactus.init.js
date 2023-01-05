
// contact us section switcher
if ($(".contact-section-wrapper .contact-switcher").length) {
	var btns = $(".contact-switcher .button"),
		mapSection = $(".contact-section-wrapper .map-wrapper"),
		contactSection = $(".contact-section-wrapper .contact-block");

	contactSection.addClass("hide-content");
	mapSection.find(".overlay").addClass("hide-content");

	btns.on("click", function() {
		var $this = $(this);
		if (!$this.hasClass("active")) {
			$this.addClass("active");
			$this.parent().siblings().find(".button").removeClass("active");

			if ($this.attr("data-style") === mapSection.attr("data-style")) {
				mapSection.removeClass("hide-content");
				mapSection.find(".overlay").addClass("hide-content");
				contactSection.addClass("hide-content");

			} else if (($this.attr("data-style") === contactSection.attr("data-style"))) {
				contactSection.removeClass("hide-content");
				mapSection.find(".overlay").removeClass("hide-content");
			}
		}

		return false; 
	});
}	

$(document).ready(function(){
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
	// custom file input 
	$(".customfile").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".customfile-label").find('span').html(fileName);
		$(this).siblings('span').addClass('invisible');
	});
	// contact form 
	$('#contact-form #submit').click(function(){	
        if (validateContact()) {
            // add spinner
			$("#submit span").addClass('spinner-grow');
			
            // disabled the submit button
            $("#submit").prop("disabled", true);
            // Get form
            var form = $('#contact-form')[0];

            // Create an FormData object 
            var data = new FormData(form);
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
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-center",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
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
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-center",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					  }                  
					  $("#submit span").removeClass('spinner-grow');
					  $("#submit").prop("disabled", false);                    
					  toastr["error"]("Failed! try again later")					
                }
            });    			
		}else{
			return false;
		}
	});
	$('#contact-form input[name="name"]').on('input',function(){
		$(this).next().addClass('invisible');
	})
	$('#contact-form input[name="email"]').on('input',function(){
		$(this).next().addClass('invisible');
	});	
})
function validateContact() {
	let result = true;

	if(!$('#contact-form input[name="name"]').val()){
		$('#contact-form input[name="name"]').next().removeClass('invisible');
		result = false;
	}
	if(!$('#contact-form input[name="email"]').val()){
		$('#contact-form input[name="email"]').next().removeClass('invisible');
		result = false;
	}
	if($('#contact-form #cv_file')[0].files.length == 0){
		$('#contact-form input[name="cv_file"]').siblings('span').removeClass('invisible');
		result = false;
	}
	return result;
}	