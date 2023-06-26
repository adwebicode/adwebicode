<?php
	$show_sum = OhioOptions::get( 'page_header_cart_sum_visibility', true );
	$empty_cart_visibility = OhioOptions::get_global( 'woocommerce_cart_icon_empty_visibility', true );
	$cart_custom_img = OhioOptions::get_global( 'woocommerce_cart_custom_image', false );
?>

<div class="cart-button <?php if ( WC()->cart->is_empty() && $empty_cart_visibility == false ) { echo '-hidden'; } ?>">

	<?php if ( $show_sum ) : ?>
		<span class="cart-button-total">
			<a class="cart-customlocation -unlink" href="<?php echo wc_get_cart_url(); ?>"><?php echo WC()->cart->get_total(); ?></a>
		</span>
	<?php endif; ?>

	<span class="holder">
		<button class="icon-button cart" aria-label="cart">

			<?php if ( $cart_custom_img ) : ?>
				<img class="custom-icon" src="<?php echo esc_url( $cart_custom_img ); ?>" alt="<?php esc_html_e( 'Cart image', 'ohio' ); ?>">
			<?php else: ?>
				<i class="icon">
			    	<svg class="default" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 12 16" xml:space="preserve"><path class="st0" d="M9,4V3c0-1.7-1.3-3-3-3S3,1.3,3,3v1H0v10c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V4H9z M4,3c0-1.1,0.9-2,2-2s2,0.9,2,2v1H4V3z"></path></svg>
			    </i>
			<?php endif; ?>

		</button>
		<span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	</span>
	<div class="cart-mini">
		<div class="headline">
			<h5 class="title"><?php esc_html_e( 'Cart review', 'ohio' ); ?></h5>
			<button class="icon-button -small clb-close -reset" aria-label="close">
			    <i class="icon">
			    	<svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
			    	<svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path>
			    	</svg>
			    </i>
			</button>
		</div>
		<div class="widget_shopping_cart_content">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
</div>