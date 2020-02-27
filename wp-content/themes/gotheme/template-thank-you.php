<?php
/**
 * Template Name: Thank You
 *
 * @package gotheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php $feat_img = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
				<div class="thankYouPageWrap" style="background: url( <?php echo esc_url( $feat_img ); ?> ) no-repeat center; background-position: bottom; background-size: cover;">
					<div class="container"><div class="row"><div class="col-xs-12 col-sm-8 col-sm-offset-2">
						<div class="title"><?php the_field( 'display_title' ); ?></div>
						<div class="subtitle"><?php the_content(); ?></div>
					</div></div></div><!--container, row, & cols-->
				</div><!--defaultHeroSection-->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
