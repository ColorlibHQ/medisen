<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : MEDISEN
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function medisen_common_custom_css(){
    
    wp_enqueue_style( 'medisen-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = medisen_opt( 'medisen_theme_color' );

		$buttonBorderColor     	  = medisen_opt( 'medisen_button_border_color' );
		$hoverColor     	  	  = medisen_opt( 'medisen_hover_color');

		$headerTop_bg     		  = medisen_opt( 'medisen_top_header_bg_color' );
		$headerTop_col     		  = medisen_opt( 'medisen_top_header_color' );

		$headerBg          		  = medisen_opt( 'medisen_header_bg_color');
		$menuColor          	  = medisen_opt( 'medisen_header_menu_color' );
		$menuHoverColor           = medisen_opt( 'medisen_header_menu_hover_color' ) != '#0065e1' ? medisen_opt('medisen_header_menu_hover_color') : $themeColor;
		$dropMenuBgColor          = medisen_opt( 'medisen_header_drop_menu_bg_color' ) != '#ab7636' ? medisen_opt('medisen_header_drop_menu_bg_color') : $themeColor;
		$dropMenuColor            = medisen_opt( 'medisen_header_drop_menu_color' );
		$dropMenuHovColor         = medisen_opt( 'medisen_header_drop_menu_hover_color' ) != '#0065e1' ? medisen_opt('medisen_header_drop_menu_hover_color') : $themeColor;;
		
		$headerRightBtnColor      = medisen_opt( 'medisen_header_right_btn_color' ) != '#0065e1' ? medisen_opt('medisen_header_right_btn_color') : $themeColor;
		$headerRightBtnHvrColor   = medisen_opt( 'medisen_header_right_btn_hover_color' ) != '#0065e1' ? medisen_opt('medisen_header_right_btn_hover_color') : $themeColor;

		$footerwbgColor     	  = medisen_opt('medisen_footer_bg_color');
		$footerBottomBgColor      = medisen_opt('medisen_footer_bottom_bg_color');
		$footerwTextColor   	  = medisen_opt('medisen_footer_widget_text_color') != '#abb2ba' ? medisen_opt('medisen_footer_widget_text_color') : '';
		$widgettitlecolor  		  = medisen_opt('medisen_footer_widget_title_color');
		$footerwanchorcolor 	  = medisen_opt('medisen_footer_widget_anchor_color');
		$footerwanchorhovcolor    = medisen_opt('medisen_footer_widget_anchor_hover_color');
		
		$fofbg					  = medisen_opt('medisen_fof_bg_color');
		$foftonecolor			  = medisen_opt('medisen_fof_textone_color');
		$fofttwocolor			  = medisen_opt('medisen_fof_texttwo_color');

		$gradientBgColor 		  = $themeColor != '#0065e1' ? $themeColor : '';
		$footerAncDefColor 		  = $footerwanchorcolor != '#999999' ? $footerwanchorcolor : $themeColor;
		$footerAncDefHovColor 	  = $footerwanchorhovcolor != '#0065e1' ? $footerwanchorhovcolor : $themeColor;
		$footerwFormTxtcolor	  = $footerwanchorcolor != '#7f7f7f' ? $footerwanchorcolor : '#999999';
		$footerwFormBordercolor	  = $footerwanchorcolor != '#7f7f7f' ? $footerwanchorcolor : '#e1e1e1';
		$footerwFormBtncolor	  = $footerwanchorcolor != '#7f7f7f' ? $footerwanchorcolor : $themeColor;

		$customcss ="
			.hero-banner{
				{$header_bg_img}
			}
			
			.btn_2
			{
				border-color: {$buttonBorderColor};
			}
			
			.dropdown .dropdown-menu
			{
				background-color: {$dropMenuBgColor};
			}

			.main_menu .btn_1
			{
				color: {$headerRightBtnColor};
			}
			
			.main_menu .btn_1:hover
			{
				border-color: {$headerRightBtnHvrColor};
				background-color: {$headerRightBtnHvrColor}!important;
			}

			.banner_part .banner_text .btn_1{
				background: {$gradientBgColor};
			}

			.cta_part .cta_part_iner .cta_part_text p, .about_part .about_text h5, .our_latest_work .single_work_demo h5, .blog_part .single-home-blog .card h5:hover, .blog_part .single-home-blog .card ul li i, .review_part .slick_right:hover, .review_part .slick_left:hover, .blog_part .single-home-blog a, .blog_part .single-home-blog .time, .blog_part .single-home-blog li span, .single_single_service span.fa, section.cta_area a.cta_btn:hover, .banner_part .banner_item .single_item .eci, .our_ability .our_ability_member_text ul li span, .doctor_part .single_blog_item:hover h3, .blog_area .sl-wrapper a span:hover, .single-post-area .navigation-area h4:hover, .single-post-area .blog-author h4:hover, .blog_right_sidebar .widget_medisen_recent_widget .post_item .media-body h3:hover
			{
				color: {$themeColor}
			}			
			.our_latest_work .single_work_demo .btn_3:hover, .team_member_section .single_team_member .single_team_text h3 a:hover, .team_member_section .single_team_member .team_member_social_icon a:hover, .blog_part .single-home-blog .card .card-body a:hover, .pre_icon a:hover, .next_icon a:hover, .review_part .section_tittle p, .banner-breadcrumb > ol > li.breadcrumb-item > a.bread-link:hover, .review_part .section_tittle p, .blog_details a:hover, .blog_right_sidebar .widget_categories ul li:hover, .blog_right_sidebar .widget_categories ul li:hover a, .blog_right_sidebar .widget_categories ul li a:hover, .blog_area a h2:hover, .doctor_part .single_blog_item .single_blog_img .social_icon a:hover{
				color: {$themeColor}!important;
			}

			.review_part .intro_video_bg .video-play-button, .review_part .owl-prev span:after, .review_part .owl-next span:after, .review_part .intro_video_bg .video-play-button:after, .review_part .intro_video_bg .video-play-button:before, .review_part .intro_video_bg .video-play-button:hover:after, .blog_item_img .blog_item_date, .single_sidebar_widget .tagcloud a:hover, .blog_right_sidebar .single_sidebar_widget.widget_medisen_newsletter .btn, .pre_icon :after, .next_icon :after, section.cta_area, .review_part:after, .intro_video_bg:after, .blog_part .blog_btn:hover:after, .hero-banner:after
			{
				background: {$themeColor}
			}

			.btn_4, .feature_part .single_feature_text .btn_2, .feature_part .single_feature:hover .single_feature_part, .banner_part .banner_text .btn_2, .regervation_part .regerv_btn .regerv_btn_iner, .our_ability .our_ability_member_text .btn_2{
				border-color: {$themeColor};
				background-color: {$themeColor};
			}

			.blog_right_sidebar .single_sidebar_widget.widget_search .button{
				background: {$gradientBgColor}
			}

			.service_part .single_service_part:hover .single_service_part_iner span, .blog_right_sidebar .single_sidebar_widget.widget_search .button:hover
			{
				background: {$themeColor}!important;
			}

			.btn_2:hover,
			.copyright_part .footer-social a:hover
			{
				background: {$hoverColor}!important;
			}

			.blog_part .single-home-blog .card h5:hover
			{
				color: {$hoverColor};
			}

			.about_part .about_img h2:after, .copyright_part .footer-social a
			{
				border-color: {$themeColor}
			}
			
			.sub_header{
				background: {$headerTop_bg}
			}
			.sub_header .sub_header_social_icon a,
			.sub_header .sub_header_social_icon .register_icon
			{
				color: {$headerTop_col}
			}

			.main_menu.menu_fixed
			{
				background: {$headerBg};
			}
			.main_menu .main-menu-item ul li a
			{
			   color: {$menuColor}!important;
			}
			.main_menu .main-menu-item ul li a:not(.dropdown-item):hover
			{
			   color: {$menuHoverColor}!important;
			}
			
			.dropdown .dropdown-menu .dropdown-item
			{
			   color: {$dropMenuColor}!important;
			}
			.dropdown .dropdown-menu .dropdown-item:hover
			{
			   color: {$dropMenuHovColor}!important;
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}

			.footer-area .single-footer-widget p, .footer-area .copyright_part_text p, .footer-area .footer_2 .social_icon a, .footer-area .copyright_part .footer-text
			{
				color: {$footerwTextColor}
			}
			.footer-area .widget_medisen_newsletter .input-group, .footer-area .copyright_part_text {
				border-color: {$footerwTextColor}
			}
			.footer-area .single-footer-widget h4
			{
				color: {$widgettitlecolor}
			}

			.footer-area .copyright_part_text a, .footer-area .social_icon a, .footer-area .single-footer-widget ul li a
			{
			   color: {$footerwanchorcolor};
			}
			.footer-area .copyright_part_text .footer-text > a
			{
			   color: {$footerAncDefColor};
			}

			.footer-area .single-footer-widget input::placeholder {
				color: {$footerwFormTxtcolor};
				opacity: 1;
			}
			
			.footer-area .single-footer-widget input:-ms-input-placeholder {
				color: {$footerwFormTxtcolor};
			}
			
			.footer-area .single-footer-widget input::-ms-input-placeholder {
				color: {$footerwFormTxtcolor};
			}

			.footer-area .single-footer-widget input{
				border-color: {$footerwFormBordercolor};
			}
			.footer-area .single-footer-widget input{
				color: {$footerwFormTxtcolor};
			}

			.footer-area .btn, .footer-area .single-footer-widget .click-btn{
				background: {$footerwFormBtncolor};
			}
			.footer-area .social_icon a:hover, .footer-area .copyright_part .footer-social a:hover, .footer-area .copyright_part .footer-social a i:hover, .footer-area .single-footer-widget ul li a:hover
			{
			   color: {$footerAncDefHovColor};
			}
			.footer-area .copyright_part_text a:hover, .footer-area .footer_2 .social_icon a:hover
			{
			   color: {$footerAncDefHovColor}!important;
			}
			.footer-area .copyright_part a{
				color: {$themeColor}
			}

			.footer-area .copyright_part{
				background: {$footerBottomBgColor}
			}

			#f0f {
				background-color: {$fofbg};
			}
			.f0f-content .h1 {
				color: {$foftonecolor};
			}
			.f0f-content p {
				color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'medisen-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'medisen_common_custom_css', 50 );