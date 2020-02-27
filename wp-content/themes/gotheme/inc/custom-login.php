<?php
/**
 * DEFINE CUSTOM LOGIN PAGE STYLES
 *
 * Adjust this as needed to customize the back end of the site
 *
 * @package gotheme
 */

/**
 * Change the logo image and page styles.
 */
function my_login_logo() {
	?>
	
	<!-- To enqueue an external font: 
	<?php wp_enqueue_style( 'font-forAdmin', get_template_directory_uri() . '/inc/MyFontsWebfontsKit/MyFontsWebfontsKit.css' ); ?>
	-->
	
	<style type="text/css">
	html { background: url(<?php the_field( 'default_background', 'option' ); ?>) no-repeat center; background-size: cover; }
	    

	body.login { background-color: rgba( 25, 25, 25, 0.6); }
	    
	#login h1 a {
		background-image: url(<?php the_field( 'global_favicon', 'option' ); ?>);
		background-position: center;
		background-size: contain;
		width: 275px;
	}
		
	#login h2.login_subtitle {
		text-align: center;
		text-transform: uppercase;
		font-family: EtelkaThin;
		color: #FFF;
	}
		
	#login #nav, #login #backtoblog { 
		width: 50%; 
		padding: 0px; 
		margin-bottom: 100px; 
		margin-top: 30px;
	}
	    
	#login #backtoblog { float: left; }
	    
	#login #nav { float: right; text-align: right; }
		
	#login #nav a, #login #backtoblog a { 
		font-family: EtelkaThin;
		color: #FFF;
	}
	    
	</style>
<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * Change the logo link to our url
 */
function my_login_logo_url() {
	return home_url();
}
	add_filter( 'login_headerurl', 'my_login_logo_url' );

/**
 * Change the logo link's title attribute
 */
function my_login_logo_url_title() {
	return 'Client';
}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Add text under the logo
 */
function my_login_logo_subtext() {
	return "<h2 class='login_subtitle'><?php the_field( 'logo_subtext', 'option' ); ?></h2>";
}
	add_filter( 'login_message', 'my_login_logo_subtext' );

/**
 * Changes the Page and display Titles for wp-admin dashboard
 *
 * @param string $admin_title - The html page title for the dashboard.
 * @return string - the updated html page title for the wp-admin dashboard.
 */
function change_dashboard_title( $admin_title ) {

	global $current_screen;
	global $title;

	if ( 'dashboard' !== $current_screen->id ) {
		return $admin_title;
	}

	$change_title = 'Dashboard';

	// @codingStandardsIgnoreStart
	$title = $change_title; // Change displayed title.
	// @codingStandardsIgnoreEnd
	$admin_title = str_replace( __( 'Dashboard', 'gotheme' ) , $change_title , $admin_title ); // Change page title.

	return $admin_title;

}
add_action( 'admin_title' , 'change_dashboard_title' );

/**
 * Changes the Dashboard name in left side menu
 */
function change_dashboard_menu() {

	global $menu;

	foreach ( $menu as $key => $menu_setting ) {

		$menu_slug = $menu_setting[2];

		if ( empty( $menu_slug ) || 'index.php' !== $menu_slug ) {
			continue;
		}

		$menu[ $key ][0] = 'Client Dashboard';

		break;

	}

}
add_action( 'admin_menu' , 'change_dashboard_menu' );

?>
