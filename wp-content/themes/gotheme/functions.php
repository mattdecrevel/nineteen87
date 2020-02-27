<?php
/**
 * The gotheme functions and definitions
 *
 * @package gotheme
 */


/** ! ^#Is this a local, staging or development environement? If so, let's turn on a few things that will help us develop */

/* TODO - enable recompile if admin or local copy
 * If addmin, always recompile SCSS File
 */
if ( is_admin() ) { 
	define('WP_SCSS_ALWAYS_RECOMPILE', true);
	add_filter('show_admin_bar', '__return_false');
}





/** ! ^#Load Custom Post Types and Include PHP files */
require_once( get_template_directory().'/inc/default-theme-fields.php' );
require_once( get_template_directory().'/inc/custom-login.php' );
require_once( get_template_directory().'/inc/gbg-dashboard.php' );


/*! ^#Change Default Excerpt Length */

/*
 * Changes Default Excerpt Length
 *
 * @param int length number of words in the default excerpt
 *
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
*/


/*! ^#Change Default Readmore Link */

/**
 * Changes the readmore link returned by wordpress
 *
 * @param string $more the more link.
 **/
function new_excerpt_more( $more ) {
	   global $post;
	return '<a class="moretag" href="'. get_permalink( $post->ID ) . '"> Read More...</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

if ( ! function_exists( 'gotheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gotheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gotheme, use a find and replace
		 * to change 'gotheme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'gotheme', get_template_directory() . '/languages' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'gen-featured', 960, 320, true );

		}

		// ! ^#Register Nav Menus.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'gotheme' ),
			'footer' => __( 'Footer Menu', 'gotheme' ),
		) );
		
		//Enable Title Support
		add_theme_support( 'title-tag' );
		
		//Declare max content image & embed size (in our case bootstrap lg)
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}

	}
endif; // End gotheme_setup.
add_action( 'after_setup_theme', 'gotheme_setup' );


function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );

// ! ^#Enqueue scripts and styles. */
/**
 * Enqueue Javascripts and Stylesheets functions
 *
 * @access public
 * @return void
 **/
function gotheme_enqueue() {
	gotheme_base_enqueues();

	enqueue_javascripts();
	enqueue_stylesheets();

}

add_action( 'wp_enqueue_scripts', 'gotheme_enqueue' );

/**
 * Sets up base scripts and styles.
 *
 * @access public
 * @return void
 */
function gotheme_base_enqueues() {

	// ! ^#Use latest jQuery release */
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ('//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'), false, '' );
		wp_enqueue_script( 'jquery' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); }
}


// ! ^# Enqueue Javascripts
/**
 * Enqueue site Javascripts
 **/
function enqueue_javascripts() {

	wp_enqueue_script( 'ic-application', get_template_directory_uri().'/js/application.js#asyncload', array( 'jquery' ) );
	wp_enqueue_script( 'slick-slider-js', get_template_directory_uri().'/js/vendor/slick/slick.min.js#asyncload', array( 'jquery' ) );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/js/vendor/bootstrap.min.js#asyncload', array( 'jquery' ) );
	wp_enqueue_script( 'outgrow-js', get_template_directory_uri().'/js/vendor/jquery.autogrowtextarea.min.js', array( 'jquery' ) );

}

// ! ^# Enqueue Stylesheets */
/**
 * Enqueue site Stylesheets
 **/
function enqueue_stylesheets() {
	wp_enqueue_style( 'slick-slider-css', get_template_directory_uri().'/js/vendor/slick/slick.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/stylesheets/bootstrap.min.css' );
}


// ! ^# Add ACF options pages */
/**
 * Add ACF Option Page(s)
 */
function gbg_add_acf_menus() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
	
		/**
		 * Builds a list of options pages for Advanced Custom Fields.
		 *
		 * @access public
		 * @param array $pages - Array of names of pages you want to show under Options.
		 * @return void
		 */
		function add_option_pages( $pages = array() ) {
	
			foreach ( $pages as $page ) {
				acf_add_options_sub_page(array(
					'title' => $page,
					'capability' => 'manage_options',
				));
			}
			
			//Add Options Submenus to all CPTs
			$args = array(
			   'public'   => true,
			   '_builtin' => false
			);
			$post_types = get_post_types( $args, 'objects' );
			if ( $post_types && is_array( $post_types) && ! empty( $post_types ) ) {
				foreach( $post_types as $type ) {
					acf_add_options_sub_page(
						array(
							'title'      => $type->labels->singular_name . ' Archive Options',
							'parent'     => 'edit.php?post_type=' . $type->name,
							'capability' => 'manage_options',
						)	
					);
				}
			}
			
			//Add Option Submenu to posts.
			acf_add_options_sub_page(
				array(
					'title'      => 'News Archive Options',
					'parent'     => 'edit.php',
					'capability' => 'manage_options',
				)	
			);
			
		} // Add option Pages.
	
		$pages = array( 'Company Info', 'Site Defaults', 'Header & Footer', 'Analytics & Tracking');
		add_option_pages( $pages );
		
	}
}
add_action( 'init', 'gbg_add_acf_menus', 999 );

