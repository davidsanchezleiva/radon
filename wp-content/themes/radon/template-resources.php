<?php //wp_redirect( home_url() ); exit; ?>
<?php /* Template Name: Resources */ 
get_header(); ?>
<section>
    <div class="container-fluid">
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
            	<div class="thumb">
					<?php if(has_post_thumbnail()):?>
                        <?php the_post_thumbnail()?>
                    <?php else:?>
                    	<img src="<?php bloginfo('template_directory')?>/images/about-us.jpg" alt="" />
                    <?php endif;?>	
                	<h1><div class="container"><?php the_title()?></div></h1>
                </div>
                <div class="container">
                	<div class="row">
                    	<div class="col-md-12 col-ms-12 col-xs-12">
							<?php the_content(); ?>			
                        </div>
                    </div>	
               </div>			
			</article>			
		<?php endwhile; ?>		
		<?php else: ?>		
			<article>
            	<div class="container">
                	<div class="row">
                    	<div class="col-md-12 col-ms-12 col-xs-12">
							<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>	
                        </div>
                    </div>	
               </div>								
			</article>		
		<?php endif; ?>	
    </div>
    <div class="area-req-estimate nomargin">
            <a class="req-estimate button" href="#" data-toggle="modal" data-target="#reqestimate"><?php _e('<!--:en-->REQUEST AN ESTIMATE<!--:--><!--:es-->SOLICITAR UN PRESUPUESTO<!--:-->'); ?></a>
    </div>
</section>
<section>
	<div id="testimonials">
    	<div class="container">
        	<article>
        	<h2>TESTIMONIALS</h2>
            <?php $testimonials = get_field('testimonials_items', 25); ?>
            <?php if($testimonials): ?>
            <div class="testimonial">
            	<?php foreach($testimonials as $item) : ?>
                	<div class="item">
                    	<div class="testimonail-thumb">
                        	<img src="<?php echo $item['testimonial_image'] ?>" alt="" />
                         </div>
                         <div class="testimonial-text">
                         	<blockquote><?php echo $item['testimonial_text'] ?></blockquote>
                         </div>
                     </div>
                  <?php endforeach; ?>
            </div>
            <?php endif; ?>
            </article>
        </div>
    </div>
</section>
<?php get_footer(); ?>
