import $ from "jquery";
import 'bootstrap';

// Init plugins
import { AOS_init } from './scripts/aos.js';
// import { slick_init } from './scripts/slick.js';
import { matchheight_init } from './scripts/matchheight.js';
import { lity_init } from './scripts/lity.js';
import { countdown_init } from './scripts/countdown_plugin.js';
import { counter_init } from './scripts/counter_plugin.js';
// import { textslotmachine } from './scripts/textslotmachine.js';

// Scripts
import { site_is_loaded } from './scripts/site_is_loaded.js';
import { footer_down } from './scripts/footer_down.js';
import { mobilemenu } from './scripts/mobilemenu.js';
// import { ninjaformstweaks } from './scripts/ninjaformstweaks.js';
import { scrolleffects } from './scripts/scrolleffects.js';
import { scrollto } from './scripts/scrollto.js';
import { sticky_header } from './scripts/sticky_header.js';
import { productmenu } from './scripts/productmenu.js';
import { masonry } from './scripts/masonry.js';
import { countdown } from './scripts/countdown.js';
import { counter } from './scripts/counter.js';
import { popup } from './scripts/popup.js';
import { teller } from './scripts/teller.js';
import { jquerystickem } from './scripts/jquerystickem.js';

// slick_init();
matchheight_init();
lity_init();
countdown_init();
counter_init();
popup();
jquerystickem();

$( document ).ready(function() {
	footer_down();
	mobilemenu();
	scrolleffects();
	scrollto();
	counter();
	sticky_header();
	productmenu();
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})
	countdown();
	teller();
	// ninjaformstweaks();
	// textslotmachine();
});

$(window).on('load', function() {
  site_is_loaded();
  AOS_init();
  if ($(".masonry-grid")[0]){
  	masonry();
  }
});

$(window).on('resize', function() {

});