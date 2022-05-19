import $ from "jquery";

export function popup() {
	
	if ($('#popup_wrap').length) {
		$('.js-closepopup').on('click', function() {
			$('#popup_wrap').remove();
		});
		
		$(document).mouseup(function(e) 
		{
	    var container = $("#popup_wrap .card");
	
	    // if the target of the click isn't the container nor a descendant of the container
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	      $('#popup_wrap').remove();
	    }
		});

		var minuten = $('#tonen_na_hoeveel_minuten').text();
		var minuten = minuten + '000'
		
		function showpopup() {     
			$('#popup_wrap').addClass('show');
		}
	 
		setTimeout(showpopup, minuten);
	}
}