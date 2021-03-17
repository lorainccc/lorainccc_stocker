<?php
/**
 *
 * Template Name: Spektrix System
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="row page-content">
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="medium-4 large-4 columns hide-for-small-only">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
		<div class="small-12 medium-12 large-12 columns sidebar-menu-header">
<h3><?php echo bloginfo('the-title'); ?></h3>
		</div>
	<?php	if ( has_nav_menu( 'stocker-left-nav' ) ) : ?>
	<div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'stocker-left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'stocker-left-nav',
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		</div>
		<?php endif; ?>
			<?php if ( is_active_sidebar( 'stocker-page-events-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'stocker-page-events-sidebar' ); ?>
				<?php } ?>
	</div>
	</div>
	<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page-spektrix' ); ?>

			<?php endwhile; // end of the loop. ?>
			<?php 
			//Spektrix iFrame Integrations

			$iframeurl = event_meta_box_get_meta('lc_ticket_sales_iframe_url_field');
            $style = 'stylesheet=lc-spektrix-styles.css';

			if($_GET['e'] !== ''){
				$lc_temp_event_id = $_GET['e'];
				$lc_event_id = substr($lc_temp_event_id, 0, 4);
			}

            if($iframeurl != '') {
			//$url = 'https://system.spektrix.com/stockerartscenter_run1/website/';
			$url = 'https://ticketing.lorainccc.edu/stockerartscenter/website/';

				//echo '<div class="responsive-embed">';

				switch($iframeurl){
					case "ChooseSeats":
						echo '    <iframe style="style="width: 100%; height: 1000px;" border:0;" src="' . $url . 'ChooseSeats.aspx?' . $style . '&resize=true&EventInstanceId=' . $lc_event_id .'" onload="setTimeout(function(){ window.scrollTo(0,0);}, 100)" title="LCCC Stocker Art Center\'s Choose Seats page in Spektrix"></iframe>';
						break;
					case "Basket":
						echo '    <iframe src="' . $url . 'Basket2.aspx?' . $style . '&resize=true" onload="setTimeout(function(){ window.scrollTo(0,0);}, 100)" title="LCCC Stocker Art Center\'s Shopping Basket page in Spektrix"></iframe>';
						break;
					case "MyAccount":
						echo '    <iframe src="' . $url . 'Secure/MyAccount.aspx?' . $style . '&resize=true" onload="setTimeout(function(){ window.scrollTo(0,0);}, 100)" title="LCCC Stocker Art Center\'s MyAccount page in Spektrix"></iframe>';
						break;
					case "Checkout":
						echo '    <iframe style="style="width: 100%; height: 1000px;" border:0;" src="' . $url . 'Secure/Checkout.aspx?' . $style . '&resize=true" title="LCCC Stocker Art Center\'s Checkout page in Spektrix"></iframe>';
						break;
				}

				//echo '</div>';
			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>	
		<div class="small-12 columns show-for-small-only">
				<?php if ( is_active_sidebar( 'stocker-page-events-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'stocker-page-events-sidebar' ); ?>
				<?php } ?>
	</div>
</div>
<?php get_footer(); ?>

