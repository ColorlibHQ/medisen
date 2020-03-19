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
 * Medisen elementor few words section widget.
 *
 * @since 1.0
 */

class Medisen_Blog extends Widget_Base {

	public function get_name() {
		return 'medisen-blog';
	}

	public function get_title() {
		return __( 'Blog', 'medisen' );
	}

	public function get_icon() {
		return 'eicon-post-list';
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
                'default'       => __( '<h2>Update From Blog</h2><p>Face replenish sea good winged bearing years air divide wasHave night male also</p>', 'medisen' )
            ]
        );
        $this->end_controls_section(); 


        // Blog post settings
        $this->start_controls_section(
            'blog_post_sec',
            [
                'label' => __( 'Blog Post Settings', 'medisen' ),
            ]
        );
		$this->add_control(
			'post_num',
			[
				'label'         => esc_html__( 'Post Item', 'medisen' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => false,
                'default'       => absint(3),
                'min'           => 1,
                'max'           => 6,
			]
		);
		$this->add_control(
			'post_order',
			[
				'label'         => esc_html__( 'Post Order', 'medisen' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_block'   => false,
				'label_on'      => 'ASC',
				'label_off'     => 'DESC',
                'default'       => 'yes',
                'options'       => [
                    'no'        => 'ASC',
                    'yes'       => 'DESC'
                ]
			]
		);

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'medisen' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#161d22',
                'selectors' => [
                    '{{WRAPPER}} .blog_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_sec_txt', [
                'label'     => __( 'Section Text Color', 'medisen' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#666',
                'selectors' => [
                    '{{WRAPPER}} .blog_part .section_tittle p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .blog_part',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings  = $this->get_settings();
    $sec_heading = !empty( $settings['sec_heading'] ) ? $settings['sec_heading'] : '';
    $post_num   = !empty( $settings['post_num'] ) ? $settings['post_num'] : '';
    $post_order = !empty( $settings['post_order'] ) ? $settings['post_order'] : '';
    $post_order = $post_order == 'yes' ? 'DESC' : 'ASC';
    ?>

    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <?php
                            //Section heading ==============
                            if( $sec_heading ){
                                echo wp_kses_post( wpautop( $sec_heading ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    if( function_exists( 'medisen_latest_blog' ) ) {
                        medisen_latest_blog( $post_num, $post_order );
                    }
                ?>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
    <?php
	}
}
