// On document ready functions
$(document).ready(function () {
	// Sidebar links hash scroll
    $('.sidebar li a').on('click', function  () {
        $('html, body').stop(true, true).animate({scrollTop: $(this.hash).offset().top - 20 + 1}, 600);
    });
   

	// Global variables
	var windowHeight = $(window).height();
	var navbarHeight = $(".navbar-main").height();

	// Init functions
	sidebarsHeightCalc();
	makeSidebarsSticky();
	

	$(window).bind('scroll resize', function() {
		sidebarsHeightCalc();
	});
	

	// Make sidebars sticky
	function makeSidebarsSticky(){
	    $("#sidebarLeft, #sidebarRight, #mainContent").stick_in_parent({
	        'parent': '#sidebarParent',
	        'recalc_every': 1,
	        'inner_scrolling': true,
	        'bottoming': false
	    });
	}

	// Make sidebars have window height
	function sidebarsHeightCalc(){
	   	$("#sidebarLeft").css({"min-height" : windowHeight + "px"});
	   	$("#sidebarRight").css({"min-height" : windowHeight + "px"});
	   	$("#mainContent").css({"min-height" : $("#sidebarRight").height() + "px"})  
   	}
   	
});



