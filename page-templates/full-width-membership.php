<?php

/**
 * Template Name: Full Width Membership
 * Description: A Page Template with no sidebar. Specifically for use
 * with membership content being pulled in from Wild Apricot.
 * @package rmm-sporty
 * @since rmm-sport 0.1
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="fullwidth" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', false ); ?>
				<?php endwhile; // end of the loop. ?>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>
