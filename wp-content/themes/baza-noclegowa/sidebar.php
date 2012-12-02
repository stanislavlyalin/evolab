				<!-- sidebar -->
				<div class="sideBar">
					
					<div class="nav">
						<div class="bFrameT"><i></i></div>
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
			if (!dynamic_sidebar('sidebar-widget-area')) : ?>

				<h3><span><?php _e("Category", "baza_noclegowa"); ?></span></h3>
				<ul>
			        <?php wp_list_categories('show_count=1&title_li='); ?>
				</ul>				
			
				<h3><span><?php _e("Archives", "baza_noclegowa"); ?></span></h3>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
	
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
	
				<h3><span><?php _e("Meta", "baza_noclegowa"); ?></span></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>	
			<?php } ?>

			<?php endif; ?>
			
						<div class="bFrameB"><i></i></div>
					</div>
					
				</div>
				<!-- /sidebar -->