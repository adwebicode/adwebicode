<?php
/**
 * Ohio WordPress Theme
 *
 * Comments template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) return;

if ( !function_exists( 'wpb_move_comment_field_to_bottom' ) ) {
	add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

	function wpb_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
}

// Get theme options
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );

?>

<div class="comments-container">
	<div class="page-container<?php if ( !$page_wrapped ) { echo ' -full-w'; } ?>">
		<div class="vc_row">
			<div class="vc_col-lg-12">
				<div id="comments" class="comments default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

					<?php if ( have_comments() ) : ?>

						<h4 class="heading-md">
							<?php 
								/* translators: %1: count comments */
								printf( esc_html( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'ohio' ) ),
									esc_html( number_format_i18n( get_comments_number() ) ) );
							?>
						</h4>

						<ul class="comments-list -unlist">
							<?php
							wp_list_comments(
								array(
									'avatar_size' => 60,
									'style'       => 'ol',
									'short_ping'  => true,
								)
							);
							?>
						</ul>

						<?php if ( ! comments_open() ) : ?>

							<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ohio' ); ?></p>
							
						<?php endif; ?>

					<?php endif; ?>

					<?php
						comment_form(
							array(
								'title_reply'        => esc_html__( 'Leave a Reply', 'ohio' ),
								'title_reply_before' => '<h4 id="reply-title" class="heading-md">',
								'title_reply_after'  => '</h4>',
							)
						);
					?>
				</div>
			</div>
		</div>
	</div>
</div>