<?php
/**
 * Ohio WordPress Theme
 *
 * Scroll to the top template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$show_scroll = OhioOptions::get( 'page_show_arrow', true );
$show_scroll_tablet = OhioOptions::get( 'page_show_arrow_tablet', false );

$visibility_classes = '';

if ( !$show_scroll ) {
	$visibility_classes .= ' vc_hidden-lg';
}
if ( !$show_scroll_tablet ) {
	$visibility_classes .= ' vc_hidden-md';
}

?>

<a class="scroll-top dynamic-typo -undash -small-t<?php echo esc_attr( $visibility_classes ); ?>">
	<div class="scroll-top-bar">
		<div class="scroll-track"></div>
	</div>
	<div class="scroll-top-holder titles-typo title">
		<?php esc_html_e( 'Scroll to top', 'ohio' ); ?>
	</div>
</a>