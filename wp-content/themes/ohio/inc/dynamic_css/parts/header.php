<?php
/*
	Page header custom styles

    Table of contents: (use search)
    # 1. Variables
    # 2. Fixed search color
    # 3. Header height
    # 4. Header typography
	# 5. Header border style and color
    # 6. Sticky header height
	# 7. Sticky header typography
	# 8. Sticky header border style and color
	# 9. Mobile header color
	# 10. Mobile menu typography
    # 11. Menu button color
    # 12. Mobile menu initial resolution
*/

# 1. Variables
OhioOptions::get( 'page_header_menu_style_settings' ); // trigger selection chain
$style_settings_select_type = OhioOptions::get_last_select_type();

$fixed_search_color = OhioOptions::get( 'page_header_search_color', null, null, true );
$header_height = OhioOptions::get_by_type( 'page_header_menu_height', $style_settings_select_type );
$header_typo = OhioOptions::get_by_type( 'page_header_menu_text_typo', $style_settings_select_type );
$header_border_visibility = OhioOptions::get_by_type( 'page_header_menu_border_visibility', $style_settings_select_type );
$header_border_type = OhioOptions::get_by_type( 'page_header_menu_border_type', $style_settings_select_type, 'solid' );
$header_border_color = OhioOptions::get_by_type( 'page_header_menu_border_color', $style_settings_select_type );
$sticky_header_height = OhioOptions::get_global( 'page_header_sticky_height' );
$sticky_header_typo = OhioOptions::get_global( 'page_header_sticky_text_typo' );
$sticky_header_border_visibility = OhioOptions::get_global( 'page_header_sticky_menu_border_visibility', false );
$sticky_header_border_type = OhioOptions::get_global( 'page_header_sticky_menu_border_type', 'solid' );
$sticky_header_border_color = OhioOptions::get_global( 'page_header_sticky_menu_border_color' );
$mobile_header_color = OhioOptions::get_global( 'page_mobile_header_menu_color', 'global' );
$mobile_menu_typo = OhioOptions::get_global( 'mobile_header_menu_typo' );
$menu_button_color = OhioOptions::get_global('custom_button_for_header_color');
$menu_button_background = OhioOptions::get_global('custom_button_for_header_background');
$mobile_menu_initial_resolution = OhioOptions::get_global( 'page_mobile_menu_initial_resolution' );

