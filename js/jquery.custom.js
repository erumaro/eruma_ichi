/*-----------------------------------------------------------------------------------

 	Custom JS - All front-end jQuery
 
-----------------------------------------------------------------------------------*/
 
jQuery(document).ready(function() {
	
	function portfolio_quicksand() {
		
		// Setting Up Our Variables
		var $filter;
		var $container;
		var $containerClone;
		var $filterLink;
		var $filteredItems
		
		// Set Our Filter
		$filter = $('.filter li.active a').attr('class');
		
		// Set Our Filter Link
		$filterLink = $('.filter li a');
		
		// Set Our Container
		$container = $('ul.filterable-grid');
		
		// Clone Our Container
		$containerClone = $container.clone();
		
		// Apply our Quicksand to work on a click function
		// for each for the filter li link elements
		$filterLink.click(function(e) 
		{
			// Remove the active class
			$('.filter li').removeClass('active');
			
			// Split each of the filter elements and override our filter
			$filter = $(this).attr('class').split(' ');
			
			// Apply the 'active' class to the clicked link
			$(this).parent().addClass('active');
			
			// If 'all' is selected, display all elements
			// else output all items referenced to the data-type
			if ($filter == 'all') {
				$filteredItems = $containerClone.find('li'); 
			}
			else {
				$filteredItems = $containerClone.find('li[data-type~=' + $filter + ']'); 
			}
			
			// Finally call the Quicksand function
			$container.quicksand($filteredItems, 
			{
				// The Duration for animation
				duration: 750,
				// the easing effect when animation
				easing: 'easeInOutCirc',
				// height adjustment becomes dynamic
				adjustHeight: 'dynamic' 
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
		// Apply Fancybox to find the relation with our portfolio item
		$(".fancybox").fancybox();
	}
	
	if(jQuery().fancybox) {
		lightbox();
	}
        // Scroll function
        $(function() {
	$('li.scroll a').click(function(e){
										  
		// If a link has been clicked, scroll the page to the link's hash target:
		
		$.scrollTo( this.hash || 0, 1500);
		e.preventDefault();
            });
        });
        // Twitter function
        $(function(){
        $(".tweet").tweet({
            username: "Eruvaeron",
            avatar_size: 32,
            count: 4,
            loading_text: "loading tweets..."
        });
        });
        // Mobile nav function
        $(function () {
          $("#menu-menunav").tinyNav();
        });

	
}); // END OF DOCUMENT