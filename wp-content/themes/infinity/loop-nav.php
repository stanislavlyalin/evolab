<?php
if ( !is_singular() ):

	infinity_loop_nav();
	
elseif ( is_singular( 'post' ) ) :

	infinity_loop_nav_singular_post();

endif;
?>