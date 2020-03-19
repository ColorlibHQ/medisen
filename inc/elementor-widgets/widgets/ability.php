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
class Medisen_Ability extends Widget_Base {

	public function get_name() {
		return 'medisen-ability';
	}

	public function get_title() {
		return __( 'Ability', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_categories() {
		return [ 'medisen-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Ability content ------------------------------
		$this->start_controls_section(
			'abilities_content',
			[
				'label' => __( 'Ability Section', 'medisen' ),
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
            'ability_right_text',
            [
                'label'         => esc_html__( 'Ability Right Text', 'medisen' ),
                'description'   => esc_html__('Use <br> tag for line break', 'medisen'),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( '<h2>Our Patients Are at the Centre of Everything We Do</h2><p>Kind lesser bring said midst they\'re created signs made the beginni years created Beast upon whales herb seas evening she\'d day green dominion evening in moved have fifth in won\'t in darkness fruitful god behold whos without bring created creature.</p>', 'medisen' )
            ]
        );
        
        $this->end_controls_section(); // End content
        

        // ----------------------------------------   Ability ------------------------------
        $this->start_controls_section(
            'abilities_item_block',
            [
                'label' => __( 'Ability Items', 'medisen' ),
            ]
        );
        $this->add_control(
            'all_abilities', [
                'label' => __( 'Create New', 'medisen' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ abl_title }}}',
                'fields' => [
                    [
                        'name'      => 'abl_icon',
                        'label'     => __( 'Select Icon', 'medisen' ),
                        'type'      => Controls_Manager::ICON,
                        'label_block' => true,
                        'default'   => 'fa fa-book'
                    ],
                    [
                        'name'  => 'abl_title',
                        'label' => __( 'Feature Title', 'medisen' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Better Future', 'medisen' )
                    ],
                ],
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


        // Single Item Color Settings ==============================
        $this->start_controls_section(
            'single_abl_color_sett', [
                'label' => __( 'Single Item Color Settings', 'medisen' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'abl_icon_color', [
                'label'     => __( 'Icon Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_ability .our_ability_member_text ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'abl_title_color', [
                'label'     => __( 'Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our_ability .our_ability_member_text ul li' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .our_ability',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {
        $settings               = $this->get_settings();
        $img_left               = !empty( $settings['img_left']['id'] ) ? wp_get_attachment_image( $settings['img_left']['id'], 'medisen_ability_section_591x531', false, array( 'alt' => 'ability image left' ) ) : '';
        $ability_right_text     = !empty( $settings['ability_right_text'] ) ? $settings['ability_right_text'] : '';
        $all_abilities          = !empty( $settings['all_abilities'] ) ? $settings['all_abilities'] : '';
        ?>

    <!-- our_ability part start-->
    <section class="our_ability section_padding">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="our_ability_img">
                        <?php
                            if( $img_left ){
                                echo wp_kses_post( $img_left );
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="our_ability_member_text">
                        <?php
                            //Right Text ==============
                            if( $ability_right_text ){
                                echo wp_kses_post( wpautop( $ability_right_text ) );
                            }
                        ?>
                        <ul>
                            <?php
                            if( is_array( $all_abilities ) && count( $all_abilities ) > 0 ){
                                foreach ( $all_abilities as $item ) {
                                    $icon       = !empty( $item['abl_icon'] ) ? $item['abl_icon'] : '';
                                    $abl_title  = !empty( $item['abl_title'] ) ? $item['abl_title'] : '';
                                    ?>
                                    <li><span class="<?php echo $icon?>"></span><?php echo esc_html( $abl_title );?></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_ability part end-->
    <?php

    }

}
