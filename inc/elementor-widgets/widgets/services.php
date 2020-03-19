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
class Medisen_Services extends Widget_Base {

	public function get_name() {
		return 'medisen-services';
	}

	public function get_title() {
		return __( 'Services', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'medisen' ),
			]
        );
        
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Service', 'medisen' ),
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
                        'default' => __( 'Get Law Advice', 'medisen' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'medisen' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Over their the abund every placed thing them them winged you beginning forth', 'medisen' )
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End Services content

        /**
         * Style Tab
         * ------------------------------ Style Tab Content ------------------------------
         *
         */

        // Single Service Color Settings ==============================
        $this->start_controls_section(
            'single_serv_color_sett', [
                'label' => __( 'Single Service Color Settings', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'item_bg_color', [
                'label'     => __( 'Item BG Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 
 
        $this->add_control(
            'icon_color', [
                'label'     => __( 'Icon Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part .single_service_text span' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'icon_bg_color_style_separator',
            [
                'label'     => __( 'Icon BG Color', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_color',
                'label' => __( 'Icon BG Color', 'medisen' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .service_part .single_service_part .single_service_text span',
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Item Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#161d22',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part .single_service_text h2' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'item_bg_color_hover_separator',
            [
                'label'     => __( 'Item BG Color On Hover', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'item_bg_color_hover',
                'label' => __( 'Item BG Color On Hover', 'medisen' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .service_part .single_service_part:hover',
            ]
        );

        $this->add_control(
            'icon_bg_color_hover_separator',
            [
                'label'     => __( 'Icon BG Color On Hover', 'medisen' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_color_hover',
                'label' => __( 'Icon BG Color On Hover', 'medisen' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .service_part .single_service_part:hover span',
            ]
        );

        $this->add_control(
            'icon_color_hover', [
                'label'     => __( 'Icon Color On Hover', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ab7636',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part:hover span' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'title_color_hover', [
                'label'     => __( 'Title Color On Hover', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part:hover h2' => 'color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'text_color_hover', [
                'label'     => __( 'Text Color On Hover', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .service_part .single_service_part:hover p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .service_part:after, .single_service',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings    = $this->get_settings();
    $services    = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';
    ?>

    <!-- Home Service part start-->
    <section class="service_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <?php
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach ( $services as $service ) {
                        $fontIcon      = !empty( $service['icon'] ) ? $service['icon'] : '';
                        $service_title = !empty( $service['label'] ) ? $service['label'] : '';
                        $service_desc  = !empty( $service['desc'] ) ? $service['desc'] : '';
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_text">
                            <?php
                                if( $fontIcon ){
                                    echo '<span class="'. esc_attr( $fontIcon ) .'"></span>';
                                }
                            ?>
                            <h2><?php echo esc_html( $service_title );?></h2>
                            <p><?php echo esc_html( $service_desc );?></p>
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
    <!-- Home Service part end-->
    <?php
    }
}
