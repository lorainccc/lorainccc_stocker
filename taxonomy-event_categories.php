<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
	<?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
	<div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'left-nav',
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	</div>
	<div class="small-12 medium-8 large-8 columns">
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php
			// get the currently queried taxonomy term, for use later in the template file
$term = get_queried_object();
					$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
     $args = array(
    'post_type' => 'lccc_events',
    'event_categories' => $term->slug,
    'post_status' => 'publish',
    'order'=> 'ASC',
    'orderby'=> 'meta_value',
				'paged' => $paged,		
    'meta_key' => 'event_start_date',
);
$query = new WP_Query( $args );

    // output the term name in a heading tag
    	echo '<h2>' . $term->name . ' Events </h2>';

    // output the term descriptopn in a paragraph tag
     	echo '<p>' . $term->description . '</p>';

    // output the link to the page that contains the Category Description
	$siteurl= get_site_url();
	echo '<a href="'.$siteurl.'/' . $term->slug .'">'. 'Learn More</a>';

if ($query->have_posts()):
        // Start the Loop
        while ( $query->have_posts() ) : $query->the_post();

  $starteventdate =
			event_meta_box_get_meta('event_start_date');
		$starteventtime = event_meta_box_get_meta('event_start_time');
		$endeventdate = event_meta_box_get_meta('event_end_date');
		$endtime = event_meta_box_get_meta('event_end_time');


										$starttimevar=strtotime($starteventtime);
										$starttime=	date("h:i a",$starttimevar);
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


		$duration = '';
		if($endeventtimehours == 0){
			$endeventtimehours =24;
		}
		$durationhours =	$endeventtimehours - $starteventtimehours;
		if($durationhours > 0){
				if($durationhours == 24){
				$duration .= '1 day';
				}else{
				$duration .= $durationhours.'hrs';
				}
		}
		$durationminutes = $endeventtimeminutes - $starteventtimeminutes;
		if($durationminutes > 0){
			$duration .= $durationminutes.'mins';
		}


$location = event_meta_box_get_meta('event_meta_box_event_location');
$cost = event_meta_box_get_meta('event_meta_box_ticket_price_s_');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
if ( has_post_thumbnail() ) { ?>
		<div class="small-12 medium-12 large-4 columns" style=" padding-left: 0;padding-right: 0.6rem;margin-top: 0.8rem;">
	<?php
							the_post_thumbnail();
		?>
 </div>
	<div class="small-12 medium-10 large-8 columns nopadding">
	<div class="small-12 medium-12 large-12 columns nopadding">
		<header class="entry-header">
        <a href="<?php the_permalink();?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
       <div class="taxonomies">
	<?php echo get_the_term_list( $post->ID, 'event_categories', '', ' , ' , ''); ?>
</div>
        <p><?php echo 'Date: '.$eventstartmonthfull.' '.$eventstartday.', '.$eventstartyear; ?></p>
        <p><?php echo 'Time: '.$starttime; ?></p>
          <p><?php echo 'Location: '.$location; ?></p>
        <p><?php echo 'Cost: '.$cost; ?></p>
        <p>&nbsp;</p>

	</header><!-- .entry-header -->
	</div>
	<div class="small-12 medium-12 large-12 columns nopadding">
	<div class="entry-content">
		<?php
			the_excerpt();
		?>
	<a href="<?php the_permalink();?>">More Information</a>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lorainccc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</div>
	<?php if ( get_edit_post_link() ) : ?>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lorainccc' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	<?php endif; ?>
</div>
	
	
	<?php }else{ ?>
	<div class="small-12 medium-10 large-12 columns nopadding">
	<div class="small-12 medium-12 large-12 columns nopadding">
		<header class="entry-header">
        <a href="<?php the_permalink();?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
       <div class="taxonomies">
	<?php echo get_the_term_list( $post->ID, 'event_categories', '', ' , ' , ''); ?>
</div>
        <p><?php echo 'Date: '.$eventstartmonthfull.' '.$eventstartday.', '.$eventstartyear; ?></p>
        <p><?php echo 'Time: '.$starttime; ?></p>
          <p><?php echo 'Location: '.$location; ?></p>
        <p><?php echo 'Cost: '.$cost; ?></p>
        <p>&nbsp;</p>

	</header><!-- .entry-header -->
	</div>
	<div class="small-12 medium-12 large-12 columns nopadding">
	<div class="entry-content">
		<?php
			the_excerpt();
		?>
	<a href="<?php the_permalink();?>">More Information</a>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lorainccc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</div>
	<?php if ( get_edit_post_link() ) : ?>

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lorainccc' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	<?php endif; ?>
</div>
	<?php } ?>
	</article><!-- #post-## -->
<div class="column row event-list-row">
    <hr>
  </div>

        <?php endwhile; ?>
<div id="pagination" class="clearfix">
  <div style="float:left;"><?php previous_posts_link( 'Previous Events' ); ?></div>
  <div style="float:right;"><?php next_posts_link( 'More Events', $wp_query->max_num_pages ); ?></div>
</div>			
			
			<?php
			// use reset postdata to restore orginal query
			   wp_reset_postdata();
endif; // end of check for query having posts




			?>

	</main><!-- #main -->
	</div><!-- #primary -->
</div>

</div>
<?php get_footer(); ?>