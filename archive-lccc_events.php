<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="grid-container">
<div class="grid-x grid-margin-x page-content">
    <div class="small-12 medium-12 large-12 cell nopadding show-for-small-only">
  <div class="grid-x grid-margin-x show-for-small-only sub-mobile-menu-row" style="background:#000;">
 <div class="small-2 cell" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
      </span> </div>
    <div class="small-10 cell nopadding"><h3 class="sub-mobile-menu-header" style="color:#ffffff;">Events Menu</h3></div>
  </div>
  <div id="sub-responsive-menu" class="show-for-small-only">
    <ul class="vertical menu" data-drilldown data-parent-link="true">

					<?php 	wp_nav_menu(array(
													'container' => false,
													'menu' => __( 'Drill Menu', 'textdomain' ),
													'menu_class' => 'vertical menu',
										'theme_location' => 'stocker-left-nav',
													'menu_id' => 'sub-mobile-primary-menu',
														//Recommend setting this to false, but if you need a fallback...
													'fallback_cb' => 'lc_drill_menu_fallback',
													'walker' => new lc_drill_menu_walker(),
												));
					?>

    </ul>
  </div>
</div>
<div class="small-12 medium-12 large-12 cell breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?> All Events
</div>
<div class="medium-4 large-4 cell hide-for-small-only">
	<div class="small-12 medium-12 large-12 cell sidebar-widget">
		<div class="small-12 medium-12 large-12 cell sidebar-menu-header">
<h3><?php echo bloginfo('the-title'); ?></h3>
		</div>
	<?php	if ( has_nav_menu( 'stocker-left-nav' ) ) : ?>
<div id="secondary" class="medium-12 cell secondary nopadding">
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

	</div>
	</div>
	<div class="small-12 medium-8 large-8 cell nopadding">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="small-12 medium-12 large-12 cell">
				<header class="page-header">
				<h1 class="page-title"> Events</h1>
			</header><!-- .page-header -->
			<?php
			$eventlistargs=array(
			'post_type' => 'page',
					'post_status' => 'publish',
				'name' => 'events-list',
			);
			$eventsdescrip = new WP_Query($eventlistargs);
					if ( $eventsdescrip->have_posts() ) :
							while ( $eventsdescrip->have_posts() ) : $eventsdescrip->the_post();
								the_content('<p>','</p>');
							endwhile;
					endif;
			?>
           <div class="cell grid-x grid-margin-x event-list-row">
            <hr>
            </div>
		</div>
             <div class="small-12 medium-12 large-12 cell archive-events-container">
                <?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                 $eventargs=array(
                    'post_type' => 'lccc_events',
		                  'paged' => $paged,
                    'order'=> 'ASC',
                    'orderby'=> 'meta_value',
    		              'meta_key' => 'event_start_date_time',
//                    'meta_query' => array(
//                      'relation' => 'AND',
//                      'event_start_day_clause' => array(
//                        'key' => 'event_start_date',
//                        'compare' => 'EXISTS',
//                      ),
//                      'event_start_time_clause' => array(
//                        'key' => 'event_start_time',
//                        'compare' => 'EXISTS',
//                      ),
//                     ),
//                     'orderby' => array(
//                       'event_start_day_clause' => 'ASC',
//                       'event_start_time_clause' => 'ASC',
//                     ),
                );
					$wp_query = new WP_Query($eventargs);
					if ( $wp_query->have_posts() ) :
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
	$starteventdate = event_meta_box_get_meta('event_start_date');
		$starteventtime = event_meta_box_get_meta('event_start_time');
		$endeventdate = event_meta_box_get_meta('event_end_date');
		$endtime = event_meta_box_get_meta('event_end_time');
		$starttimevar=strtotime($starteventtime);
		$starttime=	date("g:i a",$starttimevar);
		$starteventtimehours = date("G",$starttimevar);
		$starteventtimeminutes = date("i",$starttimevar);
		$startdate=strtotime($starteventdate);
		$eventstartdate=date("Y-m-d",$startdate);
		$eventstartmonth=date("M",$startdate);
        $eventstartmonthfull=date("F",$startdate);
		$eventstartday =date("j",$startdate);
        $eventstartyear =date("Y",$startdate);
		$endeventtimevar=strtotime($endtime);
		$endeventtime = date("h:i a",$endeventtimevar);
		$endeventtimehours = date("G",$endeventtimevar);
		$endeventtimeminutes = date("i",$endeventtimevar);
		$enddate=strtotime($endeventdate);
		$endeventdate = date("Y-m-d",$enddate);
		$location = event_meta_box_get_meta('event_meta_box_event_location');
        	$cost = event_meta_box_get_meta('event_meta_box_ticket_price_s_');
		$key_1_value = get_post_meta( get_the_ID(), 'event_start_date', true );
			?>
