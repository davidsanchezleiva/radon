<?php /* Template Name: Home Template */ 
get_header(); 
?><section>
    <div class="container-fluid">
        <div id="slider" class="home_banner">
            <?php echo do_shortcode('[slider]'); ?>  
        </div>
    </div>
    <div id="keep" class="container-fluid">
    	<div class="container">
            <h2><?php the_field('service_title'); ?></h2>
            <h4><?php the_field('service_subtitle'); ?></h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('service_first_list'); ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php the_field('service_second_list'); ?>
                </div>
                <div style="clear:both"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
            		<p><a class="req-estimate button" href="#" data-toggle="modal" data-target="#reqestimate"><?php _e('<!--:en-->REQUEST AN ESTIMATE<!--:--><!--:es-->SOLICITAR UN PRESUPUESTO<!--:-->'); ?></a></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                </div>
            </div>
        </div>
    </div>
    <div id="columns">
    	<div class="container container-fluid">
        	<div class="row">
            	<div class="col-md-6 col-sm-12 col-xs-12 whatis">
                	<h2><?php the_field('radon_title'); ?></h2>
                    <?php the_field('radon_text'); ?>
                    <p><a href="<?php echo get_permalink(5)?>" class="read-more button"><?php _e('<!--:en-->READ MORE<!--:--><!--:es-->LEER MAS<!--:-->'); ?></a></p>
                </div>
            	<div class="col-md-6 col-sm-12 col-xs-12 locations">
                	<p><img src="<?php bloginfo('template_directory')?>/images/pin.png" alt=""></p>
                	<h3><?php the_field('locations_title'); ?></h3>
                    <p><?php the_field('locations_text'); ?></p>
                	<a href="<?php the_field('locations_link'); ?>"><img src="<?php bloginfo('template_directory')?>/images/plus.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>