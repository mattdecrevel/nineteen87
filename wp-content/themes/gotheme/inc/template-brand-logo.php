<?php
/**
 * Template Name: Brand Assets
 *
 * This Is the Generic Template for Brand Logo pages.
 * Please ensure all links, text, and file paths are correct before using this.
 *
 * @package gotheme
 *
 * @author goBRANDgo@goBRANDgo!
 *
 * December 2014
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="brand-logo-page">
			<div class="container">
				<div class="col-sm-10 col-sm-offset-2">
				
					<!--HEADER SECTION-->
					<div class="header-title">Download <br/>Brand Assets</div>
					<div class="brand-header-wrapper">
						<div class="brand-header">
							<?php the_field( 'page_header_text' ); ?>
							<br/><br/>
							Logo Formats
						</div>
					</div><!--brand-header-wrapper-->
					<div class="logo-rules">
						<?php the_field( 'logo_rules' ); ?>
					</div>
					
					<?php if ( get_field( 'font_rules' ) ) { ?>
						<div class="font-rule-wrapper">
							<div class="font-rule-header"> Font Rules </div>
							<div class="font-rules">
								<?php the_field( 'font_rules' ); ?>
							</div>
						</div>
					<?php }  ?>
				
					<!--THE LOGOS -->
					<!--full color-->
					<?php while ( have_rows( 'the_logos_list' ) ) : the_row(); ?>
						<div class="logo-row col-sm-12">
							<div class="img-wrapper" style="background: url( <?php the_sub_field( 'unzipped_logo' ); ?> ) no-repeat left center; background-size: contain;"></div>
							<div class="download-links-wrapper">
								<div class="download-label">Download <?php the_sub_field( 'logo_type' ); ?> Logo</div>
								<div class="download-links">
									<?php $count = 0;
									while ( have_rows( 'logos_to_download' ) ) : the_row();
										if ( 0 !== $count ) {
											$sep = ' | ';
										} else {
											$sep = '';
										}
										$count++;
									?>
									<a href="<?php the_sub_field( 'the_logo' ); ?>">
									<?php echo esc_attr( $sep );
									the_sub_field( 'file_type' );?>
									</a>
									<?php endwhile; ?>
								</div><!--download-links-->
							</div><!--download-links-wrapper-->
						</div><!--logo-row-->
					<?php endwhile; ?>
					
					<!--COLORS SECTION-->
					<div class="colors-header">Colors</div>
					<div class="colors-subheader">
						primary palette
						<br/><br/>
						<?php the_field( 'color_rules' ); ?> 
					</div>
					<div class="colors-content">
						<div class="colors-info col-sm-5">
							
							<!---------PRIMARY COLOR(S)----------->
							<?php if ( get_field( 'has_multiple_primary_colors' ) ) {
									$count = 0;
								while ( have_rows( 'primary_colors_rep' ) ) : the_row(); ?>
										<div class="color-section">
											<div class="color-bar" style="background:<?php the_sub_field( 'hex' ); ?>"></div>
											<div class="color-section-content">
												<?php if ( 0 === $count ) {
													$count++;
												?>
													<div class="color-label">Primary Colors</div>
												<?php } ?>
												<div class="color-info">
												HEX:  <?php the_sub_field( 'hex' ); ?><br/>
												CMYK: <?php the_sub_field( 'cmyk' ); ?> <br/>
												RGB:  <?php the_sub_field( 'rgb' ); ?><br/>
												PMS: <?php the_sub_field( 'pms' ); ?>
												</div>
											</div><!--color-section-content-->
										</div><!--color-section-->
									<?php
									endwhile;
} else { ?>
								<div class="color-section">
									<div class="color-bar" style="background:<?php the_field( 'pc_hex' ); ?>"></div>
									<div class="color-section-content">
			<div class="color-label">Primary Color</div>
			<div class="color-info">
				HEX:  <?php the_field( 'pc_hex' ); ?><br/>
				CMYK:  <?php the_field( 'pc_cmyk' ); ?><br/>
				RGB:  <?php the_field( 'pc_rgb' ); ?><br/>
				PMS: <?php the_field( 'pc_pms' ); ?>
			</div>
									</div><!--color-section-content-->
								</div><!--color-section-->
							<?php } ?>
							
							<!------------SECONDARY COLORS------------>
							<?php $count = 0;
							while ( have_rows( 'secondary_colors_list' ) ) : the_row(); ?>
									<div class="color-section">
										<div class="color-bar" style="background:<?php the_sub_field( 'hexs' ); ?>"></div>
										<div class="color-section-content">
											
											<?php if ( 0 === $count ) {
												$count++;
											?>
												<div class="color-label">Secondary Colors</div>
											<?php } ?>
											
											<div class="color-info">
											HEX:  <?php the_sub_field( 'hexs' ); ?><br/>
											CMYK:  <?php the_sub_field( 'cmyks' ); ?><br/>
											RGB:  <?php the_sub_field( 'rgbs' ); ?><br/>
											PMS: <?php the_sub_field( 'pmss' ); ?>
											</div>
									
										</div><!--color-section-content-->
									</div><!--color-section-->
							<?php endwhile; ?>
							
						</div><!--colors-info-->
					</div><!--colors-content-->
					
					
					<!--BRAND GUIDELINES DOWNLOAD -->
					<?php if ( get_field( 'brand_guidelines' ) ) { ?>
						<div class="col-sm-12">
							<div class="brand-guide-header">Brand Guidelines</div>
							<a class="brand-guide-link" href="<?php the_field( 'brand_guidelines' ); ?>" target="_blank">DOWNLOAD PDF</a>
						</div>
					<?php } ?>
			
				</div><!--columns thirteen-->
			</div><!--container-->
		</div><!--brand-logo-page-->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
