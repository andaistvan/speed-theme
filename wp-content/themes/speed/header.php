<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

   <div class="row header guide">
      <div id="teszt" class="large-12 columns">

         <div class="site-branding">
   			<?php
               if (is_front_page() && is_home()) : ?>
   				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
   				<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>

   			<?php
               endif; ?>
               <?php echo do_shortcode('[lsphe-header]'); ?>
   		</div><!-- .site-branding -->

      </div><!-- small-12 columns -->

      <div class="large-12 columns menu-bg">
         <div data-sticky-container>
            <div data-sticky data-margin-top='0' data-top-anchor="teszt:bottom" data-btm-anchor="content:bottom">

            <!-- .site-navigation -->
               <?php
               echo'

               <div class="top-bar">
                  <div class="top-bar-left">';
                       wp_nav_menu(array(
                           'container' => false,
                           'menu' => __('Top Bar Menu', 'speed'),
                           'menu_class' => 'dropdown menu',
                           'theme_location' => 'topbar-menu',
                           'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                           //Recommend setting this to false, but if you need a fallback...
                           'fallback_cb' => 'f6_topbar_menu_fallback',
                           'walker' => new F6_TOPBAR_MENU_WALKER(),
                       ));
                   echo'
                  </div>
               </div>'; ?><!-- .site-navigation -->
            </div><!-- sticky data.-->
         </div><!-- data-sticky-container -->
      </div><!-- small-12 columns sticky cont.-->

   </div><!-- .row -->

	<div id="content" class="site-content">
      <div class="row">
