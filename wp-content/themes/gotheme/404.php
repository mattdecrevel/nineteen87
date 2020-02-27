<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package gotheme
 *
 * @author goBRANDgo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="errorPage" style="background: url( <?php the_field( '404_img', 'option' ); ?> ) no-repeat; background-size: cover;">
				<h1 class="errorPageTitle">
					<?php if ( get_field( '404_title', 'option' ) ) { the_field( '404_title', 'option' );
} else { echo '404'; } ?>
				</h1>

				<div class="page-content">
					<div class="errorText"><?php the_field( '404_text', 'option' ); ?></div>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- errorPage -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
