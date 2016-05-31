<?php

/*
Template Name: cart-template
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

         <div class="row">
            <div class="small-6 small-centered large-centered columns">
               <?php get_template_part('woocommerce/cart/cart') ?>
            </div>   <!-- small-6 large-centered columns -->
         </div>   <!-- row -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
