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
class Medisen_Practice_Areas extends Widget_Base {

	public function get_name() {
		return 'medisen-practice-areas';
	}

	public function get_title() {
		return __( 'Practice Areas', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-sitemap';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {
        
		// ----------------------------------------   Practice Areas content ------------------------------
		$this->start_controls_section(
			'practices_block',
			[
				'label' => __( 'Practice Areas', 'medisen' ),
			]
        );
        
        $this->add_control(
            'sec_heading',
            [
                'label'         => esc_html__( 'Heading Text, only for Inner Service Page.', 'medisen' ),
                'type'          => Controls_Manager::WYSIWYG,
                'description'   => esc_html__('Use <br> tag for line break', 'medisen'),
                'default'       => __( '<h2>Practice Areas</h2><p>Over their the abundantly every midst place thing them them winged you\'rebeginning forth you. Fruit seas very does can after herb moved so was Kind </p>', 'medisen' )
            ]
        );

		$this->add_control(
            'practices_content', [
                'label' => __( 'Create New', 'medisen' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'      => 'icon',
                        'label'     => __( 'Select Icon', 'medisen' ),
                        'type'      => Controls_Manager::ICON,
                        'default'   => 'fa fa-book'
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
                        'label'     => __( 'Descriptions', 'medisen' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'After creeping two life sea green which face yielding gat ered was after also upon blessed under whose abdantly one very to let his', 'medisen' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Practice Areas content

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
                'label'     => __( 'Section Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#161d22',
                'selectors' => [
                    '{{WRAPPER}} .single_service .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->add_control(
            'color_sect_txt', [
                'label'     => __( 'Section Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#666',
                'selectors' => [
                    '{{WRAPPER}} .single_service .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );    
        
        $this->end_controls_section();

        // Single Service Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Service Color Settings', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color', [
                'label'     => __( 'Icon Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ab7636',
                'selectors' => [
                    '{{WRAPPER}} .single_single_service span.fa' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#161d22',
                'selectors' => [
                    '{{WRAPPER}} .single_service .single_single_service h4' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'text_color', [
                'label'     => __( 'Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single_service .single_single_service p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .single_service',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings     = $this->get_settings();
    $sec_heading  = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $practices    = !empty( $settings['practices_content'] ) ? $settings['practices_content'] : '';
    ?>

    <!-- Inner servicing start-->
    <section class="single_service section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <?php
                            if( $sec_heading ){
                                echo wp_kses_post( wpautop( $sec_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <?php
                if( is_array( $practices ) && count( $practices ) > 0 ){
                    foreach ( $practices as $practice ) {
                        $fontIcon       = !empty( $practice['icon'] ) ? $practice['icon'] : '';
                        $practice_title = !empty( $practice['label'] ) ? $practice['label'] : '';
                        $practice_desc  = !empty( $practice['desc'] ) ? $practice['desc'] : '';
                ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_single_service">
                        <?php
                            if( $fontIcon ){
                                echo '<span class="'. esc_attr( $fontIcon ) .'"></span>';
                            }
                        ?>
                        <h4><?php echo esc_html( $practice_title );?></h4>
                        <p><?php echo esc_html( $practice_desc );?></p>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Inner servicing end-->
    <?php
    }
}
