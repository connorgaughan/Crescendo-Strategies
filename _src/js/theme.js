(function($){

	$(document).ready(function() {
    $('.video-toggle').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });

    $('.my-slider').unslider({
      autoplay: true,
      infinite: true,
      delay: '6000',
      animateHight: true
    });

    $('.book-image').magnificPopup({
      type:'inline',
      midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    });
	});

})(jQuery);