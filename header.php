<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php 
            echo medisen_site_icon();
            wp_head(); 
            if ( is_front_page() ) {
                $dynamic_class = 'main_menu home_menu';
            } else {
                $dynamic_class = 'main_menu';
            }
        ?>
    </head>
    <body <?php body_class(); ?>>

    <!--::header part start::-->
    <header class="<?php echo $dynamic_class?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <?php
                            echo medisen_theme_logo( 'navbar-brand' );
                        ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            if(has_nav_menu('primary-menu')) {
                                wp_nav_menu(array(
                                    'menu'           => 'primary-menu',
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'menu-main-menu',
                                    'container_class'=> 'collapse navbar-collapse main-menu-item justify-content-end',
                                    'container_id'   => 'navbarSupportedContent',
                                    'menu_class'     => 'navbar-nav align-items-center',
                                    'walker'         => new medisen_bootstrap_navwalker,
                                    'depth'          => 3
                                ));
                            }
                        
                            if( medisen_opt( 'medisen_header_right_button' ) == 1 ){
                                $btn_lbl = !empty( medisen_opt( 'medisen_header_right_button_lbl' ) ) ? medisen_opt( 'medisen_header_right_button_lbl' ) : '';
                                $btn_url = !empty( medisen_opt( 'medisen_header_right_button_url' ) ) ? medisen_opt( 'medisen_header_right_button_url' ) : '';
                            ?>
                                <div class="cta-btn-head">
                                    <a class="d-none d-lg-block btn_1" href="<?php echo esc_url( $btn_url )?>"><?php echo esc_html( $btn_lbl )?></a>
                                </div>
                            <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <?php
    //Page Title Bar
    if( function_exists( 'medisen_page_titlebar' ) ){
	    medisen_page_titlebar();
    }

