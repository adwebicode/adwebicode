<?php

/**
* WPBakery Page Builder Ohio Instagram Feed shortcode params
*/

vc_lean_map( 'ohio_instagram_feed', 'ohio_instagram_feed_sc_map' );

function ohio_instagram_feed_sc_map() {
	return array(
		'name' => __( 'Instagram Feed', 'ohio-extra' ),
		'description' => __( 'Instagram feed module', 'ohio-extra' ),
		'base' => 'ohio_instagram_feed',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/instagram_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'text',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Usage note', 'ohio-extra' ),
				'param_name' => 'photo_count',
				'description' => __( 'Ensure that <a target="_blank" href="/wp-admin/plugins.php">Instagram Feed</a> plugin is installed. Then <a target="_blank" href="/wp-admin/admin.php?page=sbi-feed-builder">connect and adjust</a> your feed using the plugin\'s settings.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Feed ID number (1 by default)', 'ohio-extra' ),
				'param_name' => 'feed_id',
				'description' => __( 'To use several Instagram feeds you need to specify a unique feed ID.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Remove columns gap?', 'ohio-extra' ),
				'param_name' => 'columns_gap',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'columns_gap',
					'value' => array(
						'0'
					)
				),
			),

			// Design Options.
            array(
                'type' => 'css_editor',
                'heading' => __( 'CSS', 'ohio-extra' ),
                'param_name' => 'content_styles',
                'group' => __( 'Design Options', 'ohio-extra' ),
            ),
            array(
                'type' => 'ohio_divider',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'param_name' => 'other_settings_title',
                'value' => __( 'Other', 'ohio-extra' ),
            ),
            array(
                'type' => 'textfield',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'heading' => __( 'Custom CSS class', 'ohio-extra' ),
                'param_name' => 'css_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ohio-extra' ),
            ),

			// Appear Effect.
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}