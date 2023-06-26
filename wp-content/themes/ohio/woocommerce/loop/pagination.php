<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$total = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );

if ( $total <= 1 ) {
	return;
}

// Pagination
$pagination_type = OhioOptions::get( 'pagination_type', 'standard' );
$pagination_style = OhioOptions::get( 'pagination_style', 'default' );
$pagination_position = OhioOptions::get( 'pagination_position', 'left' );
$pagination_size = OhioOptions::get( 'pagination_size', 'medium' );
?>
<nav class="pagination text-<?php echo esc_attr( $pagination_position ); ?>">
	<?php OhioHelper::show_pagination( $pagination_type, $total, $current, $pagination_position, $pagination_style, $pagination_size, 'products' ); ?>
</nav>
