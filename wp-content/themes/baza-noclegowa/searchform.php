<form method="get" id="searchform" action="<?php echo home_url(); ?>/" class="searchForm">
	<p><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="field" />
	<input type="image" src="<?php echo get_template_directory_uri(); ?>/images/search.gif" alt="" title="Search" id="searchsubmit" class="btn" /></p>
</form>
