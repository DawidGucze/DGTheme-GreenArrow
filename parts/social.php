<?php

$social_options = get_option( 'dgtheme_social_options' );

$facebook = ( isset( $social_options['dgt_facebook_url'] ) ) ? $social_options['dgt_facebook_url'] : '';
$twitter = ( isset( $social_options['dgt_twitter_url'] ) ) ? $social_options['dgt_twitter_url'] : '';
$google = ( isset( $social_options['dgt_googleplus_url'] ) ) ? $social_options['dgt_googleplus_url'] : '';
$instagram = ( isset( $social_options['dgt_instagram_url'] ) ) ? $social_options['dgt_instagram_url'] : '';
$linkedin = ( isset( $social_options['dgt_linkedin_url'] ) ) ? $social_options['dgt_linkedin_url'] : '';
$pinterest = ( isset( $social_options['dgt_pinterest_url'] ) ) ? $social_options['dgt_pinterest_url'] : '';
$flickr = ( isset( $social_options['dgt_flickr_url'] ) ) ? $social_options['dgt_flickr_url'] : '';
$youtube = ( isset( $social_options['dgt_youtube_url'] ) ) ? $social_options['dgt_youtube_url'] : '';
$vimeo = ( isset( $social_options['dgt_vimeo_url'] ) ) ? $social_options['dgt_vimeo_url'] : '';

?>

<ul>
	<?php if ( !empty($facebook) ) : ?><li><a href="<?php echo esc_url($facebook); ?>" title="<?php echo esc_html__( 'Facebook', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_facebook"></i></a></li><?php endif; ?>
	<?php if ( !empty($twitter) ) : ?><li><a href="<?php echo esc_url($twitter); ?>" title="<?php echo esc_html__( 'Twitter', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_twitter"></i></a></li><?php endif; ?>
	<?php if ( !empty($google) ) : ?><li><a href="<?php echo esc_url($google); ?>" title="<?php echo esc_html__( 'Google+', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_google-plus"></i></a></li><?php endif; ?>
	<?php if ( !empty($instagram) ) : ?><li><a href="<?php echo esc_url($instagram); ?>" title="<?php echo esc_html__( 'Instagram', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_instagram"></i></a></li><?php endif; ?>
	<?php if ( !empty($linkedin) ) : ?><li><a href="<?php echo esc_url($linkedin); ?>" title="<?php echo esc_html__( 'Linkedin', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_linkedin"></i></a></li><?php endif; ?>
	<?php if ( !empty($pinterest) ) : ?><li><a href="<?php echo esc_url($pinterest); ?>" title="<?php echo esc_html__( 'Pinterest', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_pinterest"></i></a></li><?php endif; ?>
	<?php if ( !empty($flickr) ) : ?><li><a href="<?php echo esc_url($flickr); ?>" title="<?php echo esc_html__( 'Flickr', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_flickr"></i></a></li><?php endif; ?>
	<?php if ( !empty($youtube) ) : ?><li><a href="<?php echo esc_url($youtube); ?>" title="<?php echo esc_html__( 'YouTube', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_youtube"></i></a></li><?php endif; ?>
	<?php if ( !empty($vimeo) ) : ?><li><a href="<?php echo esc_url($vimeo); ?>" title="<?php echo esc_html__( 'Vimeo', 'dgtheme-greenarrow' ); ?>" target="_blank"><i class="dgt_icon_vimeo"></i></a></li><?php endif; ?>
</ul>