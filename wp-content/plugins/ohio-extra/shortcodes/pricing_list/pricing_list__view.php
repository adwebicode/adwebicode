<?php

/**
* WPBakery Page Builder Ohio Pricing List shortcode view
*/

?>
<div class="ohio-widget pricing-list<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<div class="pricing-list-headline">
		<?php if ( $name ): ?>
			<div class="pricing-list-title">
				<h6 class="heading title"><?php echo $name; ?></h6>
			</div>
		<?php endif; ?>
		<div class="pricing-list-price">
			<h6 class="title">
				<?php if ( $regular_price ) : ?>
					<span class="regular-price"><?php echo $regular_price; ?></span>
				<?php endif; ?>

				<?php if ( $sale_price ) : ?>
					<?php echo $sale_price; ?>
				<?php endif; ?>
			</h6>
		</div>
	</div>
	<div class="pricing-list-details">
		<p><?php if ( $indigriends ) { echo $indigriends; } ?></p>
		<?php if ( $mark ): ?>
			<a href="#" class="badge -unlink"><?php esc_html_e( 'New', 'ohio-extra' ); ?></a>
		<?php endif; ?>
	</div>
</div>