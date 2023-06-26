<?php

/**
* WPBakery Page Builder Ohio Button shortcode view
*/

?>
<div class="ohio-widget-holder<?php echo esc_attr( $align_classes ); ?>">
	<a href="<?php echo esc_url($link['url']); ?>"<?php if ( $link['blank'] ) echo ' target="_blank"'; ?> class="ohio-widget button<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	    
	    <?php if ( $icon_use && $icon_position == 'left' ): ?>

	    	<?php if ( !empty( $icon_as_icon ) ): ?>
	    		<i class="icon -left <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>

			<?php if ( !empty( $icon_as_image ) ): ?>
				<img class="icon -left -image" <?php echo $icon_image_atts; ?> />
			<?php endif; ?>

			<?php if ( empty( $icon_as_icon ) && empty( $icon_as_image ) ): ?>
				<i class="icon -left">
			    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
			    	<svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
			    </i>
			<?php endif; ?>

		<?php endif; ?>

		<?php echo $link['caption']; ?>

		<?php if ( $icon_use && $icon_position == 'right' ): ?>

			<?php if ( !empty( $icon_as_icon ) ): ?>
	    		<i class="icon -right <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>

			<?php if ( !empty( $icon_as_image ) ): ?>
				<img class="icon -right -image" <?php echo $icon_image_atts; ?> />
			<?php endif; ?>

			<?php if ( empty( $icon_as_icon ) && empty( $icon_as_image ) ): ?>
				<i class="icon -right">
			    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
			    	<svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
			    </i>
			<?php endif; ?>
			
		<?php endif; ?>
	</a>
</div>