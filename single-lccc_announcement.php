<?php
/**
 * The template for displaying all single posts.
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="grid-container">
<div class="grid-x grid-margin-x page-content">
<div class="small-12 medium-12 large-12 cell breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="medium-4 large-4 cell hide-for-small-only">
	<div class="small-12 medium-12 large-12 cell sidebar-widget">
		<div class="small-12 medium-12 large-12 cell sidebar-menu-header">
<h3><?php echo bloginfo('the-title'); ?></h3>
		</div>
	<?php	if ( has_nav_menu( 'stocker-left-nav' ) ) : ?>
	<div id="secondary" class="secondary">
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
	<div class="small-12 medium-8 large-8 cell announ-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php while ( have_posts() ) : the_post(); ?>

				<div class="small-12 medium-12 large-12 cell  event-container">
			<?php get_template_part( 'template-parts/content', 'lccc_announcement' );?>
			</div>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>


		</main><!-- #main -->
	</div><!-- #primary -->
</div>
		<div class="small-12 cell show-for-small-only">
				<?php if ( is_active_sidebar( 'lccc-announcements-sidebar' ) ) { ?>
							<?php dynamic_sidebar( 'lccc-announcements-sidebar' ); ?>
				<?php } ?>
	</div>
</div>
</div>
<?php get_footer(); ?>
