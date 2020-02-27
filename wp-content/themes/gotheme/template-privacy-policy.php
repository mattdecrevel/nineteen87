<?php
/**
 * Template Name: Privacy Policy
 *
 * @package gotheme
 */

get_header(); ?>


<!-- If privacy policy is enabled, show a privacy policy -->
<?php if (get_field('enable_privacy_policy')) { ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php $feat_img = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
				<div class="privacy-page-wrap" style="background: url( <?php echo esc_url( $feat_img ); ?> ) no-repeat center; background-position: bottom; background-size: cover;">
					
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-sm-offset-2">
								<div class="privacy-policy">
									<div class="title"><h1><?php echo the_title();?></h1></div>
									
									<!-- If privacy policy is not generic, show custom policy wysiwyg -->
									<?php if (get_field('privacy_policy_type') != 'generic') { ?>
									<div class="wyg"><?php the_field( 'custom_policy'); ?> </div>
									<? } else { ?>
									
									<!-- Generic Privacy Policy -->
									<div class="desc">
										<p>This privacy notice discloses the privacy practices for <a href="<?php echo site_url(); ?>"><?php echo site_url(); ?></a>. This privacy 
											notice applies solely to information collected by this website. It will notify you of the following:</p>
										
										<ol>
											<li>What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>
											<li>What choices are available to you regarding the use of your data.</li>
											<li>The security procedures in place to protect the misuse of your information.</li>
											<li>How you can correct any inaccuracies in the information.</li>
										</ol>
										
										
										<h4>Information Collection, Use, and Sharing </h4>
										<p>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us 
											via email or other direct contact from you. We will not sell or rent this information to anyone.</p>
										
										<p>We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third 
											party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>
										
										<p>Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to 
											this privacy policy.</p>
										
										
										<h4>Your Access to and Control Over Information</h4>
										<p>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or 
											phone number given on our website:</p>
										
										<ul>
											<li>See what data we have about you, if any.</li>
											<li>Change/correct any data we have about you.</li>
											<li>Have us delete any data we have about you.</li>
											<li>Express any concern you have about our use of your data.</li>
										</ul>
										
										
										<h4>Security</h4>
										<p>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both 
											online and offline.</p>
										
										<p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. 
											You can verify this by looking for a lock icon in the address bar and looking for "https" at the beginning of the address of the Web page.</p>
										
										<p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who 
											need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable 
											information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>
											
											
										<h4>Cookies</h4>
										<p>We use "cookies" on this site. A cookie is a piece of data stored on a site visitor's hard drive to help us improve your access to our site 
											and identify repeat visitors to our site. For instance, when we use a cookie to identify you, you would not have to log in a password more 
											than once, thereby saving time while on our site. Cookies can also enable us to track and target the interests of our users to enhance the 
											experience on our site. Usage of a cookie is in no way linked to any personally identifiable information on our site.</p>

										<p>Some of our business partners may use cookies on our site (for example, advertisers). However, we have no access to or control over these cookies.</p>
										
										
										<h4>Links </h4>
										<p>This website contains links to other sites. Please be aware that we are not responsible for the content or privacy practices of such other sites. 
											We encourage our users to be aware when they leave our site and to read the privacy statements of any other site that collects personally 
											identifiable information.</p>
											
										<h4>Registration </h4>
										<p>In order to use this website, a user must first complete the registration form. During registration a user is required to give certain 
											information (such as name and email address). This information is used to contact you about the products/services on our site in which you 
											have expressed interest. At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not 
											required.</p>


										<h4>Orders </h4>
										<p>We request information from you on our order form. To buy from us, you must provide contact information (like name and shipping address) and 
											financial information (like credit card number, expiration date). This information is used for billing purposes and to fill your orders. If 
											we have trouble processing an order, we'll use this information to contact you.</p>


										<h4>Surveys & Contests </h4>
										<p>From time-to-time our site requests information via surveys or contests. Participation in these surveys or contests is completely voluntary 
											and you may choose whether or not to participate and therefore disclose this information. Information requested may include contact information 
											(such as name and shipping address), and demographic information (such as zip code, age level). Contact information will be used to notify the 
											winners and award prizes. Survey information will be used for purposes of monitoring or improving the use and satisfaction of this site.</p>
										
										<p><b>If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at 
											<a href="tel:<?php the_field( 'global_phone_number', 'option'  ); ?>"><?php the_field( 'global_phone_number', 'option'  ); ?></a> or via email at 
											<a href="mailto:<?php the_field( 'global_email', 'option'  ); ?>"><?php the_field( 'global_email', 'option'  ); ?></a>.</b></p>
										
										
										<div class="company-info">
											<div class="name"><?php the_field( 'global_company_name', 'option' ); ?></div>
											<div class="address"><?php the_field( 'global_location_address', 'option'  ); ?><br>
											<?php the_field( 'global_location_city', 'option'  ); ?>, <?php the_field( 'global_location_state', 'option'  ); ?> 
											<?php the_field( 'global_location_zip_code', 'option'  ); ?> </div>
										
											<div class="phone"><a href="tel:<?php the_field( 'global_phone_number', 'option'  ); ?>"><?php the_field( 'global_phone_number', 'option'  ); ?></a></div>
											<div class="email"><a href="mailto:<?php the_field( 'global_email', 'option'  ); ?>"><?php the_field( 'global_email', 'option'  ); ?></a></div>
										</div>

									</div><!--END - desc -->
									<?php }?>
									
								</div><!--END - privacy-policy -->
							</div><!--END - cols -->
						</div><!--END - row -->
					</div><!--END - container -->
				</div><!--END - defaultHeroSection-->

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>

<! If not privacy policy enabled, forward back to home page -->
<? } else { header("Location: ".home_url()."/"); } ?>