<?php

if ( !class_exists( 'ohio_widget_about_author' ) ) {

	class ohio_widget_about_author extends SB_WP_Widget {

		protected $options;

		public function __construct() {		
			$this->options = array(
				array(
					'title', 'text', '', 
					'label' => esc_html__( 'Title', 'ohio-extra' ), 
					'input' => 'text', 
					'filters' => 'widget_title',
					'on_update' => 'esc_attr'
				),
			);
			
			parent::__construct(
				'ohio_widget_about_author',
				'Ohio: ' . esc_html__( 'About Author', 'ohio-extra' ),
				array( 'description' => esc_html__( 'About Author', 'ohio-extra' ) )
			);
		}

		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = '';
			}
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ohio-extra' ); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;
		}

		public function widget( $args, $instance ) {
			extract( $args );
			$this->setInstances( $instance, 'filter' );

			$allowed_tags = array(
				'div' => array(
					'id' => array(),
					'class' => array()
				),
				'li' => array(
					'id' => array(),
					'class' => array()
				),
				'section' => array(
					'id' => array(),
					'class' => array()
				),
				'h3' => array(
					'class' => array()
				)
			);

			$admin = false;
			$author = get_the_author_meta( 'ID' );
			if ( !$author ) {
				$admin = get_users( array( 'role' => 'administrator' ) );
				$admin = $admin[0];
				$author = get_the_author_meta( 'ID', $admin->ID );// set admin
			}
			$authors_setting = get_field( 'global_author_social_links', 'option' );

			echo wp_kses( $before_widget, $allowed_tags );
			$title = $this->getInstance( 'title' );
			if ( !empty( $title ) ) {
				echo wp_kses( $before_title . esc_html( $title ) . $after_title, $allowed_tags );
			}

			echo '<div class="avatar -large">';
			echo get_avatar( get_the_author_meta('email'), '72', true, get_the_author() );
			echo '</div>';

		?>

			<div class="content">
				<div class="details">
					<?php
						if ( !$admin ) {
							printf( '<h6>%s</h6>', esc_html( get_the_author() ) );
							printf( '<span class="site">%s</span>', get_the_author_meta( 'url', $author ) );
						} else {
							printf( '<h4>%s</h4>', esc_html( $admin->display_name ) );
							printf( '<span class="site">%s</span>', get_the_author_meta( 'url', $admin->ID ) );
						}
					?>
				</div>
				<div class="description">
					<?php
						if ( !$admin ) {
							echo get_the_author_meta( 'description', $author );
						} else {
							echo get_the_author_meta( 'description', $admin->ID );
						}
					?>
				</div>
			</div>
			<div class="social-networks -contained -small">

				<?php
				if ( $authors_setting && is_array( $authors_setting ) ) {

					foreach ( $authors_setting as $author_setting ) {

						if ( isset( $author_setting['author'] ) && $author == $author_setting['author']['ID'] ) {

							foreach ( $author_setting['links'] as $author_link ) {

								echo '<a href="' . esc_url( $author_link['url'] ) . '" class="network -unlink">';

								switch ( $author_link['social_networks'] ) {
									case 'artstation': echo '<i class="fab fa-artstation"></i>'; break;
									case 'behance': echo '<i class="fab fa-behance"></i>'; break;
									case 'deviantart': echo '<i class="fab fa-deviantart"></i>'; break;
						            case 'digg': echo '<i class="fab fa-digg"></i>'; break;
						            case 'discord': echo '<i class="fab fa-discord"></i>'; break;
						            case 'dribbble': echo '<i class="fab fa-dribbble"></i>'; break;
						            case 'facebook': echo '<i class="fab fa-facebook-f"></i>'; break;
						            case 'flickr': echo '<i class="fab fa-flickr"></i>';  break;
						            case 'github': echo '<i class="fab fa-github-alt"></i>'; break;
						            case 'houzz': echo '<i class="fab fa-houzz"></i>'; break;
						            case 'instagram': echo '<i class="fab fa-instagram"></i>'; break;
						            case 'kaggle': echo '<i class="fab fa-kaggle"></i>'; break;
						            case 'linkedin': echo '<i class="fab fa-linkedin"></i>'; break;
						            case 'medium': echo '<i class="fab fa-medium-m"></i>'; break;
						            case 'mixer': echo '<i class="fab fa-mixer"></i>'; break;
						            case 'pinterest': echo '<i class="fab fa-pinterest"></i>'; break;
						            case 'producthunt': echo '<i class="fab fa-product-hunt"></i>'; break;
						            case 'quora': echo '<i class="fab fa-quora"></i>'; break;
						            case 'reddit': echo '<i class="fab fa-reddit-alien"></i>'; break;
						            case 'snapchat': echo '<i class="fab fa-snapchat"></i>'; break;
						            case 'soundcloud': echo '<i class="fab fa-soundcloud"></i>'; break;
						            case 'spotify': echo '<i class="fab fa-spotify"></i>'; break;
						            case 'teamspeak': echo '<i class="fab fa-teamspeak"></i>'; break;
						            case 'telegram': echo '<i class="fab fa-telegram-plane"></i>'; break;
						            case 'tiktok': echo '<i class="fab fa-tiktok"></i>'; break;
						            case 'tripadvisor': echo '<i class="fab fa-tripadvisor"></i>'; break;
						            case 'tumblr': echo '<i class="fab fa-tumblr"></i>'; break;
						            case 'twitch': echo '<i class="fab fa-twitch"></i>'; break;
						            case 'twitter': echo '<i class="fab fa-twitter"></i>'; break;
						            case 'vimeo': echo '<i class="fab fa-vimeo"></i>'; break;
						            case 'vine': echo '<i class="fab fa-vine"></i>'; break;
						            case 'whatsapp': echo '<i class="fab fa-whatsapp"></i>'; break;
						            case 'xing': echo '<i class="fab fa-xing"></i>'; break;
						            case 'youtube': echo '<i class="fab fa-youtube"></i>'; break;
						            case '500px': echo '<i class="fab fa-500px"></i>'; break;
						        }
								echo '</a>';
							}
							break;
						}
					}
				}
				?>
			</div>

			<?php
			echo wp_kses( $after_widget, $allowed_tags );
		}
	}
}

register_widget( 'ohio_widget_about_author' );