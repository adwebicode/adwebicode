<?php

/**
* WPBakery Page Builder Ohio Team Members Group Inner shortcode view
*/

?>
<li class="team-group-item active<?php echo esc_attr( $wrapper_classes ); ?>" data-item="true" id="<?php echo esc_attr( $wrapper_id ); ?>">
    <div class="item-holder">
        <div class="-fade-up">
            <div class="author">
                <h5 class="title"><?php echo $name; ?></h5>
                <div class="author-details"><?php echo $position; ?></div>
            </div>
            <p><?php echo $description; ?></p>
			<div class="social-networks -outlined -small">
	        	<?php if ( $artstation_link ) : ?>
					<a href="<?php echo $artstation_link; ?>" target="_blank" rel="nofollow" class="network -unlink artstation">
						<i class="fab fa-artstation"></i>
					</a>
				<?php endif; ?>

            	<?php if ( $behance_link ) : ?>
					<a href="<?php echo $behance_link; ?>" target="_blank" rel="nofollow" class="network -unlink behance">
						<i class="fab fa-behance"></i>
					</a>
				<?php endif; ?>

				<?php if ( $deviantart_link ) : ?>
					<a href="<?php echo $deviantart_link; ?>" target="_blank" rel="nofollow" class="network -unlink deviantart">
						<i class="fab fa-deviantart"></i>
					</a>
				<?php endif; ?>

				<?php if ( $digg_link ) : ?>
					<a href="<?php echo $digg_link; ?>" target="_blank" rel="nofollow" class="network -unlink digg">
						<i class="fab fa-digg"></i>
					</a>
				<?php endif; ?>

				<?php if ( $discord_link ) : ?>
					<a href="<?php echo $discord_link; ?>" target="_blank" rel="nofollow" class="network -unlink discord">
						<i class="fab fa-discord"></i>
					</a>
				<?php endif; ?>

				<?php if ( $dribbble_link ) : ?>
					<a href="<?php echo $dribbble_link; ?>" target="_blank" rel="nofollow" class="network -unlink dribbble">
						<i class="fab fa-dribbble"></i>
					</a>
				<?php endif; ?>

				<?php if ( $facebook_link ) : ?>
					<a href="<?php echo $facebook_link; ?>" target="_blank" rel="nofollow" class="network -unlink facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				<?php endif; ?>

				<?php if ( $flickr_link ) : ?>
					<a href="<?php echo $flickr_link; ?>" target="_blank" rel="nofollow" class="network -unlink flickr">
						<i class="fab fa-flickr"></i>
					</a>
				<?php endif; ?>

				<?php if ( $github_link ) : ?>
					<a href="<?php echo $github_link; ?>" target="_blank" rel="nofollow" class="network -unlink github">
						<i class="fab fa-github"></i>
					</a>
				<?php endif; ?>

				<?php if ( $houzz_link ) : ?>
					<a href="<?php echo $houzz_link; ?>" target="_blank" rel="nofollow" class="network -unlink houzz">
						<i class="fab fa-houzz"></i>
					</a>
				<?php endif; ?>

				<?php if ( $instagram_link ) : ?>
					<a href="<?php echo $instagram_link; ?>" target="_blank" rel="nofollow" class="network -unlink instagram">
						<i class="fab fa-instagram"></i>
					</a>
				<?php endif; ?>

				<?php if ( $kaggle_link ) : ?>
					<a href="<?php echo $kaggle_link; ?>" target="_blank" rel="nofollow" class="network -unlink kaggle">
						<i class="fab fa-kaggle"></i>
					</a>
				<?php endif; ?>

				<?php if ( $linkedin_link ) : ?>
					<a href="<?php echo $linkedin_link; ?>" target="_blank" rel="nofollow" class="network -unlink linkedin">
						<i class="fab fa-linkedin"></i>
					</a>
				<?php endif; ?>

				<?php if ( $medium_link ) : ?>
					<a href="<?php echo $medium_link; ?>" target="_blank" rel="nofollow" class="network -unlink medium">
						<i class="fab fa-medium-m"></i>
					</a>
				<?php endif; ?>

				<?php if ( $mixer_link ) : ?>
					<a href="<?php echo $mixer_link; ?>" target="_blank" rel="nofollow" class="network -unlink mixer">
						<i class="fab fa-mixer"></i>
					</a>
				<?php endif; ?>

				<?php if ( $pinterest_link ) : ?>
					<a href="<?php echo $pinterest_link; ?>" target="_blank" rel="nofollow" class="network -unlink pinterest">
						<i class="fab fa-pinterest"></i>
					</a>
				<?php endif; ?>

				<?php if ( $producthunt_link ) : ?>
					<a href="<?php echo $producthunt_link; ?>" target="_blank" rel="nofollow" class="network -unlink producthunt">
						<i class="fab fa-product-hunt"></i>
					</a>
				<?php endif; ?>

				<?php if ( $quora_link ) : ?>
					<a href="<?php echo $quora_link; ?>" target="_blank" rel="nofollow" class="network -unlink quora">
						<i class="fab fa-quora"></i>
					</a>
				<?php endif; ?>

				<?php if ( $reddit_link ) : ?>
					<a href="<?php echo $reddit_link; ?>" target="_blank" rel="nofollow" class="network -unlink reddit">
						<i class="fab fa-reddit"></i>
					</a>
				<?php endif; ?>

				<?php if ( $snapchat_link ) : ?>
					<a href="<?php echo $snapchat_link; ?>" target="_blank" rel="nofollow" class="network -unlink snapchat">
						<i class="fab fa-snapchat"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $soundcloud_link ) : ?>
					<a href="<?php echo $soundcloud_link; ?>" target="_blank" rel="nofollow" class="network -unlink soundcloud">
						<i class="fab fa-soundcloud"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $spotify_link ) : ?>
					<a href="<?php echo $spotify_link; ?>" target="_blank" rel="nofollow" class="network -unlink spotify">
						<i class="fab fa-spotify"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $teamspeak_link ) : ?>
					<a href="<?php echo $teamspeak_link; ?>" target="_blank" rel="nofollow" class="network -unlink teamspeak">
						<i class="fab fa-teamspeak"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $telegram_link ) : ?>
					<a href="<?php echo $telegram_link; ?>" target="_blank" rel="nofollow" class="network -unlink telegram">
						<i class="fab fa-telegram-plane"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $tiktok_link ) : ?>
					<a href="<?php echo $tiktok_link; ?>" target="_blank" rel="nofollow" class="network -unlink tiktok">
						<i class="fab fa-tiktok"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $tripadvisor_link ) : ?>
					<a href="<?php echo $tripadvisor_link; ?>" target="_blank" rel="nofollow" class="network -unlink tripadvisor">
						<i class="fab fa-tripadvisor"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $tumblr_link ) : ?>
					<a href="<?php echo $tumblr_link; ?>" target="_blank" rel="nofollow" class="network -unlink tumblr">
						<i class="fab fa-tumblr"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $twitch_link ) : ?>
					<a href="<?php echo $twitch_link; ?>" target="_blank" rel="nofollow" class="network -unlink twitch">
						<i class="fab fa-twitch"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $twitter_link ) : ?>
					<a href="<?php echo $twitter_link; ?>" target="_blank" rel="nofollow" class="network -unlink twitter">
						<i class="fab fa-twitter"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $vimeo_link ) : ?>
					<a href="<?php echo $vimeo_link; ?>" target="_blank" rel="nofollow" class="network -unlink vimeo">
						<i class="fab fa-vimeo"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $vine_link ) : ?>
					<a href="<?php echo $vine_link; ?>" target="_blank" rel="nofollow" class="network -unlink vine">
						<i class="fab fa-vine"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $whatsapp_link ) : ?>
					<a href="<?php echo $whatsapp_link; ?>" target="_blank" rel="nofollow" class="network -unlink whatsapp">
						<i class="fab fa-whatsapp"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $xing_link ) : ?>
					<a href="<?php echo $xing_link; ?>" target="_blank" rel="nofollow" class="network -unlink xing">
						<i class="fab fa-xing"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $youtube_link ) : ?>
					<a href="<?php echo $youtube_link; ?>" target="_blank" rel="nofollow" class="network -unlink youtube">
						<i class="fab fa-youtube"></i>
					</a>
				<?php endif; ?>
				
				<?php if ( $fivehundred_link ) : ?>
					<a href="<?php echo $fivehundred_link; ?>" target="_blank" rel="nofollow" class="network -unlink 500px">
						<i class="fab fa-500px"></i>
					</a>
				<?php endif; ?>
            </div>
        </div>
    </div>
</li>
<li class="team-group-item" data-trigger="true">
    <?php if ( $photo ) : ?>
		<img <?php echo $photo_image_atts; ?>>
	<?php endif; ?>
</li>