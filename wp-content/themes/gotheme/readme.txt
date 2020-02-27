== goBRANDgo! Wordpress Theme ==
Theme Name: gotheme
Author: goBRANDgo
Description: Starter theme for goBRANDgo! Wordpress projects. Made with love by the go!dev-department.
Version: 5.0.0
License: GNU General Public License
License URI: license.txt
Text Domain: gotheme
Domain Path: /languages/
Tags:

== Changelog ==

= 6.0 =
* Bootstrap 4
* Renamed theme(s) from gotheme2015, gotheme2017 to just gotheme
* Standardized preloaded ACF fields for basic site
* Updated custom login page
* Added: privacy policy options for both generic and custom fields
* Added: Search Index Blocking at page level



= 5.0.0 =
* Fix code error in css center-both macro
* Add ScrollPageTo Function to JS
* Add Window scroll and resize functions to application.js
* Add IsElementInViewport function to application.js
* Move Post Types and Taxonomies out of the theme and into a plugin
* Reorder Admin Menu function to functions.php
* Add change_default_queries function to functions.php
* add code to force Yoast to bottom of edit screen to functions.php
* Add display title to thank you page template
* FontAwesome and typekit Asynchronous loading
* Add Asynch loading function to functions.php
* Autoptimize and BJ lazy load plugins added for page speed
* Updated .htaccess file to leverage browser caching
* Enable gzip compression in .htaccess
* Moved most default theme acf fields from theme into install
* Remove Unwanted Dashboard Widgets
* Add Quicklinks Widget to dashboard
* Add Sucuri Plugin for added Security
* Update version of Slick Slider
* Add ACF Archive Options pages to each CPT & posts
* Prepend Site Name to all Gravity Form Email Notifications
* added search wp instead of relevanssi
* remove accordion embed (wasn't being used)
* move youtube embed into a plugin
* install Theme Check & modify our basecode to comply
* remove sidebar registration (not being used)
* make sass errors more visible
* add required default wordpress styles
* Add framework for wys styling
* Add framework for gravity forms styling
* Add auto-expand to default gravity forms textarea fields
* Make some tweaks to better fit wordpress theme requirements

= 4.4 = 
* Converted Basecode from just code to full wordpress install
* 	This includes users and database settings as a part of the basecode.
* Change Brand Asset page to background image contain.
* Add Client Feedback Form to footer by default

= 4.3 = 
* Reorder media queries from smallest to largest
* Fix error in Visual Visitor and Google Analytics Code
* Remove Typo in searchform.php

= 4.2 = 
* Remove Call Tracking Metrics Plugin (conflicted with Gravity forms post updates)
* Ensure Admin Titles change for wp-admin as well.
* Add Optional ACF for 404 page titles
* Updated all Plugins
* Added Simple History Plugin
* Added Simple 301 redirect Plugins
* Update Login Screen to accommodate changes in wordpress core
* Add Sass Code to manage the Wordpress admin bar for our clients so it stops conflicting with our sticky headers

= 4.1 = 
* Added Client Admin Plugin (goBRANDgo-user-role)
* Added Admin Bar Warnings ( telling which version of the site you are on )
* Made Brand Asset Fields linked to page template instead of options panel (allowing for multiple brand asset pages per site)

= 4.0 = 
* Made all php files meet Wordpress php standards
* moved google analytics codes to header

= 3.4 =
* Added Visual Visitor Field to ACF fields & footer

= 3.3 =
* Removed Akismet Plugin (comes default with wordpress now)
* Added Advanced Custom Fields Pro
* Removed the following now outdated plugins:
*	- Advanced Custom Fields
*	- Advanced Custom Fields: Options Page
*	- Advanced Custom Fields: Repeater
* Updated the following Plugins:
*	- Disable Comments
*	- Gravity Forms
*	- Infinite WP
*	- Relevanssi
*	- WP Smush
*	- Yoast SEO
* Added Embed Code WYSIWYG Button and Responsive Styling
* Added Coda Bookmarks to Layout.scss
* Added Thank You Page Template


 = 3.2 = 
* Added Gravity Forms ACF Field Plugin
* Added Stylesheet code to keep bootstrap from overriding our font
* Added Coda-style bookmarks to Functions.php

= 3.1 = 
* Added wp-manage-db-pro to our plugins (for database migrations with git)
* Added meta code and corresponding ACF field for google webmaster tools

= 3.0 =
* Switched from LESS to SASS.
* SASS Compiler used: wp-scss
*    - requires wp-scss to compile & enqueue the files from /stylesheets

= 2.2 = 
* updated gravity forms scroll on submit to auto-adjust for header height.
* added the WP Smush Plugin
* added Google Analytics UA code ACF & relevant Google Analytics code in the footer 
* improved custom login default styles
* Removed unnecessary code from functions.php & archive.php (post format in particular)
* added code in functions.php to use ACF in SEO calculations

= 2.1 = 
* added relevanssi and disablecomments plugins
* started this changelog file
* new CSS commenting/bookmark standards
* added gravity forms scroll on submit code

= 2.0 =
* Complete rebuild from the old gotheme-trabon
* All new and improved gBg starter theme