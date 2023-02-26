<?php

$basic_options = get_option( 'dgtheme_basic_options' );
$footer_options = get_option( 'dgtheme_footer_options' );

$layout_style = ( isset( $basic_options['dgt_layout_style'] ) ) ? $basic_options['dgt_layout_style'] : '';
$show_some_love = ( isset( $basic_options['dgt_show_some_love'] ) ) ? $basic_options['dgt_show_some_love'] : '';

$widget_section = ( isset( $footer_options['dgt_show_footer_section'] ) ) ? $footer_options['dgt_show_footer_section'] : '';
$columns = ( isset( $footer_options['dgt_footer_section_column'] ) ) ? $footer_options['dgt_footer_section_column'] : '';
$copyright = ( isset( $footer_options['dgt_alternative_copyright'] ) ) ? $footer_options['dgt_alternative_copyright'] : '';
$copyright_position = ( isset( $footer_options['dgt_footer_copyright_position'] ) ) ? $footer_options['dgt_footer_copyright_position'] : '';
$footer_menu = ( isset( $footer_options['dgt_show_footer_menu'] ) ) ? $footer_options['dgt_show_footer_menu'] : '';
$footer_menu_position = ( isset( $footer_options['dgt_footer_menu_position'] ) ) ? $footer_options['dgt_footer_menu_position'] : '';
$footer_social = ( isset( $footer_options['dgt_show_footer_social'] ) ) ? $footer_options['dgt_show_footer_social'] : '';
$footer_social_position = ( isset( $footer_options['dgt_footer_social_position'] ) ) ? $footer_options['dgt_footer_social_position'] : '';

?>

<!-- START FOOTER -->
<div id="dgt_footer">

	<?php if ( $widget_section == 1 ) : ?>
	<!-- start widget section -->
	<div class="dgt_widget_section<?php echo ( $layout_style == 2 ) ? ' wide' : ''; ?>">

		<?php if ( $layout_style == 2 ) : ?>
		<!-- START WIDE STYLE -->
		<div class="dgt_wide">
		<?php endif; ?>

			<?php if ( $columns == 12 || $columns == 6 || $columns == 4 || $columns == 3 ) : ?>
			<div class="dgt_footer_widget col-md-<?php echo esc_attr($columns); ?>">
				<?php if ( is_active_sidebar( 'footer-1' ) ) dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $columns == 6 || $columns == 4 || $columns == 3 ) : ?>
			<div class="dgt_footer_widget col-md-<?php echo esc_attr($columns); ?>">
				<?php if ( is_active_sidebar( 'footer-2' ) ) dynamic_sidebar( 'footer-2' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $columns == 4 || $columns == 3 ) : ?>
			<div class="dgt_footer_widget col-md-<?php echo esc_attr($columns); ?>">
				<?php if ( is_active_sidebar( 'footer-3' ) ) dynamic_sidebar( 'footer-3' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $columns == 3 ) : ?>
			<div class="dgt_footer_widget col-md-<?php echo esc_attr($columns); ?>">
				<?php if ( is_active_sidebar( 'footer-4' ) ) dynamic_sidebar( 'footer-4' ); ?>
			</div>
			<?php endif; ?>

		<?php if ( $layout_style == 2 ) : ?>
		</div>
		<!-- END WIDE STYLE -->
		<?php endif; ?>

	</div>
	<!-- end widget section -->
	<?php endif; ?>

	<!-- start foot bar -->
	<div class="dgt_foot_bar<?php echo ( $layout_style == 1 ) ? ' full' : ''; ?><?php echo ( $layout_style == 2 ) ? ' wide' : ''; ?><?php echo ( $layout_style == 3 ) ? ' boxed' : ''; ?>">

		<?php if ( $layout_style == 2 ) : ?>
		<!-- START WIDE STYLE -->
		<div class="dgt_wide">
		<?php endif; ?>

			<!-- start copyright -->
			<div class="dgt_copyright<?php echo ( $copyright_position == 1 ) ? ' pull-left' : ' pull-right'; ?>">
				<?php
					printf( esc_html__('Copyright %1$s %2$s %3$s.', 'dgtheme-greenarrow'), '&copy;', esc_attr(date('Y')), esc_attr(get_bloginfo('name')) );
				if ( !empty($copyright) ) :
					echo ' ' . esc_attr( $copyright );
				endif;
				?>
			</div>
			<!-- end copyright -->

			<?php if ( $footer_menu == 1 ) : ?>
			<!-- start footer menu -->
			<div class="dgt_menu<?php echo ( $footer_menu_position == 1 ) ? ' pull-left' : ' pull-right'; ?>">
				<?php
				wp_nav_menu( array(
					'theme_location'   =>  'footer_menu',
					'fallback_cb'      =>  'dgtheme_bootstrap_navwalker::fallback',
					'walker'           =>  new dgtheme_bootstrap_navwalker()
				));
				?>
			</div>
			<!-- end footer menu -->
			<?php endif; ?>

			<?php if ( $footer_social == 1 ) : ?>
			<!-- start social media -->
			<div class="dgt_social_media<?php echo ( $footer_social_position == 1 ) ? ' pull-left' : ' pull-right'; ?>">
				<?php get_template_part('parts/social'); ?>
			</div>
			<!-- end social media -->
			<?php endif; ?>

		<?php if ( $layout_style == 2 ) : ?>
		</div>
		<!-- END WIDE STYLE -->
		<?php endif; ?>

	</div>
	<!-- end foot bar -->

	<?php if ( $show_some_love == 1 ) : ?>
	<!-- start show some love -->
	<div class="dgt_show_love">
		<p class="text-center"><?php printf(esc_html__('%1$s theme by %2$s', 'dgtheme-greenarrow'), '<a href="' . esc_url('https://themeforest.net/user/dgtheme') . '">GreenArrow</a>', 'DGTheme'); ?></p>
	</div>
	<!-- end show some love -->
	<?php endif; ?>

</div>
<!-- END FOOTER -->

<?php if ( $layout_style == 3 ) : ?>
</div>
<!-- END BOXED STYLE -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>