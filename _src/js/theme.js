(function($){

	$(document).ready(function() {

    var $window = $(window);

    $window.scroll(function() {
      var scrollTop = $window.scrollTop();
      console.log(scrollTop);
      if (scrollTop > 10) {
        $('.logo').addClass('scale');
        $('.floating').css('top', -25 + 'px');
        $('.menu-container').css('top', -15 + 'px');
      } else if (scrollTop < 10 ){
        $('.logo').removeClass('scale');
        $('.floating').css('top', 0);
        $('.menu-container').css('top', 0);
      }
    });

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
      animateHeight: true
    });

    $('.book-image').magnificPopup({
      type:'inline',
      midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    });
	});

})(jQuery);