<?php /* The Sidebar containing the primary widget areas. */ ?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">
			<?php
			if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>
			
			<li id="pages" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Pages', 'pujugama' ); ?></h3>
				<ul>
					<?php wp_list_pages('title_li=' ); ?>
				</ul>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'pujugama' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
			
			<li id="categories" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Categories', 'pujugama' ); ?></h3>
				<ul>
					<?php wp_list_categories( 'title_li=' ); ?>
				</ul>
			</li>	
			
			<li id="calendar" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Calendar', 'pujugama' ); ?></h3>
				<div id="calendar_wrap">
					<?php get_calendar(true); ?>
				</div>
			</li>		
			
			<li id="linkcat" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Blogroll', 'pujugama' ); ?></h3>
				<ul>
					<?php wp_list_bookmarks( 'title_li=&categorize=0' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'pujugama' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

			<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->