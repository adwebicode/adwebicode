<?php

/**
* WPBakery Page Builder Ohio Clients logo shortcode view
*/

?>
<div class="ohio-widget logo<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( $link ) : ?>
		<a class="-unlink" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
	<?php endif; ?>

	<img <?php echo $image_logo_atts; ?>>

	<?php if ( !empty( $description ) ): ?>
		<div class="logo-details">
			<p><?php echo $description; ?></p>
		</div>
	<?php endif; ?>

	<?php if ( $link ) : ?>
		</a>
	<?php endif; ?>

</div>