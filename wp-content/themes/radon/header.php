<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' -'; } ?> <?php bloginfo('name'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <!-- icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png">
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_template_directory_uri(); ?>/css/pgwslider.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_template_directory_uri(); ?>/css/owl.transitions.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.slides.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <div class="modal fade" id="reqestimate" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title"><?php _e('<!--:en-->REQUEST A FREE QUOTE<!--:--><!--:es-->SOLICITAR UN PRESUPUESTO<!--:-->'); ?></h2>
        </div>
        <div class="modal-body">
          <?php 
		  $curLang = substr(get_bloginfo( 'language' ), 0, 2);
		   switch ($curLang) {
			   case "en":
		  			echo do_shortcode('[contact-form-7 id="61" title="Request a free quote"]');
					break;
			   case "es":
          			echo do_shortcode('[contact-form-7 id="160" title="Solicite una cotización gratis"]');
					break;
		   }
		  ?>
        </div>
      </div>
    </div>
  </div>
    <header>
    <div id="topheader">
    	<div class="topheaderin">
            <div class="container-fluid">
            	<?php if(!isMobile()):?>
                <nav class="navbar navbar-default desktop" role="navigation">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                     </div>
                     <div id="menu" class="collapse navbar-collapse">
                        <?php
                             wp_nav_menu( array(
                                'menu'              => 'Menu top',
                                'theme_location'    => 'Top Navigation Menu',
                                 'depth'             => 2,
                                 'menu_class'        => 'nav navbar-nav')
                             );
                          ?>
                      </div>
                </nav>
                <?php endif;?>
				<?php echo qtranxf_generateLanguageSelectCode('text'); ?>
            </div>
        </div>
		<div class="container-fluid">
            <div id="menulogo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/radon.svg" alt="Radon"></a>
                <?php if(!isMobile()):?>
                <nav class="navbar navbar-default desktop" role="navigation">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-main">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                     </div>
                     <div id="menu-main" class="collapse navbar-collapse">
                        <?php
                             wp_nav_menu( array(
                                'menu'              => 'Main menu',
                                'theme_location'    => 'Main Pages Navigation Menu',
                                 'depth'             => 2,
								 'link_after'   => '<span class="arrow-down"></a>',
                                 'menu_class'        => 'nav navbar-nav')
                             );
                          ?>
                      </div>
                </nav>
                <?php endif;?>
                <nav class="navbar navbar-default mobile" role="navigation">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-mobile">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                     </div>
                     <div id="menu-mobile" class="collapse navbar-collapse">
                        <?php
                             wp_nav_menu( array(
                                'menu'              => 'Mobile Menu',
                                'theme_location'    => 'Total Pages Navigation Menu on Mobile',
                                 'depth'             => 2,
                                 'menu_class'        => 'nav navbar-nav')
                             );
                          ?>
                      </div>
                </nav>
            </div>
        </div>
     </div>
    </header>