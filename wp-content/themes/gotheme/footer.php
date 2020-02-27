<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package gotheme
 *
 * @author goBRANDgo
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<!--Footer Navigation-->
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
				<!--END Footer Navigation-->
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?php the_field( 'global_copyright_text', 'option' ); ?>
			</div>
		</div>
	</div>
	
		
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php if (get_field('client_feedback_form', 'option')) { ?>
<!--! ^#Client Feedback Form -->
<div class="client-feedback-form">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<?php gravity_form(1, true, false, false, '', true, 200); ?>
			</div>
		</div>
	</div>
</div>
<?php }?>

<?php wp_footer(); ?>

</body>
</html>
