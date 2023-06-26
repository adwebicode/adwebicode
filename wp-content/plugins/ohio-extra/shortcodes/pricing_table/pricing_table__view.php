<?php

/**
* WPBakery Page Builder Ohio Pricing Table shortcode view
*/

?>
<div class="ohio-widget pricing-table<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?> <?php echo esc_attr( $tilt_attrs ); ?>>
	<div class="pricing-table-headline">
        <?php if ( $title ) : ?>
			<h5 class="title"><?php echo $title; ?></h5>
		<?php endif; ?>

		<?php if ( $subtitle ) : ?>
			<p class="subtitle -unspace"><?php echo $subtitle; ?></p>
		<?php endif; ?>
    </div>
	<div class="pricing-table-price">
        <span class="price-number titles-typo title">
        	<?php if ( $price_currency ) : ?>
				<?php echo $price_currency.$price; ?>
			<?php else: ?>
				<?php echo $price; ?>
			<?php endif; ?>
        </span>

        <?php if ( $price_caption ) : ?>
        	<span class="tag"><?php echo $price_caption; ?></span>
        <?php endif; ?>
    </div>

    <?php if ( $description ) : ?>
    	<div class="pricing-table-details"><?php echo $description; ?></div>
	<?php endif; ?>	

	<div class="pricing-table-features">

		<?php if ( $features_value ) : ?>
			<ul class="-unlist -large">
		
				<?php foreach ( $features_value as $feature_object ) : ?>
					<li class="<?php echo ( ( $feature_object->feature_icon == 'icon_minus' ) ? 'missing' : 'exist' ); ?>">
						<?php if ( $feature_object->feature_icon ) : ?>

							<?php if ( $feature_object->feature_icon == 'icon_plus' ) : ?>
								<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path></svg></i>
							<?php elseif ( $feature_object->feature_icon == 'icon_minus' ) : ?>
								<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path></svg></i>
							<?php endif; ?>

						<?php endif; ?>

						<?php if ( $feature_object->feature_title ) : ?>
							<?php echo $feature_object->feature_title; ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>

			</ul>
		<?php endif; ?>

	</div>

	<?php if ( $add_link ) : ?>
		<a class="button<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $button_link['url'] ); ?>"<?php if ( $button_link['blank'] ) echo ' target="_blank"'; ?>>
			<?php if ( $icon_use && $icon_as_icon && $icon_position == 'left' ): ?>
				<i class="icon -left <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>
			<?php echo $button_link['caption']; ?>
			<?php if ( $icon_use && $icon_as_icon && $icon_position == 'right' ): ?>
				<i class="icon -right <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>
		</a>
	<?php endif; ?>

</div>