# 2. Fixed search color
if ( $fixed_search_color ) {
	$_selector = [
		'.search-global.fixed'
	];
	$_css = 'color:' . $fixed_search_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 3. Header height
if ( $header_height ) {
	$_selector = [
        '.header-cap',
        '.header .header-wrap',
        '.header.header-2 .header-wrap',
        ':not(.is-mobile-menu).with-header-2 .header-cap'
    ];
    $_css = 'height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $header_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

# 4. Header typography
if ( $header_typo ) {
    $header_typo_css = OhioHelper::parse_acf_typo_to_css( $header_typo );

    if ( $header_typo_css ) {
        $_selector = [
			'.header:not(.-sticky):not(.-mobile) .menu-blank',
			'.header:not(.-sticky):not(.-mobile) .menu > li > a',
			'.header:not(.-sticky):not(.-mobile) .menu-optional > li > a',
			'.header:not(.-sticky):not(.-mobile) .branding',
			'.header:not(.-sticky):not(.-mobile) .icon-button-holder > .icon-button',
			'.header:not(.-sticky):not(.-mobile) .lang-dropdown',
			'.header:not(.-sticky) .cart-button-total',
			'.header:not(.-sticky) .icon-button:not(.-reset):not(.-overlay-button)',
		];
        $_css = $header_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    // Select chevron color
	preg_match_all("/(?=color\:([^\s]+))/", $header_typo_css, $matches);
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = [
			'.header:not(.-sticky):not(.-mobile) .lang-dropdown'
		];
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}

# 5. Header border style and color
if ( $header_border_visibility ) {

	if ( $header_border_type || border_color  ) {
		$_selector = [
			'.header',
			'.header:not(.-mobile).header-5',
			'.header:not(.-mobile).header-6',
			'.header:not(.-mobile).header-7'
		];

		$_css = '';
		if ( $header_border_type ) {
			$_css .= 'border-style:' . $header_border_type . ';';
		}
		if ( $header_border_color ) {
			$_css .= 'border-color:' . $header_border_color . ';';
		}
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 6. Sticky header height
if ( $sticky_header_height ) {
	$_selector = [
        '.header.-sticky:not(.-fixed) .header-wrap'
    ];
    $_css = 'height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $sticky_header_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

# 7. Sticky header typography
if ( $sticky_header_typo ) {
    $sticky_header_typo_css = OhioHelper::parse_acf_typo_to_css( $sticky_header_typo );

    if ( $sticky_header_typo_css ) {
        $_selector =[
			'.-sticky .branding',
			'.-sticky:not(.-mobile) .menu',
			'.-sticky .menu-optional .cart-button-total',
			'.-sticky .menu-optional .lang-dropdown',
			'.-sticky .cart-button .icon-button:not(.-small)',
			'.-sticky .icon-button:not(.-small):not(.-overlay-button)'
		];
        $_css = $sticky_header_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    // Select chevron color
	preg_match_all("/(?=color\:([^\s]+))/", $sticky_header_typo_css, $matches);
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = [
			'.-sticky .menu-optional .lang-dropdown'
		];
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}

# 8. Sticky header border style and color
if ( $sticky_header_border_visibility ) {

	if ( $sticky_header_border_type || border_color  ) {
		$_selector = [
			'.header.-sticky'
		];

		$_css = '';
		if ( $sticky_header_border_type ) {
			$_css .= 'border-style:' . $sticky_header_border_type . ';';
		}
		if ( $sticky_header_border_color ) {
			$_css .= 'border-color:' . $sticky_header_border_color . ';';
		}
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 9. Mobile header color
if ( $mobile_header_color ) {
	$_selector = [
		'.header.-mobile:not(.-sticky) .branding',
		'.header.-mobile:not(.-sticky) .cart-button-total',
		'.header.-mobile:not(.-sticky) .cart-button .icon-button:not(.-small)',
		'.header.-mobile:not(.-sticky) .icon-button:not(.-small):not(.-overlay-button)'
	];
	$_css = 'color:' . $mobile_header_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 10. Mobile menu typography
if ( $mobile_menu_typo ) {
    $mobile_menu_typo_css = OhioHelper::parse_acf_typo_to_css( $mobile_menu_typo );

    if ( $mobile_menu_typo_css ) {
        $_selector = [
			'.header.-mobile .nav',
			'.header.-mobile .mobile-overlay .copyright',
			'.header.-mobile .mobile-overlay .lang-dropdown',
			'.header.-mobile .mobile-overlay .close-bar .icon-button:not(.-small)'
		];
        $_css = $mobile_menu_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    // Select chevron color
	preg_match_all("/(?=color\:([^\s]+))/", $mobile_menu_typo_css, $matches);
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = [
			'.header.-mobile .mobile-overlay .lang-dropdown'
		];
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}

# 11. Menu button color
if ( $menu_button_color || $menu_button_background ) {
	$_selector = [
		'.btn-optional.button:not(.-outlined):not(.-text):not(.-flat):not(.-primary):not(.page-link):not(:hover)'
	];
	$_css = '';
	if ( $menu_button_color ) {
		$_css .= 'color:' . $menu_button_color . ';';
	}
	if ( $menu_button_background ) {
		$_css .= 'background-color:' . $menu_button_background . ';';
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 12. Mobile menu initial resolution
if ( $mobile_menu_initial_resolution ) {
	$_selector = [
		'@media screen and (max-width: ' . $mobile_menu_initial_resolution . 'px) { .header',
		'.mobile-overlay'
	];
	$_css = '';
	$_css .= 'opacity: 0;';
	$_css .= '}';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$back_link 				= false;

$background_color_css = '';
$background_image_css = '';
$sticky_background_color_css = '';
$sticky_background_image_css = '';
$mobile_background_color_css = '';
$mobile_background_image_css = '';
$overlay_background_color_css = '';
$overlay_background_image_css = '';
$background_color_css_border = '';
$back_link_css 			   = '';

# --- Regular header
$background_type = OhioOptions::get_by_type( 'page_header_menu_background_type', $style_settings_select_type );
if ( ! $background_type ) $background_type = 'color';

$background_color = OhioOptions::get_by_type( 'page_header_menu_background_color', $style_settings_select_type );

if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}
if ( $background_type == 'image' ) {
	$background_image_css = OhioHelper::get_background_image_css_by_type( 'page_header_menu', $style_settings_select_type );
}

# --- Sticky header
$sticky_background_type = OhioOptions::get_by_type( 'page_header_fixed_background_type', 'global' );
if ( ! $sticky_background_type ) $sticky_background_type = 'color';

$sticky_background_color = OhioOptions::get_by_type( 'page_header_fixed_background_color', 'global' );

if ( $sticky_background_color ) {
	$sticky_background_color_css = 'background-color:' . $sticky_background_color . ';';
}
if ( $sticky_background_type == 'image' ) {
	$sticky_background_image_css = OhioHelper::get_background_image_css_by_type( 'page_header_fixed', 'global' );
}

# --- Mobile header
$mobile_background_type = OhioOptions::get_by_type( 'page_mobile_header_menu_background_type', 'global' );
if ( ! $mobile_background_type ) $mobile_background_type = 'color';

$mobile_background_color = OhioOptions::get_by_type( 'page_mobile_header_menu_background_color', 'global' );

if ( $mobile_background_color ) {
	$mobile_background_color_css = 'background-color:' . $mobile_background_color . ';';
}

if ( $mobile_background_type == 'image' ) {
	$mobile_background_image_css = OhioHelper::get_background_image_css_by_type( 'page_mobile_header_menu', 'global' );
}

# --- Mobile fixed header
$mobile_background_color = OhioOptions::get_global( 'page_mobile_header_menu_background' );
if ( $mobile_background_color ) {
	$mobile_background_color_css = 'background-color:' . $mobile_background_color . ';';
}

// Overlay background color and image

$overlay_background_type = OhioOptions::get_global( 'page_header_overlay_menu_background_type' );
if ( ! $overlay_background_type ) $overlay_background_type = 'color';

$overlay_background_color = OhioOptions::get_global( 'page_header_overlay_menu_background_color' );

if ( $overlay_background_color ) {
	$overlay_background_color_css = 'background-color:' . $overlay_background_color . ';';
}
if ( $overlay_background_type == 'image' ) {
	$overlay_background_image_css = OhioHelper::get_background_image_css_by_type( 'page_header_overlay_menu', 'global' );
}

// Back link position

$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );
$subheader = OhioOptions::get_global( 'page_subheader_visibility', true );

if ( $previous_btn && $header_height) {
	function parseHeightArrays( $height ) {
		$height_array = explode( '-', $height );
		return $height_array[0];
	}
	
	$subheader_height = 0;
	
	if ( $subheader ) {
		$subheader_height = OhioOptions::get_by_type( 'page_subheader_height', $style_settings_select_type );
		$subheader_height = (int) parseHeightArrays( $subheader_height );
	}
	if ( $header_height ) {
		$header_height = (int) parseHeightArrays( $header_height );
	}
	
	$back_link = $header_height + $subheader_height + 20;
	$back_link_css .= 'top:'. $back_link .'px;';
}

if ( $background_color_css || $background_image_css ) {
	$_selector = '#masthead.header:not(.-sticky)';
	$_css = $background_color_css . $background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $sticky_background_color_css || $sticky_background_image_css ) {
	$_selector = '#masthead.header.-sticky';
	$_css = $sticky_background_color_css . $sticky_background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $mobile_background_color_css || $mobile_background_image_css ) {
	$_selector = [
		'.header.-mobile .nav .holder'
	];
	$_css = $mobile_background_color_css . $mobile_background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $overlay_background_color_css || $overlay_background_image_css ) {
	$_selector = '.hamburger-nav';
	$_css = $overlay_background_color_css . $overlay_background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

if ( $back_link ) {
	$back_link_classes = '.back-link';

	$_style_block = $back_link_classes . '{' . $back_link_css . '}';
	OhioBuffer::append_to_dynamic_css_buffer( $_style_block);

}