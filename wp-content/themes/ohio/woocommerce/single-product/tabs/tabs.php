<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */

$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce single-product-tabs">
		<div class="tabs page-container" data-ohio-tabs="true" data-options="[]">
			<ul class="tabs-nav -unlist titles-typo title" role="tablist">
				<li class="tabs-nav-line"></li>
				<?php
	                $i = 0;
	                foreach ( $tabs as $key => $tab ) : ?>
	                    <li class="tabs-nav-link <?php echo esc_attr($i == 0 ? ' active' : '' )?>" data-ohio-tab="<?php echo esc_attr( $key ) ?>">
	                        <div class="title titles-typo"<?php if ( $tab['callback'] == 'comments_template' ) { echo ' id="accordion-reviews"'; } ?>>
	                            <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ); ?>
	                        </div>
	                    </li>
	                <?php
	                $i++;
	                endforeach; ?>
			</ul>
			<div class="tabs-content" role="tabpanel">
				<?php
				$i = 0;
				foreach ( $tabs as $key => $tab ) : ?>
					<div class="tabs-content-item<?php echo esc_attr($i == 0 ? ' active' : '') ?>" data-ohio-tab-content="<?php echo esc_attr( $key )?>">
						<div class="wrap">
							<?php call_user_func( $tab['callback'], $key, $tab ); ?>
						</div>
					</div>
				<?php
				$i++;
				endforeach; ?>
			</div>
		</div>
	</div>

<?php endif; ?>