// ! ^#Includes ACF Content in SEO checks. */
/**
 * Function written by Ian Armstrong
 * http://imperativeideas.com/making-custom-fields-work-yoast-wordpress-seo/
 */
if ( is_admin() ) { // Check to make sure we aren't on the front end.
	add_filter( 'wpseo_pre_analysis_post_content', 'add_custom_to_yoast' );

	/**
	 * Add ACF to Yoast's Check array
	 *
	 * @param string $content - the Page Content to be checked.
	 */
	function add_custom_to_yoast( $content ) {
		global $post;
		$pid = $post->ID;
		$custom_content = '';

		$custom = get_post_custom( $pid );
		unset( $custom['_yoast_wpseo_focuskw'] ); // Don't count the keyword in the Yoast field!

		foreach ( $custom as $key => $value ) {
			if ( substr( $key, 0, 1 ) !== '_' && substr( $value[0], -1 ) !== '}' && ! is_array( $value[0] ) && ! empty( $value[0] ) ) {
				  $custom_content .= $value[0] . ' ';
			}
		}

		$content = $content . ' ' . $custom_content;
		return $content;

		remove_filter( 'wpseo_pre_analysis_post_content', 'add_custom_to_yoast' ); // Don't let WP execute this twice.
	}
}

/**
 * Force Yoast Meta Box to the bottom of the edit screen
 */
function gbg_yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'gbg_yoasttobottom' );

/*! ^#Rename Options Panel */
if ( function_exists( 'acf_set_options_page_menu' ) ) {
	acf_set_options_page_menu( 'Global Options' );

	/* Add goTheme Options page*/
	acf_add_options_page(array(
		'page_title' 	=> 'go! Settings',
		'menu_title'	=> 'go! Settings',
		'menu_slug' 	=> 'go-settings',
		'capability'	=> 'edit_posts',
		'icon_url' 		=> '/wp-content/themes/gotheme/images/admin/go-menu.png',
		'redirect'		=> false,
	));
}

/**
 * Change 'Posts' in admin menu to 'News'
 */
function edit_admin_menus() {

	global $menu;
	global $submenu;

	// Change 'posts' to 'Insights'
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'All News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][15][0] = 'News Categories'; // Rename categories to meal types
	$submenu['edit.php'][16][0] = 'News Tags'; // Rename tags to ingredients

}
add_action( 'admin_menu', 'edit_admin_menus' );



/**
 * Reorder wp-admin menu
 *
 * @param array $menu_ord - the wp-admin menu order.
 */
function custom_menu_order( $menu_ord ) {
	if ( ! $menu_ord ) { return true; }

	return array(
	'wpengine-common', // wpengine
	'index.php', // Dashboard
	'separator1', // First separator
	'acf-options-company-info', // options panel
	'edit.php?post_type=page', // Pages
	'edit.php', // Posts
	'edit.php?post_type=casestudy', //custom post type
	'edit.php?post_type=teammember', //custom post type
	'gf_edit_forms', // gravity forms
	'separator2', // Second separator
	'go-settings', // options panel
	'edit.php?post_type=acf-field-group', // acf panel
	'themes.php', // Appearance
	'users.php', // Users
	'plugins.php', // Plugins
	'tools.php', // Tools
	'options-general.php', // Settings
	'separator-last', // Last separator
	'upload.php', // Media
	'link-manager.php', // Links
	'edit-comments.php', // Comments
	);
}
add_filter( 'custom_menu_order', 'custom_menu_order' );
add_filter( 'menu_order', 'custom_menu_order' );


/**
* Remove unwanted Dahsboard Widgets
*/
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        remove_meta_box( 'wpe_dify_news_feed', 'dashboard', 'normal');
        remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal');
}
add_action( 'admin_init', 'remove_dashboard_meta' );



/**
 * Add a Dashboard Quick-links Widget
 */
function gbg_add_dashboard_widget() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget(
             'gbg_quicklinks_widget',	// Widget slug.
             'Quick Links',				// Title.
             'gbg_dashboard_widget'		// Display function.
    );	

    
    //Force our Widget to the top.
    $dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$my_widget = array( 'gbg_quicklinks_widget' => $dashboard['gbg_quicklinks_widget'] );
 	unset( $dashboard['gbg_quicklinks_widget'] );

 	$sorted_dashboard = array_merge( $my_widget, $dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'gbg_add_dashboard_widget' );

/**
 * Output the contents of the Quicklinks Widget
 */
function gbg_dashboard_widget() {

	//Pages & Posts
	echo "<a class='gbg-dash-link' href='" . admin_url('/post-new.php?post_type=page') . "' ><span>New Page</span></a>";
	echo "<a class='gbg-dash-link' href='" . admin_url('/post-new.php') . "' ><span>New Post</span></a>";
	
	//Gravity Forms
	echo "<a class='gbg-dash-link' href='" . admin_url( '?page=gf_new_form' ). "'><span>New Form</span></a>";
	
	//Custom Post Types
	$args = array(
	   'public'   => true,
	   '_builtin' => false
	);
	$post_types = get_post_types($args, 'objects');
	if ( $post_types && is_array( $post_types) && ! empty( $post_types ) ) {
		foreach( $post_types as $type ) {
			echo "<a class='gbg-dash-link' href='" . admin_url('/post-new.php?post_type='.$type->name) . "' ><span>New ".$type->labels->singular_name."</span></a>";
		}
	}
	
} //End gbg_dahsboard_widget.




