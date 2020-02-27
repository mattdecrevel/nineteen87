<?php
/**
 * Plugin Name: gBg! Dashboard
 * Description: Replaces the default WordPress dashboard with a custom one.
 * Author: Matt Decrevel
 */

class Replace_WP_Dashboard {

    protected $capability = 'read';
    protected $title;

    final public function __construct() {
        if( is_admin() ) {
            add_action( 'init', array( $this, 'init' ) );
        }
    }

    final public function init() {
        if( current_user_can( $this->capability ) ) {
            $this->set_title();
            add_filter( 'admin_title', array( $this, 'admin_title' ), 10, 2 );
            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
            add_action( 'current_screen', array( $this, 'current_screen' ) );
        }
    }

    // Sets the page title for your custom dashboard
    function set_title() {
        if( ! isset( $this->title ) ) {
            $this->title = __( 'Dashboard' );
        }
    }

    // Output the content for your custom dashboard
    function page_content() { ?>
        
		<div class="container-fluid">
		<h2>gBg! Dashboard</h2>

		<div class="row">
			<div class="col-2">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
					<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
				</div>
			</div>
			
			<div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<div class="row">
							<div class="col-4">
								strategist<br>
							</div>
							<div class="col-4">
								hours<br>
							</div>
							<div class="col-4">
								maintainence<br>
							</div>
						</div>
					</div>
					
					<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<div class="row">
							<div class="col-4">
								strategist<br>
							</div>
							<div class="col-4">
								hours<br>
							</div>
							<div class="col-4">
								maintainence<br>
							</div>
						</div>						
					</div>
					<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<div class="row">
							<div class="col-4">
								hours<br>
							</div>
							<div class="col-4">
								maintainence<br>
							</div>
							<div class="col-4">
								strategist<br>
								maintainence<br>					
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-8">
				<div class="about-text">
					Google analytic data<br>
					form submits<br>
					simple history <br>
					search statistics <br>
					new posts?
				</div>
				
			</div>
			<div class="col-4">
				<?php gravity_form(2, true, false, false, '', true, 200); ?>
			</div>
		</div>
	</div>

   <?php }

    /**
     * Fixes the page title in the browser.
     *
     * @param string $admin_title
     * @param string $title
     * @return string $admin_title
     */
    final public function admin_title( $admin_title, $title ) {
        global $pagenow;
        if( 'admin.php' == $pagenow && isset( $_GET['page'] ) && 'dashboard' == $_GET['page'] ) {
            $admin_title = $this->title . $admin_title;
        }
        return $admin_title;
    }

    final public function admin_menu() {

        // Adds a custom page to WordPress
        add_menu_page( $this->title, '', 'manage_options', 'dashboard', array( $this, 'page_content' ) );

        // Remove the custom page from the admin menu
        remove_menu_page('dashboard');

        // Make dashboard menu item the active item
        global $parent_file, $submenu_file;
        $parent_file = 'index.php';
        $submenu_file = 'index.php';

        // Rename the dashboard menu item
        global $menu;
        $menu[2][0] = $this->title;

        // Rename the dashboard submenu item
        global $submenu;
        $submenu['index.php'][0][0] = $this->title;
    }

    // Redirect users from the normal dashboard to your custom dashboard
    final public function current_screen( $screen ) {
        if( 'dashboard' == $screen->id ) {
            wp_safe_redirect( admin_url('admin.php?page=dashboard') );
            exit;
        }
    }
}

new Replace_WP_Dashboard();