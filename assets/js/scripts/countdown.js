import $ from "jquery";

export function countdown() {

		var jaar = $('#jaar').text();
		var maand = $('#maand').text();
		var dag = $('#dag').text();
		var uur = $('#uur').text();
		var minuut = $('#minuut').text();
	
	  $('#countdown').countdown({
	
	    year: jaar,// YYYY Format
	
	    month: maand,// 1-12
	
	    day: dag,// 1-31
	
	    hour: uur,// 24 hour format 0-23
	
	    minute: minuut
	
	  });
	

}