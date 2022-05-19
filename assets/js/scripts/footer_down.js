import $ from "jquery";

export function footer_down() {
	function footerdown() {
    var fo = $("footer").outerHeight();
    var dohi = $(window).height();
    var minhe = dohi - fo;
    $("main").css("min-height", minhe);
  }

  footerdown();
  
  $( window ).resize(function() {
    footerdown();
  });
}