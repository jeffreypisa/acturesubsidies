import $ from "jquery";

export function ninjaformstweaks() {
	
	new(Marionette.Object.extend( {

      initialize: function() {
          this.listenTo( Backbone.Radio.channel( 'flatpickr' ), 'init', this.modifyDatepicker );
      },

      modifyDatepicker: function( dateObject, fieldModel ) {
          // Set to future dates ONLY
          dateObject.flatpickr(fieldModel, {
	          "disable": [
					        function(date) {
					            // return true to disable
					            return (date.getDay() === 0 || date.getDay() === 6);
					
					        }
					    ],
						    "locale": {
						        "firstDayOfWeek": 1 // start week on Monday
						    }
          }); 
          
          // Block weekends
      }
  }));
     
}