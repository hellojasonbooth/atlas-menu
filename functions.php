<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
	 * @package   WordPress
	 * @subpackage  Starkers
	 * @since     Starkers 4.0
	 */

	add_filter('show_admin_bar', '__return_false');

	// Hide Admin Menu Items
	function remove_menus() {
			$admins = array(
					'administrator',
					'fiasco',
					'external_dev'
			);
			$current_user = wp_get_current_user();
			if( !in_array( $current_user->user_login, $admins ) )
			{
				remove_menu_page( '' ); //hide dashboard updates
				remove_menu_page( 'themes.php' ); //hide appearance and themes
				//remove_menu_page( 'users.php' ); //hide users
				remove_menu_page( 'plugins.php' ); //hide plugins section
				remove_menu_page( 'tools.php' ); //hide tools section
				remove_menu_page( 'options-general.php' ); //hide settings
				remove_menu_page( 'edit.php?post_type=acf-field-group' ); //hide acf
				remove_menu_page( 'admin.php?page=cptui_manage_post_types' ); //hide custom post types
				remove_submenu_page( 'index.php', 'update-core.php' ); //remove WP updates
			}
	}
	add_action( 'admin_menu', 'remove_menus', 999 );

	// Remove Post comments and tags
	function remove_admin_menus() {
		remove_menu_page( 'edit-comments.php' ); // hide comments
		remove_menu_page( 'edit.php' ); // hide default posts
	}
	add_action( 'admin_menu', 'remove_admin_menus', 999 );

	// Editor Style
	function fiasco_theme_add_editor_styles() {
		add_editor_style( trailingslashit( get_template_directory_uri() ) . 'editor-style.css' );
		//add_editor_style( 'editor-style.css' );
	}
	add_action( 'admin_init', 'fiasco_theme_add_editor_styles' );

	/* IMAGES */
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'hero', 950, 530 );
		add_image_size( 'slider', 1300, 700 );
		add_image_size( 'team', 300, 300, true );
		add_image_size( 'tiny', 50, 50 );
	}

	// Footer
	add_filter( 'admin_footer_text', 'my_admin_footer_text' );
	function my_admin_footer_text( $default_text ) {
		return '<span id="footer-thankyou">Built with Clay and crafted by <a href="https://fiasco.design">Fiasco Design</a><span>';
	}

	// Excerpt
	function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
	}

	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'...';
		} else {
			$content = implode(" ",$content);
		}
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	/* ========================================================================================================================

	Remove items from thw WYSIWYG editor

	======================================================================================================================== */

	// TinyMCE: First line toolbar customizations
	if( !function_exists('base_extended_editor_mce_buttons') ){
		function base_extended_editor_mce_buttons($buttons) {
			// The settings are returned in this array. Customize to suite your needs.
			return array(
				'formatselect', 'bold', 'underline', 'sub', 'sup', 'link', 'unlink', 'blockquote', 'removeformat'
			);
		}
		add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
	}

	// TinyMCE: Second line toolbar customizations
	if( !function_exists('base_extended_editor_mce_buttons_2') ){
		function base_extended_editor_mce_buttons_2($buttons) {
			// The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
			return array();
		}
		add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
	}

	// Customize the format dropdown items
	function customformatTinyMCE($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;';

	// Add elements not included in standard tinyMCE doropdown p,h1,h2,h3,h4,h5,h6
	//$init['extended_valid_elements'] = 'code[*]';

		return $init;
	}

	// Modify Tiny_MCE init
	add_filter('tiny_mce_before_init', 'customformatTinyMCE' );

	// REMOVE PARA TAGS ON IMAGES
	function filter_ptags_on_images($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'filter_ptags_on_images');


	/* ========================================================================================================================

	Remore Emoji code from Wordpress

	======================================================================================================================== */
	remove_action('wp_head', 'print_emoji_detection_script', 10);
	remove_action('wp_print_styles', 'print_emoji_styles', 10);

	remove_action( 'admin_print_scripts', 'print_emoji_detection_script', 10);
	remove_action( 'admin_print_styles', 'print_emoji_styles', 10);


	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );


	/* ========================================================================================================================

	Import custom fields and post types

	======================================================================================================================== */

	include("parts/custom-fields.php");


	/* ========================================================================================================================

	Theme specific settings

	======================================================================================================================== */

	//Add thumbnail support
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 955, 450, true );

	//Register the navigation
	register_nav_menus(array('main' => 'Main Navigation'));
	register_nav_menus(array('mobile' => 'Mobile Navigation'));


	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

	function body_classes( $classes ) {
		global $post;
		if( is_page_template('templates/page-contact.php') || is_page_template('templates/page-about.php') || is_page_template('templates/page-pricing.php') || is_page_template('templates/page-resources.php') || is_single() || is_archive() || is_category()  ){
			$classes[] = 'dark-nav';
		}
		return $classes;
	}
	add_filter( 'body_class', 'body_classes' );


	/* ========================================================================================================================

	Alter posts per page for different pages

	======================================================================================================================== */

	function my_post_queries( $query ) {
		// do not alter the query on wp-admin pages and only alter it if it's the main query
		if (!is_admin() && $query->is_main_query()){

			// alter the query for the home and category pages

			if(is_post_type_archive()){
				$query->set('posts_per_page', 14);
			}

		}
	}
	add_action( 'pre_get_posts', 'my_post_queries' );


	/* ========================================================================================================================

	ACF Options

	======================================================================================================================== */

	//Add options page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}


	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	// jQuery Scripts
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", false, null);
		wp_enqueue_script('jquery');
	}

	function script_enqueuer() {
		wp_register_script('scripts', get_template_directory_uri().'/js/scripts.js', array( 'jquery' ) );
		wp_enqueue_script('scripts');


		wp_register_style( 'select2_css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), null);
		wp_enqueue_style( 'select2_css' );

		wp_register_script( 'select2_js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true );
		wp_enqueue_script( 'select2_js' );


		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		// added freelancer scripts here
		// added freelancer scripts here
		// added freelancer scripts here
		wp_register_script( 'navigation', get_template_directory_uri().'/js/navigation.js', array( 'jquery' ) );
		wp_enqueue_script( 'navigation' );

		wp_register_style( 'screen', get_template_directory_uri().'/style.css', array(), null);
		wp_enqueue_style( 'screen' );

		wp_register_style( 'nav-css', get_template_directory_uri().'/css/nav.css', '', '', 'screen' );
		wp_enqueue_style( 'nav-css' );

		wp_register_style( 'range-css', get_template_directory_uri().'/css/rangeslider.css', '', '', 'screen' );
		wp_enqueue_style( 'range-css' );

		wp_register_style( 'uicss', get_template_directory_uri().'/css/jquery-ui.min.css', '', '', 'screen' );
		wp_enqueue_style( 'uicss' );
	}


	/**
	 * Enqueue block editor style
	*/
	function fiasco_block_editor_styles() {
		wp_enqueue_style( 'gutenberg-editor-styles', get_theme_file_uri( '/block-editor-style.css' ), false, '1.0', 'all' );
	}
	add_action( 'enqueue_block_editor_assets', 'fiasco_block_editor_styles' );
