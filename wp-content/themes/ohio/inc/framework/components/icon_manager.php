<?php

class OhioIconManager {

	private const ICON_NAME_TO_ICON_DIR = [
		'fontawesome' => 'fa',
		'ionicons' => 'ionicons',
		'bootstrap' => 'bootstrap',
		'linea-arrows' => 'linea/arrows',
		'linea-basic' => 'linea/basic',
		'linea-basic-elaboration' => 'linea/basic_ela',
		'linea-ecommerce' => 'linea/ecommerce',
		'linea-music' => 'linea/music',
		'linea-software' => 'linea/software',
		'linea-weather' => 'linea/weather',
	];

	private const LINEA_ICONS = [
		'linea-arrows',
		'linea-basic',
		'linea-basic-elaboration',
		'linea-ecommerce',
		'linea-music',
		'linea-software',
		'linea-weather',
	];

	/*
	* Parse icon classes to get icon font name
	*/
	private static function get_icon_font_name_from_class( $icon_class ) {
		$name = false;

		if ( strpos( $icon_class, 'fa fab fa-' ) === 0 ) {
			$name = 'fontawesome';
		} elseif ( strpos( $icon_class, 'bi bi-' ) === 0 ) {
			$name = 'bootstrap';
		} elseif ( strpos( $icon_class, 'ion ion-' ) === 0 ) {
			$name = 'ionicons';
		} elseif ( strpos( $icon_class, 'linea-basic-elaboration' ) === 0 ) {
			$name = 'linea-basic-elaboration';
		} elseif ( strpos( $icon_class, 'linea-' ) === 0 ) {
			preg_match( '/^(linea\-[a-z]+)/i', $icon_class, $matches );
			$name = $matches[1];
		} else {
			preg_match( '/^(.{8}[a-z]+)\-/i', $icon_class, $matches );
			$name = $matches[1];
		}

		return $name;
	}

	/*
	* Insert icon link-tag with font style by key value
	*/
	static function get_icon_font_url( $icon_font_name ) {
		if ( !isset( self::ICON_NAME_TO_ICON_DIR[$icon_font_name] ) ) return false;

		$icon_font_dir = self::ICON_NAME_TO_ICON_DIR[$icon_font_name];
		if ( $icon_font_dir ) {
			$directory = get_template_directory() . '/assets/fonts/' . $icon_font_dir . '/css/';
			if ( file_exists( $directory ) ) {
				$files = scandir( $directory );
				foreach ( $files as $file ) {
					if ( strpos( $file, '.css' ) !== false ) {
						return get_template_directory_uri() . '/assets/fonts/' . $icon_font_dir . '/css/' . $file;
					}
				}
			}
		}
	}

	/*
	* Returns array of icon fonts used on the page by Ohio Extra shortcodes
	*/
	static function get_page_shortcodes_icon_fonts() {
		$used_icon_classes = $GLOBALS['ohio_icon_fonts'];
		$icon_fonts = array_map( 'OhioIconManager::get_icon_font_name_from_class', $used_icon_classes );
		$icon_fonts = array_unique( $icon_fonts );
		return $icon_fonts;
	}

	/*
	* Returns array of icon fonts which are set to be always loaded in Theme Settings
	*/
	static function get_force_loaded_icon_fonts() {
		$settings = array(
			'fontawesome' => OhioOptions::get( 'page_icon_preloading_fontawesome', true ),
			'ionicons' => OhioOptions::get( 'page_icon_preloading_ionicons', false ),
			'bootstrap' => OhioOptions::get( 'page_icon_preloading_bootstrap', false ),
			'linea' => OhioOptions::get( 'page_icon_preloading_linea', false ),
		);

		$icon_fonts = array();
		foreach ( $settings as $key => $value ) {
			if ( $value ) {
				if ( $key === 'linea' ) {
					$icon_fonts = array_merge( $icon_fonts, self::LINEA_ICONS );
					continue;
				}
				$icon_fonts[] = $key;
			}
		}
		return $icon_fonts;
	}

	/*
	* Returns array of required icon uris where key is icon font name and value is icon font uri
	*/
	static function get_page_shortcodes_icon_font_urls() {
		$icon_fonts = self::get_page_shortcodes_icon_fonts();
		$icon_font_uris = array();

		foreach( $icon_fonts as $name ) {
			$uri = self::get_icon_font_url( $name );
			if ( $name ) {
				$icon_font_uris[$name] = $uri;
			}
		}
		return $icon_font_uris;
	}

	/*
	* Returns array of forced icon uris where key is icon font name and value is icon font uri
	*/
	static function get_force_loaded_icon_font_urls() {
		$icon_fonts = self::get_force_loaded_icon_fonts();
		$icon_font_uris = array();

		foreach( $icon_fonts as $name ) {
			$uri = self::get_icon_font_url( $name );
			if ( $name ) {
				$icon_font_uris[$name] = $uri;
			}
		}
		return $icon_font_uris;
	}
}
