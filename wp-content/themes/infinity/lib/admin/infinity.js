/**
 * Functions file for loading custom Admin JS.
 *
 * @package Infinity
 * @subpackage Functions
 */

(function($){
	
	/** jQuery Document Ready */
	$(document).ready(function(){
		
		$( '#infinity_tabs' ).tabs({
			cookie: { expires: 1 }
		});
		
	});

	/** jQuery Windows Load */
	$(window).load(function(){
	});	

})(jQuery);