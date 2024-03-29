<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package LCCC Framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="show-on-focus hide-for-print" href="#content"><?php esc_html_e( 'Skip to content', 'lccc-framework' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
  <div class="row show-for-small-only mobile-nav-bar">
    <div class="small-8 columns"> <a href="/stocker"><img style="margin-top: -1.3rem;" src="https://www.lorainccc.edu/stocker/wp-content/uploads/sites/69/2016/07/Stocker-Arts-Ctr-logo.svg" alt="LCCC Stocker Home"/></a> </div>
    <div class="small-2 columns clearfix"> <button data-responsive-toggle="mobile-search" data-hide-for="medium"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/magnifying-glass.svg" height="25" width="25" alt="Toggle LCCC Website Search" class="float-right" data-toggle/></button> </div>
    <div class="small-2 columns"> <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle>Toggle Main Menu</button>
      </span> </div>
  </div>
    <div class="row">
      <div class="hide-for-small-only large-6 medium-6 columns"><a href="<?php echo esc_url( home_url( '' ) ); ?>"><img src="https://www.lorainccc.edu/stocker/wp-content/uploads/sites/69/2016/07/Stocker-Arts-Ctr-header-logo.png" height="80" width="340" alt="Stocker Arts Center Home" /></a>  </div>
        <div class="large-6 medium-6 columns">
          <div class="row">
            <div class="hide-for-small-only medium-12 columns">
            <?php
                  wp_nav_menu(array(
                    'container' => false,
                    'menu' => __( 'Stocker Header Shortcuts Menu', 'lorainccc' ),
                    'menu_class' => 'menu align-right',
                    'theme_location' => 'stocker-header-shortcuts-menu',
                    //'items_wrap'      => '<ul id="%1$s header-menu" class="%2$s">%3$s</ul>',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  ));
							?>
            </div>
          </div>  
          <div class="row">
          <!-- This should be similar to what is generated when using Wordpress searchform.php -->
            <div id="mobile-search" class="small-12 medium-9 medium-offset-3 columns searchbox hide-for-print">
						<?php if ( is_active_sidebar( 'lccc-search-sidebar' ) ) { 
																		dynamic_sidebar( 'lccc-search-sidebar' ); 
										}		?>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div id="responsive-menu" class="medium-blue-bg">
    <nav class="menu-centered">
      <?php
          wp_nav_menu(array(
          'container' => false,
          'menu' => __( 'Primary', 'textdomain' ),
          'menu_class' => 'dropdown menu',
          'theme_location' => 'stocker-primary',
          'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
          //Recommend setting this to false, but if you need a fallback...
          'fallback_cb' => 'lc_topbar_menu_fallback',
          'walker' => new lc_top_bar_menu_walker,
            ));
          ?>
      </nav>
  </div>
</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">