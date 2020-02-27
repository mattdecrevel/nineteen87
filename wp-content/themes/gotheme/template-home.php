<?php
/**
 * Template Name: Homepage
 *
 * @package gotheme
 *
 * @author goBRANDgo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="container">
				
				<div class="row align-items-end">
				    <div class="col-sm-4">
				      One of three columns One of three columns One of three columns One of three columns One of three columns
				    </div>
				    <div class="col-sm-4">
				      One of three columns
				    </div>
				    <div class="col-sm-4">
				      One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns
				    </div>
				    
				    <div class="col-sm-4">
				      One of three columns One of three columns One of three columns One of three columns One of three columns
				    </div>
				    <div class="col-sm-4">
				      One of three columns
				    </div>
				    <div class="col-sm-4">
				      One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns One of three columns
				    </div>




								    
					<?php 
					    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
						if (strpos($url,'.dev.cc') !== false or strpos($url,'.staging.wpengine.com') !== false) { ?>

					    	<!-- DEV in here -->
							<div class="col-sm-4">
							  I will be hidden if the URL does not contain .dev.cc or .staging.wpengine.com
							</div>
							<div class="col-sm-4">
							  I will be hidden if the URL does not contain .dev.cc or .staging.wpengine.com
							</div>
							<div class="col-sm-4">
							   I will be hidden if the URL does not contain .dev.cc or .staging.wpengine.com
							</div>
					<?php } ?>
					
					
					

				    
				</div>				
			</div>			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
