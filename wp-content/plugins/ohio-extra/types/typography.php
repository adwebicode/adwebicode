<?php

	/**
	* Visual Composer Ohio Typography custom type
	*/
	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_typography', 'ohio_extra_typography_settings_field', plugins_url( 'typography.js' , __FILE__ ) );
	}

	function ohio_extra_typography_settings_field( $settings, $value ) {
		$value = json_decode( str_replace( '``', '"', $value ) );

		$fonts_type = OhioOptions::get_global( 'page_font_type', 'google_fonts' );
		switch ( $fonts_type ) {
			case 'adobe_fonts':
				include OHIO_EXTRA_DIR_PATH . 'acf_ext/af_list.php';
				$fonts = $ohio_gf_object;
				break;
			case 'manual_custom_fonts':
				include OHIO_EXTRA_DIR_PATH . 'acf_ext/cf_list.php';
				$fonts = $ohio_gf_object;
				break;
			case 'google_fonts':
			default:
				include OHIO_EXTRA_DIR_PATH . 'acf_ext/gf_list.php';
				$fonts = $ohio_gf_object;
				break;
		}

		$uniq = uniqid( 'ohio_vc_check_' );
		ob_start();

?>
		<div class="ohio_extra_typography_block">
			<input type="hidden" name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value" value="<?php echo esc_attr( json_encode( $value ) ); ?>">
			<div class="row">
				<div class="vc_col-lg-3 column">
					<label>
						<div class="title">
                            <?php esc_html_e( 'Font size', 'ohio-extra' ); ?>
                            <div class="devices-select device-desktop">
                                <ul class="devices">
                                    <li class="device-desktop">
                                        <i class="fas fa-desktop"></i>
                                        <?php _e( 'Desktop', 'ohio-extra' ); ?>
                                    </li>
                                    <li class="device-tablet">
                                        <i class="fas fa-tablet-alt"></i>
                                        <?php _e( 'Tablet', 'ohio-extra' ); ?>
                                    </li>
                                    <li class="device-mobile">
                                        <i class="fas fa-mobile-alt"></i>
                                        <?php _e( 'Mobile', 'ohio-extra' ); ?>
                                    </li>
                                </ul>
                            </div>
                            <span class="tip">CSS units</span> <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank" class="typography_css_unit_tip"><i title="Use CSS unit value." class="far fa-question-circle"></i></a>
                        </div>
                        <div class="input-pixeles-wrap">
                            <input type="text" data-target="font-size" value="<?php echo esc_attr( $value->font_size ?? '' ); ?>">
                            <input type="text" style="display: none;" data-target="font-size-tablet" value="<?php echo esc_attr( $value->font_size_tablet ?? '' ); ?>">
                            <input type="text" style="display: none;" data-target="font-size-mobile" value="<?php echo esc_attr( $value->font_size_mobile ?? '' ); ?>">
                        </div>
					</label>
				</div>
				<div class="vc_col-lg-3 column">
					<label>
						<div class="title"><?php esc_html_e( 'Font style', 'ohio-extra' ); ?></div>
						<div class="input-pixeles-wrap">
							<?php $_style = $value->style ?? false; ?>
							<select data-target="font-style">
								<option value="inherit">inherit</option>
								<option value="normal"<?php if ( $_style == 'normal' ) echo ' selected'; ?>>normal</option>
								<option value="uppercase"<?php if ( $_style == 'uppercase' ) echo ' selected'; ?>>uppercase</option>
								<option value="italic"<?php if ( $_style == 'italic' ) echo ' selected'; ?>>italic</option>
								<option value="underline"<?php if ( $_style == 'underline' ) echo ' selected'; ?>>underline</option>
							</select>
						</div>
					</label>
				</div>
				<div class="vc_col-lg-3 column">
					<label>
						<div class="title">
                            <?php esc_html_e( 'Letter spacing', 'ohio-extra' ); ?>
                            <div class="devices-select device-desktop">
                                <ul class="devices">
                                    <li class="device-desktop">
                                        <i class="fas fa-desktop"></i>
                                        <?php _e( 'Desktop', 'ohio-extra' ); ?>
                                    </li>
                                    <li class="device-tablet">
                                        <i class="fas fa-tablet-alt"></i>
                                        <?php _e( 'Tablet', 'ohio-extra' ); ?>
                                    </li>
                                    <li class="device-mobile">
                                        <i class="fas fa-mobile-alt"></i>
                                        <?php _e( 'Mobile', 'ohio-extra' ); ?>
                                    </li>
                                </ul>
                            </div>
                            <span class="tip">CSS units</span> <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank" class="typography_css_unit_tip"><i title="Use CSS unit value." class="far fa-question-circle"></i></a>
                        </div>
                        <div class="input-pixeles-wrap">
                            <input type="text" data-target="letter-spacing" value="<?php echo esc_attr( $value->letter_spacing ?? '' ); ?>">
                            <input type="text" style="display: none;" data-target="letter-spacing-tablet" value="<?php echo esc_attr( $value->letter_spacing_tablet ?? '' ); ?>">
                            <input type="text" style="display: none;" data-target="letter-spacing-mobile" value="<?php echo esc_attr( $value->letter_spacing_mobile ?? '' ); ?>">
                        </div>
					</label>
				</div>
				<div class="vc_col-lg-3 column">
					<label>
						<div class="title"><?php esc_html_e( 'Color', 'ohio-extra' ); ?></div>
						<div class="input-pixeles-wrap">
							<input type="text" data-target="color" value="<?php echo esc_attr( $value->color ?? '' ); ?>">
						</div>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="vc_col-lg-3 column">
					<label>
						<div class="title">
                            <?php esc_html_e( 'Line height', 'ohio-extra' ); ?>
                            <div class="devices-select device-desktop">
                                <ul class="devices">
                                    <li class="device-desktop">
                                        <i class="fas fa-desktop"></i>
                                        <?php _e( 'Desktop', 'ohio-extra' ); ?>
                                    </li>
                                    <li class="device-tablet">
                                        <i class="fas fa-tablet-alt"></i>
                                        <?php _e( 'Tablet', 'ohio-extra' ); ?>
                                    </li>
                                    <li class="device-mobile">
                                        <i class="fas fa-mobile-alt"></i>
                                        <?php _e( 'Mobile', 'ohio-extra' ); ?>
                                    </li>
                                </ul>
                            </div>
                            <span class="tip">CSS units</span> <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank" class="typography_css_unit_tip"><i title="Use CSS unit value." class="far fa-question-circle"></i></a>
                        </div>
                        <div class="input-pixeles-wrap">
                            <input type="text" data-target="line-height" value="<?php echo esc_attr( $value->line_height ?? '' ); ?>">
                            <input type="text" style="display: none;" data-target="line-height-tablet" value="<?php echo esc_attr( $value->line_height ?? '' ); ?>">
                            <input type="text" style="display: none;" data-target="line-height-mobile" value="<?php echo esc_attr( $value->line_height ?? '' ); ?>">
                        </div>
					</label>
				</div>
				<div class="vc_col-lg-3 column">
					<label>
						<div class="title"><?php esc_html_e( 'Font weight', 'ohio-extra' ); ?></div>
						<div class="input-pixeles-wrap">
							<?php $_weight = $value->weight ?? false; ?>
							<select data-target="weight">
								<option value="inherit">inherit</option>
								<option value="100"<?php if ( $_weight == 100 ) echo ' selected'; ?>>100</option>
								<option value="200"<?php if ( $_weight == 200 ) echo ' selected'; ?>>200 light</option>
								<option value="300"<?php if ( $_weight == 300 ) echo ' selected'; ?>>300</option>
								<option value="400"<?php if ( $_weight == 400 ) echo ' selected'; ?>>400 regular</option>
								<option value="500"<?php if ( $_weight == 500 ) echo ' selected'; ?>>500</option>
								<option value="600"<?php if ( $_weight == 600 ) echo ' selected'; ?>>600</option>
								<option value="700"<?php if ( $_weight == 700 ) echo ' selected'; ?>>700 bold</option>
								<option value="800"<?php if ( $_weight == 800 ) echo ' selected'; ?>>800</option>
								<option value="900"<?php if ( $_weight == 900 ) echo ' selected'; ?>>900 extra-bold</option>
							</select>
						</div>
					</label>
				</div>
				<div class="vc_col-lg-3 column">
					<div class="title"><?php esc_html_e( 'Font family', 'ohio-extra' ); ?></div>
					<div class="input-styles-wrap">
						<span class="cbrio_custom_check">
							<input id="<?php echo $uniq . 'c'; ?>" type="checkbox" data-target="use-custom-font"<?php if ( $value->use_custom_font ?? false ) echo ' checked="checked"'; ?>> 
							<label for="<?php echo $uniq . 'c'; ?>" class="cbrio_custom_check"><?php _e( 'Custom font', 'ohio-extra' ); ?></label>
						</span>
					</div>
				</div>
				<div class="vc_col-lg-3 column custom-font-panel"<?php if ( !( $value->use_custom_font ?? false ) ) echo 'style="display: none;"';?>>
					<div class="title">
						<?php
							if ( $fonts_type == 'google_fonts' ) {
								esc_html_e( 'Google Fonts', 'ohio-extra' );
							} elseif ( $fonts_type == 'adobe_fonts' ) {
								esc_html_e( 'Adobe Fonts', 'ohio-extra' );
							} elseif ( $fonts_type == 'manual_custom_fonts' ) {
								esc_html_e( 'Custom Fonts', 'ohio-extra' );
							}
						?>
					</div>
					<div class="input-fonts-wrap">
                        <select data-target="custom-font">
                            <?php if ($fonts_type == 'google_fonts') { ?>
                                <optgroup label="Recommended for headings">
                                    <option value="DM Sans:400,700"><?php esc_html_e( 'DM Sans', 'ohio-extra' ); ?></option>
                                    <option value="Space Grotesk:400,700"><?php esc_html_e( 'Space Grotesk', 'ohio-extra' ); ?></option>
                                    <option value="Playfair Display:400,400i,700,700i,900,900i"><?php esc_html_e( 'Playfair Display', 'ohio-extra' ); ?></option>
                                </optgroup>
                                <optgroup label="Recommended for paragraphs">
                                    <option value="Open Sans:300,300i,400,400i,700,700i"><?php esc_html_e( 'Open Sans', 'ohio-extra' ); ?></option>
                                    <option value="Roboto:300,300i,400,400i,500,500i,700,700i,900,900i"><?php esc_html_e( 'Roboto', 'ohio-extra' ); ?></option>
                                    <option value="Rubik:300,300i,400,400i,500,500i,700,700i,900,900i"><?php esc_html_e( 'Rubik', 'ohio-extra' ); ?></option>
                                </optgroup>
                                <option disabled>&mdash;&mdash;&mdash;</option>
                            <?php } ?>
                            <?php foreach ( $fonts->items as $font_object ) { ?>
                                <?php
                                    $_value = $font_object->family . ':' .implode( ',', $font_object->variants );
                                ?>
                                <option value="<?php echo $_value; ?>"<?php if ( $_value == ( $value->custom_font ?? false) ) echo 'selected="selected"'?>>
                                    <?php echo ucfirst( $font_object->family ); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
					<?php if ( $fonts_type == 'google_fonts' ) { ?>
                        <div class="tip"><?php echo sprintf( __( 'Visit %s', 'ohio-extra'), '<a href="https://fonts.google.com/" target="_blank">fonts.google.com</a>' ); ?></div>
                    <?php } ?>
				</div>
			</div>
		</div>
<?php

		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}