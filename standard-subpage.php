<?php
/**
 * Template Name: Standard Sub Page
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
echo $menuslug;
?>
<div class="small-12 medium-12 large-12 cell sidebar-widget">
		<div class="small-12 medium-12 large-12 cell sidebar-menu-header">
<h3><?php echo bloginfo('the-title'); ?></h3>
		</div>
	</div>
	</div>
	<div class="small-12 medium-8 large-8 cell page-container">
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
