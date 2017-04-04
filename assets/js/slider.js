jQuery(document).ready(function(){
	$ = jQuery.noConflict();

	// Slider auto-play
	setInterval(autoPlay, 5000);

	// Client auto-play
	setInterval(nextClient, 1000);

	// Main slider at Home page auto next button event
		$('.orbit-next').click(function(){ autoPlay(); });

		$('.orbit-previous').click(function(){
			$('.mainSlider li').first().before($('.mainSlider li').last());
			$('.mainSlider li').last().removeClass('on');
			$('.mainSlider li').first().addClass('on');
		});

	// Clients sliders
		$('.nextClient').click(function(){
			nextClient();
		});
		// Prev
		$('.prevClient').click(function(){
			$('.clientsSlider li').first().before($('.clientsSlider li').last());
		});

	// Comments sliders
		$('.nextComment').click(function(){
			$('.comments li').first().removeClass('on');
			$('.comments li').last().addClass('on');
			$('.comments li').last().after($('.comments li').first());
		});
		$('.prevComment').click(function(){
			$('.comments li').first().before($('.comments li').last());
			$('.comments li').last().removeClass('on');
			$('.comments li').first().addClass('on');
		});
});
/**
 * [nextClient is an event to next client]
 * @return {void}
 */
function nextClient(){
	$('.clientsSlider li').last().after($('.clientsSlider li').first());	
}

/**
 * [autoPlay is an event to auto next the main slider]
 * @return {void}
 */
function autoPlay(){
	$('.mainSlider li').last().after($('.mainSlider li').first());
	$('.mainSlider li').last().removeClass('on');
	$('.mainSlider li').first().addClass('on');
}