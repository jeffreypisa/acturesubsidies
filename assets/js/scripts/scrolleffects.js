import $ from "jquery";

export function scrolleffects() {
	
	function hasScrolled() {
		$('.mod-pageheader .bg').css({
		  height: function() {
		    var elementHeight = $('.mod-pageheader').outerHeight();

		    return elementHeight;
		  }
		});
	}
	
	$(window).resize(function() {		
  	hasScrolled();
  });
  
  hasScrolled();
  
  var opacitystart = $('.mod-pageheader .bg').css('opacity');
  
  $(window).scroll(function() {
	  var scrollTop = $(this).scrollTop();
 
		$('.mod-pageheader .bg').css({
		  opacity: function() {
		    var elementHeight = $(this).height(),
		        opacity = ((0 + (elementHeight - scrollTop) / elementHeight) * opacitystart);
		
		    return opacity;
		  }
		});
	  
	});
}