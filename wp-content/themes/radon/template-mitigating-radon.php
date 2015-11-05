<?php //wp_redirect( home_url() ); exit; ?>
<?php /* Template Name: Mitigating Radon */ ?>
<?php get_header(); ?>
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
		<?php endwhile; endif;?>	
        <div class="container">	
            <ul id="tabs" class="nav nav-pills nav-justified" data-tabs="tabs">
                <li class="active"><a href="#gallery" class="gallery" data-toggle="tab"><span>GALLERY</span><span class="arrow-down"></span></a></li>
                <li><a href="#techniques" class="techniques" data-toggle="tab"><span>TECHNIQUES</span><span class="arrow-down"></span></a></li>
                <li><a href="#vent-fans" class="vent-fans" data-toggle="tab"><span>VENT FANS</span><span class="arrow-down"></span></a></li>
            </ul>
         </div>
            <div id="mitigating-radon" class="tab-content">
                <div class="tab-pane fade in active" id="gallery">
        			<div class="container">
                        <?php the_field('gallery_titles'); ?>
                    </div>
                    <div class="container section-page-content">
                    <div class="row">
                        <div class="col-md-6 col-ms-12 col-xs-12 gallery-items">
                            <article>
                        		<?php the_field('gallery_items'); ?>
                            </article>		
                        </div>
                        <div class="col-md-6 col-ms-12 col-xs-12 gallery-image">
                                <article>
                                	<img src="<?php the_field('gallery_image'); ?>" alt="" />
                                </article>		
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade in" id="techniques">
                	<div class="container">
                        <?php the_field('techniques_content'); ?>
                   </div>
                </div>
                <div class="tab-pane fade in" id="vent-fans">
                	<div class="container">
                        <?php the_field('vent_fans_content_1'); ?>
                   </div>
                   <div class="vent-fans-second">
                   		<div class="container">
                        	<?php the_field('vent_fans_content_2'); ?>
                       </div>
                   </div>
                </div>
            </div>
        <div class="area-req-estimate">
        	<a class="req-estimate button" href="#" data-toggle="modal" data-target="#reqestimate"><?php _e('<!--:en-->REQUEST AN ESTIMATE<!--:--><!--:es-->SOLICITAR UN PRESUPUESTO<!--:-->'); ?></a>
        </div>
    </div>
</section>
<?php include(TEMPLATEPATH.'/common-pages.php')?>
<?php get_footer(); ?>
