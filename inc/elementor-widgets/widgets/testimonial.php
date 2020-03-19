<?php
namespace Medisenelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
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
class Medisen_Testimonial extends Widget_Base {

	public function get_name() {
		return 'medisen-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

		// -----------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'medisen' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'medisen' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'  => 'desc',
                        'label' => __( 'Review Text', 'medisen' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Also made from. Give may saying meat there from heaven it lights face had is gathered god dea earth light for life may itself shall whales made they\'re blessed whales also made from give may saying meat. There from heaven it lights face had amazing place', 'medisen')
                    ],
                    [
                        'name'  => 'client_name',
                        'label' => __( 'Client Name', 'medisen' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Mosan Cameron', 'medisen' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'medisen' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Executive of fedex', 'medisen' )
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'medisen' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'review_txt_color', [
                'label'     => __( 'Review Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part .client_review_single .client_review_text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Client Name Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Client Designation Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part h4 span' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bg_overlay_sep',
            [
                'label'     => __( 'Background Overlay Color Separator', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'section_bg_overlay', [
                'label'     => __( 'Background Overlay Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .review_part:after' => 'background-color: {{VALUE}};',
                ],
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
                'name' => 'section-bg',
                'label' => __( 'Section Background', 'medisen' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .review_part',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
    $reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';
    $quoteImg = MEDISEN_DIR_ASSETS_URI . 'img/quote.png';
    ?>

    <!--::review_part start::-->
    <section class="review_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="client_review_part owl-carousel">
                        <?php
                        if( is_array( $reviews ) && count( $reviews ) > 0 ){
                            foreach ($reviews as $review ) {
                                $desc  = !empty( $review['desc'] ) ? $review['desc'] : '';
                                $cName  = !empty( $review['client_name'] ) ? $review['client_name'] : '';
                                $desig  = !empty( $review['designation'] ) ? $review['designation'] : '';
                        ?>
                        <div class="client_review_single">
                            <img src="<?php echo esc_url( $quoteImg )?>" class="Quote" alt="quote">
                            <div class="client_review_text">
                                <?php
                                    // Review text ---------------
                                    if( $desc ){
                                        echo '<p>'. wp_kses_post( $desc ) . '</p>';
                                    }
                                ?>
                            </div>
                            <?php
                                // Client Name & Designation ----------------------
                                if( $cName ){
                                    echo '<h4>'. esc_html( $cName ) . ', <span>'. esc_html( $desig ) .'</span></h4>';
                                }
                            ?> 
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::review_part end::-->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var review = $('.client_review_part');
            if (review.length) {
            review.owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                nav: false,
                smartSpeed: 2000,
            });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
