<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'MEDISEN_DIR_URI' ) )
		define( 'MEDISEN_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'MEDISEN_DIR_ASSETS_URI' ) )
		define( 'MEDISEN_DIR_ASSETS_URI', MEDISEN_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'MEDISEN_DIR_CSS_URI' ) )
		define( 'MEDISEN_DIR_CSS_URI', MEDISEN_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'MEDISEN_DIR_JS_URI' ) )
		define( 'MEDISEN_DIR_JS_URI', MEDISEN_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('MEDISEN_DIR_ICON_IMG_URI') )
		define( 'MEDISEN_DIR_ICON_IMG_URI', MEDISEN_DIR_ASSETS_URI.'img/icon/' );
	
	//DIR inc
	if( !defined( 'MEDISEN_DIR_INC' ) )
		define( 'MEDISEN_DIR_INC', MEDISEN_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'MEDISEN_DIR_ELEMENTOR' ) )
		define( 'MEDISEN_DIR_ELEMENTOR', MEDISEN_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'MEDISEN_DIR_PATH' ) )
		define( 'MEDISEN_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'MEDISEN_DIR_PATH_INC' ) )
		define( 'MEDISEN_DIR_PATH_INC', MEDISEN_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'MEDISEN_DIR_PATH_LIB' ) )
		define( 'MEDISEN_DIR_PATH_LIB', MEDISEN_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'MEDISEN_DIR_PATH_CLASSES' ) )
		define( 'MEDISEN_DIR_PATH_CLASSES', MEDISEN_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'MEDISEN_DIR_PATH_WIDGET' ) )
		define( 'MEDISEN_DIR_PATH_WIDGET', MEDISEN_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'MEDISEN_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'MEDISEN_DIR_PATH_ELEMENTOR_WIDGETS', MEDISEN_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( MEDISEN_DIR_PATH_INC . 'medisen-breadcrumbs.php' );
	// Sidebar register file include
	require_once( MEDISEN_DIR_PATH_INC . 'widgets/medisen-widgets-reg.php' );
	// Post widget file include
	require_once( MEDISEN_DIR_PATH_INC . 'widgets/medisen-recent-post-thumb.php' );
	// News letter widget file include
	require_once( MEDISEN_DIR_PATH_INC . 'widgets/medisen-newsletter-widget.php' );
	//Social Links
	require_once( MEDISEN_DIR_PATH_INC . 'widgets/medisen-social-links.php' );
	// Instagram Widget
	require_once( MEDISEN_DIR_PATH_INC . 'widgets/medisen-instagram.php' );
	// Nav walker file include
	require_once( MEDISEN_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( MEDISEN_DIR_PATH_INC . 'medisen-functions.php' );

	// Theme Demo file include
	require_once( MEDISEN_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( MEDISEN_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( MEDISEN_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( MEDISEN_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( MEDISEN_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( MEDISEN_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( MEDISEN_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( MEDISEN_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( MEDISEN_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( MEDISEN_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class medisen dashboard
	require_once( MEDISEN_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Common css
	require_once( MEDISEN_DIR_PATH_INC . 'medisen-commoncss.php' );
	// SVG Icon File
	require_once( MEDISEN_DIR_PATH_INC . 'load-svg-icons.php' );

	// Admin Enqueue Script
	function medisen_admin_script(){
		wp_enqueue_style( 'medisen-admin', get_template_directory_uri().'/assets/css/medisen_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'medisen_admin', get_template_directory_uri().'/assets/js/medisen_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'medisen_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Medisen object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Medisen Dashboard .
	 *
	 */
	
	$Medisen = new Medisen();
	
