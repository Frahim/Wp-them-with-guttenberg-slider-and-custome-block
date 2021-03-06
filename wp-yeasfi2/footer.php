<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp-Yeasfi
 */
?>

<footer id="colophon" class="site-footer">
  <div class="site-info ">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-3 about-section">
          <?php dynamic_sidebar( 'footer_area_one' ); ?>
        </div>
        <div class="col-md-12 col-lg-3 quick-menu">
          <?php dynamic_sidebar( 'footer_area_two' ); ?>         
        </div>
        <div class="col-md-12 col-lg-3 inner-menu">
          <?php dynamic_sidebar( 'footer_area_three' ); ?>
        </div>
        <div class="col-md-12 col-lg-3 inner-menu">
          <?php dynamic_sidebar( 'footer_area_four' ); ?>
        </div>
      </div>
    </div>
  </div><!-- .site-info -->
  <div class="site-copy">
    <div class="container">
      <div class="row">
        <div class="col-12">          
          &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>

        </div>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
