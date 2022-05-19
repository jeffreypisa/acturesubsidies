import $ from "jquery";

export function scrollto() {
	$('a:not([data-toggle])').on('click', function() {
		if(this.getAttribute("href").charAt(0) == "#") {
	    var href = $(this).attr("href");
	    $('html, body').animate({
	      scrollTop: $(href).offset().top
	    }, 500);
	    return false;
	  }
  });
  $('.js-scrolltonextsection').on('click', function() {
    var href = $(this).closest('section').next();
    $('html, body').animate({
      scrollTop: $(href).offset().top
    }, 500);
    return false;
  });
  
  if ($('body').hasClass('tabactive_2')) {
	  $('.nav-tabs a:last').tab('show');
  }
}