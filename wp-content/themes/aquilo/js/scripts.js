/*-----------------------------------------------------------------------------------*/
/*	Mobile menu init
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
	$('.sf-menu').mobileMenu({
    	defaultText: 'Navigate to...',
    	className: 'select-menu',
    	subMenuDash: '&ndash;&ndash;'
	});
});






/*-----------------------------------------------------------------------------------*/
/*	Sf-menu init
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
	jQuery('ul.sf-menu').superfish({		
		delay:         300,                	// the delay in milliseconds that the mouse can remain outside a submenu without it closing 
		animation:     {opacity:'show'},   	// an object equivalent to first parameter of jQuery's .animate() method 
		speed:         'fast',           	// speed of the animation. Equivalent to second parameter of jQuery's .animate() method 
		autoArrows:    true,             	// if true, arrow mark-up generated automatically = cleaner source code at expense of initialisation performance 
		dropShadows:   false,               // completely disable drop shadows by setting this to false 
		disableHI:     false,              	// set to true to disable hoverIntent detection 
		onInit:        function(){},       	// callback function fires once Superfish is initialised – 'this' is the containing ul 
		onBeforeShow:  function(){},       	// callback function fires just before reveal animation begins – 'this' is the ul about to open 
		onShow:        function(){},       	// callback function fires once reveal animation completed – 'this' is the opened ul 
		onHide:        function(){}
	});	
});







/*-----------------------------------------------------------------------------------*/
/*	PrettyPhoto init
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
    $("a[data-rel^='prettyPhoto']").prettyPhoto({
		//opacity: 0.30,
		//show_title: false
		//theme: 'dark_rounded'
	});	
});


  




		
		
/*-----------------------------------------------------------------------------------*/
/*	Portfolio hover item effect
/*-----------------------------------------------------------------------------------*/
jQuery(".img-opacity").live({
	mouseover:
		function() {
			jQuery(this).animate({opacity: 0.3}, 300);  
		},
	mouseout:
		function() {
			jQuery(this).animate({opacity: 1}, 300);
		}
	}
);








/*-----------------------------------------------------------------------------------*/
/*	Flexslider
/*-----------------------------------------------------------------------------------
$(window).load(function() {				
	$('.flexslider').flexslider({
		animation: 'fade'
		});	
	$('#main-flexslider').flexslider({
		animation: 'fade',
		direction:'horizontal',
		slideshowSpeed: 7000,   //Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 600,  //Integer: Set the speed of animations, in milliseconds  
		
		// Primary Controls
		controlNav: 1,        //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
		directionNav: 1		
    });		
});


*/




/*-----------------------------------------------------------------------------------*/
/*	Filterable portfolio
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	function portfolio_quicksand() {		
		// Setting Up Our Variables
		var $filter;
		var $container;
		var $containerClone;
		var $filterLink;
		var $filteredItems		
		// Set Our Filter
		$filter = $('#portfolio-filter li.active a').attr('id');		
		// Set Our Filter Link
		$filterLink = $('#portfolio-filter li a');		
		// Set Our Container
		$container = $('div#portfolio-wrap');		
		// Clone Our Container
		$containerClone = $container.clone();		
		// Apply our Quicksand to work on a click function
		// for each for the filter li link elements
		$filterLink.click(function(e) 	{
			// Remove the active class
			$('#filter li').removeClass('active');			
			// Split each of the filter elements and override our filter
			$filter = $(this).attr('class').split(' ');			
			// Apply the 'active' class to the clicked link
			$(this).parent().addClass('active');			
			// If 'all' is selected, display all elements
			// else output all items referenced to the data-type
			if ($filter == 'all') {
				$filteredItems = $containerClone.find('div.portfolio-item'); 
			}
			else {
				$filteredItems = $containerClone.find('div.portfolio-item[data-type~=' + $filter + ']'); 
			}			
			// Finally call the Quicksand function
			$container.quicksand($filteredItems, 
			{
				// The Duration for animation
				duration:'' ,
				// the easing effect when animation
				easing: '',
				// height adjustment becomes dynamic
				adjustHeight: '' 
			});			
			//Initalize our PrettyPhoto Script When Filtered
			$container.quicksand($filteredItems, 
				function () { lightbox(); }
			);			
		});
	}		
	if(jQuery().quicksand) {
		portfolio_quicksand();	
	}		
	function lightbox() {
		// Apply PrettyPhoto to find the relation with our portfolio item
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
		});
	}	
	if(jQuery().prettyPhoto) {
		lightbox();
	}	
});







/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	$(".accordion").accordion({
		autoHeight: false,
		collapsible: true
	});
});







/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
	jQuery('.tabs').tabs({ 
		fx: { opacity:'toggle'},
		selected:0
	});
});