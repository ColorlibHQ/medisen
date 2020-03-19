<?php 
/**
 * @Packge     : Medisen
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

// demo import file
function medisen_import_files() {
	
	$demoImg = '<img src="'. MEDISEN_DIR_INC . 'demo/screen-image.png' .' " alt="'.esc_attr__( 'Demo Preview Imgae', 'medisen' ).'" />';
	
  return array(
    array(
      'import_file_name'             => 'Medisen Demo',
      'local_import_file'            => MEDISEN_DIR_PATH_INC .'demo/medisen-demo.xml',
      'local_import_widget_file'     => MEDISEN_DIR_PATH_INC .'demo/medisen-widgets.wie',
      'import_customizer_file_url'   => MEDISEN_DIR_INC . 'demo/medisen-customizer.dat',
      'import_notice' => $demoImg,
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'medisen_import_files' );
	
// demo import setup
function medisen_after_import_setup() {
	// Assign menus to their locations.
    $main_menu    	  = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$services_link    = get_term_by( 'name', 'Services Link', 'nav_menu' );
	$quick_links      = get_term_by( 'name', 'Quick Links', 'nav_menu' );
	$explore     	  = get_term_by( 'name', 'Explore', 'nav_menu' );
	$resources        = get_term_by( 'name', 'Resources', 'nav_menu' );
	
	set_theme_mod( 'nav_menu_locations', array(
            'primary-menu' => $main_menu->term_id,
            'services-link' => $services_link->term_id,
            'quick-link'  => $quick_links->term_id,
            'explore'  => $explore->term_id,
            'resources'  => $resources->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Homepage' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
	update_option( 'medisen_demodata_import', 'yes' );

}
add_action( 'pt-ocdi/after_import', 'medisen_after_import_setup' );

//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function medisen_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'medisen' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'medisen' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'medisen-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'medisen_import_plugin_page_setup' );

// Enqueue scripts
function medisen_demo_import_custom_scripts(){
	
	
	if( isset( $_GET['page'] ) && $_GET['page'] == 'medisen-demo-import' ){
		// style
		wp_enqueue_style( 'medisen-demo-import', MEDISEN_DIR_INC . 'demo/css/demo-import.css', array(), '1.0', false );
	}
	
	
}
add_action( 'admin_enqueue_scripts', 'medisen_demo_import_custom_scripts' );



?>