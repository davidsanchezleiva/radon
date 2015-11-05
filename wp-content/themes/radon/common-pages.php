<section>
     <div class="container section-page-content">
    	<div class="row">
        	<div class="col-md-6 col-ms-12 col-xs-12 news">
            	<article>
                    <h2>NEWS</h2>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1
                        );
                        $query = new WP_Query( $args );
                    ?>
                    <?php if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); ?>
                        <h3><?php the_title()?></h3>
                        <p><span><?php the_time('j F Y'); ?></span></p>
                        <?php html5wp_excerpt('html5wp_post_on_pages');?>
                        <a class="read-more button" href="<?php the_permalink()?>"><?php _e('<!--:en-->READ MORE<!--:--><!--:es-->LEER MAS<!--:-->'); ?></a>
                    <?php endwhile; endif;?>
                </article>		
            </div>
            <div class="col-md-6 col-ms-12 col-xs-12 social-media">
            	<article>
                    <h2>SOCIAL MEDIA</h2>
                    <ul class="social">
                    	<li><a target="_blank" href="<?php echo ot_get_option( 'youtube_link' );?>" class="youtube">you tube</a></li>
                    	<li><a target="_blank" href="<?php echo ot_get_option( 'twitter_link' );?>" class="twitter">twitter</a></li>
                    	<li><a target="_blank" href="<?php echo ot_get_option( 'facebook_link' );?>" class="facebook">facebook</a></li>
                    </ul>
                </article>		
            </div>
        </div>
    </div>
</section>