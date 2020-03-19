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
 * elementor reservation section widget.
 *
 * @since 1.0
 */
class Medisen_Reservation extends Widget_Base {

	public function get_name() {
		return 'medisen-reservation';
	}

	public function get_title() {
		return __( 'Reservation', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-calendar';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Reservation Content ------------------------------
        $this->start_controls_section(
            'reserv_sec',
            [
                'label' => __( 'Reservation', 'medisen' ),
            ]
        );
        $this->add_control(
			'resrv_title_txt',
			[
				'label'         => __( 'Reservation Title Text', 'medisen' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
				'default'       => __( 'Make an Appointment', 'medisen' ),
			]
		);
        $this->add_control(
			'resrv_shortcode',
			[
				'label'         => __( 'Reservation Shortcode', 'medisen' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'       => __( '[contact-form-7 id="365" title="Make an Appointment"]', 'medisen' ),
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

        $this->end_controls_section(); // End reservation content

        //------------------------------ Color Settings ------------------------------
        $this->start_controls_section(
            'color_settings', [
                'label' => __( 'Color Settings', 'medisen' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Section Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .regervation_part .regervation_content h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'form_fields_color', [
                'label'     => __( 'Form Fields Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .regervation_part .regervation_part_iner .form-control' => 'color: {{VALUE}}!important;',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button BG Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .regervation_part .regerv_btn .regerv_btn_iner' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_txt_color', [
                'label'     => __( 'Button Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .regervation_part .regerv_btn .regerv_btn_iner' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_color', [
                'label'     => __( 'Button Hover BG Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .regervation_part .regerv_btn .regerv_btn_iner:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_color', [
                'label'     => __( 'Button Hover Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .regervation_part .regerv_btn .regerv_btn_iner:hover' => 'color: {{VALUE}};',
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
                'label' => __( 'Background', 'medisen' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .regervation_part .regervation_content',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings        = $this->get_settings();
    $resrv_title     = !empty( $settings['resrv_title_txt'] ) ? $settings['resrv_title_txt'] : '';
    $resrv_shortcode = !empty( $settings['resrv_shortcode'] ) ? $settings['resrv_shortcode'] : '';
    $img_right       = !empty( $settings['img_right']['id'] ) ? wp_get_attachment_image( $settings['img_right']['id'], 'medisen_reservation_img_457x615', false, array( 'alt' => 'reservation image right' ) ) : '';
    $dynamic_class     = is_front_page() ? 'regervation_part' : 'regervation_part padding_bottom';
    ?>

    <!--::regervation_part start::-->
    <section class="<?php echo $dynamic_class?>">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7 col-md-6">
                    <div class="regervation_part_iner">
                        <h2><?php echo esc_html($resrv_title)?></h2>
                        <?php echo do_shortcode( $resrv_shortcode )?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="reservation_img">
                        <?php
                            if( $img_right ){
                                echo wp_kses_post( $img_right );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->
    <?php

    }
}
