<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Medisen
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
function medisen_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'medisen'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'medisen'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
    ));

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'medisen' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget footer_1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'medisen' ),
			'id'            => 'footer-2',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget footer_2 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'medisen' ),
			'id'            => 'footer-3',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget footer_3 footer_icon %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'medisen' ),
			'id'            => 'footer-4',
			'before_widget' => '<div id="%1$s" class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget footer_4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Five', 'medisen' ),
			'id'            => 'footer-5',
			'before_widget' => '<div id="%1$s" class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget footer_5 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	

}
add_action( 'widgets_init', 'medisen_widgets_init' );
