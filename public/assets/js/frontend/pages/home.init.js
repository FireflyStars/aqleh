// Initializing scroll event
$("#main-top-menu").removeClass("nav-sticky");
$(window).scroll(function() {
	if ($('#ps4-nav').offset().top + $('#ps4-nav').height() >= $('#home').height() ) {
        $("#main-top-menu").addClass("nav-sticky");
        $('#ps4-nav').addClass('hide-pl4-nav');
	} else {
        
        if(!$("#overlay-home-menu-panel").hasClass('d-flex')){
            $("#main-top-menu").removeClass("nav-sticky");
        }
        $('#ps4-nav').removeClass('hide-pl4-nav');
    }
});	
$(document).ready(function(){
	// ps4 nav setting
	$(window).resize(function(){
		let width = $(window).width();
		let height = $(window).height();
		ps4Nav_width = $('#ps4-nav').width();
		ps4Nav_height = $('#ps4-nav').height();
		$('#ps4-nav').css('left', (width - ps4Nav_width)/2);
		$('#ps4-nav').css('top', (height - ps4Nav_height)/2);
		$('.tp-caption').each(function(){
			$(this).data('y', height - 80);
		});
	});
	$(window).resize();
	//   about section tab control
	$('.tablink').click(function (){
		$(this).parent().find('.tablink').each(function(){
			$(this).removeClass('active')
		});
		$(this).addClass('active');
		$selectedTabContent  = $(this).data('tabcontent');

		$('.tabcontent').each(function(){
			if(!$(this).hasClass('d-none')){
				$(this).addClass('d-none');
			}
		})
		$('#'+$selectedTabContent).removeClass('d-none');
	})

	/********** counter ***********/

	var a = 0;
		$(window).scroll(function() {
			var oTop = $('#counter').offset().top - window.innerHeight;
			if (a == 0 && $(window).scrollTop() > oTop) {
				$('.counter-value').each(function() {
					var $this = $(this),
						countTo = $this.attr('data-count');
					$({
						countNum: $this.text()
					}).animate({
							countNum: countTo
						},

						{

							duration: 2000,
							easing: 'swing',
							step: function() {
								$this.text(Math.floor(this.countNum));
							},
							complete: function() {
								$this.text(this.countNum);
								//alert('finished');
							}

						});
				});
				a = 1;
			}
		});	
	// revolution slider
		$('.fullwidthbanner').revolution({
			delay:9000,
			startwidth:1170,
			startheight: '100vh',
			hideThumbs:10,
            thumbWidth: 200,
            thumbHeight: 50,			
			fullWidth:"on",
			forceFullWidth:"on",
			onHoverStop:"off",
			navigationType:"none",
			navigationStyle:"preview4",
			spinner:"off",
			hideTimerBar:"on"			
		});
	// Owl Carousel initialize for clients section
	$(".clients-slider").owlCarousel({
		autoplay:true,
		smartSpeed:300,
		touchDrag  : true,
		mouseDrag  : true,
		margin: 30,
		loop:true,
		dots:false,
		autoplayHoverPause:true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		responsive: {
			0 : {
				items: 1
			},

			992 : {
				items: 4
			}
		}
	});		
	// Owl Carousel initialize for testimoninals
	$(".testimonials-slider").owlCarousel({
		autoplay:true,
		mouseDrag: false,
		smartSpeed:300,
		margin: 30,
		loop:true,
		dots:false,
		autoplayHoverPause:true,
		nav: true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		responsive: {
			0 : {
				items: 1
			},

			992 : {
				items: 2
			}
		}
	});
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
});
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
// function validateEmail(){
// 	let  = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
// 	let email = $('#contact-form input[type="email"]').val();
// 	if(!patt.test(email)){
// 		$('#contact-form input[type="email"]').next().removeClass('invisible');
// 		result = false;
// 	}​	
// }