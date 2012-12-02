				</div>
				<!-- /content -->
				
			</div>
			<!-- /CONTENT -->	
			
		
		<!-- bottom NAVIGATION -->
		<div id="bottomNav">
		</div>
		<!-- /bottom NAVIGATION -->
		
		<!-- FOOTER -->
		<div id="footer">
		<p class="footer-menu">
         <?php wp_nav_menu( array('fallback_cb' => 'baza_noclegowa_page_menu_flat', 'menu' => 'Footer Navigation', 'container' => 'div','container_id' => 'footer-nav', 'depth' => '1', 'theme_location' => 'footer-menu') ); ?>
        </p>
			
<div class="credits"><?php _e("Powered by", "baza_noclegowa"); ?> <a href="http://wordpress.org/">WordPress</a>. Design: <a href="http://www.baza-noclegowa.pl/">Baza Noclegowa</a>.</div>
			
		</div>
		<!-- /FOOTER -->
	</div>
		<?php wp_footer(); ?>
</body>
</html>
