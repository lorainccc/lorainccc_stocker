<?php
/**
 * Template Name: Gateway Template
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
<div class="small-12 medium-12 large-12 cell gateway-header">
	<?php the_post_thumbnail(); ?>
	</div>
	<div class="small-12 medium-12 large-12 cell">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
	<div class="small-12 medium-6 large-8 cell">
			<?php if ( is_active_sidebar( 'gateway-menu-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'gateway-menu-sidebar' ); ?>
				<?php } ?>
	</div>
	<div class="small-12 medium-6 large-4 cell">
<div class="small-12 medium-12 large-12 cell">
		<?php get_sidebar(); ?>
		</div>
	<div class="small-12 medium-12 large-12 cell">
			<?php if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'lccc-events-sidebar' ); ?>
				<?php } ?>
	</div>
			<div class="small-12 medium-12 large-12 cell">
			<?php if ( is_active_sidebar( 'sub-site-announcements-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'sub-site-announcements-sidebar' ); ?>
				<?php } ?>
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>
