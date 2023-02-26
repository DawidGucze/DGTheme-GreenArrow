<?php
$logo_id = get_theme_mod( 'custom_logo' );
$basic_options = get_option( 'dgtheme_basic_options' );
$header_options = get_option( 'dgtheme_header_options' );

$logo_url = ( !empty( $logo_id ) ) ? wp_get_attachment_image_src( $logo_id , 'full' ) : '';
$logo = ( !empty( $logo_url ) ) ? $logo_url[0] : '';

$mobile_logo = ( isset( $basic_options['dgt_upload_mobile_logo'] ) ) ? $basic_options['dgt_upload_mobile_logo'] : '';
$layout_style = ( isset( $basic_options['dgt_layout_style'] ) ) ? $basic_options['dgt_layout_style'] : '';
$phone = ( isset( $basic_options['dgt_basic_phone'] ) ) ? $basic_options['dgt_basic_phone'] : '';
$email = ( isset( $basic_options['dgt_basic_email'] ) ) ? $basic_options['dgt_basic_email'] : '';
$address = ( isset( $basic_options['dgt_basic_address'] ) ) ? $basic_options['dgt_basic_address'] : '';
$show_some_love = ( isset( $basic_options['dgt_show_some_love'] ) ) ? $basic_options['dgt_show_some_love'] : '';

$top_bar = ( isset( $header_options['dgt_show_top_bar'] ) ) ? $header_options['dgt_show_top_bar'] : '';
$contact_info = ( isset( $header_options['dgt_show_contact_info'] ) ) ? $header_options['dgt_show_contact_info'] : '';
$top_bar_menu = ( isset( $header_options['dgt_show_top_bar_menu'] ) ) ? $header_options['dgt_show_top_bar_menu'] : '';
$social_media = ( isset( $header_options['dgt_show_social'] ) ) ? $header_options['dgt_show_social'] : '';
$contact_info_position = ( isset( $header_options['dgt_contact_info_position'] ) ) ? $header_options['dgt_contact_info_position'] : '';
$top_bar_menu_position = ( isset( $header_options['dgt_top_bar_menu_position'] ) ) ? $header_options['dgt_top_bar_menu_position'] : 1;
$social_media_position = ( isset( $header_options['dgt_social_position'] ) ) ? $header_options['dgt_social_position'] : '';
$search_form = ( isset( $header_options['dgt_show_search'] ) ) ? $header_options['dgt_show_search'] : '';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="dgt_go_top"<?php echo ( $show_some_love == 1 ) ? ' class="some_love_enabled"' : ''; ?>><span><i class="dgt_icon_chevron-up"></i></span></div>

<?php if ( $layout_style == 3 ) : ?>
<!-- START BOXED STYLE -->
<div id="dgt_boxed">
<?php endif; ?>

<!-- START HEADER -->
<div id="dgt_header">

	<?php if ( $top_bar == 1 ) : ?>
	<!-- START TOP BAR -->
	<div id="dgt_top_bar"<?php echo ( $layout_style == 2 ) ? ' class="wide"' : ''; ?>>

		<?php if ( $layout_style == 2 ) : ?>
		<!-- START WIDE STYLE -->
		<div class="dgt_wide">
		<?php endif; ?>

			<?php if ( $contact_info == 1 ) : ?>
			<!-- start contact information -->
			<div class="dgt_contact_info pull-<?php echo ( $contact_info_position == 1 ) ? 'left' : 'right'; ?>">
				<ul>
					<?php if ( !empty($phone) ) : ?><li><p><i class="dgt_icon_phone"></i><?php echo esc_attr( $phone ); ?></p></li><?php endif; ?>
					<?php if ( !empty($email) ) : ?><li><a href="mailto:<?php echo esc_attr($email); ?>"><i class="dgt_icon_envelope"></i><?php echo esc_attr( $email ); ?></a></li><?php endif; ?>
					<?php if ( !empty($address) ) : ?><li><p><i class="dgt_icon_home"></i><?php echo esc_attr( $address ); ?></p></li><?php endif; ?>
				</ul>
			</div>
			<!-- end contact information -->
			<?php endif; ?>

			<?php if ( $social_media == 1 ) : ?>
			<!-- start social media -->
			<div class="dgt_social_media pull-<?php echo ( $social_media_position == 1 ) ? 'left' : 'right'; ?>">
				<?php get_template_part('parts/social'); ?>
			</div>
			<!-- end social media -->
			<?php endif; ?>

			<?php if ( $top_bar_menu == 1 ) : ?>
			<!-- start top bar menu -->
			<div class="dgt_menu pull-<?php echo ( $top_bar_menu_position == 1 ) ? 'left' : 'right'; ?>">
				<?php
				wp_nav_menu( array(
					'theme_location'  =>  'top_bar_menu',
	                'depth'           =>  1,
					'fallback_cb'     =>  'dgtheme_bootstrap_navwalker::fallback',
					'walker'          =>  new dgtheme_bootstrap_navwalker()
				));
				?>
			</div>
			<!-- end top bar menu -->
			<?php endif; ?>

		<?php if ( $layout_style == 2 ) : ?>
		</div>
		<!-- END WIDE STYLE -->
		<?php endif; ?>

	</div>
	<!-- END TOP BAR -->
	<?php endif; ?>

	<!-- START HEAD -->
	<div id="dgt_head">

		<?php if ( $layout_style == 2 ) : ?>
		<!-- START WIDE STYLE -->
		<div class="dgt_wide">
		<?php endif; ?>

			<!-- start site title -->
			<div class="dgt_site_title pull-left">
			<?php if ( $mobile_logo ) : ?>
				<a class="desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
				<a class="mobile" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $mobile_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			<?php else : ?>
				<a class="desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
				<a class="mobile" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			<?php endif; ?>
			</div>
			<!-- end site title -->

			<!-- start main menu -->
			<div class="dgt_main_menu pull-left">
	            <?php
	            wp_nav_menu( array(
	                    'theme_location'   =>  'main_menu',
	                    'depth'            =>  3,
	                    'container'        =>  'div',
	                    'container_class'  =>  'navbar-collapse navbar-1-collapse',
	                    'menu_class'       =>  'nav navbar-nav',
	                    'fallback_cb'      =>  'dgtheme_bootstrap_navwalker::fallback',
	                    'walker'           =>  new dgtheme_bootstrap_navwalker()
	            ));
	            ?>
			</div>
			<!-- end main menu -->

			<!-- start responsive menu button -->
			<div class="dgt_responsive_menu_btn<?php echo ( $search_form != 1 ) ? ' no_search' : ''; ?>">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<!-- end responsive menu button -->

			<?php if ( $search_form == 1 ) : ?>
			<!-- start search form -->
			<div class="dgt_search"><div class="dgt_search-box"></div><?php get_search_form(); ?></div>
			<!-- end search form -->
			<?php endif; ?>

		<?php if ( $layout_style == 2 ) : ?>
		</div>
		<!-- END WIDE STYLE -->
		<?php endif; ?>

	</div>
	<!-- END HEAD -->

</div>
<!-- END HEADER -->

<!-- start responsive menu -->
<div class="dgt_main_menu_responsive">
    <?php
    wp_nav_menu( array(
            'theme_location'  =>  'main_menu',
            'items_wrap'      =>  '<ul class="flexnav" data-breakpoint="800">%3$s</ul>',
            'depth'           =>  3
    ));
    ?>
</div>
<!-- end responsive menu -->

<div class="dgt_clear"></div>