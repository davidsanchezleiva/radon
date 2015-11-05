<footer>
    <div class="container">
    	<div class="row">
        	<div class="col-md-5 col-sm-12 col-xs-12">
            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory')?>/images/radon_footer.svg" alt="Radon" /></a>
            <div class="license">
                <?php echo ot_get_option( 'license_text' );?>
            </div>
            <p>Radon Abatement Services / Chevy Chase, Maryland 20825</p>
            <p class="contact-info"><?php echo ot_get_option( 'phone' );?> <a href="mailto:<?php echo ot_get_option( 'mail' );?>"><?php echo ot_get_option( 'mail' );?></a></p>
            <p class="copyright"><?php echo ot_get_option( 'copyright' );?> </p>
            </div>
        	<div class="col-md-7 col-sm-12 col-xs-12">
            	<?php if(!isMobile()):?>
            	<div class="col-md-4 col-sm-4 col-xs-12 notmobile">
				<?php
                             wp_nav_menu( array(
                                'menu'              => 'Menu top',
                                'theme_location'    => 'Top Navigation Menu',
                                 'depth'             => 1,
                                 'menu_class'        => 'nav navbar-nav')
                             );
                  ?>
            	</div>
                <div class="col-md-4 col-sm-4 col-xs-12 notmobile">
				<?php
                             wp_nav_menu( array(
                                'menu'              => 'Main menu',
                                'theme_location'    => 'Main Pages Navigation Menu',
                                 'depth'             => 1,
                                 'menu_class'        => 'nav navbar-nav')
                             );
                          ?>
            	</div>
                <?php endif;?>
                <div class="col-md-4 col-sm-4 col-xs-12">
                	<ul class="social">
                    	<li><a target="_blank" href="<?php echo ot_get_option( 'youtube_link' );?>" class="youtube">youtube</a></li>
                    	<li><a target="_blank" href="<?php echo ot_get_option( 'twitter_link' );?>" class="twitter">twitter</a></li>
                    	<li><a target="_blank" href="<?php echo ot_get_option( 'facebook_link' );?>" class="facebook">facebook</a></li>
                    </ul>
                    <div class="angies"><img src="<?php bloginfo('template_directory')?>/images/checkout.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
