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
class Medisen_Top_Services extends Widget_Base {

	public function get_name() {
		return 'medisen-top-services';
	}

	public function get_title() {
		return __( 'Top Services', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Top Services content ------------------------------
		$this->start_controls_section(
			'top_ser_content',
			[
				'label' => __( 'Top Services Section', 'medisen' ),
			]
		);
        $this->add_control(
            'top_ser_left_text',
            [
                'label'         => esc_html__( 'Feature Left Text', 'medisen' ),
                'description'   => esc_html__('Use <br> tag for line break', 'medisen'),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>We Analyse Your Health States In Order To Top Service</h2><p>Kind lesser bring said midst they\'re created signs made the beginni years created Beast upon whales herb seas evening she\'d day green dominion evening in moved have fifth in won\'t in darkness fruitful god behold whos without bring created creature.</p>', 'medisen' )
            ]
        );

        $this->add_control(
            'top_ser_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'medisen' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'More service', 'medisen' )
            ]
        );
        $this->add_control(
            'top_ser_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'medisen' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        
        $this->end_controls_section(); // End section content
        

        // Image section
        $this->start_controls_section(
			'img_content',
			[
				'label' => __( 'Image Section', 'medisen' ),
			]
		);

        $this->add_control(
			'img_right',
			[
				'label'         => esc_html__( 'Image Right', 'medisen' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
			]
		);
        
		$this->end_controls_section(); // End about content




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
					'{{WRAPPER}} .our_ability .our_ability_member_text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_txt_color', [
				'label'     => __( 'Text Color', 'medisen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .our_ability .our_ability_member_text p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .our_ability .our_ability_member_text .btn_2' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btnn_txt_color', [
                'label' => __( 'Button Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_ability .our_ability_member_text .btn_2' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .our_ability .our_ability_member_text .btn_2:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );  
        $this->add_control(
            'btnn_hover_txt_color', [
                'label' => __( 'Button Hover Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_ability .our_ability_member_text .btn_2:hover' => 'color: {{VALUE}};',
                ],
            ]
        ); 
        $this->end_controls_section();


        // Background Styles
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
                'selector' => '{{WRAPPER}} .top_service',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings            = $this->get_settings();
        $top_ser_left_text   = !empty( $settings['top_ser_left_text'] ) ? $settings['top_ser_left_text'] : '';
        $top_ser_btnlabel    = !empty( $settings['top_ser_btnlabel'] ) ? $settings['top_ser_btnlabel'] : '';
        $top_ser_btnurl      = !empty( $settings['top_ser_btnurl']['url'] ) ? $settings['top_ser_btnurl']['url'] : '';
        $right_img           = !empty( $settings['img_right']['id'] ) ? wp_get_attachment_image( $settings['img_right']['id'], 'medisen_top_services_section_533x531', false, array( 'alt' => 'top services image right' ) ) : '';
        $dynamic_class     = is_front_page() ? 'top_service our_ability padding_bottom' : 'top_service our_ability padding_top';
        ?>

    <!-- top_service part start-->
    <section class="<?php echo $dynamic_class?>">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-5 col-lg-5">
                    <div class="our_ability_member_text">
                        <?php
                            //Content ==============
                            if( $top_ser_left_text ){
                                echo wp_kses_post( wpautop( $top_ser_left_text ) );
                            }

                            // Button =============
                            if( $top_ser_btnlabel ){
                                echo '<a class="btn_2" href="'. esc_url( $top_ser_btnurl ) .'">'. esc_html( $top_ser_btnlabel ) .'</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="our_ability_img">
                        <?php
                            if( $right_img ){
                                echo wp_kses_post( $right_img );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- top_service part end-->
    <?php

    }

}
