<h2 class="clb-headline"><?php _e( 'Theme Registration', 'ohio-extra' ); ?></h2>

<?php if ( get_option( 'ohio_license_code', false ) ): ?>

	<div class="clb-group">
		<div class="clb-group-headline">
			<h3><?php _e( 'Theme Overview', 'ohio-extra' ); ?></h3>
			<a href="#remove" class="btn btn-flat" id="ohio-remove-theme-license"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16"><path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/><path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/></svg><?php _e( 'Detach License', 'ohio-extra' ); ?></a>
		</div>

		<div class="clb-group-details">
			<?php _e( 'You have successfully registered the theme, all theme updates and premium bundled plugins can be installed.', 'ohio-extra' ); ?>
		</div>

		<table class="clb-group-content clb-group-table table-col-2">
			<tbody>
				<tr>
					<td><?php _e( 'License', 'ohio-extra' ); ?></a>:</td>
					<td>
						<label class="active"><mark class="yes"><?php _e( 'Activated', 'ohio-extra' ); ?></mark></label>&nbsp; 
						<?php echo get_option( 'ohio_license_type', 'Regular License' ); ?>
						<a class="tips" target="_blank" href="https://themeforest.net/licenses/terms/regular"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'License Key:', 'ohio-extra' ); ?></a></td>
					<td><b><?php echo get_option( 'ohio_license_code', '-' ); ?></b></td>
				</tr>
				<tr>
					<td><?php _e( 'Registration Date:', 'ohio-extra' ); ?></td>
					<td><?php echo get_option( 'ohio_license_sold_at', '-' ); ?></td>
				</tr>
				<tr>
					<td><?php _e( 'Registered Domain:', 'ohio-extra' ); ?></a></td>
					<td><a href="<?php echo '//' . $_SERVER['HTTP_HOST']; ?>"><?php echo $_SERVER['HTTP_HOST']; ?>/</a> <a class="tips" target="_blank" href="https://themeforest.net/licenses/terms/regular"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a></td>
				</tr>
				<tr>
					<td><?php _e( 'Theme Directory:', 'ohio-extra' ); ?></a></td>
					<td><?php echo '..' . get_raw_theme_root( get_stylesheet() ) . '/' . get_stylesheet(); ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Group 2cl -->
	<div class="clb-group">
		<div class="clb-group-headline">
			<h3><?php _e( 'Theme Support', 'ohio-extra' ); ?></h3>
			<div>
				<a class="tips" target="_blank" href="https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
				<a target="_blank" href="https://themeforest.net/downloads" class="btn btn-flat"><?php _e( 'Renew Support', 'ohio-extra' ); ?></a>
			</div>
		</div>
		<div class="clb-group-details">
			<?php _e( 'Many support queries and technical questions will already be answered on our', 'ohio-extra' ); ?> <a target="_blank" href="https://docs.clbthemes.com/ohio/"><?php _e( 'documentation website', 'ohio-extra' ); ?></a>.
		</div>
		<table class="clb-group-content clb-group-table table-col-2">
			<tbody>
				<tr>
					<td><?php _e( 'Support Status:', 'ohio-extra' ); ?></td>
					<td>
						<?php
							$support_timestamp = get_option( 'ohio_license_support_until' );
							if ( !empty( $support_timestamp ) && is_numeric( $support_timestamp ) ):
								$diff_timestamp = $support_timestamp - time();
								if ($diff_timestamp > 0) {
									echo '<label class="active"><mark class="yes">Supported</mark></label>';
									$days = ceil( $diff_timestamp / 60 / 60 / 24 );
									echo '&nbsp; ' . $days . ' days left';
								} else {
									echo '<label class="inactive"><mark class="no">Unsupported</mark></label>&nbsp; <a target="_blank" href="https://1.envato.market/5Q25j">Renew Support?</a>';
								}
							endif;
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

<?php else: ?>

	<div class="clb-group">
		<div class="clb-group-headline">
			<h3><?php _e( 'Activation', 'ohio-extra' ); ?></h3>
		</div>
		<div class="clb-group-details">
			<?php _e( 'Thank you for choosing Ohio. Now it\'s time to create something awesome.', 'ohio-extra' ); ?>
		</div>
		<div class="clb-group-content">
			<div class="clb-steps">
				<div class="clb-steps-item">
					<div class="step-number">1</div>
					<div class="dashed"></div>
					<p><?php _e( 'Click the Connect & Activate button below to get started:', 'ohio-extra' ); ?></p>
					<a href="#" class="btn btn-large btn-activate" id="ohio-activate-theme-license"><svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.2849 0.120735C14.7711 -0.1293 12.9731 -0.00428241 10.9182 0.620805C7.32212 3.12115 4.23976 6.62164 3.9829 12.3724C3.9829 12.4975 3.59761 12.3724 3.46918 12.3724C2.57016 10.4972 2.18486 8.49691 2.95545 5.74652C3.21231 5.49649 2.69859 5.24645 2.57016 5.24645C2.44172 5.49649 1.67114 6.24659 1.15741 7.12171C-1.28279 11.2473 0.25839 16.623 4.62506 18.8734C8.99173 21.2487 14.3858 19.7485 16.826 15.4979C19.5231 10.6222 16.9545 0.995857 15.2849 0.120735Z" fill="white"/></svg><span><?php _e( 'Connect & Activate', 'ohio-extra' ); ?></span></a>
				</div>
				<div class="clb-steps-item">
					<div class="step-number">2</div>
					<div class="dashed"></div>
					<p><?php _e( 'Login with your Envato account to authorize theme purchase code.', 'ohio-extra' ); ?></p>
				</div>
				<div class="clb-steps-item">
					<div class="step-number">3</div>
					<div class="dashed"></div>
					<p><?php _e( 'Choose a valid', 'ohio-extra' ); ?> <a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"><?php _e( 'Purchase Code', 'ohio-extra' ); ?></a> <?php _e( 'from the list and click Proceed.', 'ohio-extra' ); ?></p>
				</div>
				<div class="clb-steps-item">
					<div class="step-number">4</div>
					<div class="dashed"></div>
					<p><?php _e( 'That is it, you are all set!', 'ohio-extra' ); ?><br> <?php _e( 'Product is activated.', 'ohio-extra' ); ?></p>
				</div>
			</div>
		</div>
		<div class="clb-group-footer">
			<span><?php _e( 'Need a new license?', 'ohio-extra' ); ?> <a href="https://1.envato.market/5Q25j" target="_blank"><?php _e( 'Buy License', 'ohio-extra' ); ?></a></span>
		</div>
	</div>

<?php endif; ?>
