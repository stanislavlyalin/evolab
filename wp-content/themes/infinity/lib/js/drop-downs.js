/**
 * Functions file for loading custom JS for Infinity drop downs.
 *
 * @package Infinity
 * @subpackage Functions
 */

(function($){
	
	/** Infinity Dorp Downs */
	function infinityMenu() {
		
		$( '.menu1 ul' ).supersubs({			
			
			minWidth: 16,
			maxWidth: 27,
			extraWidth: 1		
		
		}).superfish({		
			
			delay: 100,
			speed: 'fast',
			animation: { opacity:'show', height:'show' },
			//autoArrows: false,
			dropShadows: false
	  
	  });
	  
	}
	
	/** jQuery Document Ready */
	$(document).ready(function(){
		infinityMenu();
	});

})(jQuery);