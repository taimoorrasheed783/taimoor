<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_corporate_business_first_color = get_theme_mod('vw_corporate_business_first_color');

	$custom_css = '';

	if($vw_corporate_business_first_color != false){
		$custom_css .='.get-started a, .more-btn a, .about-btn a, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, input[type="submit"], .footer-2, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, #sidebar input[type="submit"], .scrollup i, .hvr-sweep-to-right:before, .pagination span, .pagination a, .footer .tagcloud a:hover, #sidebar .tagcloud a:hover, .entry-audio audio, #comments a.comment-reply-link, .toggle-nav i{';
			$custom_css .='background-color: '.esc_html($vw_corporate_business_first_color).';';
		$custom_css .='}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='#comments input[type="submit"].submit, #sidebar ul li::before{';
			$custom_css .='background-color: '.esc_html($vw_corporate_business_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='a, .top-bar i, .top-bar .custom-social-icons i:hover, #header, .about h2, .footer h3, .woocommerce-message::before, .post-info i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, #sidebar td, #sidebar caption, #sidebar th, #sidebar td#prev a, .footer li a:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$custom_css .='color: '.esc_html($vw_corporate_business_first_color).';';
		$custom_css .='}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='.post-main-box:hover{';
			$custom_css .='border-color: '.esc_html($vw_corporate_business_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='.main-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($vw_corporate_business_first_color).';';
		$custom_css .='}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='.top-bar, .main-navigation ul ul, .header-fixed{';
			$custom_css .='border-bottom-color: '.esc_html($vw_corporate_business_first_color).';';
		$custom_css .='}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='.abt-image img{
		box-shadow: -12px 12px 0 0 '.esc_html($vw_corporate_business_first_color).';
		}';
	}
	if($vw_corporate_business_first_color != false){
		$custom_css .='#header{
		box-shadow: 0 3px 3px '.esc_html($vw_corporate_business_first_color).';
		}';
	}

	$custom_css .='@media screen and (max-width:720px) {';
		if($vw_corporate_business_first_color != false){
			$custom_css .='.search-box i{
			background-color:'.esc_html($vw_corporate_business_first_color).';
			}';
		}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_corporate_business_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_corporate_business_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_corporate_business_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, .more-btn, #slider .inner_carousel p{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, .more-btn, #slider .inner_carousel p{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, .more-btn, #slider .inner_carousel p{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_corporate_business_blog_layout_option','Default');
    if($theme_lay == 'Default'){
		$custom_css .='.post-main-box{';
			$custom_css .='';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$custom_css .='text-align:center;';
		$custom_css .='}';
		$custom_css .='.post-info{';
			$custom_css .='margin-top:10px;';
		$custom_css .='}';
	}else if($theme_lay == 'Left'){
		$custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$custom_css .='text-align:Left;';
		$custom_css .='}';
	}