<?php get_header(); ?>
<section>
    <div class="container-fluid">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
            	<div class="thumb">
                    <img src="<?php bloginfo('template_directory')?>/images/about-us.jpg" alt="" />
                	<h1><div class="container">404 - Not Found</div></h1>
                </div>
                <div class="container">
                	<div class="row">
                    	<div class="col-md-12 col-ms-12 col-xs-12">
							<h2>Oops!<span> something went wrong.</span></h2>
                             <p>For some reason the page you requested could not be found on our server.</p>
                             <p><a href="javascript:history.go(-1)">« Go Back</a> / <a href="<?php echo get_settings('home')?>">Go Home »</a></p>
                        </div>
                    </div>	
               </div>			
			</article>			
        <div class="area-req-estimate">
        	<a class="req-estimate button" href="#" data-toggle="modal" data-target="#reqestimate"><?php _e('<!--:en-->REQUEST AN ESTIMATE<!--:--><!--:es-->SOLICITAR UN PRESUPUESTO<!--:-->'); ?></a>
        </div>
    </div>
</section>
<?php include(TEMPLATEPATH.'/common-pages.php')?>
<?php get_footer(); ?>