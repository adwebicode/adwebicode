<?php
	// Settings
	$prev_post = get_adjacent_post( false, '', false );
	$next_post = get_adjacent_post( false, '', true );

	$first_post = get_posts( array( 'numberposts' => 1) );

	if (!$next_post) $next_post = $first_post[0];

	$toggle_post_column = ( !empty( $prev_post ) && !empty( $next_post ) ) ? '6' : '12';

	$show_prev_n_next = OhioOptions::get( 'post_previous_n_next_visibility', true );

	if ( ( $prev_post || $next_post ) && $show_prev_n_next ) :
?>

<div class="sticky-nav">
	<div class="sticky-nav-thumbnail -fade-up"
		<?php 
			$next_image_thumb = get_the_post_thumbnail_url( $next_post, 'medium_large' );
			if ( $next_image_thumb) {
				echo 'style="background-image: url(\'' . $next_image_thumb . '\');"';
			}
		?>
		>
	</div>
	<div class="sticky-nav-holder">
		<div class="sticky-nav-headline">
			<h6 class="title">
				<?php esc_html_e( 'Next Post', 'ohio' ); ?>
			</h6>
			<div class="nav-group">
				<a class="icon-button prev -unlink" href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>">
				    <i class="icon">
				    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
				    	<svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
				    </i>
				</a>
				<a class="icon-button next -unlink" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
				    <i class="icon">
				    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
				    	<svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
				    </i>
				</a>
			</div>
		</div>
		<a class="titles-typo -undash" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
			<?php
				$next_title = get_the_title( $next_post->ID );
				if ( empty( $next_title ) ) {
					echo wp_kses( '[' . get_the_date( false, $next_post->ID ) . ']', 'default' );
				} else {
					echo wp_kses( $next_title, 'default' );
				}
			?>
		</a>
	</div>
</div>
<?php endif; ?>