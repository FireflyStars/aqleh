// loading preloader
$('.preloader').delay(500).fadeOut('slow');
$("#main-top-menu").addClass("nav-sticky");
// Initializing scroll event
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('.back-to-top').fadeIn();
    } else {
        $('.back-to-top').fadeOut();
    }    
});	
$('.back-to-top').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
});

$(document).ready(function(){
    // cursor effects
    const cursor = $(".cursor");
    $(window).mousemove(function(e){
        cursor.css({
            'left': (e.pageX - 10) + 'px',
            'top': (e.pageY - 10) + 'px',
        });
    });    
    $(document).on('click', function(){
        cursor.addClass('expand');
        setTimeout(function(){
            cursor.removeClass('expand')
        }, 500);
    })
    // show search panel
    $(window).scrollTop(0);
    $('#search-icon').click(function(){
        if($("body").hasClass('noscroll')){
            $("body").removeClass('noscroll');
            $('#search-panel').addClass('d-none');
        }else{
            $("body").addClass('noscroll');
            $('#search-panel').removeClass('d-none');
        }
    });
    $('#search-panel').click(function(event){
        if(!$(event.target).closest('#query').length){
            $('#search-panel').addClass('d-none');
            $('body').removeClass('noscroll');
        }
    });
	// when you click box menu
	$(".pls-nav-item").click(function(e){
		if($(this).hasClass('has-sub-menu')){
			e.preventDefault();
            $('#overlay-home-menu-panel').addClass('d-flex');
            $('#ps4-nav').addClass('d-none');
            if($(this).data('menu-name') == 'services'){
                $('#overlay-home-menu-panel .services-detail-panel').removeClass('d-none');
                $('#main-top-menu .has-sub-menu[data-menu-name="services"]').addClass('selected');
            }else{
                $('#overlay-home-menu-panel .aboutus-detail-panel').removeClass('d-none');
                $('#main-top-menu .has-sub-menu[data-menu-name="aboutus"]').addClass('selected');
            }
		}
        if ($('#home').length > 0) {
            $("#main-top-menu").addClass("nav-sticky");
        } else {
            $("#main-top-menu").removeClass("nav-sticky");
        }        
	});

	$(".has-sub-menu").click(function(e){
        // event.stopPropagation();
        $('.has-sub-menu').each(function(){
            $(this).removeClass('selected');
        });
        $('#overlay-home-menu-panel .sub-menu').each(function(){
            // if(!$(this).hasClass('d-none'))
                $(this).addClass('d-none');
        });
        $("#overlay-home-menu-panel").addClass('d-flex');
        if($(this).data('menu-name') == 'services'){
            $('#overlay-home-menu-panel .services-detail-panel').removeClass('d-none');
            $('#main-top-menu .has-sub-menu[data-menu-name="services"]').addClass('selected');
        }else{
            $('#overlay-home-menu-panel .aboutus-detail-panel').removeClass('d-none');
            $('#main-top-menu .has-sub-menu[data-menu-name="aboutus"]').addClass('selected');
        }
	});
	
	// remove overlay for home menu when you click outside of menu
	$('#overlay-home-menu-panel').on('click', function(event) {
		if (!$(event.target).closest('.home-menu-center').length) {
			$('#overlay-home-menu-panel').removeClass('d-flex');
            $('#overlay-home-menu-panel').addClass('d-none');
            if ($(window).scrollTop() < 370) {
                if($('#home').length){
                    $("#main-top-menu").removeClass("nav-sticky");
                }
            }
            
            // remove 'selected' class from main-top-menu 
			$('#navbarCollapse .has-sub-menu').each(function(){
                $(this).removeClass('selected');
            });

            // adding 'd-none' class to  #overlay-home-menu-panel .sub-menu
            $('#overlay-home-menu-panel .sub-menu').each(function(){
                if(!$(this).hasClass('d-none'))
                    $(this).addClass('d-none');
            });      
            $('#ps4-nav').removeClass('d-none');                
		}
	  });    
})