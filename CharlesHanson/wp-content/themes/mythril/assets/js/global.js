(function( $ ) {

	/**
	 * Document Ready Functions
	 */
	$(document).ready(function() {


			$('.image-popup-vertical-fit').magnificPopup({
				type: 'image',
			  mainClass: 'mfp-with-zoom',
			  gallery:{
						enabled:true,
						 preload: [0,1] // Will preload 0 - before current, and 1 after the current image
					},

			  zoom: {
			    enabled: true,

			    duration: 300, // duration of the effect, in milliseconds
			    easing: 'ease-in-out', // CSS transition easing function

			    opener: function(openerElement) {

			      return openerElement.is('img') ? openerElement : openerElement.find('img');
			  }
			}

		});

			// $(function () {
			// 	$('.popup-modal').magnificPopup({
			// 		type: 'inline',
			// 		preloader: false,
			// 		modal: true
			// 	});
			// 	$(document).on('click', '.popup-modal-dismiss', function (e) {
			// 		e.preventDefault();
			// 		$.magnificPopup.close();
			// 	});
			// });


		$('.slides').slick({
		  dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 1,
			// centerMode: true,
			// centerPadding: '60px',
			autoplay: true,
  		autoplaySpeed: 5000,
			arrows: false
			// ,
			//  adaptiveHeight: true
		});

		  // $('.flexslider').flexslider({
		  //   animation: "slide"
		  // });

		// $('.image-popup-vertical-fit').magnificPopup({
		//   delegate: 'a',
		//   type: 'image',
		//   tLoading: 'Loading image #%curr%...',
		//   mainClass: 'mfp-with-zoom',
		//   gallery: {
		//     enabled: true,
		//     navigateByImgClick: true,
		//     preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		//   },
		//   image: {
		//     tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		// 		// ,
		//     // titleSrc: function(item) {
		//     //   return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
		//     // }
		//   }
		// });

$('.showForm').click(function(){
  $('#formSection').toggle('toggleForm');
  console.log('click');
});


$('.show').click(function(){
  $('.edit_form').toggle();
  console.log('toggle');
});
		// Social Buttons
		$('a.social-share').click(function(e){
			e.preventDefault();
			var url = $(this).attr('href');
			window.open(url, '_blank', 'toolbar=yes, scrollbars=yes, resizable=no, top=200, left=200, width=570, height=400');
		});

		// External links open in a new tab
		$('#content a').each(function() {
			var a = new RegExp('/' + window.location.host + '/');
			if(!a.test(this.href) && $(this).hasClass('social-share')){
				$(this).click(function(event) {
					event.preventDefault();
					event.stopPropagation();
					window.open(this.href, '_blank');
				});
			}
		});

		$('#mobile-menu-button').on('click',function(e){
			e.preventDefault();

			// Toggle the active class
			$('body').toggleClass('mobile-menu-active');

			// Aria toggles
			$(this).attr('aria-expanded', function (i, attr) {
				return attr == 'true' ? 'false' : 'true'
			});

			// Toggle the text
			var text = $('#mobile-menu-button .text').text();
			$('#mobile-menu-button .text').text(text == 'Menu' ? 'Close' : 'Menu');
		});

	});

	/**
	 * Window Resize Functions
	 */
	$(window).resize(function() {

	});

})( jQuery );
