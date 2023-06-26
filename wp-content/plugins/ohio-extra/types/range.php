<?php

	/**
	* Visual Composer Ohio Range custom type
	*/
	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_range', 'ohio_range_settings_field', plugins_url( 'range.js', __FILE__ ) );
	}
	
	function ohio_range_settings_field( $settings, $value ) {
		ob_start();
		$min = empty($settings['range']['min']) ? 0 : $settings['range']['min'];
		$max = empty($settings['range']['max']) ? 100 : $settings['range']['max'];
		$step = empty($settings['range']['step']) ? 1 : $settings['range']['step'];
	?>
	
	<div class="ohio_extra_range_block">
		<input type="hidden" name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value" value="<?php echo esc_attr( $value ); ?>">
		<input type="range" name="input" min="<?php echo $min; ?>" max="<?php echo $max; ?>" step="<?php echo $step; ?>" value="<?php echo esc_attr( $value ); ?>">
        <input type="number" name="input" min="<?php echo $min; ?>" max="<?php echo $max; ?>" step="<?php echo $step; ?>" value="<?php echo esc_attr( $value ); ?>">
	</div>
<?php

		return ob_get_clean();
	}