<?php
class OhioLayout {

	/* Footer buffer content data */
	static private $footer_buffer_content = array();

	/* Custom CSS buffer content data */
	static private $dynamic_css_buffer_code = array();
	static private $dynamic_desktop_css_buffer_code = array();
	static private $dynamic_tablet_css_buffer_code = array();
	static private $dynamic_mobile_css_buffer_code = array();
	static private $dynamic_extrasmall_css_buffer_code = array();
	static private $dynamic_retina_css_buffer_code = array();
	static private $dynamic_shortcodes_css_buffer_code = array();

	/* Append content to footer buffer data */
	static function append_to_footer_buffer_content( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		self::$footer_buffer_content[] = $append_string;
		return true;
	}

	/* Show or return footer buffer content data */
	static function get_footer_buffer_content( $print = false ) {
		if ( $print ) {
			echo implode( "\n\n", self::$footer_buffer_content );
			return true;
		} else {
			return implode( "\n\n", self::$footer_buffer_content );
		}
	}

	/* Append dynamic CSS to buffer code */
	static function append_to_dynamic_css_buffer( $append_string = '', $type = false ) {
		$append_string = trim( @strval( $append_string ) );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		switch ( $type ) {
			case 'desktop':
				self::$dynamic_desktop_css_buffer_code[] = $new_append_string;
				break;
			case 'tablet':
				self::$dynamic_tablet_css_buffer_code[] = $new_append_string;
				break;
			case 'mobile':
				self::$dynamic_mobile_css_buffer_code[] = $new_append_string;
				break;
			case 'extrasmall':
				self::$dynamic_extrasmall_css_buffer_code[] = $new_append_string;
				break;
			default:
				self::$dynamic_css_buffer_code[] = $new_append_string;
		}
		return true;
	}

	/* Append dynamic CSS for retina to buffer code */
	static function append_to_dynamic_retina_css_buffer( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		self::$dynamic_retina_css_buffer_code[] = preg_replace( '/\s+/', '', $new_append_string );
		return true;
	}

	/* Shortcodes dynamic CSS to buffer code */
	static function append_to_shortcodes_css_buffer( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		self::$dynamic_shortcodes_css_buffer_code[] = $new_append_string;
		return true;
	}

	/* Show or return dynamic CSS code */
	static function get_dynamic_css_buffer( $print = false ) {
		$dynamic_css_buffer = implode( '', self::$dynamic_css_buffer_code );

		if ( self::$dynamic_desktop_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (min-width: 1181px){' . (implode( '', self::$dynamic_desktop_css_buffer_code )) . '}';
		}
		if ( self::$dynamic_tablet_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (min-width: 769px) and (max-width: 1180px){' . implode( '', self::$dynamic_tablet_css_buffer_code ) . '}';
		}
		if ( self::$dynamic_mobile_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (max-width: 768px){' . implode( '', self::$dynamic_mobile_css_buffer_code ) . '}';
		}

		if ( $print ) {
			echo esc_html($dynamic_css_buffer);
			return true;
		} else {
			return $dynamic_css_buffer;
		}
	}

	/* Show or return dynamic retina CSS code */
	static function get_dynamic_retina_css_buffer( $print = false ) {
		if ( $print ) {
			echo implode( '', self::$dynamic_retina_css_buffer_code );
			return true;
		} else {
			return implode( '', self::$dynamic_retina_css_buffer_code );
		}
	}

	/* Show or return dynamic CSS code */
	static function get_shortcodes_css_buffer( $print = false ) {
		if ( $print ) {
			echo implode( '', self::$dynamic_shortcodes_css_buffer_code );
			return true;
		} else {
			return implode( '', self::$dynamic_shortcodes_css_buffer_code );
		}
	}

	static function show_shortcodes_inline_css() {
		$shortcodes_css = OhioLayout::get_shortcodes_css_buffer(false);

		if ( $shortcodes_css ) {
			echo '<style type="text/css">';
			echo $shortcodes_css;
			echo '</style>';
		}
	}

	static function the_paginator_layout( $current_page, $all_pages, $align = 'left', $type = 'default', $size = 'medium' ) {
		$current_page = (int) $current_page;
		$all_pages = (int) $all_pages;
		if ( $current_page < 1 ) {
			$current_page = 1;
		}
		if ( $current_page > $all_pages ) {
			$current_page = $all_pages;
		}

		$_range = array();
		if ( $all_pages > 5 ) {
			// first item
			$_range[] = 1;
			// border ranges
			if ( $current_page <= 4 ) {
				$_range[] = 2;
				$_range[] = 3;
			}
			if ( $current_page >= $all_pages - 3 ) {
				$_range[] = $all_pages - 2;
				$_range[] = $all_pages - 1;
			}
			// inner ranges
			$_range[] = $current_page;
			if ( $current_page > 1 ) {
				$_range[] = $current_page - 1;
			}
			if ( $current_page < $all_pages ) {
				$_range[] = $current_page + 1;
			}
			// first item
			$_range[] = $all_pages;

			sort( $_range );
			$new_range = array_values( array_unique( $_range ) );
			$ranges = array();
			foreach ($new_range as $_range_key => $_range_value) {
				$ranges[] = $_range_value;
				if ( $_range_key < count( $new_range ) - 1 && $_range_value + 1 != $new_range[ $_range_key + 1 ] ) {
					$ranges[] = '...';
				}
			}
		} else { // fast variant
			for ($i=1; $i <= $all_pages; $i++) {
				$ranges[] = $i;
			}
		}

		$additional_classes = [];
		if ( in_array( $align, [ 'center', 'right' ], true ) ) {
			$additional_classes[] = '-' . $align . '-flex';
		}
		if ( in_array( $type, [ 'outlined', 'flat' ], true ) ) {
			$additional_classes[] = '-' . $type;
		}
		if ( in_array( $size, [ 'large', 'small' ], true ) ) {
			$additional_classes[] = '-' . $size;
		}

		$layout = '<ul class="pagination ' . implode( ' ', $additional_classes ) . ' -unlist">';
		// prev button layout
		if ( $current_page > 1 ) {
			$layout .= '<li class="page-item"><a href="' . esc_url( get_pagenum_link( $current_page - 1 ) ) . '" class="page-link button -unlink -pagination -flat">';
			$layout .= '<i class="icon">
					    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg><svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
					    </i>';
			$layout .= '</a></li>';
		}
		// button layout
		if ( isset( $ranges ) ) {
			foreach ($ranges as $value) {
				if ( $value == '...' ) {
					$layout .= '<li class="page-item"><span class="page-link button -flat">...</span></li>';
				} else {
					$layout .= '<li class="page-item"><a href="' . esc_url( get_pagenum_link( $value ) ) . '" class="page-link button -unlink -pagination' . ( ( $current_page == $value ) ? '' : ' -flat' ) . '">' . esc_html( $value ) . '</a></li>';
				}
			}
		}
		// next button layout
		if ( $current_page < $all_pages ) {
			$layout .= '<li class="page-item"><a href="' . esc_url( get_pagenum_link( $current_page + 1 ) ) . '" class="page-link button -unlink -pagination -flat">';
			$layout .= '<i class="icon">
					    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg><svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
					    </i>';
			$layout .= '</a></li>';
		}

		$layout .= '</ul>';
		echo $layout;
	}
}
