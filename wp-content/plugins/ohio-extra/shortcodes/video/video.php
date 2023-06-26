<?php 

/**
* WPBakery Page Builder Ohio Video shortcode
*/

add_shortcode( 'ohio_video', 'ohio_video_func' );

function ohio_video_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'boxed_shape' ) : 'boxed_shape';
	$button_layout = isset( $button_layout ) ? OhioExtraFilter::string( $button_layout, 'string', 'filled' ) : 'filled';
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'string', 'center' ) : 'center';
	$button_size = isset( $button_size ) ? OhioExtraFilter::string( $button_size, 'string', 'center' ) : 'center';
	$preview_image = isset( $preview_image ) ? OhioExtraFilter::string( $preview_image ) : false;
	$preview_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $preview_image ) );
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : true;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$link = isset( $link ) ? OhioExtraFilter::string( $link, 'string', '' ) : '';
	$title = isset( $title ) ? rawurldecode( base64_decode( $title ) ) : '';
	$title = OhioExtraFilter::string( $title, 'string', '' );
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$video_type = isset( $video_type ) ? OhioExtraFilter::string( $video_type, 'string', 'youtube' ) : 'youtube';
	$video_playback = isset( $start_option ) ? OhioExtraFilter::string( $start_option, 'string' ) : '';
	$video_playback = intval( str_replace( 's', '', $video_playback ) );
	$video_autoplay = isset( $autoplay_option ) ? OhioExtraFilter::boolean( $autoplay_option ) : false;
	$video_muted = isset( $muted_option ) ? OhioExtraFilter::boolean( $muted_option ) : false;
	$video_limit_related = isset ( $limit_related_videos_option ) ? OhioExtraFilter::boolean( $limit_related_videos_option ) : false;
	$video_controls = isset( $controls_option ) ? OhioExtraFilter::boolean( $controls_option ) : true;
	$video_title = isset( $title_option ) ? OhioExtraFilter::boolean( $title_option ) : true;
	$video_author = isset( $byline_option ) ? OhioExtraFilter::boolean( $byline_option ) : true;
	$button_anim = isset( $button_anim ) ? OhioExtraFilter::boolean( $button_anim ) : false;
	$button_color = isset( $button_color ) ? OhioExtraFilter::string( $button_color, 'string', false ) : false;
	$button_hover_color = isset( $button_hover_color ) ? OhioExtraFilter::string( $button_hover_color, 'string', false ) : false;
	$icon_color = isset( $icon_color ) ? OhioExtraFilter::string( $icon_color, 'string', false ) : false;
	$icon_hover_color = isset( $icon_hover_color ) ? OhioExtraFilter::string( $icon_hover_color, 'string', false ) : false;
	$url = parse_url( $link );

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

	$video_type_attrs = '';
	if ( $video_type == 'custom' ) {
		$video_type_attrs .= ' data-video-type=custom';
	}

	// Video data
	$video_params = '';
    if ( isset( $video_controls ) ) {
        $video_params .= 'controls=' . (int) $video_controls;
    }
    if ( $video_type == 'vimeo' ) {
        if ( $video_autoplay ) {
            $video_params .= '&muted=1&autoplay=1';
        } else {
            if ( isset( $video_muted ) ) {
                $video_params .= '&muted=' . (int) $video_muted;
            }
        }
        if ( isset( $video_title ) ) {
            $video_params .= '&title=' . (int) $video_title;
        }
        if ( isset( $video_author ) ) {
            $video_params .= '&byline=' . (int) $video_author;
        }
        if ( isset( $video_playback ) ) {
            $video_params .= '&#t=' . (int) $video_playback . 's';
        }
    }
    if ( $video_type == 'youtube' ) {
        if ( isset( $video_playback ) ) {
            $video_params .= '&start=' . (int) $video_playback;
        }
        if ( $video_autoplay ) {
            $video_params .= '&mute=1&autoplay=1';
        } else {
            if ( isset( $video_muted ) ) {
                $video_params .= '&mute=' . (int) $video_muted;
            }
        }
		if ( isset( $video_limit_related ) ) {
			$video_params .= '&rel=' . (int) !$video_limit_related;
		}
    }
	if ( $link ) {
		$animation_attrs .= ' data-video=' . esc_attr( $link ) . '?' . esc_attr( $video_params );
	}

	// Tilt effect
	$tilt_attrs = '';
	if ( !$tilt_effect ) {
		$tilt_attrs .= ' data-tilt=true data-tilt-perspective=6000';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$layout_classes = '';
	switch ( $button_layout ) {
		case 'outline':
			$layout_classes .= ' -outlined';
			break;
		case 'blurred':
			$layout_classes .= ' -blurred';
			break;
	}

	$content_classes = '';
	switch ( $alignment ) {
		case 'left':
			$content_classes .= ' -left-flex';
			break;
		case 'center':
			$content_classes .= ' -center-flex';
			break;
		case 'right':
			$content_classes .= ' -right-flex';
			break;
	}

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;

	if ( $button_anim ) {
		$wrapper_classes .= ' -animation';
	}

	if ( $layout == 'with_preview' ) {
		$wrapper_classes .= ' -with-preview';
	}

	// Video button sizes
	$size_classes = '';
	switch ( $button_size ) {
		case 'small':
			$size_classes .= ' -small';
			break;
		case 'large':
			$size_classes .= ' -large';
			break;
	}

	/**
	* Source types
	*/
	
	// YouTube
	if ( isset( $url['host'] ) ) {
		if ( $url['host'] == 'www.youtube.com' || $url['host'] == 'youtube.com' || $url['host'] == 'youtu.be' ) {
			if ( isset( $url['query'] ) ) {
				parse_str( $url['query'], $query );
			}

			if ( isset( $query['v'] ) && $query['v'] ) {
				$link = 'https://www.youtube.com/embed/' . $query['v'];
			}
		}

		// Vimeo
		if ( isset( $url['host'] ) && ( $url['host'] == 'www.vimeo.com' || $url['host'] == 'vimeo.com' ) ) {
			if ( isset( $url['path'] ) && $url['path'] ) {
				//if link isn`t playlist
				if ( !strpos( $link, 'vimeo.com/showcase' ) ) {
					$link = 'https://player.vimeo.com/video' . $url['path'];
				}
			}
		}
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$video_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $video_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .video-button-caption{';
		$_block_typo = $video_title_typo;
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

	if ( $button_layout == 'outline' ) {
		$button_color_css = OhioExtraParser::VC_color_to_CSS( $button_color, 'border-color:{{color}};' );
		$button_hover_color_css = OhioExtraParser::VC_color_to_CSS( $button_hover_color, 'border-color:{{color}};' );
	} else {
		$button_color_css = OhioExtraParser::VC_color_to_CSS( $button_color, 'background-color:{{color}};' );
		$button_hover_color_css = OhioExtraParser::VC_color_to_CSS( $button_hover_color, 'background-color:{{color}};' );
	}

	$button_color_css = OhioExtraParser::VC_color_to_CSS( $button_color_css, '{{color}}' );
	if ( $button_color_css ) {
		$_style_block .= '#' . $wrapper_id . '.video-button .icon-button{';
		$_style_block .= $button_color_css;
		$_style_block .= '}';
	}

	$button_hover_color_css = OhioExtraParser::VC_color_to_CSS( $button_hover_color_css, '{{color}}' );
	if ( $button_hover_color_css ) {
		$_style_block .= '#' . $wrapper_id . '.video-button .icon-button:hover{';
		$_style_block .= $button_hover_color_css;
		$_style_block .= '}';
	}

	$icon_color = OhioExtraParser::VC_color_to_CSS( $icon_color, '{{color}}' );
	if ( $icon_color ) {
		$_style_block .= '#' . $wrapper_id . ' .icon-button .icon{';
		$_style_block .= 'color:' . $icon_color . ';';
		$_style_block .= '}';
	}

	$icon_hover_color = OhioExtraParser::VC_color_to_CSS( $icon_hover_color, '{{color}}' );
	if ( $icon_hover_color ) {
		$_style_block .= '#' . $wrapper_id . ' .icon-button:hover .icon{';
		$_style_block .= 'color:' . $icon_hover_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-with-preview .preview-image{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.video-button.-with-shadow:not(.-with-preview) .icon-button,';
		$_style_block .= '#' . $wrapper_id . '.video-button.-with-shadow.-with-preview .preview-image{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'video__view.php' );
	return ob_get_clean();
}