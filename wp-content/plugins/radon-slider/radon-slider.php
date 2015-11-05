<?php
/**
 * @package radon_slider
 * @version 1.0
 */
/*
Plugin Name: Radon custom Slider Plugin
Plugin URI: http://bracketmedia.com/
Description: custom Slider plugin fo Radon
Author: David Sánchez Leiva
Version: 1.0
Author URI: 
*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'imgslides',
    array(
      'labels' => array(
        'name' => __( 'Slides' ),
        'singular_name' => __( 'Slide' )
      ),
      'public' => true,
      'has_archive' => false,
      'exclude_from_search' => true,
      'menu_position' => 20,
      'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
    )
  );
}
function my_scripts_method() {
  wp_enqueue_script(
    'newscript',
    plugins_url( '/radon-slider/js/jquery.slides.min.js' ),
    array( 'jquery' )
  );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

function radon_slider_sc($atts, $content = null ) { 
  ob_start();

  $args = array(
    'post_type' => 'imgslides',
    'orderby' => 'menu_order',
    'order' => 'ASC'
  );
  $bannerposts = get_posts($args); ?>
   
  <script>
   (function($){
      $( document ).ready(function() {
        $("#slides").slidesjs({
          width: 960,
          height: 400,
          play: { auto: true, effect: "fade", interval: 7000},
          navigation: { active: true, effect: "fade" },
          pagination: {
            effect: "fade"
          },
          effect: {
            fade: {
              speed: 800
            }
          }
        });
      });
    })(jQuery);

  </script>
  <div id="slides"> <?php
  foreach($bannerposts as $i => $p): ?>
    <div class="banner">
    <a href="<?php echo $p->post_excerpt; ?>" target="_blank"  >
      <?php echo get_the_post_thumbnail( $p->ID, 'slide' ); ?>
    
      </a>
      <div class="banner-info">
          <div class="wrap container">
            <h2><a href="<?php echo $p->post_excerpt; ?>" class="icon-left-a"><?php echo $p->post_title ; ?></a></h2>
            <?php if(isMobile()):?>
            	<p class="legend"><?php echo wp_trim_words( $p->post_content, 7, '...' ); ?></p>
            <?php else: ?>
            	<p class="legend"><?php echo $p->post_content ; ?></p>
            <?php endif;?>
            <p><a class="req-estimate button" href="#" data-toggle="modal" data-target="#reqestimate"><?php _e('<!--:en-->REQUEST AN ESTIMATE<!--:--><!--:es-->SOLICITAR UN PRESUPUESTO<!--:-->'); ?></a></p>
          </div>
      </div>
    </div> 
    
  <?php endforeach; ?>
  </div>
  <?php return ob_get_clean();
}

add_shortcode( 'slider', 'radon_slider_sc' );
function radon_slider(){
  return;
}
 ?>
