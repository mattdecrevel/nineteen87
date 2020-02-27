<?php
/**
 * The template for displaying Sub-Archive pages (category, tag, and date archives).
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package gotheme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					if ( is_category() ) :
						single_cat_title();

					elseif ( is_tag() ) :
						single_tag_title();

					elseif ( is_author() ) :
						/*
						 * Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						echo esc_attr( 'Author: <span>' ).get_the_author().esc_attr( '</span>' );

						/*
						 * Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					elseif ( is_day() ) :
						echo esc_attr( 'Day: <span>' ).get_the_date().esc_attr( '</span>' );

					elseif ( is_month() ) :
						echo esc_attr( 'Month: <span>' ).get_the_date( 'F Y' ).esc_attr( '</span>' );

					elseif ( is_year() ) :
						echo esc_attr( 'Year: <span>' ).get_the_date( 'Y' ).esc_attr( '</span>' );

					else :
						echo esc_attr( 'Archives' );

					endif;
					?>
				</h1>
				<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					echo esc_attr( '<div class="taxonomy-description">'.$term_description.'</div>' );
				endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					// Print the post's stuff.
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
