<?php
	$have_woocomerce = function_exists( 'WC' );
	$have_woocomerce_wl = function_exists( 'YITH_WCWL' );
	$have_wpml = function_exists( 'icl_get_languages' );
	$search_position = OhioOptions::get( 'page_header_search_position', 'standard' );
	$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
	$cart_visibility = OhioOptions::get_global( 'woocommerce_cart_icon', true );
	$account_visibility = OhioOptions::get_global( 'woocommerce_account_icon', false );
	$account_custom_img = OhioOptions::get_global( 'woocommerce_account_custom_image', false );
	$header_style = OhioOptions::get_global( 'page_header_menu_style', 'style1' );
	$header_button = OhioOptions::get_global( 'custom_button_for_header', false );
?>

<?php if ( ( $have_wpml && $wpml_show_in_header ) || $have_woocomerce || $have_woocomerce_wl || $header_button || $search_position == "standard" ) : ?>

	<ul class="menu-optional -unlist">

		<?php if ( $wpml_show_in_header ) : ?>

			<li class="vc_hidden-xs vc_hidden-sm">
		        <?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
			</li>

		<?php endif; ?>

		<?php if ( $header_button ) : ?>

			<li>
				<?php get_template_part( 'parts/elements/menu_button' ); ?>
			</li>

		<?php endif; ?>

		<?php if ( $search_position == "standard" ) : ?>

			<li class="icon-button-holder">
				<?php get_template_part( 'parts/elements/search' ); ?>
			</li>

		<?php endif; ?>

		<?php if ( $have_woocomerce ) : ?>

			<?php if ( $account_visibility ) : ?>

				<li class="icon-button-holder">
		            <a class="icon-button account-global" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">

		            	<?php if ( $account_custom_img ) : ?>
							<img class="custom-icon" src="<?php echo esc_url( $account_custom_img ); ?>" alt="<?php esc_html_e( 'Cart image', 'ohio' ); ?>">
						<?php else: ?>
							<i class="icon">
						    	<svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 2.25C10.2375 2.25 11.25 3.2625 11.25 4.5C11.25 5.7375 10.2375 6.75 9 6.75C7.7625 6.75 6.75 5.7375 6.75 4.5C6.75 3.2625 7.7625 2.25 9 2.25ZM9 12.375C12.0375 12.375 15.525 13.8263 15.75 14.625V15.75H2.25V14.6363C2.475 13.8263 5.9625 12.375 9 12.375V12.375ZM9 0C6.51375 0 4.5 2.01375 4.5 4.5C4.5 6.98625 6.51375 9 9 9C11.4863 9 13.5 6.98625 13.5 4.5C13.5 2.01375 11.4863 0 9 0V0ZM9 10.125C5.99625 10.125 0 11.6325 0 14.625V18H18V14.625C18 11.6325 12.0038 10.125 9 10.125V10.125Z"></path></svg>
						    	<!--<svg class="minimal" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 9C10.1935 9 11.3381 8.52589 12.182 7.68198C13.0259 6.83807 13.5 5.69347 13.5 4.5C13.5 3.30653 13.0259 2.16193 12.182 1.31802C11.3381 0.474106 10.1935 0 9 0C7.80653 0 6.66193 0.474106 5.81802 1.31802C4.97411 2.16193 4.5 3.30653 4.5 4.5C4.5 5.69347 4.97411 6.83807 5.81802 7.68198C6.66193 8.52589 7.80653 9 9 9ZM12 4.5C12 5.29565 11.6839 6.05871 11.1213 6.62132C10.5587 7.18393 9.79565 7.5 9 7.5C8.20435 7.5 7.44129 7.18393 6.87868 6.62132C6.31607 6.05871 6 5.29565 6 4.5C6 3.70435 6.31607 2.94129 6.87868 2.37868C7.44129 1.81607 8.20435 1.5 9 1.5C9.79565 1.5 10.5587 1.81607 11.1213 2.37868C11.6839 2.94129 12 3.70435 12 4.5ZM18 16.5C18 18 16.5 18 16.5 18H1.5C1.5 18 0 18 0 16.5C0 15 1.5 10.5 9 10.5C16.5 10.5 18 15 18 16.5ZM16.5 16.494C16.4985 16.125 16.269 15.015 15.252 13.998C14.274 13.02 12.4335 12 9 12C5.565 12 3.726 13.02 2.748 13.998C1.731 15.015 1.503 16.125 1.5 16.494H16.5Z"></path></svg>-->
						    </i>
						<?php endif; ?>

					</a>
				</li>

			<?php endif; ?>

			<?php if ( $cart_visibility ) : ?>

				<?php if ( $have_woocomerce_wl ) : ?>

					<li class="icon-button-holder">
						<a class="icon-button favorites-global wishlist" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url('user' . '/' . get_current_user_id()) ); ?>">
						    <i class="icon">
						    	<svg class="default" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.5 0C12.76 0 11.09 0.794551 10 2.05014C8.91 0.794551 7.24 0 5.5 0C2.42 0 0 2.37384 0 5.3951C0 9.103 3.4 12.1243 8.55 16.715L10 18L11.45 16.7052C16.6 12.1243 20 9.103 20 5.3951C20 2.37384 17.58 0 14.5 0ZM10.1 15.2534L10 15.3515L9.9 15.2534C5.14 11.0256 2 8.22997 2 5.3951C2 3.43324 3.5 1.96185 5.5 1.96185C7.04 1.96185 8.54 2.93297 9.07 4.27684H10.94C11.46 2.93297 12.96 1.96185 14.5 1.96185C16.5 1.96185 18 3.43324 18 5.3951C18 8.22997 14.86 11.0256 10.1 15.2534Z"></path></svg>
						    </i>
						</a>
					</li>

				<?php endif; ?>

				<li class="icon-button-holder">
					<?php get_template_part( 'parts/elements/menu_cart' ); ?>
				</li>

			<?php endif; ?>

		<?php endif; ?>

	</ul>

<?php endif; ?>