<div id="post-<?php the_ID(); ?>" class="small-12 medium-12 large-12 cell nopadding">
	<?php
if ( has_post_thumbnail() ) { ?>
			<div class="small-12 medium-12 large-12 cell nopadding">
					<a href="<?php the_permalink();?>"><?php the_title( '<h2 style="padding-left: 0.3rem;">', '</h2>' ); ?></a>
			</div>
			<div class="small-12 medium-12 large-4 cell" style=" padding-left: 0;padding-right: 0.6rem;margin-top: 0.8rem;">
			<?php
							the_post_thumbnail();
			?>
 			</div>
			<div class="small-12 medium-12 large-8 cell">
                        <header class="entry-header">

			<div class="taxonomies">
				<?php echo get_the_term_list( $post->ID, 'event_categories','', ' , ' , ''); ?>
			</div>
			<p><?php echo 'Date: '.$eventstartmonthfull.' '.$eventstartday.', '.$eventstartyear; ?></p>
        		<p><?php echo 'Time: '.$starttime; ?></p>
          		<p><?php echo 'Location: '.$location; ?></p>
        		<p><?php echo 'Cost: '.$cost; ?></p>
        		<p>&nbsp;</p>
			</header>
			<div class="small-12 medium-12 large-12 cell nopadding">
				<div class="entry-content">
					<?php the_excerpt();?>
					<a class="button" href="<?php the_permalink();?>">More Information</a>
				</div><!-- .entry-content -->
			</div>
			</div>
	<?php }else{ ?>
			<div class="small-12 medium-12 large-12 cell nopadding">
                        <header class="entry-header">
        <a href="<?php the_permalink();?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
			<div class="taxonomies">
				<?php echo get_the_term_list( $post->ID, 'event_categories','', ' , ' , ''); ?>
			</div>
			<p><?php echo 'Date: '.$eventstartmonthfull.' '.$eventstartday.', '.$eventstartyear; ?></p>
        		<p><?php echo 'Time: '.$starttime; ?></p>
          		<p><?php echo 'Location: '.$location; ?></p>
        		<p><?php echo 'Cost: '.$cost; ?></p>
        		<p>&nbsp;</p>
			</header>
			<div class="small-12 medium-12 large-12 cell nopadding">
				<div class="entry-content">
					<?php the_excerpt();?>
					<a class="button" href="<?php the_permalink();?>">More Information</a>
				</div><!-- .entry-content -->
			</div>
			</div>
<?php }?>
</div>

			 <div class="cell grid-x grid-margin-x event-list-row">
            			<hr>
            		  </div>
			 <?php
			endwhile;
?>
<div id="pagination" class="clearfix">
  <div style="float:left;"><?php previous_posts_link( 'Previous Events' ); ?></div>
  <div style="float:right;"><?php next_posts_link( 'More Events', $wp_query->max_num_pages ); ?></div>
</div>
<?php
		      wp_reset_postdata();
                    endif;
                 ?>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

</div>
</div>
<?php get_footer(); ?>
