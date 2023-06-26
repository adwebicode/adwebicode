<?php
/**
 * Ohio WordPress Theme
 *
 * Error 404 page template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme header
 */
get_header();

?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>

<div class="page-container">
	<div class="empty-state">
		<h3 class="title">
			<?php esc_html_e( 'Sorry, but the page you are looking for does not exist.', 'ohio' ); ?>
		</h3>
		<p>
			<?php esc_html_e( 'Maybe try a search?', 'ohio' ); ?>
		</p>
		<?php get_search_form( true ); ?>
	</div>
</div>

<?php

/**
 * Theme footer
 */
get_footer();