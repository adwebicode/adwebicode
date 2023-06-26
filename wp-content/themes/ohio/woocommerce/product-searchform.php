<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$action = get_permalink( wc_get_page_id('shop') );
$current_term = 0;
if (is_tax('product_cat')) {
    $current_term = get_queried_object_id();
    $action = get_term_link($current_term, 'product_cat');
}
?>

<form role="search" method="get" class="search search-woocommerce woocommerce-product-search" action="<?php echo esc_url($action) ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for', 'ohio' ) . ':'; ?></span>
		<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search...', 'ohio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

		<?php
		$names = get_terms('product_cat', 'fields=id=>name');
		?>
	</label>
	<select name="search_term">
		<option value=""><?php esc_html_e( 'Category', 'ohio' ); ?></option>
		<?php foreach ($names as $id => $name) { ?>
			<option value="<?php echo esc_attr( $id ) ?>"<?php echo selected($id, $current_term) ?>><?php echo esc_attr( $name ) ?></option>
		<?php } ?>
	</select>
	<button class="button -text search search-submit <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?>" aria-label="search">
        <i class="icon -right">
        	<svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0515 11.3208H12.8645L18 16.4666L16.4666 18L11.3208 12.8645V12.0515L11.0429 11.7633C9.86964 12.7719 8.34648 13.3791 6.68954 13.3791C2.99485 13.3791 0 10.3842 0 6.68954C0 2.99485 2.99485 0 6.68954 0C10.3842 0 13.3791 2.99485 13.3791 6.68954C13.3791 8.34648 12.7719 9.86964 11.7633 11.0429L12.0515 11.3208ZM2.05832 6.68954C2.05832 9.25214 4.12693 11.3208 6.68954 11.3208C9.25214 11.3208 11.3208 9.25214 11.3208 6.68954C11.3208 4.12693 9.25214 2.05832 6.68954 2.05832C4.12693 2.05832 2.05832 4.12693 2.05832 6.68954Z"></path></svg>
        	<svg class="minimal" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.875 1.75C4.93997 1.75 1.75 4.93997 1.75 8.875C1.75 12.81 4.93997 16 8.875 16C12.81 16 16 12.81 16 8.875C16 4.93997 12.81 1.75 8.875 1.75ZM0.25 8.875C0.25 4.11154 4.11154 0.25 8.875 0.25C13.6385 0.25 17.5 4.11154 17.5 8.875C17.5 13.6385 13.6385 17.5 8.875 17.5C4.11154 17.5 0.25 13.6385 0.25 8.875Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.9125 13.9133C14.2054 13.6204 14.6803 13.6204 14.9732 13.9133L19.5295 18.4696C19.8224 18.7625 19.8224 19.2373 19.5295 19.5302C19.2366 19.8231 18.7617 19.8231 18.4688 19.5302L13.9125 14.9739C13.6196 14.681 13.6196 14.2062 13.9125 13.9133Z"></path>
        	</svg>
        </i>
	</button>
	<input type="hidden" name="post_type" value="product" />
</form>
<div class="search-results"></div>