<?php

/**
* WPBakery Page Builder Ohio Icon Box shortcode view
*/

?>
<div class="ohio-widget icon-box<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( $content_full != 'full' ) : ?>
		
		<span class="icon-group<?php echo esc_attr( $icon_classes ); ?>">
			<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
				<i class="icon <?php echo $icon_as_icon; ?>"></i>
			<?php elseif ( $icon_as_image ) : ?>
				<img <?php echo $icon_image_atts; ?>>
			<?php endif; ?>
		</span>
		<div class="icon-box-content">
			<h5 class="icon-box-heading"><?php echo $title; ?></h5>
			<p><?php echo $description; ?></p>
			<?php if ( $use_link ) : ?>
				<a class="button<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $link_url['url'] ); ?>" <?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
					<?php echo $link_url['caption']; ?>
				</a>
			<?php endif; ?>
		</div>

	<?php else : ?>

		<div class="icon-box-header">
			<span class="icon-group<?php echo esc_attr( $icon_classes ); ?>">
				<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
					<i class="icon <?php echo $icon_as_icon; ?>"></i>
				<?php elseif ( $icon_as_image ) : ?>
					<img <?php echo $icon_image_atts; ?>>
				<?php endif; ?>
			</span>
			<h5 class="icon-box-heading"><?php echo $title; ?></h5>
		</div>
		<div class="icon-box-content">
			<p><?php echo $description; ?></p>
			<?php if ( $use_link ) : ?>
				<a class="button<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $link_url['url'] ); ?>" <?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
					<?php echo $link_url['caption']; ?>
				</a>
			<?php endif; ?>
		</div>

	<?php endif; ?>

</div>