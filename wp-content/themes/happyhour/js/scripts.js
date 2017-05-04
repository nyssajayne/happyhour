(function($) {
	$(document).ready(function(){
		$('.bars').imagesLoaded(function(){
			$('.bars').masonry({
				// options
				itemSelector: '.bar',
				columnWidth: '.bar-sizer',
				percentPosition: true,
				gutter: '.bar-gutter'
			});
		});

		$('#pubGallery').smoothDivScroll({
			mousewheelScrolling: "allDirections",
			manualContinuousScrolling: false,
			touchScrolling: true
		})

		$('#nav-menu-mob').on('click', function(){
			if($('#menu-main-menu-1').children().is(':hidden')) {
				$('#menu-main-menu-1').children().each(function(){
					if($(this).attr('id') == 'nav-menu-mob')
						return true;
					else
						$(this).slideDown();
				})
			}
			else {
				$('#menu-main-menu-1').children().each(function(){
					if($(this).attr('id') == 'nav-menu-mob')
						return true;
					else
						$(this).slideUp();
				})
			}
		})
	});
})(jQuery);