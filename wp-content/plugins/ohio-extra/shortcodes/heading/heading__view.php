<?php

/**
* WPBakery Page Builder Ohio Heading shortcode view
*/

?>
<div class="ohio-widget heading<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	
	<?php if ( $divider_alignment == 'before_title' ) : ?>
		<div class="divider"></div>
	<?php endif; ?>

	<?php if ( $subtitle_type_layout == 'top_subtitle' ) : ?>
		<div class="subtitle">
			<?php echo $subtitle; ?>
		</div>

		<?php if ( $divider_alignment == 'middle' ) : ?>
			<div class="divider"></div>
		<?php endif; ?>

	<?php endif; ?>

	<<?php echo $heading_type; ?> class="title">
		<?php if ( ! empty( $title_before ) ) : ?>
            <span class="text-before"><?php echo $title_before; ?></span>
        <?php endif; ?>
		<?php echo $title; ?>
		<?php if ( ! empty( $title_highlighted ) ) : ?>
			<span class="highlighted-text-holder"><span class="highlighted-text" <?php echo esc_attr( $appear_attrs ); ?>><?php echo $title_highlighted; ?></span></span>
		<?php endif; ?>
		<?php if ( ! empty( $title_after ) ) : ?>
			<span class="highlighted-text-after"><?php echo $title_after; ?></span>
		<?php endif; ?>
	</<?php echo $heading_type; ?>>

	<?php if ( $subtitle_type_layout == 'bottom_subtitle' ) : ?>

		<?php if ( $divider_alignment == 'middle' ) : ?>
			<div class="divider"></div>
		<?php endif; ?>

		<div class="subtitle">
			<?php echo $subtitle; ?>
		</div>
	<?php endif; ?>

	<?php if ( $divider_alignment == 'after_title' ) : ?>
		<div class="divider"></div>
	<?php endif; ?>
	
</div>