<?php

$page_options = get_option( 'dgtheme_page_options' );

$left_sidebar = ( isset( $page_options['dgt_page_left_sidebar'] ) ) ? $page_options['dgt_page_left_sidebar'] : '';
$right_sidebar = ( isset( $page_options['dgt_page_right_sidebar'] ) ) ? $page_options['dgt_page_right_sidebar'] : '';

if ( $left_sidebar && $right_sidebar ) {
	$columns = '6';
} else {
	$columns = '3';
}

?>

<?php if ( $left_sidebar == 1 ) : ?>
<div class="dgt_mobile_sidebar col-md-<?php echo esc_attr( $columns ); ?>">
	<?php if ( is_active_sidebar( 'blog-left-sidebar' ) ) dynamic_sidebar( 'blog-left-sidebar' ); ?>
</div>
<?php endif; ?>
<?php if ( $right_sidebar == 1 ) : ?>
<div class="dgt_mobile_sidebar col-md-<?php echo esc_attr( $columns ); ?>">
	<?php if ( is_active_sidebar( 'blog-right-sidebar' ) ) dynamic_sidebar( 'blog-right-sidebar' ); ?>
</div>
<?php endif; ?>