import $ from "jquery";

export function counter() {
		
	
	function addCommas(n) {
	    if(typeof n === 'number'){
	        n += '';
	        var x = n.split('.');
	        var x1 = x[0];
	        var x2 = x.length > 1 ? '.' + x[1] : '';
	        var rgx = /(\d+)(\d{3})/;
	        while (rgx.test(x1)) {
	            x1 = x1.replace(rgx, '$1' + '.' + '$2');
	        }
	        return x1 + x2;
	    } else {
	        return n;
	    }
	}

if ( $( ".count-animation" ).length ) {
		$.fn.isOnScreen = function(){
	
	    var win = $(window);
			
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();
	
	    var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();
	
			return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
			
			};
			
			$(document).ready(function(){
					var counted = $('.count').data('value');
			    $(window).scroll(function(){
			        if ($('.count-animation').isOnScreen()) {
								$('.count').countTo({
									from: 0,
									to: counted,
									refreshInterval: 10,
									speed: 2000
								});
	
								$('.count-animation').removeClass('count-animation');
			        }
			    });
			});
	}
}