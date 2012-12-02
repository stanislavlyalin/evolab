<div id="sidebar">
<?php 
$rss = get_option('nt_rsslink');
$linkedin = get_option('nt_linkedin');
$twlink = get_option('nt_twlink');
$fblink = get_option('nt_fblink');
if ($rss || $linkedin || $twlink || $fblink) {?> 
<div id="social"><span>Connect with us on any
of our social profiles.</span>
<?php if ($rss) {?> <div class="social_img"><a href="<?php echo stripslashes($rss) ?>"><img src=" <?php echo get_template_directory_uri(); ?>/images/rss.png" width="56" height="28" /></a></div><?php }?>
<?php if ($linkedin) {?> <div class="social_img"><a href="<?php echo stripslashes($linkedin) ?>"><img src=" <?php echo get_template_directory_uri(); ?>/images/in.png" width="56" height="28" /></a></div><?php }?>
<?php if ($twlink) {?> <div class="social_img"><a href="<?php echo stripslashes($twlink) ?>"><img src=" <?php echo get_template_directory_uri(); ?>/images/tweeter.png" width="56" height="28" /></a></div><?php }?>
<?php if ($fblink) {?> <div class="social_img"><a href="<?php echo stripslashes($fblink) ?>"><img src=" <?php echo get_template_directory_uri(); ?>/images/face.png" width="56" height="28" /></a></div><?php }?>
</div><?php }?>
<?php 
$topics = get_option('nt_topics'); if ($topics) { ?><?php } else {?> 
<div id="tags">
<h3>Topics</h3>

<?php wp_tag_cloud( 'number=15&smallest=12&largest=12&unit=px&separator=</li><li>' ); ?>

</div>
<?php } ?>
<?php $adsidebar = get_option('nt_adsidebar'); $sidebaradshow = get_option('nt_sidebaradshow'); if ($sidebaradshow) { ?>
<div id="sidebar-ad"><?php echo stripslashes($adsidebar) ?></div><?php } else {?>
<?php } ?>
<?php $tabs = get_option('nt_tabs'); if ($tabs) { ?><?php } else {?>
<div id="tabs">
<ul class="tabs"> 
	<li><a href="#">Most Popular Posts</a></li> 
	<li class="last"><a href="#">Random Posts</a></li> 
	
</ul> 
<div class="panes"> 
	<div><ul>
<?php
$pc = new WP_Query('orderby=comment_count&posts_per_page=5'); ?>

<?php while ($pc->have_posts()) : $pc->the_post(); ?>
<li>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span><?php the_time('F j, Y') ?></span>
</li>

<?php endwhile; ?>

    
    </ul></div> 
	<div>
<ul>
<?php
$args = array( 'numberposts' => 5, 'orderby' => 'rand' );
$rand_posts = get_posts( $args );
foreach( $rand_posts as $post ) : ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span><?php the_time('F j, Y') ?></span></li>
<?php endforeach; 
?>
    
    </ul>
</div> 
	
</div> 
</div>
<?php } ?>

<?php $feedburner = get_option('nt_feedburner'); 
$feedburnercode = get_option('nt_feedburnercode');
if ($feedburner) { ?>
<div id="subscribe">
<h3>Get all our new updates by email:</h3>

<form id="emailform" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo stripslashes($feedburnercode); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><input id="e" type="text" style="width:198px" name="email" value="Email address" onFocus="this.value=''"/><input type="hidden" value="<?php echo stripslashes($feedburnercode); ?>" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" class="button" value="Subscribe" /></form>

</div>
<?php } else {?><?php } ?>

<?php 
$box1 = get_option('nt_box1');
$box2 = get_option('nt_box2');
$box3 = get_option('nt_box3');
$box4 = get_option('nt_box4');
$box5 = get_option('nt_box5');
$box6 = get_option('nt_box6');
if ($box1 || $box2 || $box3 || $box4 || $box5 || $box6 ) {?> 
<div id="boxes">
<ul>
<?php if ($box1) {?> <li><?php echo stripslashes($box1); ?></li><?php }?>
<?php if ($box2) {?> <li><?php echo stripslashes($box2); ?></li><?php }?>
<?php if ($box3) {?> <li><?php echo stripslashes($box3); ?></li><?php }?>
<?php if ($box4) {?> <li><?php echo stripslashes($box4); ?></li><?php }?>
<?php if ($box5) {?> <li><?php echo stripslashes($box5); ?></li><?php }?>
<?php if ($box6) {?> <li><?php echo stripslashes($box6); ?></li><?php }?>
	  

</ul>
</div><?php }?>

<?php $catsarch = get_option('nt_catsarch'); if ($catsarch) { ?><?php } else {?>
<div id="categories">
<div class="cat_arch">
<h3>Categories</h3>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>
</div>
<div class="cat_arch">
<h3>Archives</h3>
<ul>
<?php wp_get_archives('type=monthly&limit=12'); ?>
</ul></div>
</div>
<?php } ?>

<?php $twitter = get_option('nt_twitter');
$twittercode = get_option('nt_twittercode');
 if ($twitter) { ?>
<div id="twitts">
<h3>latest twitts</h3>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 5,
  interval: 6000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#ffffff',
      color: '#474747'
    },
    tweets: {
      background: '#ffffff',
      color: '#474747',
      links: '#3386c1'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('<?php echo stripslashes($twittercode) ?>').start();
</script>

</div>
<?php } else {?><?php } ?>
<?php dynamic_sidebar( 'Sidebar' ); ?>
</div>