/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function gbg_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'gbg_dashboard_widget_gbg', 		// Widget slug.
		'goBRANDgo! Information', 			// Title.
		'gbg_dashboard_widget_gbg_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'gbg_add_dashboard_widgets' );

/**
 * Create the function to output the contents of your Dashboard Widget.
 */
function gbg_dashboard_widget_gbg_function() {
	echo "office number, hours, stratigist, option for ticket submission";
}









/**
 * Style Our Dashboard Widget
 */
function dashboard_widget_display_enqueues( $hook ) {
	
	// If this isn't the dashboard, don't bother outputting the styles.
	if( 'index.php' != $hook ) {
		return;
	}
	
	wp_enqueue_style( 'gbg-dashboard-widget-styles', get_template_directory_uri() . '/stylesheets/css/widgets.css' );

	
}
add_action( 'admin_enqueue_scripts', 'dashboard_widget_display_enqueues' );

/**
* Prepend Gravity Form Email Subjects with the Site Name
*
* @param array $email - the email
*/
function gbg_add_site_name( $email ) {
	
	$site_name = get_bloginfo();
	$new_subject = $site_name . " - " . $email['subject'];
	
    $email['subject'] = $new_subject;
    return $email;
}
add_filter( 'gform_pre_send_email', 'gbg_add_site_name' );

/**
 * Change Default Wordpress Queries
 * @param object $query - the default query object
 */
function gbgChangeQueries( $query ) {
	
	//Your Code Here
	
	return $query;
} //gbgChangeQueries
add_action( 'pre_get_posts', 'gBgChangeQueries' );







/**
 *	Misc Tweaks
 * 	Remove and rebrand dashboard footer in admin
 */
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Developed by <a href="https://www.gobrandgo.com" target="_blank">goBRANDgo!</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');



/**
 * 	Misc Tweaks
 *	Change Howdy in admin bar to Welcome
 */
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );



/**
 * 	Misc Tweaks
 *	Remove WordPress menu from admin bar
 */
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );




function toolbar_link_to_mypage( $wp_admin_bar ) {
	$args = array(
		'id'    => 'my_page',
		'title' => 'My Page',
		'href'  => 'http://mysite.com/my-page/',
		'meta'  => array( 'class' => 'my-toolbar-page' )
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'social_media_links', 1 );
function social_media_links($wp_admin_bar)
{

	$args = array(
		'id'     => 'go_links',
		'title'	=>	'<img src="/wp-content/themes/gotheme/images/admin/gobrandgo.png" style="height: 32px; top: -2px; position: relative;">',
		'meta'   => array( 'class' => 'first-toolbar-group' ),
	);
	$wp_admin_bar->add_node( $args );	

	// add child items
	$args = array();
	array_push($args,array(
		'id'		=>	'gbg_1',
		'title'		=>	'Link 1',
		'href'		=>	'#',
		'parent'	=>	'go_links',
	));

	array_push($args,array(
		'id'     	=> 'gbg_2',
		'title'		=>	'Link 2',
		'href'		=>	'#',
		'parent' 	=> 'go_links',
		'meta'   	=> array( 'class' => 'first-toolbar-group' ),
	));
	array_push($args,array(
		'id'		=>	'gbg_3',
		'title'		=>	'Link 3',
		'href'		=>	'#',
		'parent'	=>	'go_links',
	));

	sort($args);
	foreach( $args as $each_arg)	{
		$wp_admin_bar->add_node($each_arg);
	}
} 



/**
 * Block anything with Block Robots box checked in SearchWP
 */
function searchwp_exclude_noindex( $ids, $engine, $terms ) {
	$entries_to_exclude = get_posts(
		array(
			'post_type'  => 'any',
			'nopaging'   => true,
			'fields'     => 'ids',
			'meta_query' => array(
				array(
					'key'      => 'block_search',
					'value'    => true,
				),
			),
		)
	);
	$ids = array_unique( array_merge( $ids, array_map( 'absint', $entries_to_exclude ) ) );
	return $ids;
}
add_filter( 'searchwp_exclude', 'searchwp_exclude_noindex', 10, 3 );






add_action( 'wp_dashboard_setup', 'dashboard_setup' );

function dashboard_setup() {
    wp_add_dashboard_widget( 'gf_dashboard', 'Contact goBRANDgo! / Service Ticket Submission', 'gf_dashboard' );
}

function gf_dashboard() {

    gravity_form_enqueue_scripts( 2, true );
    gravity_form( 2, false, true, false, null, false );
}











/**
 * Add custom admin dashboard
 */
function wpdocs_enqueue_custom_admin_style() {
		wp_enqueue_style('boot_css', get_template_directory_uri() . '/stylesheets/bootstrap.min.css');
	    wp_enqueue_script('boot_js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');


        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/stylesheets/css/admin-theme.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );
