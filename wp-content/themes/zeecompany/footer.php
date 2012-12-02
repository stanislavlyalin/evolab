	<div class="clear"></div>
		
		<div id="footer">
			<?php 
				$options = get_option('themezee_options');
				if ( isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "" ) { 
					echo $options['themeZee_general_footer']; } 
			?>
			<div class="credit_link"><?php themezee_credit_link(); ?></div>
			<div class="clear"></div>
		</div>
	
</div>
	<?php wp_footer(); ?>
</body>
</html>