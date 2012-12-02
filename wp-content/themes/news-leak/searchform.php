<form method="get" id="searchform" action="<?php echo home_url(); ?>" >
<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input id="searchsubmit" type="image" src="<?php echo get_template_directory_uri(); ?>/images/btn_search.png" alt="Submit" />
</form>