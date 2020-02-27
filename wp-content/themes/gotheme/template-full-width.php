<?php
/**
 * Template Name: Full-Width
 *
 * This template is the full width of the view screen (minus some padding on either side), with no sidebar.
 *
 * @package gotheme
 *
 * @author goBRANDgo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
