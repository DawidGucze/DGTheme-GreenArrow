<?php

$blog_options = get_option( 'dgtheme_blog_options' );

$left_sidebar = ( isset( $blog_options['dgt_single_left_sidebar'] ) ) ? $blog_options['dgt_single_left_sidebar'] : '';
$right_sidebar = ( isset( $blog_options['dgt_single_right_sidebar'] ) ) ? $blog_options['dgt_single_right_sidebar'] : '';

if ( $left_sidebar && $right_sidebar ) {
	$columns = '6';
} else {
	$columns = '3';
}

?>

<?php if ( $left_sidebar == 1 ) : ?>
<div class="dgt_mobile_sidebar col-md-<?php echo esc_attr( $columns ); ?>">
	<?php if ( is_active_sidebar( 'custom-left-sidebar' ) ) dynamic_sidebar( 'custom-left-sidebar' ); ?>
</div>
<?php endif; ?>
<?php if ( $right_sidebar == 1 ) : ?>
<div class="dgt_mobile_sidebar col-md-<?php echo esc_attr( $columns ); ?>">
	<?php if ( is_active_sidebar( 'custom-right-sidebar' ) ) dynamic_sidebar( 'custom-right-sidebar' ); ?>
</div>
<?php endif; ?>