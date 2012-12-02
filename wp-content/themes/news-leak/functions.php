<?php 
	if (!isset($content_width))
    	$content_width = 640;
    	
    if (function_exists('add_theme_support')){
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(295, 180, true);
		add_theme_support('automatic-feed-links');
	}
	
    add_filter('excerpt_more', 'new_excerpt_more');
    function new_excerpt_more($more){
		return '...';
	}
	
	add_filter('excerpt_length', 'new_excerpt_length');
	function new_excerpt_length($length) {
		return 70;
	}

	add_action('widgets_init', 'my_register_sidebars');
	function my_register_sidebars() {
		register_sidebar(
			array(
				'id' => 'primary',
				'name' => __( 'Sidebar' ),
				'description' => __('Right sidebar.'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			)
		);
		register_sidebar(
			array(
				'id' => 'secondary',
				'name' => __('Footerbar'),
				'description' => __('Maximum 2 widgets allowed'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			)
		);
	}
	
	$themename = "News Leak";
	$shortname = "nt";
	
	$options = array (
		array(
			"name" => "News Leak Options",
			"type" => "title"
		),
		array(
			"type" => "open"
		),
		array(
			"name" => "Document Head",
			"desc" => "head",
			"id" => $shortname."_head",
			"std" => "",
			"type" => "misc"
		),
		array(
			"name" => "Logo URL",
			"desc" => "Add url for logo. Logo image size: 200px width, 90px height",
			"id" => $shortname."_logo",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "About",
			"desc" => "Here is where you add information about your blog",
			"id" => $shortname."_about",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Subscribe Links",
			"desc" => "links",
			"id" => $shortname."_links",
			"std" => "",
			"type" => "misc"
		),
		array(
			"name" => "RSS",
			"desc" => "Add link to rss feeds",
			"id" => $shortname."_rsslink",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "LinkedIn",
			"desc" => "Add link to linkedin subscibtion",
			"id" => $shortname."_linkedin",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "Twitter",
			"desc" => "Add link to twitter account",
			"id" => $shortname."_twlink",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "Facebook",
			"desc" => "Add link to facebook account",
			"id" => $shortname."_fblink",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "Sidebar options",
			"desc" => "sidebaropt",
			"id" => $shortname."_sidebaropt",
			"std" => "",
			"type" => "misc"
		),
		array(
			"name" => "Topic",
			"desc" => "Hide topics",
			"id" => $shortname."_topics",
			"std" => "",
			"type" => "checkbox"
		),
		array(
			"name" => "Sidebar Ad",
			"desc" => "Enable sidebar ad",
			"id" => $shortname."_sidebaradshow",
			"std" => "",
			"type" => "checkbox"
		),
		array(
			"name" => "Sidebar Ad Code",
			"desc" => "Add adify script 290x240",
			"id" => $shortname."_adsidebar",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Tabs",
			"desc" => "Hide tabs",
			"id" => $shortname."_tabs",
			"std" => "",
			"type" => "checkbox"
		),
		array(
			"name" => "Feedburner Subscribe form",
			"desc" => "Enable form",
			"id" => $shortname."_feedburner",
			"std" => "",
			"type" => "checkbox"
		),
		array(
			"name" => "Feedburner code",
			"desc" => "Add feedburner name",
			"id" => $shortname."_feedburnercode",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "Categories & archives",
			"desc" => "Hide categories & archives",
			"id" => $shortname."_catsarch",
			"std" => "",
			"type" => "checkbox"
		),
		array(
			"name" => "Twitter form",
			"desc" => "Enable twitter form",
			"id" => $shortname."_twitter",
			"std" => "",
			"type" => "checkbox"
		),
		array(
			"name" => "Twitter code",
			"desc" => "Add your twitter name",
			"id" => $shortname."_twittercode",
			"std" => "",
			"type" => "text"
		),
		array(
			"name" => "Ads Scripts",
			"desc" => "ad",
			"id" => $shortname."_ad",
			"std" => "",
			"type" => "misc"
		),
		array(
			"name" => "Footer Ad",
			"desc" => "728px width, 90px height",
			"id" => $shortname."_adfooter",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Text Ad above first post",
			"desc" => "630px width, 15px height",
			"id" => $shortname."_adcontainertext",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Ad Bellow Posts no.1",
			"desc" => "200px width, 125px height",
			"id" => $shortname."_adpost1",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Ad Bellow Posts no.2",
			"desc" => "200px width, 125px height",
			"id" => $shortname."_adpost2",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Ad Bellow Posts no.3",
			"desc" => "200px width, 125px height",
			"id" => $shortname."_adpost3",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "125x125 Boxes Ads Scripts",
			"desc" => "adbox",
			"id" => $shortname."_adbox",
			"std" => "",
			"type" => "misc"
		),
		array(
			"name" => "Box Ad Script no.1",
			"desc" => "1st ad script 125x125px",
			"id" => $shortname."_box1",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Box Ad Script no.2",
			"desc" => "2nd ad script 125x125px",
			"id" => $shortname."_box2",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Box Ad Script no.3",
			"desc" => "3rd ad script 125x125px",
			"id" => $shortname."_box3",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Box Ad Script no.4",
			"desc" => "4th ad script 125x125px",
			"id" => $shortname."_box4",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Box Ad Script no.5",
			"desc" => "5th ad script 125x125px",
			"id" => $shortname."_box5",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"name" => "Box Ad Script no.6",
			"desc" => "6th ad script 125x125",
			"id" => $shortname."_box6",
			"std" => "",
			"type" => "textarea"
		),
		array(
			"type" => "close"
		)
	);
	
	add_action('admin_menu', 'newsleak_add_admin');
	function newsleak_add_admin() {
		global $themename, $shortname, $options;
		if ( isset($_GET['page']) && ($_GET['page'] == basename(__FILE__)) ) {
			if ( isset( $_REQUEST['action']) && ('save' == $_REQUEST['action']) ) {
				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
				}
				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
					} else { 
						delete_option( $value['id'] ); 
					} 
				}
				header("Location: themes.php?page=functions.php&saved=true");
				die;	 
			} else if( isset( $_REQUEST['action']) && ('reset' == $_REQUEST['action']) ) {
				foreach ($options as $value) {
				delete_option( $value['id'] ); }
				header("Location: themes.php?page=functions.php&reset=true");
				die;
			}
		}
	    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'newsleak_admin');
	}
	
	function newsleak_admin() {
		global $themename, $shortname, $options;
		if ( isset( $_REQUEST['saved']) && $_REQUEST['saved'] ) 
			echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
		if ( isset( $_REQUEST['reset']) && $_REQUEST['reset'] ) 
			echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
		echo '<div class="wrap" style="margin:0 auto; padding:20px 0px 0px;">';
		echo '<form method="post">';
		foreach ($options as $value) {
			switch ( $value['type'] ) {
				case "open":
					echo '<div style="width:100%;overflow:hidden; display: block; margin: 0px 0px 15px;">';
				break;
				case "close":
					echo '</div>';
				break;
				case "misc":
					echo '<div style="width:89%; background-color:#555; padding:8px 12px 10px; border-radius:3px; moz-border-radius:3px; overflow:hidden; display: inline; float:left; clear:both; margin:20px 0px 3px 0px; color:#fff; font-size:15px; font-weight:bold;">';
					echo $value['name'].'</div>';
				break;
				case "title":
					echo '<div style="width:100%; overflow:hidden; margin:0px; font:italic 24px/35px Georgia,\'Times New Roman\',\'Bitstream Charter\',Times,serif; color:#555555;">';
					echo $value['name'].'</div>';
				break;
				case 'text':
					echo '<div style="background-color: #ececec; border-radius: 3px; -moz-border-radius:3px float: left;margin: 0 0 3px; overflow: hidden; padding: 4px 12px; width: 89%;">';
					echo '<span style="font:bold 13px/18px \'Lucida Grande\',Verdana,Arial,\'Bitstream Vera Sans\',sans-serif; color:#444; display:block; padding:5px 20px 3px 0px; float:left; width:200px">';
					echo $value['name'].'</span>';
					if (get_option( $value['id'] ) != ""){ 
						$input_value=stripslashes(get_option( $value['id'] )); 
					}else{ 
						$input_value=stripslashes($value['std']); 
					}
					echo '<input style="width:400px; border-color:#cecece; float:left; margin:0px 5px 0px 0px; padding:5px 3px; color:#666666; font-size:12px;" name="'.$value['id'].'" id="'.$value['id'].'" type="'.$value['type'].'" value="'.$input_value.'" /> <span style="font-family:Arial, sans-serif; font-size:11px; font-weight:normal; color:#444; display:block; padding:5px 2px; float:left;"><'.$value['desc'].'</span>';
					echo '</div>';
				break;
				case 'textarea':
					echo '<div style="background-color: #ececec; border-radius: 3px; -moz-border-radius:3px float: left;margin: 0 0 3px; overflow: hidden; padding: 6px 12px; width: 89%;">';
					echo '<p style="font:bold 13px/18px \'Lucida Grande\',Verdana,Arial,\'Bitstream Vera Sans\',sans-serif; color:#444; display:block; margin: 0px; padding:5px 20px 3px 0px; float:left; width:200px">';
					echo $value['name'];
					echo '<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:normal; color:#696969; display:block; padding:0px; width:200px">'.$value['desc'].'</span>';
					echo '</p>';
					echo '<textarea name="'.$value['id'].'" style="width:500px; height:100px; border-color:#cecece; color:#666666; font-size:12px; margin:0px; padding:2px;" type="'.$value['id'].'" cols="" rows="">';
					if (get_option( $value['id'] ) != ""){ 
						echo stripslashes(get_option( $value['id'] )); 
					}else{ 
						echo stripslashes($value['std']); 
					}
					echo '</textarea>';
					echo '</div>';
				break;
				case 'select':
					echo '<div style="width:394px; padding:0px 5px 10px; margin:0px 0px 10px; overflow:hidden; float: left;">';
					echo '<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:normal; color:#444; display:block; padding:5px 20px 5px 2px;">'.$value['name'].'</span>';
					echo '<select style="width:240px;" name="'.$value['id'].'" id="'.$value['id'].'">';
					foreach ($value['options'] as $option) { 
						if (get_option($value['id']) == $option || $value['std'] == $option){ 
							$selected=' selected="selected"'; 
						}else{ 
							$selected=''; 
						}
						echo '<option'.$selected.'>'.$option.'</option>';
					}
					echo '</select>';
					echo '<br/>';
					echo '<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:normal; color:#444; display:block; border-bottom:1px solid #ddd; padding:5px 2px;">'.$value['desc'].'</span>';
					echo '</div>';
				break;
				case "checkbox":
					echo '<div style="background-color: #ececec; border-radius: 3px; -moz-border-radius:3px float: left;margin: 0 0 3px; overflow: hidden; padding: 2px 12px; width: 89%;">';
					echo '<span style="font-family:Arial, sans-serif; font-size:13px; font-weight:bold; color:#444; display:block; padding:5px 20px 0px 0px; width:200px; float:left;">'.$value['name'].'</span>';
					if(get_option($value['id'])){ 
						$checked = 'checked="checked"'; 
					}else{ 
						$checked = '';
					}
					echo '<input type="checkbox" style="float:left; margin:8px 5px 0px 0px;" name="'.$value['id'].'" id="'.$value['id'].'" value="true" '.$checked.'/>';
					echo '<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:normal; color:#444; display:block; padding:5px 2px; float:left;">'.$value['desc'].'</span>';
					echo '</div>';
				break;
				case "submit":
					echo '<p class="submit" style="float:left; padding:0 5px 5px 0; margin:0px 0px 10px 0px;">';
					echo '<input name="save" type="submit" value="Save changes" />';
					echo '<input type="hidden" name="action" value="save" />';
					echo '</p>';
				break;
			}
		}
		echo '<p class="submit" style="float:left; padding:0 5px 5px 0; margin:0px 0px 40px 0px;">';
		echo '<input name="save" type="submit" value="';
		_e('Save changes','newsleak');
		echo '" />';
		echo '<input type="hidden" name="action" value="save" />';
		echo '</p>';
		echo '</form>';
		echo '<form method="post" action="">';
		echo '<p class="submit" style="float:left; padding:0 5px 5px 0; margin:0px 0px 40px 0px;">';
		echo '<input name="reset" type="submit" value="';
		_e('Reset','newsleak');
		echo '" />';
		echo '<input type="hidden" name="action" value="reset" />';
		echo '</p>';
		echo '</form>';
	}
	

