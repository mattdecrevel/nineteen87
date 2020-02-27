<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package gotheme
 *
 * @author goBRANDgo
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main searchPage" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"> Search Results For: <?php the_search_query(); ?> </h1>
				<?php get_search_form(); ?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class="container"><div class="row">
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="singleResult col-sm-12">
					<a class="resultTitle hTitle" href="<?php the_permalink();?>"><?php the_title(); ?></a>
					<div class="resExcerpt"><?php the_excerpt(); ?></div>
				</div><!--singleResult-->

			<?php endwhile; ?>
			</div></div><!--container & row-->

		<?php else : ?>

			<h1 class="page-title">We're sorry. Your search did not have any results. Try again?</h1>
			<?php get_search_form(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
