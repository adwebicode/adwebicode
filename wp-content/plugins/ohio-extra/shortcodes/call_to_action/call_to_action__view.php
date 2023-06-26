<?php

/**
* WPBakery Page Builder Ohio Call To Action shortcode view
*/

?>
<div class="ohio-widget call-to-action<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<div class="heading title">
		<?php if ( $subtitle_type_layout == 'top_subtitle' ) : ?>
			<div class="subtitle">
				<?php echo $subtitle; ?>
			</div>
		<?php endif; ?>

		<<?php echo $heading_tag; ?> class="title">
			<?php echo $title; ?>
		</<?php echo $heading_tag; ?>>

		<?php if ( $subtitle_type_layout == 'bottom_subtitle' ) : ?>
			<div class="subtitle">
				<?php echo $subtitle; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="holder">
		<?php if ( $add_link ) : ?>
			<a class="button<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $link['url'] ); ?>"<?php if ( $link['blank'] ) echo ' target="_blank"'; ?>>
				<?php if ( $icon_use && $icon_as_icon && $icon_position == 'left' ): ?>
					<i class="icon -left <?php echo $icon_as_icon; ?>"></i>
				<?php endif; ?>
				<?php echo $link['caption']; ?>
				<?php if ( $icon_use && $icon_as_icon && $icon_position == 'right' ): ?>
					<i class="icon -right <?php echo $icon_as_icon; ?>"></i>
				<?php endif; ?>
			</a>
		<?php endif; ?>
	</div>
</div>