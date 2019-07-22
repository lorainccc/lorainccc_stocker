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
      <ul role="presentation" class="menu footer-sm-links">
        <li><a href="https://www.facebook.com/Stocker-Arts-Center-83843213363/?fref=ts" title=""  target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/facebook_white.svg" height="30" width="30" alt="Follow Stocker Arts Center on Facebook" /></a></li>
        <li><a href="https://twitter.com/StockerArts" target="_blank" title=""><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/twitter_white.svg" height="30" width="30" alt="Follow Stocker Arts Center on Twitter" /></a>
        </li><a href="https://www.instagram.com/stockerarts/" target="_blank" title=""><img src="<?php bloginfo('stylesheet_directory')" ?>/images/icons/instagram_white.svg" height="30" width="30" alt="Follow Stocker Arts Center on Instagram"</a>
        <li>
            
        </li>
       
      </ul>
      <a href="https://www.lorainccc.edu/campus-technology/lccc-mobile/" title="" target="_blank" class="clearfix mobile-app-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/smartphone_yellow.svg" heigth="33" width="20" alt=""/>
      <p>LCCC'S Mobile App</p>
      </a> 
      <?php if($_GET['siteurl'] == ''){ ?>
     <p class="website-feedback">
      <a href="/website-feedback?siteurl=<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" title="" target="_blank">Feedback about this page</a>
     </p>
     <?php } ?>
      </div>
    <div class="large-4 medium-4 columns">
      <h2>Contact Stocker</h2>
      <p>Lorain County Community College<br />Stocker Arts Center<br />1005 N. Abbe Road<br />
        Elyria, OH 44054<br />
       (440) 366-4040<br />
        <!--<a href="mailto:email@emailaddress.com">email@emailaddress.com</a>--> </p>
      <ul role="presentation" class="underline">
        <li><a href="https://www.lorainccc.edu/stocker/about-the-stocker-arts-center/map-and-directions-to-the-stocker-arts-center/" title="">Map and Directions</a></li>
      </ul>
    </div>
    <div class="large-4 medium-4 columns" aria-labelledby="menu-footer-quicklinks">
      <h2>Quick Links</h2>
      <ul role="presentation" id="menu-footer-quicklinks" class="underline">
        <li><a href="https://www.lorainccc.edu" title="">Lorain County Community College</a></li>
        <li><a href="https://www.lorainccc.edu/stocker/wp-content/uploads/sites/69/2016/07/HokeTheatreSeatingChart7.21.16.pdf" title="">Hoke Theatre Seating Chart</a></li>
      </ul>
    </div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
