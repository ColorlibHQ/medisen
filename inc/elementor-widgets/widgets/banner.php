<?php
namespace Medisenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Medisen elementor about us section widget.
 *
 * @since 1.0
 */
class Medisen_Banner extends Widget_Base {

	public function get_name() {
		return 'medisen-banner';
	}

	public function get_title() {
		return __( 'Banner', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'medisen' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'medisen' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h1>Bringing the future of healthcare</h1><p>Deep created replenish herb without night fruit day earth evening Called his green were they\'re fruitful to over Sea bearing sixth Earth face. Them lesser great you\'ll second </p>', 'medisen' )
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'medisen' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Make an appointment', 'medisen' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'medisen' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content


        // ----------------------------------------   Icon section content ------------------------------
		$this->start_controls_section(
			'icon_section_block',
			[
				'label' => __( 'Icon Section', 'medisen' ),
			]
		);
		$this->add_control(
            'icon_section_content', [
                'label' => __( 'Create New', 'medisen' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ icon_label }}}',
                'fields' => [
                    [
                        'name'  => 'icon',
                        'label' => __( 'Select Icon', 'medisen' ),
                        'type'  => Controls_Manager::ICON,
                        'label_block' => true,
                        'options' => medisen_themify_icon()
                    ],
                    [
                        'name'  => 'icon_label',
                        'label' => __( 'Icon Label', 'medisen' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Emergency Cases', 'medisen' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // Icon section content


        /**
         * Style Tab
         * ------------------------------ Banner Style ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Banner Text Style', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'sub_title_color', [
                'label'     => __( 'Banner Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner_part .banner_item .single_item h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icons_color_separator',
            [
                'label'     => __( 'Icons Color Styles', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 

        $this->add_control(
            'icons_color', [
                'label'     => __( 'Icon Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_item .single_item .eci' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

        // Button Style ==============================
        $this->start_controls_section(
            'btn_styles', [
                'label' => __( 'Button Styles', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'btnn_bg', [
                'label'     => __( 'Button Background', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btnn_txt_color', [
                'label' => __( 'Button Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'btn_hvr_separator',
            [
                'label'     => __( 'Hover Styles', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 

        $this->add_control(
            'btnn_hover_bg', [
                'label'     => __( 'Button Hover Background', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btnn_hover_txt_color', [
                'label' => __( 'Button Hover Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner_part .banner_text .btn_2:hover' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->end_controls_section();

        // Background Style ==============================
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background Shade', 'medisen' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part',
            ]
        );
        $this->end_controls_section();

        // Right Image ==============================
        $this->start_controls_section(
            'section_bg_after', [
                'label' => __( 'Banner Right Image', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg_after',
                'label' => __( 'Banner Right Image', 'medisen' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part:after',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings             = $this->get_settings();
        $ban_content          = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $button_label         = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $button_url           = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $icon_section_content = !empty( $settings['icon_section_content'] ) ? $settings['icon_section_content'] : '';
    ?>

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <?php
                                //Content ==============
                                if( $ban_content ){
                                    echo wp_kses_post( wpautop( $ban_content ) );
                                }

                                // Button =============
                                if( $button_label ){
                                    echo '<a class="btn_2" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                                }
                            ?>

                            <div class="banner_item">
                                <?php
                                    if( is_array( $icon_section_content ) && count( $icon_section_content ) > 0 ){
                                        foreach ( $icon_section_content as $item ) {
                                            $icon       = !empty( $item['icon'] ) ? $item['icon'] : '';
                                            $icon_label = !empty( $item['icon_label'] ) ? $item['icon_label'] : '';
                                        ?>
                                        <div class="single_item">
                                            <?php echo '<i class="'. $icon .'"></i>'; ?>
                                            <h5><?php echo esc_html( $icon_label );?></h5>
                                        </div>
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part end-->  
    <?php

    }
	
}
