<?php
	if ( !OhioOptions::get_global( 'notification_bar', false ) ) return; // exif if not visible
	$notification_link = OhioOptions::get_global( 'notification_link' );
	$notification_button = OhioOptions::get_global( 'notification_button' );
	$notification_blur = OhioOptions::get_global( 'notification_blur_effect', true );

	if ( $notification_button ) {
		$notification_button_link = OhioOptions::get_global( 'notification_button_link' );
	}
?>

<?php if ( !isset( $_COOKIE['notification'] ) && !OhioSettings::is_coming_soon_page() ) : ?>

	<div class="notification">
		<div class="alert -small -fixed<?php if ( $notification_blur ) { echo esc_attr( ' -blur' ); } ?>">
		    <p class="alert-message -unspace">
		    	<?php echo wp_kses( OhioOptions::get_global( 'notification_text' ), 'post' ); ?>

		    	<?php if ( $notification_link ) : ?>
					<a target="<?php echo esc_html( $notification_link['target'] ); ?>" href="<?php echo esc_url( $notification_link['url'] ); ?>">
						<?php echo esc_html( $notification_link['title'] ); ?>
					</a>
				<?php endif; ?>
	    	</p>
			<?php if ( $notification_button ) : ?>
				<a target="<?php echo esc_html( $notification_button_link['target'] ); ?>" href="<?php echo esc_url( $notification_button_link['url'] ); ?>" class="button -small">
					<?php echo esc_html( $notification_button_link['title'] ) ?>
				</a>
			<?php endif; ?>
	        <button class="icon-button -small" aria-label="close">
	    		<i class="icon">
	    			<svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
	    			<svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg>
	    		</i>
			</button>
		</div>
    </div>

<?php endif; ?>