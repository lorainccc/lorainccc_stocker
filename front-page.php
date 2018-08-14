<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LCCC Framework
 */
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
  <?php if ( is_active_sidebar( 'stocker-slider-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 cell slider-container nopadding">
						<?php dynamic_sidebar( 'stocker-slider-sidebar' ); ?>
			</div>
			<?php }else{ ?>
			<div class="home-hero">
    <div class="grid-x grid-margin-x">
				&nbsp;
			</div>
  </div>
  <?php } ?>
	<div class="grid-container">
			<section class="grid-x grid-margin-x events-row">
<?php if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'lccc-events-sidebar' ); ?>
				<?php } ?>
			</section>
  <div class="cell grid-x grid-margin-x">
    <hr />
  </div>
			<section class="grid-x grid-margin-x">
   	<div class="small-12 medium-7 large-8 cell stocker-highlights">
					<?php
					$stockerhlargs=array(
					'post_type' => 'page',
					'post_status' => 'publish',
					'category_name' => 'stocker-highlight',
					);
					$newstockerhighlights = new WP_Query($stockerhlargs);
					if ( $newstockerhighlights->have_posts() ) :
							while ( $newstockerhighlights->have_posts() ) : $newstockerhighlights->the_post();
						?>

				<div class="small-12 medium-12 large-12 cell stocker-highlight-container">

				   <div class="small-12 medium-6 large-6 cell highlight-image">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
				   </div>


				<div class="small-12 medium-6 large-6 cell highlight-text">

													<div class="small-12 medium-12 large-12 cell highlight-header">
																<?php the_title('<h3>','</h3>');?>
													</div>

<div class="grid-container">
													<div class="small-12 medium-12 large-12 cell highlight-content">
															<?php the_excerpt('<p>','</p>');?>
													</div>
</div>

													<div class="small-12 medium-12 large-12 cell highlight-link">
																<a href="<?php echo esc_url( get_permalink() ); ?>" class="button">Learn More</a>
													</div>

									</div>

					</div>

					<?php
						endwhile;
					endif;
					?>

			</div>
				<div class="small-12 medium-5 large-4 cell">

										<div class="small-12 medium-12 large-12 cell stocker-badges-container">
											<?php if ( is_active_sidebar( 'badges-sidebar' ) ) { ?>
																	<?php dynamic_sidebar( 'badges-sidebar' ); ?>
												<?php } ?>
										</div>
										<!-- <div class="grid-container"> -->
										<div class="small-12 medium-12 large-12 cell">
									<?php

										echo '<div class="small-12 medium-12 large-12 cell lccc_announcement-sub-site">';
echo '<div class="grid-container">';
														echo '<div class="small-12 medium-4 large-3 cell lccc_announcement headerlogo">';

											echo '<i class="lccc-font-lccc-reverse">'.'</i>';

							echo '</div>';


							echo '<div class="small-12 medium-8 large-9 cell ">';

										echo '<h2 class="headertext">'.'Announcements'.'</h2>';

										echo '</div>';
							echo '</div>';
			echo '</div>';
													// Announcement Query
													$domain = 'https://' . $_SERVER['SERVER_NAME'].'/';
													$args = array(
														'post_type' => 'lccc_announcement',
													);
													$stocker_annoucnement_query = new WP_Query( $args );

													// The Loop
													if ( $stocker_annoucnement_query->have_posts() ) {
															while ( $stocker_annoucnement_query->have_posts() ) {
															$stocker_annoucnement_query->the_post();
															 echo '<div class="small-12 medium-12 large-12 cell sub-announcement-container">';
																		echo '<div class="small-12 medium-12 large-12 cell">';?>
																				<a class="announcement-title-link" href="<?php the_permalink(); ?>">
																					<?php the_title(); ?>
																				</a>
																				<?php
																					the_excerpt('<p>','</p>');
																	echo '</div>';
															echo '</div>';
														}
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
													echo '<div class="small-12 medium-12 large-12 cell view-all-athletics-button">';
							echo '<a href="'.$domain.'stocker/lccc_announcement" class="button">View All Announcements</a>';
		     echo '</div>';
										?>
</div>
									</div>
				<!-- </div> -->
  </section>
			<?php if ( is_active_sidebar( 'sponsor-sidebar' ) ) { ?>
				  <div class="cell grid-x grid-margin-x">
    <hr />
  </div>
		<div class="cell grid-x grid-margin-x">
  <div class="small-12 medium-12 large-12 cell sponsors-row">
			<?php dynamic_sidebar( 'sponsor-sidebar' ); ?>
		</div>
  </div>

			<?php } ?>
		<!-- </div> -->
	</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
