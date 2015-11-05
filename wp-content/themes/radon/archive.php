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
	<div class="container">
			<div class="row">
			<div class="col-sm-12">
				
				<div class="topNews">
					<a href="<?php echo get_page_link(141); ?>" class="">all newsletters</a>
					<h1><?php the_time('F, Y'); ?></h1>
					<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
					  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
					  <?php wp_get_archives_cpt( array( 'post_type'=>'newsletter','type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
					</select>
				</div>

			</div><!--/.col-sm-12-->
			</div>
		</div>

	<div class="topBg" style="background-image:url(<?php echo $topBg[url];?>)">
		<img src="<?php echo $topBg[url];?>" alt="">
		<div class="pos"><div class="container">


				<?php/*
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				  query_posts( array_merge( array(
				  //'meta_key' => 'file_items',
				  //'orderby' => 'meta_value',
				  //'order' => 'ASC',
				  'posts_per_page' => 6,
				  
				   ), $wp_query->query ) );
								
				if (have_posts()): while (have_posts()) : the_post(); ?>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php endwhile; ?>

				<?php else: ?>
					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				<?php endif; ?>
				<?php wp_reset_query(); ?>*/?>
			

		</div></div><!--/.container-->
		
	</div><!--/.TOPbG-->

</article>

<div class="container">

	<div class="row">

		<?php /*
					$today = getdate();
					$a=0;
					$postCount = 1;
					global $post;
					global $wp_query;
					//error_reporting(E_ALL);
					//ini_set("display_errors","stdout");
					$args = array( 
						'posts_per_archive_page' => '-1',
						'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'the_commissioner',
							'value' => 'yes',
							'compare' => 'NOT LIKE'
						)),
						'year' => $today['year'],
						'monthnum' => $today['month'],
						'post_type'=> "newsletter"
					);
					$wp_query = new WP_Query( $args ); ?>

					

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>


						<div class="col-sm-4">	
							<div class="art">							
								<?php the_post_thumbnail('front310');?>
								<div class="content">
									<h2><?php the_title(); ?></h2>
									<?php html5wp_excerpt('html5wp_custom_post');?>
									
									<a class="vm" href="<?php the_permalink(); ?>">view details</a>
								</div>									
							</div>							
						</div>

						

					<?php endwhile;?>
						
					<?php wp_reset_postdata(); // always reset post data after a custom query */?>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->
			
			<!-- post title -->
			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<!-- /post title -->
			
			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			<!-- /post details -->
			
			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
			
			<?php edit_post_link(); ?>
			
		</article>
		<!-- /article -->
		
	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>	
	</div>

	<div id="vr" class="blockLine">

	<div class="row">

		<div class="col-sm-3">
			
			<h3 class="blockTitle">Visual Resources</h3>
			<?php the_field('visual_resources_text', 141);?>

		</div>

		<div class="col-sm-9"><div class="row">

			<?php
			//$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
			  query_posts( array_merge( array(
			  //'meta_key' => 'file_items',
			  //'orderby' => 'meta_value',
			  //'order' => 'ASC',
			  'posts_per_page' => 6,
			  'meta_query' => array(
			        array  (
			            'key' => 'file_items',
			            'value' => 0,
			            'type' => 'NUMERIC',
			            'compare' => '>'
			        )
			    )
			   ), $wp_query->query ) );
									
			if (have_posts()): while (have_posts()) : the_post(); ?>
				<div class="col-sm-4">
						
					<article class="">
						<?php if ('yes' == get_field('brand_new')) { ?>   
							<span class="bn">brand new</span>
						<?php } ?>
						<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('front');?></a></figure>
						<header>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</header>
						<div class="content"><?php html5wp_excerpt('html5wp_custom_post');?></div>
						<?php 
							$rows = get_field('file_items' ); // get all the rows
							$first_row = $rows[0]; // get the first row
							$first_row_file = $first_row['file' ]; // get the sub field value 
							
						?>
						<footer><a href="<?php echo $first_row_file;?>">download pdf</a></footer>
					</article>

				</div>
			<?php endwhile; ?>

			<?php else: ?>
				<div class="col-sm-4"><h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2></div>
			<?php endif; ?>

		</div></div><!--/.row/.col-s-9-->
		<?php wp_reset_query(); ?>

	</div><!--/.row-->
	</div><!--/#br-->

	<div id="" class="blockLine">

		<div class="row">

			<div class="col-sm-3">
				<h3 class="blockTitle">Link / Document resources</h3>
				<?php the_field('visual_resources_text', 141);?>
			</div>

			<div class="col-sm-9">

				<?php
				//$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				  query_posts( array_merge( array(
				  //'meta_key' => 'file_items',
				  //'orderby' => 'meta_value',
				  //'order' => 'ASC',
				  'posts_per_page' => -1,
				  'meta_query' => array(
				        array  (
				            'key' => 'file_items',
				            'value' => 0,
				            'type' => 'NUMERIC',
				            'compare' => '>'
				        )
				    )
				   ), $wp_query->query ) );
										
				if (have_posts()): while (have_posts()) : the_post(); ?>

					<?php
						$number_of_cols = count( get_field( 'items_slider' ) );
						$count = count(get_field( 'file_items' )); 
						$num = 0;
						$rows = get_field('file_items');

						if($rows) { ?>						

							<?php foreach ( $rows as $row )  : ?>
							<div class="file <?php if($num == $count-1){ ?> last-item <?php } ?> <?php if($num == 0){ ?> first-item <?php } ?>">	
														
									<strong><?php echo $row['file_name']?></strong>
									<?php echo $row['file_description']?>
									<a href="<?php echo $row['file']?>" class="vm blank">View document</a>
															
							</div>
							<?php $num++; endforeach; ?>					

						<?php } ?><!--/rows-->

				<?php endwhile; ?>

				<?php else: ?>
					<div class="col-sm-4"><h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2></div>
				<?php endif; ?>
			
				<?php wp_reset_query(); ?>

			</div>

		</div><!--/.row-->

	</div><!--/.blockline-->

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
</div><!--/.contaner-->


<?php get_footer(); ?>