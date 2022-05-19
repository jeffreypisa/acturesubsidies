import $ from "jquery";
import AOS from 'aos';

export function AOS_init() {
	$('body').addClass('start');
	
	AOS.init({
		offset: 0,
		anchorPlacement: 'top-bottom'
	});
}