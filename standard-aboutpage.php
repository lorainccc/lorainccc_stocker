<?php
/**
 * Template Name: About Page Template
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
get_header(); ?>
<div class="grid-container">
<div class="grid-x grid-margin-x page-content">
<div class="small-12 medium-12 large-12 cell breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="medium-4 large-4 cell hide-for-small-only">
<?php $menuslug = $post->post_name;
//echo $menuslug;
?>
<div class="small-12 medium-12 large-12 cell sidebar-widget">
		<div class="small-12 medium-12 large-12 cell sidebar-menu-header">
<h3><?php echo bloginfo('the-title'); ?></h3>
		</div>
	<?php	if ( has_nav_menu( 'about-menu' ) ) : ?>
	<div id="secondary" class="medium-12 cell secondary nopadding">
		<?php if ( has_nav_menu( 'about-menu' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'about-menu',
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	</div>
	<div class="small-12 medium-8 large-8 cell">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</div>
</div>
<?php get_footer(); ?>
