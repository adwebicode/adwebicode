<?php
/*
	Notification custom style
	
	Table of contents: (use search)
	# 1. Variables
	# 2. Notification background color
	# 3. Notification button color
	# 4. Notification typo
	# 5. Notification link typo
*/

# 1. Variables
$notification_background_color = OhioOptions::get_global( 'notification_background_color' );
$notification_button_color = OhioOptions::get_global( 'notification_button_background_color' );
$notification_typo = OhioOptions::get_global( 'notification_details_typo' );
$notification_link_typo = OhioOptions::get_global( 'notification_link_typo' );

# 2. Notification background color
if ( $notification_background_color ) {
	$_selector = [
		'.notification .alert',
		'.notification .alert.-blur'
	];
	$_css = 'background-color:' . $notification_background_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 3. Notification button color
if ( $notification_button_color ) {
	$_selector = [
		'.notification .button'
	];
	$_css = 'background-color:' . $notification_button_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 4. Notification typo
if ( $notification_typo ) {
	$notification_typo_css = '';
	$notification_typo_css = OhioHelper::parse_acf_typo_to_css( $notification_typo );

	if ( $notification_typo_css ) {
		$_selector = [
			'.notification .alert'
		];
		$_css = $notification_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}

# 5. Notification link typo
if ( $notification_link_typo ) {
	$notification_link_typo_css = '';
	$notification_link_typo_css = OhioHelper::parse_acf_typo_to_css( $notification_link_typo );

	if ( $notification_link_typo_css ) {
		$_selector = [
			'.notification .alert a'
		];
		$_css = $notification_link_typo_css;
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	}
}
