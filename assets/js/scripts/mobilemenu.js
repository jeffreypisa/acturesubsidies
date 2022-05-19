import $ from "jquery";

export function mobilemenu() {
  $(".js-menu").on("click", function() {
    $("body").toggleClass("opensidemenu");
    $('body').toggleClass('show-overlay');
    $(".js-mobilemenu").toggleClass("open");
    $("body, html").toggleClass("overflow-hidden");
  });
}