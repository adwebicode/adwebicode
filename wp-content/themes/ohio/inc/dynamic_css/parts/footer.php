<?php
/*
	Footer custom styles
	
	Table of contents: (use search)
	# 1. Variables
	# 2. Footer background color
	# 3. Footer headlines typo
	# 4. Footer text typo
	# 5. Footer links typo
	# 6. Copyright background color
	# 7. Copyright text typo
	# 8. Copyright links typo
	# 9. Footer logo typo
*/

# 1. Variables
$background_type = OhioOptions::get( 'page_footer_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_footer_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_footer', $background_select_type );
$copyright_background_type = OhioOptions::get( 'page_footer_copyright_section_background_type' );
$copyright_background_select_type = OhioOptions::get_last_select_type();
$copyright_background_color = OhioOptions::get_by_type( 'page_footer_copyright_section_background_color', $copyright_background_select_type );
$copyright_background_image = OhioHelper::get_background_image_css_by_type( 'page_footer_copyright_section', $copyright_background_select_type );
$footer_widget_title_typo = OhioOptions::get( 'page_footer_widget_title_typo' );
$footer_text_typo = OhioOptions::get( 'page_footer_text_typo' );
$footer_links_typo = OhioOptions::get( 'page_footer_links_typo' );
$footer_copyright_section_text_typo = OhioOptions::get( 'page_footer_copyright_section_text_typo' );
$footer_copyright_section_links_typo = OhioOptions::get( 'page_footer_copyright_section_links_typo' );
$footer_sitename_typo = false;
$footer_logo_type = OhioOptions::get( 'page_footer_logo_widget_type', 'logo_inverse' );
$footer_logo_select_type = OhioOptions::get_last_select_type();

if ( $footer_logo_type == 'sitename' ) {
	$footer_sitename_typo = OhioOptions::get_by_type( 'page_footer_sitename_typo', $footer_logo_select_type );
}

# 2. Footer background color
if ( $background_color || $background_image ) {
	$_selector = [
		'.site-footer'
	];
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 3. Footer headlines typo
if ( $footer_widget_title_typo ) {
	$footer_widget_title_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_widget_title_typo );

	if ( $footer_widget_title_typo_css ) {
		$_selector = [
			'.site-footer .widget-title'
		];
		$_css = $footer_widget_title_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 4. Footer text typo
if ( $footer_text_typo ) {
	$footer_text_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_text_typo );

	if ( $footer_text_typo_css ) {
		$_selector = [
			'.site-footer',
			'.site-footer h6',
			'.site-footer .widgets',
			'.site-footer .button',
			'.site-footer input'
		];
		$_css = $footer_text_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 5. Footer links typo
if ( $footer_links_typo ) {
	$footer_links_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_links_typo );

	if ( $footer_links_typo_css ) {
		$_selector = [
			'.site-footer a:not(.-unlink):not(.-undash):not(.button)'
		];
		$_css = $footer_links_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 6. Copyright background color
if ( $copyright_background_color || $copyright_background_image ) {
	$_selector = [
		'.site-footer-copyright'
	];
	$_css = '';
	$_css .= 'background-color:' . $copyright_background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $copyright_background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 7. Copyright text typo
if ( $footer_copyright_section_text_typo ) {
	$footer_copyright_section_text_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_copyright_section_text_typo );

	if ( $footer_copyright_section_text_typo_css ) {
		$_selector = [
			'.site-footer-copyright .holder'
		];
		$_css = $footer_copyright_section_text_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 8. Copyright links typo
if ( $footer_copyright_section_links_typo ) {
	$footer_copyright_section_links_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_copyright_section_links_typo );

	if ( $footer_copyright_section_links_typo_css ) {
		$_selector = [
			'.site-footer-copyright .holder a:not(.-unlink):not(.-undash):not(.button)'
		];
		$_css = $footer_copyright_section_links_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 9. Footer logo typo
if ( $footer_sitename_typo ) {
	$footer_sitename_typo_css = OhioHelper::parse_acf_typo_to_css( $footer_sitename_typo );

	if ( $footer_sitename_typo_css ) {
		$_selector = [
			'.site-footer .logo .title'
		];
		$_css = $footer_sitename_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}
