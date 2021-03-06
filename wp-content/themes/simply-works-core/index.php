<?php
/*
  Package: Simply Works Core
  Title: Simply Works Core
  Update: 04/10/12
  Author: Jason Huber
  Version: 1.5.8
  Description: Primary Index Page for the core
 */
get_header();
?>
<div id="mainbody"> <!-- START mainbody ID -->
  <div class="wrapper"> <!-- START wrapper CLASS -->
    <div id="contentarea"> <!-- START contentarea CLASS -->
      <?php if ( strlen( category_description() ) > 0 ) : ?>
        <br/>
        <span style="font-size: 110%"><?php echo category_description(); ?></span>
        <hr style="color: #BBB; background-color:#BBB; border:0px none; height:1px; clear:both;"/>
      <?php endif; ?>
      <?php
      // TODO: код ниже для пагинации не работает. При запросе query сбивается объект wp_query.
      /* $posts_per_page = 20;
        $current_page   = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $cat_ID         = get_query_var( 'cat' );
        $wp_query->query( array('posts_per_page' => $posts_per_page, 'paged'          => $current_page, 'cat'            => $cat_ID) ); */
      if ( have_posts() ) : while ( have_posts() ) : the_post();
          ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
            <?php
            // SINGLE //
            if ( is_single() ) {
              ?>
              <?php the_title( '<h2 class="contenttitle">', '</h2>' ); ?>
              <?php
              // Attachment  -- show back link
              if ( is_attachment() ) {
                ?>
                <p class="attachmentnav">&larr; <?php esc_attr( _e( "back to", "simplyworks" ) ); ?> <a href="<?php echo get_permalink( $post->post_parent ) ?>" title="<?php echo get_the_title( $post->post_parent ) ?>" rev="attachment"><?php echo get_the_title( $post->post_parent ) ?></a></p>
                <?php
              }
              else {
                ?>
                <div class="postmeta"> <!-- START postmeta CLASS -->
                  <?php
                  if ( isset( $swc_options['swc_author'] ) && ($swc_options['swc_author'] == "1") ) {
                    
                  }
                  else {
                    ?>
                    <span class="author"><?php _e( "Автор: ", "simplyworks" ); ?><?php the_author(); ?></span> - 
                  <?php } ?>
                  <?php
                  if ( isset( $swc_options['swc_date'] ) && ($swc_options['swc_date'] == "1") ) {
                    
                  }
                  else {
                    ?>	
                    <?php the_time( __( 'F jS, Y', 'simplyworks' ) ) ?>&nbsp;&nbsp;
                  <?php } ?>

                  <?php edit_post_link( 'Редактировать', '<span class="edit">', '</span>   ' ); ?> 
                  <?php
                  if ( isset( $swc_options['swc_comments'] ) && ($swc_options['swc_comments'] == "1") ) {
                    
                  }
                  else {
                    comments_popup_link( 'Добавить комментарий', '1 Comment', '% Comments', 'comm', '' );
                  }
                  ?>
                </div> <!-- END postmeta CLASS -->
                <?php if ( has_post_thumbnail() ) { ?>
                  <div class="imgshadow"><?php the_post_thumbnail( 'single-post-thumbnail' ); ?></div>
                <?php } ?>
              <?php } // END Attachemnt if/esle   ?>
              <?php
              ////  PAGE /////////////////////
            }
            elseif ( is_page() ) {
              ?>
              <!--?php the_title('<h2 class="contenttitle">', '</h2>'); ?-->
              <div class="postmeta">  <!-- START postmeta CLASS -->
                <?php
                if ( isset( $swc_options['swc_comments'] ) && ($swc_options['swc_comments'] == "1") ) {
                  
                }
                else {
                  comments_popup_link( 'Добавить комментарий', '1 Comment', '% Comments', 'comm', '' );
                }
                ?>
              </div> <!-- END postmeta CLASS -->
              <?php if ( has_post_thumbnail() ) { ?>
                <div class="imgshadow"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( array(150, 150), array('class' => 'imgshadowleft') ); ?></a></div> 
              <?php } ?>
              <?php
              ////////  CAT LISTING  /////////////////////
            }
            else {
              ?>
              <h2 class="contenttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
              <div class="postmeta"> <!-- START postmeta CLASS -->
                <?php
                if ( isset( $swc_options['swc_author'] ) && ($swc_options['swc_author'] == "1") ) {
                  
                }
                else {
                  ?>
                  <span class="author"><?php _e( "Автор: ", "simplyworks" ); ?><?php the_author(); ?></span> - 
                <?php } ?>
                <?php
                if ( isset( $swc_options['swc_date'] ) && ($swc_options['swc_date'] == "1") ) {
                  
                }
                else {
                  ?>	
                  <?php the_time( __( 'F jS, Y', 'simplyworks' ) ) ?>&nbsp;&nbsp;
                <?php } ?>
                <?php
                if ( isset( $swc_options['swc_filed'] ) && ($swc_options['swc_filed'] == "1") ) {
                  
                }
                else {
                  ?>	
                  <?php _e( "Категория: ", 'simplyworks' ); ?> <?php the_category( ', ' ) ?>  
                <?php } ?>
                <?php edit_post_link( 'Редактировать', '<span class="edit">', '</span>   ' ); ?> 
                <?php
                if ( isset( $swc_options['swc_comments'] ) && ($swc_options['swc_comments'] == "1") ) {
                  
                }
                else {
                  comments_popup_link( 'Добавить комментарий', '1 Comment', '% Comments', 'comm', '' );
                }
                ?>        

                <!-- вставка ссылок на формулировку вопроса и ключевые тезисы -->
                <?php
                $permanent_categories = array(1, 2, 4, 5, 19, 22, 23);
                $categories             = get_the_category( $post->ID ); //(int) get_query_var( 'cat' );
                if ( !in_array( $categories[0]->term_id, $permanent_categories ) ) :
                  ?>
                  <!-- при нажатии на ссылку будут отправляться Ajax-запросы на сервер -->
                  <br/><br/>
                  <a
                    class="a_unsel a_sel"
                    onclick="
                                jQuery(this).addClass('a_sel');
                                jQuery(this).next().removeClass('a_sel');
                                get_question_text(<?php the_ID(); ?>, this);"
                    >
                    Формулировка вопроса
                  </a>&nbsp;
                  <a
                    class="a_unsel"
                    onclick="
                                jQuery(this).addClass('a_sel');
                                jQuery(this).prev().removeClass('a_sel');
                                get_key_thesis(<?php the_ID(); ?>, this);"
                    >
                    Ключевые тезисы
                  </a>
                  <div id="question_content" style="display: none"></div>
                  <br/><br/>
                <?php endif; ?>

              </div> <!-- END postmeta CLASS -->
              <?php if ( has_post_thumbnail() ) { ?>
                <div class="imgshadow"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( array(150, 150), array('class' => 'imgshadowleft') ); ?></a></div> 
              <?php } ?>
            <?php } ?>
            <div class="entry">
              <?php the_content( __( ' Читать дальше... ', 'simplyworks' ) ); ?>
            </div>
            <div class="clear"></div><!--  content may have floats we need to clear -->
            <?php wp_link_pages( 'before=<div class="pagelinks">' . __( '<strong>Pages: </strong>', 'simplyworks' ) . '&after=</div>' ); ?>

            <?php
            if ( isset( $swc_options['swc_tags'] ) && ($swc_options['swc_tags'] == "1") ) {
              
            }
            else {
              the_tags( '<div class="tags"><strong>Теги: </strong>', ', ', '</div>' );
            }
            ?>

            <?php
            if ( is_single() ) { // author information if is_single 
// If a user has filled out their description, show a bio on their entries.
              if ( get_the_author_meta( 'description' ) ) :
                ?>
                <div id="author-bio">
                  <div id="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), '60' ); ?>
                  </div><!-- #author-avatar -->
                  <div id="author-description">
                    <h2 class="author-title"><?php printf( __( 'About: %s', 'simplyworks' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' >" . get_the_author() . "</a>" ); ?></h2>
                    <?php the_author_meta( 'description' ); ?>
                  </div><!-- #author-description	-->
                </div><!-- #entry-author-info -->
              <?php endif; ?>
            <?php } //  END if is_single   ?>
            <?php
            if ( is_single() ) {// requires plugin 
              if ( function_exists( 'wp_related_posts' ) ) {
                wp_related_posts();
                ?>
                <div class="clear"></div>
                <?php
              }
            }
            ?>
          </div>  <!-- END post varible-id  ID  -->
        <?php endwhile; ?> 
        <div id="lowernav"> <!-- START lowernav ID -->
          <?php if ( is_attachment() ) { ?>
            <div class="left nextlink"><?php next_image_link( '', __( '&lt;&lt; view previous', 'simplyworks' ) ); ?></div>
            <div class="right nextlink"><?php previous_image_link( '', __( 'view next &gt;&gt;', 'simplyworks' ) ); ?></div>
            <?php
          }
          elseif ( is_single() ) {
            ?>
            <div class="left"><!--?php previous_post_link(__('&lt;&lt; %link', 'simplyworks')); ?--></div>
            <div class="right"><!--?php next_post_link(__('%link &gt;&gt;', 'simplyworks')); ?--></div> 				
            <?php
          }
          else {
            ?>
            <div class="left nextlink"><!--?php next_posts_link(__('&lt;&lt; previous entries', 'simplyworks')); ?--></div>
            <div class="right nextlink"><!--?php previous_posts_link(__('recent entries &gt;&gt;', 'simplyworks')); ?--></div>
          <?php } ?> 
          <div class="clear"></div>
        </div><!-- END lowernav ID -->
        <?php
        if ( isset( $swc_options['swc_comments'] ) && ($swc_options['swc_comments'] == "1") ) {
          
        }
        else {
          comments_template( '', true );
        }
        ?>
      <?php endif; ?>

      <!-- ссылки пагинации на странице -->
      <!--?php wp_corenavi( $cat_ID, $posts_per_page, $current_page ); ?-->

    </div> <!-- END contentarea CLASS -->
    <?php get_sidebar(); ?>
    <div class="clear"></div> 
  </div>  <!-- END wrapper CLASS -->
  <div class="clear"></div> 
</div> <!-- END mainbody ID -->
<?php get_footer(); ?>