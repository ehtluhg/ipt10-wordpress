<?php
	
	/*-------------------------First highlight color-------------------*/

	$vw_school_education_first_color = get_theme_mod('vw_school_education_first_color');

	$vw_school_education_custom_css = '';

	if($vw_school_education_first_color != false){
		$vw_school_education_custom_css .='.search-box i, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .hvr-sweep-to-right:before, .footer input[type="submit"], .footer-2, .scrollup i, .sidebar input[type="submit"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .date-monthwrap, .pagination span, .pagination a,.sidebar .tagcloud a:hover, #comments a.comment-reply-link, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more:hover, .sidebar a.custom_read_more:hover, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{';
			$vw_school_education_custom_css .='background-color: '.esc_attr($vw_school_education_first_color).';';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$vw_school_education_custom_css .='a, .page-template-custom-home-page .socialbox i:hover, .socialbox i:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .footer li a:hover, .sidebar ul li a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .page-template-custom-home-page #header .main-navigation a:hover, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .sidebar .custom-social-icons i, nav.woocommerce-MyAccount-navigation ul li a:hover, #top-bar p a:hover, .logo .site-title a:hover, #slider .inner_carousel h1 a:hover, .service-box:hover h2.section-title a, .service-box:hover .metabox a, .metabox:hover a{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_first_color).';';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$vw_school_education_custom_css .='.page-template-custom-home-page .socialbox i:hover, .socialbox i:hover,.sidebar th,.sidebar td,.sidebar td#prev a,.sidebar caption, .footer li a:hover{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_first_color).'!important;';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$vw_school_education_custom_css .='.more-btn a:hover, .wel-btn a:hover, .hvr-sweep-to-right:hover, .hvr-sweep-to-right:focus, .hvr-sweep-to-right:active, .post-main-box:hover, .footer .tagcloud a:hover, .footer a.custom_read_more:hover, .sidebar a.custom_read_more:hover, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover{';
			$vw_school_education_custom_css .='border-color: '.esc_attr($vw_school_education_first_color).';';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$vw_school_education_custom_css .='.main-navigation ul ul{';
			$vw_school_education_custom_css .='border-top-color: '.esc_attr($vw_school_education_first_color).';';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$vw_school_education_custom_css .='.main-navigation ul ul, .header-fixed{';
			$vw_school_education_custom_css .='border-bottom-color: '.esc_attr($vw_school_education_first_color).';';
		$vw_school_education_custom_css .='}';
	}

	/*----------------Second highlight color-------------------*/

	$vw_school_education_second_color = get_theme_mod('vw_school_education_second_color');

	if($vw_school_education_second_color != false){
		$vw_school_education_custom_css .='.footer, nav.woocommerce-MyAccount-navigation ul li, .yearwrap,.home-page-header, .header-fixed, .footer a.custom_read_more, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .pagination .current{';
			$vw_school_education_custom_css .='background-color: '.esc_attr($vw_school_education_second_color).';';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$vw_school_education_custom_css .='.sidebar ul li::before, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$vw_school_education_custom_css .='background-color: '.esc_attr($vw_school_education_second_color).'!important;';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$vw_school_education_custom_css .='.page-template-custom-home-page #header .main-navigation ul li a, .page-template-custom-home-page .socialbox i, #welcome-sec h2, .wel-btn a, h1, h2, h3, h4, h5, h6, .sidebar h3, span.woocommerce-Price-amount.amount, .post-main-box h3 a, .blogbutton-small, .sidebar a.custom_read_more, .copyright a:hover, .sidebar .wp-block-search .wp-block-search__label{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_second_color).';';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$vw_school_education_custom_css .='.page-template-custom-home-page .socialbox i{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_second_color).'!important;';
		$vw_school_education_custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$vw_school_education_custom_css .='.wel-btn a, .blogbutton-small, .sidebar a.custom_read_more{';
			$vw_school_education_custom_css .='border-color: '.esc_attr($vw_school_education_second_color).';';
		$vw_school_education_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_school_education_theme_lay = get_theme_mod( 'vw_school_education_width_option','Full Width');
    if($vw_school_education_theme_lay == 'Boxed'){
		$vw_school_education_custom_css .='body{';
			$vw_school_education_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='#header{';
			$vw_school_education_custom_css .='width: 98%;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='right: 100px;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.scrollup.left i{';
			$vw_school_education_custom_css .='left: 100px;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_theme_lay == 'Wide Width'){
		$vw_school_education_custom_css .='body{';
			$vw_school_education_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='right: 30px;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.scrollup.left i{';
			$vw_school_education_custom_css .='left: 30px;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_theme_lay == 'Full Width'){
		$vw_school_education_custom_css .='body{';
			$vw_school_education_custom_css .='max-width: 100%;';
		$vw_school_education_custom_css .='}';
	}

	/*--------------- Slider Opacity ---------------*/

	$vw_school_education_theme_lay = get_theme_mod( 'vw_school_education_slider_opacity_color','0.5');
	if($vw_school_education_theme_lay == '0'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.1'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.1';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.2'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.2';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.3'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.3';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.4'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.4';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.5'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.5';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.6'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.6';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.7'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.7';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.8'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.8';
		$vw_school_education_custom_css .='}';
		}else if($vw_school_education_theme_lay == '0.9'){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='opacity:0.9';
		$vw_school_education_custom_css .='}';
		}

	/*------------------Slider Content Layout -------------------*/

	$vw_school_education_theme_lay = get_theme_mod( 'vw_school_education_slider_content_option','Center');
    if($vw_school_education_theme_lay == 'Left'){
		$vw_school_education_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_school_education_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_theme_lay == 'Center'){
		$vw_school_education_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_school_education_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_theme_lay == 'Right'){
		$vw_school_education_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$vw_school_education_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_school_education_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_school_education_slider_content_padding_top_bottom = get_theme_mod('vw_school_education_slider_content_padding_top_bottom');
	$vw_school_education_slider_content_padding_left_right = get_theme_mod('vw_school_education_slider_content_padding_left_right');
	if($vw_school_education_slider_content_padding_top_bottom != false || $vw_school_education_slider_content_padding_left_right != false){
		$vw_school_education_custom_css .='#slider .carousel-caption{';
			$vw_school_education_custom_css .='top: '.esc_attr($vw_school_education_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_school_education_slider_content_padding_top_bottom).';left: '.esc_attr($vw_school_education_slider_content_padding_left_right).';right: '.esc_attr($vw_school_education_slider_content_padding_left_right).';';
		$vw_school_education_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_school_education_slider_height = get_theme_mod('vw_school_education_slider_height');
	if($vw_school_education_slider_height != false){
		$vw_school_education_custom_css .='#slider img{';
			$vw_school_education_custom_css .='height: '.esc_attr($vw_school_education_slider_height).';';
		$vw_school_education_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_school_education_slider = get_theme_mod('vw_school_education_slider_hide_show');
	if($vw_school_education_slider == false){
		$vw_school_education_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_school_education_custom_css .='position: static; background: #002b46; margin-bottom:20px;';
		$vw_school_education_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_school_education_theme_lay = get_theme_mod( 'vw_school_education_blog_layout_option','Default');
    if($vw_school_education_theme_lay == 'Default'){
		$vw_school_education_custom_css .='.service-box{';
			$vw_school_education_custom_css .='';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.post-main-box h2{';
			$vw_school_education_custom_css .='padding:0;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.new-text p{';
			$vw_school_education_custom_css .='margin-top:10px;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.blogbutton-small{';
			$vw_school_education_custom_css .='margin: 0; display: inline-block;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_theme_lay == 'Center'){
		$vw_school_education_custom_css .='.service-box, .post-main-box h2, .new-text p, .metabox, .content-bttn{';
			$vw_school_education_custom_css .='text-align:center;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.service-box{';
			$vw_school_education_custom_css .='border: 1px dashed #ccc; padding: 15px; margin-bottom: 5%;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.metabox{';
			$vw_school_education_custom_css .='background: #eeeeee; padding: 10px; margin-bottom: 15px;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.blogbutton-small{';
			$vw_school_education_custom_css .='margin: 0; display: inline-block;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_theme_lay == 'Left'){
		$vw_school_education_custom_css .='.service-box, .post-main-box h2, .new-text p, .content-bttn{';
			$vw_school_education_custom_css .='text-align:Left;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.service-box{';
			$vw_school_education_custom_css .='border: 1px dashed #ccc; padding: 15px; margin-bottom: 5%;';
		$vw_school_education_custom_css .='}';
		$vw_school_education_custom_css .='.metabox{';
			$vw_school_education_custom_css .='background: #eeeeee; padding: 10px; margin-bottom: 15px;';
		$vw_school_education_custom_css .='}';
	}

	/*-----------------Responsive Media -----------------------*/

	$vw_school_education_resp_stickyheader = get_theme_mod( 'vw_school_education_stickyheader_hide_show',false);
	if($vw_school_education_resp_stickyheader == true && get_theme_mod( 'vw_school_education_sticky_header',false) != true){
    	$vw_school_education_custom_css .='.header-fixed{';
			$vw_school_education_custom_css .='position:static;';
		$vw_school_education_custom_css .='} ';
	}
    if($vw_school_education_resp_stickyheader == true){
    	$vw_school_education_custom_css .='@media screen and (max-width:575px) {';
		$vw_school_education_custom_css .='.header-fixed{';
			$vw_school_education_custom_css .='position:fixed;';
		$vw_school_education_custom_css .='} }';
	}else if($vw_school_education_resp_stickyheader == false){
		$vw_school_education_custom_css .='@media screen and (max-width:575px){';
		$vw_school_education_custom_css .='.header-fixed{';
			$vw_school_education_custom_css .='position:static;';
		$vw_school_education_custom_css .='} }';
	}

	$vw_school_education_resp_slider = get_theme_mod( 'vw_school_education_resp_slider_hide_show',false);
	if($vw_school_education_resp_slider == true && get_theme_mod( 'vw_school_education_slider_hide_show', false) == false){
    	$vw_school_education_custom_css .='#slider{';
			$vw_school_education_custom_css .='display:none;';
		$vw_school_education_custom_css .='} ';
	}
    if($vw_school_education_resp_slider == true){
    	$vw_school_education_custom_css .='@media screen and (max-width:575px) {';
		$vw_school_education_custom_css .='#slider{';
			$vw_school_education_custom_css .='display:block;';
		$vw_school_education_custom_css .='} }';
	}else if($vw_school_education_resp_slider == false){
		$vw_school_education_custom_css .='@media screen and (max-width:575px) {';
		$vw_school_education_custom_css .='#slider{';
			$vw_school_education_custom_css .='display:none;';
		$vw_school_education_custom_css .='} }';
	}

	$vw_school_education_res_sidebar = get_theme_mod( 'vw_school_education_sidebar_hide_show',true);
    if($vw_school_education_res_sidebar == true){
    	$vw_school_education_custom_css .='@media screen and (max-width:575px) {';
		$vw_school_education_custom_css .='.sidebar{';
			$vw_school_education_custom_css .='display:block;';
		$vw_school_education_custom_css .='} }';
	}else if($vw_school_education_res_sidebar == false){
		$vw_school_education_custom_css .='@media screen and (max-width:575px) {';
		$vw_school_education_custom_css .='.sidebar{';
			$vw_school_education_custom_css .='display:none;';
		$vw_school_education_custom_css .='} }';
	}

	$vw_school_education_resp_scroll_top = get_theme_mod( 'vw_school_education_resp_scroll_top_hide_show',true);
	if($vw_school_education_resp_scroll_top == true && get_theme_mod( 'vw_school_education_hide_show_scroll',true) != true){
    	$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='visibility:hidden !important;';
		$vw_school_education_custom_css .='} ';
	}
    if($vw_school_education_resp_scroll_top == true){
    	$vw_school_education_custom_css .='@media screen and (max-width:575px) {';
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='visibility:visible !important;';
		$vw_school_education_custom_css .='} }';
	}else if($vw_school_education_resp_scroll_top == false){
		$vw_school_education_custom_css .='@media screen and (max-width:575px){';
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='visibility:hidden !important;';
		$vw_school_education_custom_css .='} }';
	}

	$vw_school_education_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_school_education_resp_menu_toggle_btn_bg_color');
	if($vw_school_education_resp_menu_toggle_btn_bg_color != false){
		$vw_school_education_custom_css .='.toggle-nav i{';
			$vw_school_education_custom_css .='background-color: '.esc_attr($vw_school_education_resp_menu_toggle_btn_bg_color).';';
		$vw_school_education_custom_css .='}';
	}

	/*-------------- Menus Settings ----------------*/

	$vw_school_education_navigation_menu_font_size = get_theme_mod('vw_school_education_navigation_menu_font_size');
	if($vw_school_education_navigation_menu_font_size != false){
		$vw_school_education_custom_css .='.main-navigation a{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_navigation_menu_font_size).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_nav_menus_font_weight = get_theme_mod( 'vw_school_education_navigation_menu_font_weight','Default');
    if($vw_school_education_nav_menus_font_weight == 'Default'){
		$vw_school_education_custom_css .='.main-navigation a{';
			$vw_school_education_custom_css .='';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_nav_menus_font_weight == 'Normal'){
		$vw_school_education_custom_css .='.main-navigation a{';
			$vw_school_education_custom_css .='font-weight: normal;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_header_menus_color = get_theme_mod('vw_school_education_header_menus_color');
	if($vw_school_education_header_menus_color != false){
		$vw_school_education_custom_css .='.main-navigation a, .page-template-custom-home-page #header .main-navigation a{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_header_menus_color).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_header_menus_hover_color = get_theme_mod('vw_school_education_header_menus_hover_color');
	if($vw_school_education_header_menus_hover_color != false){
		$vw_school_education_custom_css .='.main-navigation a:hover, .page-template-custom-home-page #header .main-navigation a:hover{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_header_menus_hover_color).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_header_submenus_color = get_theme_mod('vw_school_education_header_submenus_color');
	if($vw_school_education_header_submenus_color != false){
		$vw_school_education_custom_css .='.main-navigation ul ul a, .page-template-custom-home-page #header .main-navigation ul ul a{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_header_submenus_color).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_header_submenus_hover_color = get_theme_mod('vw_school_education_header_submenus_hover_color');
	if($vw_school_education_header_submenus_hover_color != false){
		$vw_school_education_custom_css .='.main-navigation ul.sub-menu a:hover, .page-template-custom-home-page #header .main-navigation ul.sub-menu a:hover{';
			$vw_school_education_custom_css .='color: '.esc_attr($vw_school_education_header_submenus_hover_color).';';
		$vw_school_education_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_school_education_sticky_header_padding = get_theme_mod('vw_school_education_sticky_header_padding');
	if($vw_school_education_sticky_header_padding != false){
		$vw_school_education_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_school_education_custom_css .='padding: '.esc_attr($vw_school_education_sticky_header_padding).';';
		$vw_school_education_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_school_education_search_padding_top_bottom = get_theme_mod('vw_school_education_search_padding_top_bottom');
	$vw_school_education_search_padding_left_right = get_theme_mod('vw_school_education_search_padding_left_right');
	$vw_school_education_search_font_size = get_theme_mod('vw_school_education_search_font_size');
	$vw_school_education_search_border_radius = get_theme_mod('vw_school_education_search_border_radius');
	if($vw_school_education_search_padding_top_bottom != false || $vw_school_education_search_padding_left_right != false || $vw_school_education_search_font_size != false || $vw_school_education_search_border_radius != false){
		$vw_school_education_custom_css .='.search-box i{';
			$vw_school_education_custom_css .='padding-top: '.esc_attr($vw_school_education_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_school_education_search_padding_top_bottom).';padding-left: '.esc_attr($vw_school_education_search_padding_left_right).';padding-right: '.esc_attr($vw_school_education_search_padding_left_right).';font-size: '.esc_attr($vw_school_education_search_font_size).';border-radius: '.esc_attr($vw_school_education_search_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_school_education_button_padding_top_bottom = get_theme_mod('vw_school_education_button_padding_top_bottom');
	$vw_school_education_button_padding_left_right = get_theme_mod('vw_school_education_button_padding_left_right');
	if($vw_school_education_button_padding_top_bottom != false || $vw_school_education_button_padding_left_right != false){
		$vw_school_education_custom_css .='.blogbutton-small{';
			$vw_school_education_custom_css .='padding-top: '.esc_attr($vw_school_education_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_school_education_button_padding_top_bottom).';padding-left: '.esc_attr($vw_school_education_button_padding_left_right).';padding-right: '.esc_attr($vw_school_education_button_padding_left_right).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_button_border_radius = get_theme_mod('vw_school_education_button_border_radius');
	if($vw_school_education_button_border_radius != false){
		$vw_school_education_custom_css .='.blogbutton-small, .hvr-sweep-to-right:before{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_button_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_school_education_featured_image_border_radius = get_theme_mod('vw_school_education_featured_image_border_radius', 0);
	if($vw_school_education_featured_image_border_radius != false){
		$vw_school_education_custom_css .='.box-image img, .feature-box img{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_featured_image_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_featured_image_box_shadow = get_theme_mod('vw_school_education_featured_image_box_shadow',0);
	if($vw_school_education_featured_image_box_shadow != false){
		$vw_school_education_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_school_education_custom_css .='box-shadow: '.esc_attr($vw_school_education_featured_image_box_shadow).'px '.esc_attr($vw_school_education_featured_image_box_shadow).'px '.esc_attr($vw_school_education_featured_image_box_shadow).'px #cccccc;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_single_blog_post_navigation_show_hide = get_theme_mod('vw_school_education_single_blog_post_navigation_show_hide',true);
	if($vw_school_education_single_blog_post_navigation_show_hide != true){
		$vw_school_education_custom_css .='.post-navigation{';
			$vw_school_education_custom_css .='display: none;';
		$vw_school_education_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_school_education_footer_background_color = get_theme_mod('vw_school_education_footer_background_color');
	if($vw_school_education_footer_background_color != false){
		$vw_school_education_custom_css .='.footer{';
			$vw_school_education_custom_css .='background-color: '.esc_attr($vw_school_education_footer_background_color).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_copyright_font_size = get_theme_mod('vw_school_education_copyright_font_size');
	if($vw_school_education_copyright_font_size != false){
		$vw_school_education_custom_css .='.copyright p{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_copyright_font_size).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_copyright_alingment = get_theme_mod('vw_school_education_copyright_alingment');
	if($vw_school_education_copyright_alingment != false){
		$vw_school_education_custom_css .='.copyright p{';
			$vw_school_education_custom_css .='text-align: '.esc_attr($vw_school_education_copyright_alingment).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_copyright_padding_top_bottom = get_theme_mod('vw_school_education_copyright_padding_top_bottom');
	if($vw_school_education_copyright_padding_top_bottom != false){
		$vw_school_education_custom_css .='.footer-2{';
			$vw_school_education_custom_css .='padding-top: '.esc_attr($vw_school_education_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_school_education_copyright_padding_top_bottom).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_footer_widgets_heading = get_theme_mod( 'vw_school_education_footer_widgets_heading','Left');
    if($vw_school_education_footer_widgets_heading == 'Left'){
		$vw_school_education_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
		$vw_school_education_custom_css .='text-align: left;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_footer_widgets_heading == 'Center'){
		$vw_school_education_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
			$vw_school_education_custom_css .='text-align: center;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_footer_widgets_heading == 'Right'){
		$vw_school_education_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_school_education_custom_css .='text-align: right;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_footer_widgets_content = get_theme_mod( 'vw_school_education_footer_widgets_content','Left');
    if($vw_school_education_footer_widgets_content == 'Left'){
		$vw_school_education_custom_css .='.footer li{';
		$vw_school_education_custom_css .='text-align: left;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_footer_widgets_content == 'Center'){
		$vw_school_education_custom_css .='.footer li{';
			$vw_school_education_custom_css .='text-align: center;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_footer_widgets_content == 'Right'){
		$vw_school_education_custom_css .='.footer li{';
			$vw_school_education_custom_css .='text-align: right;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_footer_padding = get_theme_mod('vw_school_education_footer_padding');
	if($vw_school_education_footer_padding != false){
		$vw_school_education_custom_css .='.footer{';
			$vw_school_education_custom_css .='padding: '.esc_attr($vw_school_education_footer_padding).' 0;';
		$vw_school_education_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_school_education_scroll_to_top_font_size = get_theme_mod('vw_school_education_scroll_to_top_font_size');
	if($vw_school_education_scroll_to_top_font_size != false){
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_scroll_to_top_font_size).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_scroll_to_top_padding = get_theme_mod('vw_school_education_scroll_to_top_padding');
	$vw_school_education_scroll_to_top_padding = get_theme_mod('vw_school_education_scroll_to_top_padding');
	if($vw_school_education_scroll_to_top_padding != false){
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='padding-top: '.esc_attr($vw_school_education_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_school_education_scroll_to_top_padding).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_scroll_to_top_width = get_theme_mod('vw_school_education_scroll_to_top_width');
	if($vw_school_education_scroll_to_top_width != false){
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='width: '.esc_attr($vw_school_education_scroll_to_top_width).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_scroll_to_top_height = get_theme_mod('vw_school_education_scroll_to_top_height');
	if($vw_school_education_scroll_to_top_height != false){
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='height: '.esc_attr($vw_school_education_scroll_to_top_height).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_scroll_to_top_border_radius = get_theme_mod('vw_school_education_scroll_to_top_border_radius');
	if($vw_school_education_scroll_to_top_border_radius != false){
		$vw_school_education_custom_css .='.scrollup i{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_scroll_to_top_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_school_education_social_icon_font_size = get_theme_mod('vw_school_education_social_icon_font_size');
	if($vw_school_education_social_icon_font_size != false){
		$vw_school_education_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i, .page-template-custom-home-page .socialbox i, .custom-social-icons i{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_social_icon_font_size).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_social_icon_padding = get_theme_mod('vw_school_education_social_icon_padding');
	if($vw_school_education_social_icon_padding != false){
		$vw_school_education_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_school_education_custom_css .='padding: '.esc_attr($vw_school_education_social_icon_padding).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_social_icon_width = get_theme_mod('vw_school_education_social_icon_width');
	if($vw_school_education_social_icon_width != false){
		$vw_school_education_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i, .page-template-custom-home-page .socialbox i{';
			$vw_school_education_custom_css .='width: '.esc_attr($vw_school_education_social_icon_width).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_social_icon_height = get_theme_mod('vw_school_education_social_icon_height');
	if($vw_school_education_social_icon_height != false){
		$vw_school_education_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_school_education_custom_css .='height: '.esc_attr($vw_school_education_social_icon_height).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_social_icon_border_radius = get_theme_mod('vw_school_education_social_icon_border_radius');
	if($vw_school_education_social_icon_border_radius != false){
		$vw_school_education_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_social_icon_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_school_education_products_padding_top_bottom = get_theme_mod('vw_school_education_products_padding_top_bottom');
	if($vw_school_education_products_padding_top_bottom != false){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_school_education_custom_css .='padding-top: '.esc_attr($vw_school_education_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_school_education_products_padding_top_bottom).'!important;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_products_padding_left_right = get_theme_mod('vw_school_education_products_padding_left_right');
	if($vw_school_education_products_padding_left_right != false){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_school_education_custom_css .='padding-left: '.esc_attr($vw_school_education_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_school_education_products_padding_left_right).'!important;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_products_box_shadow = get_theme_mod('vw_school_education_products_box_shadow');
	if($vw_school_education_products_box_shadow != false){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_school_education_custom_css .='box-shadow: '.esc_attr($vw_school_education_products_box_shadow).'px '.esc_attr($vw_school_education_products_box_shadow).'px '.esc_attr($vw_school_education_products_box_shadow).'px #ddd;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_products_border_radius = get_theme_mod('vw_school_education_products_border_radius', 0);
	if($vw_school_education_products_border_radius != false){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_products_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_products_btn_padding_top_bottom = get_theme_mod('vw_school_education_products_btn_padding_top_bottom');
	if($vw_school_education_products_btn_padding_top_bottom != false){
		$vw_school_education_custom_css .='.woocommerce a.button{';
			$vw_school_education_custom_css .='padding-top: '.esc_attr($vw_school_education_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_school_education_products_btn_padding_top_bottom).' !important;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_products_btn_padding_left_right = get_theme_mod('vw_school_education_products_btn_padding_left_right');
	if($vw_school_education_products_btn_padding_left_right != false){
		$vw_school_education_custom_css .='.woocommerce a.button{';
			$vw_school_education_custom_css .='padding-left: '.esc_attr($vw_school_education_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_school_education_products_btn_padding_left_right).' !important;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_products_button_border_radius = get_theme_mod('vw_school_education_products_button_border_radius', 0);
	if($vw_school_education_products_button_border_radius != false){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_products_button_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_woocommerce_sale_position = get_theme_mod( 'vw_school_education_woocommerce_sale_position','right');
    if($vw_school_education_woocommerce_sale_position == 'left'){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_school_education_custom_css .='left: -10px; right: auto;';
		$vw_school_education_custom_css .='}';
	}else if($vw_school_education_woocommerce_sale_position == 'right'){
		$vw_school_education_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_school_education_custom_css .='left: auto; right: 0;';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_woocommerce_sale_font_size = get_theme_mod('vw_school_education_woocommerce_sale_font_size', 0);
	if($vw_school_education_woocommerce_sale_font_size != false){
		$vw_school_education_custom_css .='.woocommerce span.onsale{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_woocommerce_sale_font_size).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_woocommerce_sale_border_radius = get_theme_mod('vw_school_education_woocommerce_sale_border_radius', 100);
	if($vw_school_education_woocommerce_sale_border_radius != false){
		$vw_school_education_custom_css .='.woocommerce span.onsale{';
			$vw_school_education_custom_css .='border-radius: '.esc_attr($vw_school_education_woocommerce_sale_border_radius).'px;';
		$vw_school_education_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_school_education_logo_padding = get_theme_mod('vw_school_education_logo_padding');
	if($vw_school_education_logo_padding != false){
		$vw_school_education_custom_css .='.logo{';
			$vw_school_education_custom_css .='padding: '.esc_attr($vw_school_education_logo_padding).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_logo_margin = get_theme_mod('vw_school_education_logo_margin');
	if($vw_school_education_logo_margin != false){
		$vw_school_education_custom_css .='.logo{';
			$vw_school_education_custom_css .='margin: '.esc_attr($vw_school_education_logo_margin).';';
		$vw_school_education_custom_css .='}';
	}

	// Site title Font Size
	$vw_school_education_site_title_font_size = get_theme_mod('vw_school_education_site_title_font_size');
	if($vw_school_education_site_title_font_size != false){
		$vw_school_education_custom_css .='.logo h1 a, .logo p.site-title a{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_site_title_font_size).' !important;';
		$vw_school_education_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_school_education_site_tagline_font_size = get_theme_mod('vw_school_education_site_tagline_font_size');
	if($vw_school_education_site_tagline_font_size != false){
		$vw_school_education_custom_css .='p.site-description{';
			$vw_school_education_custom_css .='font-size: '.esc_attr($vw_school_education_site_tagline_font_size).'!important;';
		$vw_school_education_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_school_education_preloader_bg_color = get_theme_mod('vw_school_education_preloader_bg_color');
	if($vw_school_education_preloader_bg_color != false){
		$vw_school_education_custom_css .='#preloader{';
			$vw_school_education_custom_css .='background-color: '.esc_attr($vw_school_education_preloader_bg_color).';';
		$vw_school_education_custom_css .='}';
	}

	$vw_school_education_preloader_border_color = get_theme_mod('vw_school_education_preloader_border_color');
	if($vw_school_education_preloader_border_color != false){
		$vw_school_education_custom_css .='.loader-line{';
			$vw_school_education_custom_css .='border-color: '.esc_attr($vw_school_education_preloader_border_color).';';
		$vw_school_education_custom_css .='}';
	}