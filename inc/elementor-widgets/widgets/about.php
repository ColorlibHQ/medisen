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
class Medisen_About extends Widget_Base {

	public function get_name() {
		return 'medisen-about';
	}

	public function get_title() {
		return __( 'About', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Section', 'medisen' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Section Title', 'medisen' ),
                'description'   => esc_html__('Use <br> tag for line break', 'medisen'),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'The lawyers truth is not truth but consistency or a consistent expediency', 'medisen' )
            ]
        );

        $this->add_control(
			'img_left',
			[
				'label'         => esc_html__( 'Image Left', 'medisen' ),
                'type'          => Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
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

        $this->add_control(
            'section_separator',
            [
                'label'     => __( 'About Texts', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'About Text', 'medisen' ),
                'description'   => esc_html__('Use <br> tag for line break', 'medisen'),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Fly seed a it hath own light deep our meat land bearing won bring you two were together divide set kind stars firmament evning from forth seas let air whales which of gathering be sixth. Seed won\'t. Creature she\'d living said blessed. Rule plac also seasons was itself of for days subdue great own male itsel', 'medisen' )
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
				'default'   => '#161d22',
				'selectors' => [
					'{{WRAPPER}} .about_part .section_tittle h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_txt_color', [
				'label'     => __( 'Text Color', 'medisen' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#646464',
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .about_part',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings     = $this->get_settings();
        $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $left_img  = !empty( $settings['img_left']['id'] ) ? wp_get_attachment_image( $settings['img_left']['id'], 'medisen_about1_section_653x422', false, array( 'alt' => 'about image left' ) ) : '';
        $right_img  = !empty( $settings['img_right']['id'] ) ? wp_get_attachment_image( $settings['img_right']['id'], 'medisen_about2_section_458x422', false, array( 'alt' => 'about image right' ) ) : '';
        $content    = !empty( $settings['content'] ) ? $settings['content'] : '';		
        ?>

    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2><?php echo esc_html( $sec_title );?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-sm-7">
                    <div class="about_part_img">
                        <?php
                            if( $left_img ){
                                echo wp_kses_post( $left_img );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-5 d-none d-sm-block">
                    <div class="about_part_img">
                        <?php
                            if( $right_img ){
                                echo wp_kses_post( $right_img );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_text text-center">
                        <p><?php echo esc_html( $content );?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->
    <?php

    }

}
