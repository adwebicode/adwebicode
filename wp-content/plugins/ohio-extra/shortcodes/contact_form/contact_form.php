<?php 

/**
* WPBakery Page Builder Ohio Contact Form shortcode
*/

add_shortcode( 'ohio_contact_form', 'ohio_contact_form_func' );

function ohio_contact_form_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$form_id = isset( $form_id ) ? OhioExtraFilter::string( $form_id, 'string', '') : '';
	$form_style = isset( $form_style ) ? OhioExtraFilter::string( $form_style, 'string', 'flat') : 'flat';
	$form_position = isset( $form_position ) ? OhioExtraFilter::string( $form_position, 'string', 'left' ) : 'left';
	$fields_offset = isset( $fields_offset ) ? OhioExtraFilter::string( $fields_offset, 'string', '20' ) : '20';
	$fields_offset = intval( str_replace( 'px', '', $fields_offset ) ); // Old values compatibility
	$fields_color = isset( $fields_color ) ? OhioExtraFilter::string( $fields_color ) : false;
	$fields_active_color = isset( $fields_active_color ) ? OhioExtraFilter::string( $fields_active_color ) : false;
	$fields_border_color = isset( $fields_border_color ) ? OhioExtraFilter::string( $fields_border_color ) : false;
	$fields_focus_border_color = isset( $fields_focus_border_color ) ? OhioExtraFilter::string( $fields_focus_border_color ) : false;
	$input_text_typo = isset( $input_text_typo ) ? OhioExtraFilter::string( $input_text_typo ) : false;
	$input_placeholder_typo = isset( $input_placeholder_typo ) ? OhioExtraFilter::string( $input_placeholder_typo ) : false;

	// Button
	$button = isset( $button ) ? OhioExtraFilter::string( $button, 'string', false ) : false;
	$button = preg_replace( '/\&amp\;/', '&', $button );
	parse_str( $button, $button_settings );

	// Design options
    $content_styles = isset( $content_styles ) ? OhioExtraFilter::string( $content_styles ) : false;
    $content_styles_str = strpos($content_styles, "{");
    $content_styles_css = substr($content_styles, $content_styles_str);

	// Appear effect
	$appearance_effect = isset( $appearance_effect ) ? OhioExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_once = isset( $appearance_once ) ? OhioExtraFilter::boolean( $appearance_once ) : true;
	$appearance_duration = isset( $appearance_duration ) ? OhioExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? OhioExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	
	$animation_attrs = '';
	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}
	if ( $appearance_effect != 'none' ) {
		$animation_attrs .= ' data-aos=' . esc_attr( $appearance_effect ) . '';
	}
	if ( !$appearance_once ) {
		$animation_attrs .= ' data-aos-once=true';
	}
	if ( !empty( $appearance_duration ) ) {
		$animation_attrs .= ' data-aos-duration=' . intval( $appearance_duration ) . '';
	}
	if ( !empty( $appearance_delay ) ) {
		$animation_attrs .= ' data-aos-delay=' . intval( $appearance_delay ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$layout_classes = '';
	switch ( $form_style ) {
		case 'outline':
			$layout_classes .= ' -outlined';
			break;
	}

	$content_classes = '';
	switch ( $form_position ) {
		case 'left':
			$content_classes .= ' -left';
			break;
		case 'center':
			$content_classes .= ' -center';
			break;
		case 'right':
			$content_classes .= ' -right';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$form_placeholder_typo = OhioExtraParser::VC_typo_to_CSS( $input_placeholder_typo );
	OhioExtraParser::VC_typo_custom_font( $input_placeholder_typo );

	if ( $form_placeholder_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' input::-webkit-input-placeholder,';
		$_selector .= '#' . $wrapper_id . ' textarea::-webkit-input-placeholder{';
		$_block_typo = $form_placeholder_typo;
		if ( !empty( $_block_typo['desktop'] ) ) {
			$_style_block .= $_selector . $_block_typo['desktop'] . '}';
		}
		if ( !empty( $_block_typo['tablet'] ) ) {
		    $_style_block .= '@media screen and (min-width: 769px) and (max-width: 1180px){';
		    $_style_block .= $_selector . $_block_typo['tablet'] . '}';
		    $_style_block .= '}';
		}
		if ( !empty( $_block_typo['mobile'] ) ) {
		    $_style_block .= '@media screen and (max-width: 768px){';
		    $_style_block .= $_selector . $_block_typo['mobile'] . '}';
		    $_style_block .= '}';
		}
	}

	$form_text_typo = OhioExtraParser::VC_typo_to_CSS( $input_text_typo );
	OhioExtraParser::VC_typo_custom_font( $input_text_typo );

	if ( $form_text_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' input:not([type=\'submit\']),';
		$_selector .= '#' . $wrapper_id . ' textarea,';
		$_selector .= '#' . $wrapper_id . ' select{';
		$_block_typo = $form_text_typo;
		if ( !empty( $_block_typo['desktop'] ) ) {
			$_style_block .= $_selector . $_block_typo['desktop'] . '}';
		}
		if ( !empty( $_block_typo['tablet'] ) ) {
		    $_style_block .= '@media screen and (min-width: 769px) and (max-width: 1180px){';
		    $_style_block .= $_selector . $_block_typo['tablet'] . '}';
		    $_style_block .= '}';
		}
		if ( !empty( $_block_typo['mobile'] ) ) {
		    $_style_block .= '@media screen and (max-width: 768px){';
		    $_style_block .= $_selector . $_block_typo['mobile'] . '}';
		    $_style_block .= '}';
		}
	}

	if ( $fields_offset ) {
		$_style_block .= '#' . $wrapper_id . ' [class*=vc_col]{';
		$_style_block .= 'padding:' . $fields_offset . 'px';
		$_style_block .= '}';

		$_style_block .= '#' . $wrapper_id . '.contact-form{';
		$_style_block .= 'margin:-' . $fields_offset . 'px';
		$_style_block .= '}';

		$_style_block .= '#' . $wrapper_id . ' .subscribe-form{';
		$_style_block .= 'margin:' . $fields_offset . 'px';
		$_style_block .= '}';
	}

	$fields_color = OhioExtraParser::VC_color_to_CSS( $fields_color, '{{color}}' );
	if ( $fields_color ) {
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined) input:not([type=\'submit\']),';
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined) textarea,';
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined) select{';
		$_style_block .= 'background-color:' . $fields_color . ';';
		$_style_block .= '}';
	}

	$fields_active_color = OhioExtraParser::VC_color_to_CSS( $fields_active_color, '{{color}}' );
	if ( $fields_active_color ) {
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined) input:not([type=\'submit\']):focus,';
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined) textarea:focus,';
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined) select:focus{';
		$_style_block .= 'background-color:' . $fields_active_color . ';';
		$_style_block .= '}';
	}

	$fields_border_color = OhioExtraParser::VC_color_to_CSS( $fields_border_color, '{{color}}' );
	if ( $fields_border_color ) {
		$_style_block .= '#' . $wrapper_id . '.-outlined input:not([type=\'submit\']),';
		$_style_block .= '#' . $wrapper_id . '.-outlined textarea,';
		$_style_block .= '#' . $wrapper_id . '.-outlined select{';
		$_style_block .= 'border-color:' . $fields_border_color . ';';
		$_style_block .= '}';
	}

	$fields_focus_border_color = OhioExtraParser::VC_color_to_CSS( $fields_focus_border_color, '{{color}}' );
	if ( $fields_focus_border_color ) {
		$_style_block .= '#' . $wrapper_id . '.-outlined input:not([type=\'submit\']):focus,';
		$_style_block .= '#' . $wrapper_id . '.-outlined textarea:focus,';
		$_style_block .= '#' . $wrapper_id . '.-outlined select:focus{';
		$_style_block .= 'border-color:' . $fields_focus_border_color . ';';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	// Button

	$button_css = OhioExtraParser::VC_button_to_css( $button_settings );
	
	if ( $button_css['css'] ) {
		$_style_block .= '#' . $wrapper_id . ' .button{';
		$_style_block .= $button_css['css'];
		$_style_block .= '}';
	}

	if ( $button_css['hover-css'] ) {
		$_style_block .= '#' . $wrapper_id . ' .button:hover{';
		$_style_block .= $button_css['hover-css'];
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'contact_form__view.php' );
	return ob_get_clean();
}