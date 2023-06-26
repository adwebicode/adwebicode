<?php
/*
	Subscribe popup custom styles

    Table of contents: (use search)
    # 1. Variables
    # 2. Background type
    # 3. Background color
    # 4. Title typo
    # 5. Description typo
    # 6. Form details typo
    # 7. Hide button typo
*/

# 1. Variables
$popup_background_type = OhioOptions::get_global( 'subscribe_popup_background_type', 'color' );
$popup_background_color = OhioOptions::get_global( 'subscribe_popup_background_color' );
$subscribe_popup_title_typo = OhioOptions::get_global( 'subscribe_popup_title_typo' );
$subscribe_popup_description_typo = OhioOptions::get_global( 'subscribe_popup_details_typo' );
$subscribe_popup_form_typo = OhioOptions::get_global( 'subscribe_popup_form_typo' );
$subscribe_popup_close_typo = OhioOptions::get_global( 'subscribe_popup_close_typo' );

# 2. Background type
if ( $popup_background_type == 'image' ) {
	$popup_background_image_css = OhioHelper::get_background_image_css_by_type( 'subscribe_popup', 'global', false, 'medium_large' );

	if ( $popup_background_image_css ) {
		$_selector = [
			'.popup-subscribe .thumbnail'
		];
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $popup_background_image_css );
	}
}

# 3. Background color
if ( $popup_background_color ) {
    $_selector = [
		'.popup-subscribe'
	];
    $_css = 'background-color:' . $popup_background_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 4. Title typo
if ( $subscribe_popup_title_typo ) {
    $subscribe_popup_title_typo_css = OhioHelper::parse_acf_typo_to_css( $subscribe_popup_title_typo );

    if ( $subscribe_popup_title_typo_css ) {
        $_selector = [
            '.popup-subscribe .title'
        ];
        $_css = $subscribe_popup_title_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 5. Description typo
if ( $subscribe_popup_description_typo ) {
    $subscribe_popup_description_typo_css = OhioHelper::parse_acf_typo_to_css( $subscribe_popup_description_typo );

    if ( $subscribe_popup_description_typo_css ) {
        $_selector = [
            '.popup-subscribe p'
        ];
        $_css = $subscribe_popup_description_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 6. Form details typo
if ( $subscribe_popup_form_typo ) {
    $subscribe_popup_form_typo_css = OhioHelper::parse_acf_typo_to_css( $subscribe_popup_form_typo );

    if ( $subscribe_popup_form_typo_css ) {
        $_selector = [
            '.popup-subscribe .contact-form .wpcf7-list-item-label'
        ];
        $_css = $subscribe_popup_form_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 7. Hide button typo
if ( $subscribe_popup_close_typo ) {
    $subscribe_popup_close_typo_css = OhioHelper::parse_acf_typo_to_css( $subscribe_popup_close_typo );

    if ( $subscribe_popup_close_typo_css ) {
        $_selector = [
            '.popup-subscribe .close-link'
        ];
        $_css = $subscribe_popup_close_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}
