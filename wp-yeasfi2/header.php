<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wp-Yeasfi
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
 
    <header id="masthead" class="site-header">
       <section class="header_top_sec"> 
           <div class="container">
               <div class="row justify-content-around">
    <div class="col">
         <?php $phone = carbon_get_theme_option( 'crb_phone_icon' );?>
         <i class="<?php  echo $phone['class']; ?>"></i> <?php echo carbon_get_theme_option( 'crb_phone_number' ); ?>
        </div>
    <div class="col text-center">
     <?php $email_icon = carbon_get_theme_option( 'crb_email_icon' );?>    
    <i class="<?php  echo $email_icon['class']; ?>"></i> <?php echo carbon_get_theme_option( 'crb_email' ); ?>
    </div>
    <div class="col text-end">

     <?php 
     $social = carbon_get_theme_option( 'crb_socialmedia' );
echo '<ul class="top-social">';
foreach ( $social as $item ) {  
    ?>
  <li><a href="<?php echo $item['url']; ?>">  <i class="<?php echo $item['smicon']['class'];?>"></i></a></li>
 <?php  
}
echo '</ul>';     
     ?>   

    </div>
  
  </div>
           </div>
         </section>
       <section class="header_main_sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="site-branding col-8 col-lg-3 ">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                            rel="home"><?php bloginfo('name'); ?></a></h1>

                    <?php
                        $wp_yeasfi_description = get_bloginfo('description', 'display');
                        if ($wp_yeasfi_description || is_customize_preview()) :
                        ?>
                    <p class="site-description"><?php echo $wp_yeasfi_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped             
                                                        ?></p>
                    <?php
                        endif;
                    endif;
                    ?>
                </div><!-- .site-branding -->
                <div class="col-4 col-lg-9">
                    <nav id="navigation" class="d-none d-lg-block">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                            'container' => 'div',
                            'container_class' => 'navbar',
                            'menu_class' => 'nav',
                            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                            'walker' => new WP_Bootstrap_Navwalker(),
                        ));
                        ?>
                    </nav><!-- #site-navigation -->
                    <button class="btn btn-primary d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Menu</button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'container' => 'div',
                                'container_class' => 'navbar',
                                'menu_class' => 'nav',
                                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                'walker' => new WP_Bootstrap_Navwalker(),
                            ));
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
    </header><!-- #masthead -->