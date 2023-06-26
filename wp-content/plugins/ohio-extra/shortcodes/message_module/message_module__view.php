<?php

/**
* WPBakery Page Builder Ohio Message Module shortcode view
*/

?>
<div class="ohio-widget-holder<?php echo esc_attr( $align_classes ); ?>">
	<div class="ohio-widget alert<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
		<p class="alert-message -unspace">

			<?php if ( $add_icon ) : ?>
				<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
					<i class="icon <?php echo $icon_as_icon; ?>"></i>
				<?php elseif ( $icon_as_image ) : ?>
					<img src="<?php echo esc_url( $icon_as_image ); ?>" alt="<?php echo esc_attr( $text ); ?>">
				<?php endif; ?>
			<?php endif; ?>

			<?php echo $text; ?>

			<?php if ( $use_link ) : ?>
				<a href="<?php echo esc_url( $link['url'] ); ?>" <?php if ( $link['blank'] ) { echo ' target="_blank"'; } ?>><?php echo $link['caption']; ?></a>
			<?php endif; ?>
		</p>
		<?php if ( $without_close_button ) : ?>
			<button class="icon-button -small" aria-label="close">
			    <i class="icon"><svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg><svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg></i>
			</button>
		<?php endif; ?>
	</div>
</div>