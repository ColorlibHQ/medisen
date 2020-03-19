<?php
namespace Medisenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Medisen elementor section widget.
 *
 * @since 1.0
 */
class Medisen_Features extends Widget_Base {

	public function get_name() {
		return 'medisen-features';
	}

	public function get_title() {
		return __( 'Features', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-posts-group';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Features content ------------------------------
		$this->start_controls_section(
			'features_content',
			[
				'label' => __( 'Features Section', 'medisen' ),
			]
		);
        $this->add_control(
            'fet_left_text',
            [
                'label'         => esc_html__( 'Feature Left Text', 'medisen' ),
                'description'   => esc_html__('Use <br> tag for line break', 'medisen'),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Provide Special Services</h2><p>Third beast two she\'d multiply they\'re form he above do Replenish days said set doesn\'t can\'t subdue air herb lesser dominion saying fruitful given fifth winged Third beast two she\'d multiply they\'re form he above their Replenish days said set doesn can\'which.</p>', 'medisen' )
            ]
        );

        $this->add_control(
            'fet_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'medisen' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'More service', 'medisen' )
            ]
        );
        $this->add_control(
            'fet_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'medisen' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        
        $this->end_controls_section(); // End about content
        

        // ----------------------------------------   Features ------------------------------
        $this->start_controls_section(
            'rep_fet_block',
            [
                'label' => __( 'Features', 'medisen' ),
            ]
        );
        $this->add_control(
            'all_features', [
                'label' => __( 'Create New', 'medisen' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ fet_title }}}',
                'fields' => [
                    [
                        'name'  => 'fet_icon',
                        'label' => __( 'Select Icon', 'medisen' ),
                        'type'  => Controls_Manager::ICON,
                        'label_block' => true,
                        'options' => medisen_themify_icon()
                    ],
                    [
                        'name'  => 'fet_title',
                        'label' => __( 'Feature Title', 'medisen' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Better Future', 'medisen' )
                    ],
                    [
                        'name'  => 'fet_txt',
                        'label' => __( 'Feature Text', 'medisen' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'Darkness multiply rule Which from without life creature blessed give moveth moveth seas make day which divided our have.', 'medisen' )
                    ],
                ],
            ]
        );

        $this->end_controls_section(); // Icon section content




        // Color Settings ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Color Settings', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'sec_title_color', [
				'label'     => __( 'Section Title Color', 'medisen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature_part .single_feature_text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_txt_color', [
				'label'     => __( 'Text Color', 'medisen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature_part .single_feature_text p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .feature_part .single_feature_text .btn_2' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btnn_txt_color', [
                'label' => __( 'Button Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_text .btn_2' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .feature_part .single_feature_text .btn_2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btnn_hover_txt_color', [
                'label' => __( 'Button Hover Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_text .btn_2:hover' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->end_controls_section();


        // Single Feature Color Settings ==============================
        $this->start_controls_section(
            'single_fet_color_sett', [
                'label' => __( 'Single Feature Color Settings', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'fet_title_color', [
                'label'     => __( 'Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'fet_text_color', [
                'label'     => __( 'Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part p' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'fet_icon_color', [
                'label'     => __( 'Icon Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature_part span .eci' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'fet_hover_style_sep',
            [
                'label'     => __( 'Feature Item Hover Styles', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'item_hov_bg_color', [
                'label'     => __( 'Item Hover BG Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature:hover .single_feature_part, .feature_part .single_feature:hover .single_feature_part' => 'border-color: {{VALUE}}; background-color: {{VALUE}};',
                ],
            ]
        );  

        $this->add_control(
            'item_hov_title_color', [
                'label'     => __( 'Item Hover Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'item_hov_txt_color', [
                'label'     => __( 'Item Hover Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature_part .single_feature:hover p' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'medisen' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .feature_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings        = $this->get_settings();
        $fet_left_text   = !empty( $settings['fet_left_text'] ) ? $settings['fet_left_text'] : '';
        $fet_btnlabel    = !empty( $settings['fet_btnlabel'] ) ? $settings['fet_btnlabel'] : '';
        $fet_btnurl      = !empty( $settings['fet_btnurl']['url'] ) ? $settings['fet_btnurl']['url'] : '';
        $all_features    = !empty( $settings['all_features'] ) ? $settings['all_features'] : '';
        ?>

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4 align-self-center">
                    <div class="single_feature_text ">
                        <?php
                            //Content ==============
                            if( $fet_left_text ){
                                echo wp_kses_post( wpautop( $fet_left_text ) );
                            }

                            // Button =============
                            if( $fet_btnlabel ){
                                echo '<a class="btn_2" href="'. esc_url( $fet_btnurl ) .'">'. esc_html( $fet_btnlabel ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="feature_item">
                        <div class="row">
                            <?php
                                if( is_array( $all_features ) && count( $all_features ) > 0 ){
                                    foreach ( $all_features as $item ) {
                                        $icon       = !empty( $item['fet_icon'] ) ? $item['fet_icon'] : '';
                                        $fet_title  = !empty( $item['fet_title'] ) ? $item['fet_title'] : '';
                                        $fet_txt    = !empty( $item['fet_txt'] ) ? $item['fet_txt'] : '';
                                    ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_feature">
                                            <div class="single_feature_part">
                                                <span class="single_feature_icon"><?php echo '<i class="'. $icon .'"></i>'; ?></span>
                                                <h4><?php echo esc_html( $fet_title );?></h4>
                                                <p><?php echo esc_html( $fet_txt );?></p>
                                            </div>
                                        </div>
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
    </section>
    <!-- feature_part start-->
    <?php

    }

}
