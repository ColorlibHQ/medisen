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
 * Medisen elementor Team Member section widget.
 *
 * @since 1.0
 */
class Medisen_Case_Study extends Widget_Base {

	public function get_name() {
		return 'medisen-case-studys';
	}

	public function get_title() {
		return __( 'Case Study', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-navigator';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {
        
        // Section Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'medisen' ),
			]
        );
        
        $this->add_control(
            'sec_heading',
            [
                'label'         => esc_html__( 'Heading Text', 'medisen' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Recent Case Study</h2><p>Over their the abundantly every midst place thing them them winged you\'re beginning forth you. Fruit seas very does can after herb moved so was Kind </p>', 'medisen' )
            ]
        );
		$this->end_controls_section(); 


		// ----------------------------------------   Case Study content ------------------------------
		$this->start_controls_section(
			'case_studies_block',
			[
				'label' => __( 'Case Studies', 'medisen' ),
			]
		);
		$this->add_control(
            'case_studies_content', [
                'label' => __( 'Create Case Study', 'medisen' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'case_img',
                        'label' => __( 'Select Image', 'medisen' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'medisen' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Banking & Finance', 'medisen' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Short Brief', 'medisen' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Bank Protected', 'medisen' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Case Study content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Heading Style ==============================
        $this->start_controls_section(
            'color_sect', [
                'label' => __( 'Style Heading', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Big Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#161d22',
                'selectors' => [
                    '{{WRAPPER}} .our_offer .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        $this->add_control(
            'color_sect_txt_color', [
                'label'     => __( 'Section Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#666',
                'selectors' => [
                    '{{WRAPPER}} .our_offer .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();


        // Single Item Style ==============================
        $this->start_controls_section(
            'single_item_style', [
                'label' => __( 'Single Item Style', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'single_item_bg',
                'label' => __( 'Single Item Hover BG', 'medisen' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .our_offer .single_offer_part:hover .single_offer:after',
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
                'selector' => '{{WRAPPER}} .case_study',
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $sec_heading  = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $case_studies = !empty( $settings['case_studies_content'] ) ? $settings['case_studies_content'] : '';
    ?>

    <!-- our_offer part start-->
    <section class="our_offer case_study section_padding">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-sm-10">
                    <div class="section_tittle">
                        <?php
                            //Section heading ==============
                            if( $sec_heading ){
                                echo wp_kses_post( wpautop( $sec_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if( is_array( $case_studies ) && count( $case_studies ) > 0 ){
                    foreach ( $case_studies as $case_study ) {
                        $case_img = !empty( $case_study['case_img']['id'] ) ? wp_get_attachment_image( $case_study['case_img']['id'], 'medisen_case_study_section_626x678', '', array('alt' => $case_study['label'] ) ) : '';
                        $title    = !empty( $case_study['label'] ) ? $case_study['label'] : '';
                        $desc     = !empty( $case_study['desc'] ) ? $case_study['desc'] : '';
                ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <?php
                                if( $case_img ){
                                    echo wp_kses_post( $case_img );
                                }
                            ?>
                            <div class="hover_text">
                                <h2><?php echo esc_html( $title );?></h2>
                                <p><?php echo esc_html( $desc );?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- our_offer part end-->
    <?php
    }
}
