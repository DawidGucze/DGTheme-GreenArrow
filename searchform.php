<?php

$header_options = get_option( 'dgtheme_header_options' );
$top_bar = ( isset( $header_options['dgt_show_top_bar'] ) ) ? $header_options['dgt_show_top_bar'] : '';
$border = '';
$top = '';

if ( !$top_bar ) {
	$border = ' style="border-top: 3px solid #26ad60;"';
	$top = ' style="top: 3px;"';
}

?>

<form role="search" method="get" class="dgt_search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="dgt_search_input"<?php echo $border; ?> placeholder="<?php esc_html_e( 'Enter your search term...', 'dgtheme-greenarrow' ); ?>" type="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<input class="dgt_search_submit" type="submit" value="<?php esc_html_e( 'Search', 'dgtheme-greenarrow' ); ?>">
	<div class="dgt_search_box"></div>
	<span class="dgt_search_icon"><i class="dgt_icon_search"></i></span>
	<span class="dgt_search_space"<?php echo $top; ?>></span>
</form>