/*   End of Add a Theme Options Page
 *   End of Theme Options   
 */
	
	add_filter('widget_tag_cloud_args', 'newsleak_tag_cloud_args');
	function newsleak_tag_cloud_args() {
		$args = array( 'smallest' => 12, 'largest' => 12, 'unit' => "px", 'separator' => "</li><li>" );
		return $args;
	}

	add_filter('wp_tag_cloud', 'tag_cloud'); 
	function tag_cloud($return) {
		$return = '<ul><li>' . $return . '</li></ul>';
		return $return;
	}

	add_action( 'show_user_profile', 'newsleak_extra_fields_to_user' );
	add_action( 'edit_user_profile', 'newsleak_extra_fields_to_user' );
	function newsleak_extra_fields_to_user($user){
		echo '<h3>Extra profile information</h3>';
	 	echo '<table class="form-table">';
	 	echo '<tr>';
	 	echo '<th><label for="facebook">Profile Image</label></th>';
	 	echo '<td>';
	 	echo '<input type="text" name="userimg" id="userimg" value="'.esc_attr(get_the_author_meta('userimg', $user->ID)).'" /><br />';
	 	echo '<span>Please enter URL to your profile Image, 40x40px</span>';
		echo '</td>';
	 	echo '</tr>';
	 	echo '</table>';
	}
	
	add_action( 'personal_options_update', 'newsleak_extra_fields_to_user_save' );
	add_action( 'edit_user_profile_update', 'newsleak_extra_fields_to_user_save' );
	function newsleak_extra_fields_to_user_save($user_id){
		if (!current_user_can('edit_user', $user_id))
			return false;
		update_user_meta($user_id, 'userimg', $_POST['userimg']);
	}
	
	add_action('after_setup_theme', 'newsleak_jqutools_scripts');
	function newsleak_jqutools_scripts() {
	    if (!is_admin()){ 
	        wp_register_script('jqutools', get_template_directory_uri().'/js/jquery.tools.min.js', array('jquery') );
	        wp_enqueue_script('jqutools');
	    }
	}
	
	add_action('after_setup_theme', 'newsleak_custom_scripts');
	function newsleak_custom_scripts() {
	    if ( !is_admin() ) 
	    { 
	        wp_register_script('custom_script', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	        wp_enqueue_script('custom_script');
	    }
	}
	
	$defaults = array(
		'author' => '<p class="comment-form-author">...',
		'email'  => '<p class="comment-form-email">...',
		'url'    => '<p class="comment-form-url">...',
		'comment_field'        => '<p class="comment-form-comment">...',
		'must_log_in'          => '<p class="must-log-in">...',
		'logged_in_as'         => '<p class="logged-in-as">...',
		'comment_notes_before' => '<p class="comment-notes">...',
		'comment_notes_after'  => '<dl class="form-allowed-tags">...',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Comment' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
	);
	
	add_custom_background();
	add_editor_style();
	
	wp_enqueue_style('wp-pagenavi', get_stylesheet_directory_uri().'/pagenavi-css.css', false, '2.50', 'all');

	function newsleak_comment($comment, $args, $depth){
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ){
			case '' :
				echo '<li '; 
				comment_class(); 
				echo 'id="li-comment-';
				comment_ID();
				echo '">';
				echo '<div id="comment-';
				comment_ID();
				echo '">';
				echo '<div class="comment-author vcard">';
				echo get_avatar( $comment, 40 );
				printf( __( '%s <span class="says">says:</span>', 'newsleak' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
				echo '</div>';
				if ($comment->comment_approved == '0'){
					echo '<em class="comment-awaiting-moderation">';
					_e( 'Your comment is awaiting moderation.', 'newsleak' );
					echo '</em>';
					echo '<br />';
				}
				echo '<div class="comment-meta commentmetadata"><a href="'.esc_url( get_comment_link( $comment->comment_ID ) ).'">';
				printf( __( '%1$s at %2$s', 'newsleak' ), get_comment_date(),  get_comment_time() );
				echo '</a>';
				edit_comment_link( __( '(Edit)', 'newsleak' ), ' ' );
				echo '</div>';
				echo '<div class="comment-body">';
				comment_text();
				echo '</div>';
				echo '<div class="reply">';
				comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
				echo '</div>';
				echo '</div>';
			break;
			case 'pingback'  :
			case 'trackback' :
				echo '<li class="post pingback">';
				echo '<p>';
				_e( 'Pingback:', 'newsleak' );
				comment_author_link();
				edit_comment_link( __( '(Edit)', 'newsleak' ), ' ' );
				echo '</p>';
			break;
		}
	}
?>