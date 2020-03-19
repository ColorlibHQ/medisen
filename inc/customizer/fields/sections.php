<?php 
/**
 * @Packge     : Medisen
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'medisen_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'medisen' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(

    /**
     * General Section
     */
    array(
        'id'   => 'medisen_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'medisen' ),
            'panel'    => 'medisen_theme_options_panel',
            'priority' => 1,
        ),
    ),
    
    /**
     * Header Section
     */
    array(
        'id'   => 'medisen_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'medisen' ),
            'panel'    => 'medisen_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'medisen_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'medisen' ),
            'panel'    => 'medisen_theme_options_panel',
            'priority' => 3,
        ),
    ),


    /**
     * 404 Page Section
     */
    array(
        'id'   => 'medisen_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'medisen' ),
            'panel'    => 'medisen_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'medisen_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'medisen' ),
            'panel'    => 'medisen_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>