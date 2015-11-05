<?php get_header(); ?>
<?php 
	//$obj = get_queried_object();
	$topBg = get_field('top_bg', 141);
?>

<article class="page">

			<div class="container">
            	<div class="row">
					<div class="col-sm-12">
                    <?php the_breadcrumb();?>
					</div>
				</div>
            </div>
	<div class="topBg" style="background-image:url(<?php echo $topBg[url];?>)">
		<img src="<?php echo $topBg[url];?>" alt="">
		<div class="pos"><div class="container"><div class="row">

			<div class="col-sm-12">

			<header>
				<?php /*<a href="<?php echo get_page_link(141); ?>" class="">all newsletters</a>*/?>
				<h1 class="topTitle"><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>			
			</header>

			</div>

		</div></div></div><!--/.container-->
		
	</div><!--/.TOPbG-->

</article>

<div class="container">

	<div class="row">

		<div class="blockLine">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				
			<div class="col-sm-12">	
				<article class="">			
					<header>										
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<div class="content"><p><?php the_excerpt();?>...</p></div>									
					<footer><a href="<?php the_permalink(); ?>">view details</a></footer>
				</article>								
			</div>
		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article style="padding-top:30px">
				<header><h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2></header>
			</article>
			<!-- /article -->

		<?php endif; ?>
		</div>
		<?php get_template_part('pagination'); ?>


	</div><!--/.row-->

	<div id="care" class="blockLine">

				<div class="row">

					<!--<div class="col-sm-3">
						<h3 class="blockTitle"><?php /* the_field('care_left_title');?></h3>
						<?php the_field('carer_left_text');?>
						<?php if(get_field('care_left_link')) { ?>
							<a class="vm"href="<?php the_field('care_left_link');?>">learn more</a>
						<?php } */?>
					</div>-->

					<div class="col-sm-12">
					<h3 class="blockTitle">reach out</h3>
						<div class="row">
							<?php
							$a=1; 
							$rows = get_field('care_items',17);

							if($rows) { ?>						

							<?php foreach ( $rows as $row )  { ?>
							<div class="col-sm-3">
								
								<div class="">
                                	<?php if($a == 1):?>
										<a href="#data" id="popup"><img src="<?php echo $row['care_image']['url'];?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                    <?php else:?>
                                    	<a href="<?php echo $row['care_link']?>"><img src="<?php echo $row['care_image']['url'];?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
                                    <?php endif;?>
								</div>

							</div>

							<?php $a++; } ?>					

							<?php } ?><!--/rows-->	
							
							</div>

					</div><!--/.col-sm-12-->

				</div>

			</div><!--/#care-->

</div>

<?php get_footer(); ?>