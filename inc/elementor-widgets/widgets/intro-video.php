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
class Medisen_Intro_Video extends Widget_Base {

	public function get_name() {
		return 'medisen-intro-video';
	}

	public function get_title() {
		return __( 'Intro Video', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-video-camera';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Intro Video content ------------------------------
		$this->start_controls_section(
			'int_vid_content',
			[
				'label' => __( 'Intro Video Section', 'medisen' ),
			]
		);

        $this->add_control(
            'int_vid_title',
            [
                'label'         => esc_html__( 'Intro Video Title', 'medisen' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'View Our History', 'medisen' )
            ]
        );

        $this->add_control(
            'int_vid_url',
            [
                'label'         => esc_html__( 'Intro Video Url', 'medisen' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false,
                'default'   => [
                    'url'   => 'https://www.youtube.com/watch?v=DhZ6p_tYnpk',
                ]
            ]
        );
        
        $this->end_controls_section(); // End section content


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
					'{{WRAPPER}} .intro_video_bg h2' => 'color: {{VALUE}};',
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
            'section_bg_overlay_sep',
            [
                'label'     => __( 'Background Color Overlay Section', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
			'section_bg_overlay', [
				'label'     => __( 'Background Color Overlay', 'medisen' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .intro_video_bg:after' => 'background-color: {{VALUE}};',
				],
			]
        );
        
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Image', 'medisen' ),
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
                'selector' => '{{WRAPPER}} .intro_video_bg',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings            = $this->get_settings();
        $int_vid_title   = !empty( $settings['int_vid_title'] ) ? $settings['int_vid_title'] : '';
        $int_vid_url   = !empty( $settings['int_vid_url']['url'] ) ? $settings['int_vid_url']['url'] : '';
        ?>

    <!-- intro_video_bg start-->
    <section class="intro_video_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro_video_iner text-center">
                        <h2><?php echo esc_html( $int_vid_title )?></h2>
                        <div class="intro_video_icon">
                            <a id="play-video_1" class="video-play-button popup-youtube"
                                href="<?php echo esc_url( $int_vid_url )?>">
                                <span class="ti-control-play"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro_video_bg part start-->
    <?php

    }

}
