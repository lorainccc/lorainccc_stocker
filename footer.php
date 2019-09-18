<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package LCCC Framework
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="small-12 medium-12 large-12 columns site-footer" role="contentinfo">
		  <div class="row text-center medium-text-left">
    <div class="large-4 medium-4 columns"> <img class="footer-logo" src="https://www.lorainccc.edu/stocker/wp-content/uploads/sites/69/2016/07/Stocker-Arts-Ctr-logo.svg" alt="LCCC Stocker Footer Logo" width="260" height="82.5"/>
      <h2>Connect with Stocker</h2>
      <ul class="menu footer-sm-links">
        <li><a href="https://www.facebook.com/Stocker-Arts-Center-83843213363/?fref=ts" title="Follow Stocker Arts Center on Facebook"  target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/facebook_white.svg" height="30" width="30" alt="Follow Stocker Arts Center on Facebook" /></a></li>
        <li><a href="https://twitter.com/StockerArts" target="_blank" title="Follow Stocker Arts Center on Twitter"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/twitter_white.svg" height="30" width="30" alt="Follow Stocker Arts Center on Twitter" /></a></li>
       
      </ul>
      <a href="https://www.lorainccc.edu/campus-technology/lccc-mobile/" title="Download LCCC's Mobile App" target="_blank" class="clearfix mobile-app-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/smartphone_yellow.svg" heigth="33" width="20" alt="Download LCCC's Mobile App"/>
      <h2>LCCC'S<br />
        Mobile App</h2>
      </a> 
      <?php if($_GET['siteurl'] == ''){ ?>
     <p class="website-feedback">
      <a href="/website-feedback?siteurl=<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" title="Provide Feedback about this Page" target="_blank">Feedback about this page</a>
     </p>
     <?php } ?>
      </div>
    <div class="large-4 medium-4 columns">
      <h2>Contact Stocker</h2>
      <p>Lorain County Community College<br />Stocker Arts Center<br />1005 N. Abbe Road<br />
        Elyria, OH 44054<br />
       (440) 366-4040<br />
        <!--<a href="mailto:email@emailaddress.com">email@emailaddress.com</a>--> </p>
      <ul class="underline">
        <li><a href="https://www.lorainccc.edu/stocker/about-the-stocker-arts-center/map-and-directions-to-the-stocker-arts-center/" title="Map and Directions to LCCC">Map and Directions</a></li>
      </ul>
    </div>
    <div class="large-4 medium-4 columns" aria-labelledby="menu-footer-quicklinks">
      <h2>Quick Links</h2>
  <?php if ( has_nav_menu( 'stocker-footer-quicklinks-menu' ) ) : ?>
		<nav id="quicklinks-navigation" class="footer-navigation" role="navigation" aria-labelledby="menu-footer-quicklinks"> 
			<?php
				// Stocker Quicklinks Footer navigation menu.
				wp_nav_menu( array(
					'menu_class'     => 'underline',
					'theme_location' => 'stocker-footer-quicklinks-menu',
				) );
			?>
		</nav><!-- .quicklinks-navigation -->
	<?php endif; ?>
<!--       <ul id="menu-footer-quicklinks" class="underline">
        <li><a href="https://www.lorainccc.edu" title="Visit LCCC's Home page">Lorain County Community College</a></li>
        <li><a href="https://www.lorainccc.edu/stocker/wp-content/uploads/sites/69/2016/07/HokeTheatreSeatingChart7.21.16.pdf" title="View the Hoke Theatre Seating Chart">Hoke Theatre Seating Chart</a></li>
      </ul> -->
    </div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
