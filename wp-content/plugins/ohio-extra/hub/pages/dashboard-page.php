<div class="clb-hub clb-page">
	<div class="clb-hub-intro">
		<div class="clb-hub-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Dashboard', 'ohio-extra' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn btn-flat"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div class="clb-hub-container clb-page-container">

			<!-- WP notices here -->
			<div class="wp-header-end"></div>

			<div id="tabs" class="clb-nav">
				<ul class="clb-nav-inner">
					<li><a href="#tabs-1" class="selected"><?php _e( 'Registration', 'ohio-extra' ); ?></a></li>
					<li><a href="#tabs-2"><?php _e( 'What’s New', 'ohio-extra' ); ?></a></li>
					<li><a href="#tabs-3"><?php _e( 'System Status', 'ohio-extra' ); ?></a></li>
					<li><a href="#tabs-4"><?php _e( 'Help Center', 'ohio-extra' ); ?></a></li>
					<li><a href="#tabs-5"><?php _e( 'FAQs', 'ohio-extra' ); ?></a></li>
				</ul>

				<!-- Registration container -->
				<div class="tab-item" id="tabs-1">
					<?php include 'parts/dashboard/theme-license-section.php'; ?>
				</div>

				<!-- What’s new container -->
				<div class="tab-item" id="tabs-2" style="display: none;">
					<?php include 'parts/dashboard/whats-new-section.php'; ?>
				</div>

				<!-- System status container -->
				<div class="tab-item" id="tabs-3" style="display: none;">
					<?php include 'parts/dashboard/system-status-section.php'; ?>
				</div>

				<!-- Help container -->
				<div class="tab-item" id="tabs-4" style="display: none;">
					<?php include 'parts/dashboard/help-section.php'; ?>
				</div>

				<!-- Help container -->
				<div class="tab-item" id="tabs-5" style="display: none;">
					<?php include 'parts/dashboard/faq-section.php'; ?>
				</div>

				<a class="docs" target="_blank" href="https://docs.clbthemes.com/ohio/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><?php _e( 'Docs', 'ohio-extra' ); ?></a>
			</div>
		</div>
	</div>

	<?php include 'parts/footer.php'; ?>
</div>