import $ from "jquery";

export function productmenu() {
	$('.js-toggle-productmenu').on('click', function() {
    $('body').toggleClass('openproductmenu');
    $('body').toggleClass('show-overlay');
  });
	
  $('.big-overlay').on('click', function() {
    $('body').removeClass('openproductmenu');
    $('body').removeClass('show-overlay');
    $("body").removeClass("opensidemenu");
    $(".js-mobilemenu").removeClass("open");
    $("body, html").removeClass("overflow-hidden");
  });
  
  $(window).resize(function() { 
    $('body').removeClass('openproductmenu');
    $('body').removeClass('show-overlay');
    $("body").removeClass("opensidemenu");
    $(".js-mobilemenu").removeClass("open");
    $("body, html").removeClass("overflow-hidden");
  }); 
  
  $(window).scroll(function() { 
    $('body').removeClass('openproductmenu');
    $('body').removeClass('show-overlay');
    $("body").removeClass("opensidemenu");
    $(".js-mobilemenu").removeClass("open");
    $("body, html").removeClass("overflow-hidden");
  }); 
}