<?php

// CHECK FOR THEME UPDATES
require get_template_directory() . '/updates/theme-update-checker.php';
$dgtheme_update_checker = new DGThemeUpdateChecker(
    'dgtheme-greenarrow',
    'http://dgtheme.com/update/greenarrow/update.json'
);

// CHECK FOR REQUIRED PLUGINS
require_once get_template_directory() . '/library/dgtheme-plugins-activation.php';

function dgtheme_register_required_plugins() {

    $plugins = array(
        array(
            'name'      =>  esc_html__( 'KingComposer - free drag and drop page builder', 'dgtheme-greenarrow' ),
            'slug'      =>  'kingcomposer',
            'required'  =>  true
        ),
        array(
            'name'      =>  esc_html__( 'KingComposer - pro version', 'dgtheme-greenarrow' ),
            'slug'      =>  'kc_pro',
            'source'    =>  'http://dgtheme.com/plugins/kc_pro.zip',
            'required'  =>  true
        ),
        array(
            'name'      =>  esc_html__( 'Contact Form 7', 'dgtheme-greenarrow' ),
            'slug'      =>  'contact-form-7',
            'required'  =>  true
        )
    );

    $config = array(
        'id'            =>  'dgtheme-greenarrow',
        'default_path'  =>  '',
        'menu'          =>  'tgmpa-install-plugins',
        'has_notices'   =>  true,
        'dismissable'   =>  true,
        'dismiss_msg'   =>  '',
        'is_automatic'  =>  false,
        'message'       =>  ''
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'dgtheme_register_required_plugins' );

// CONVERT HEX TO RGB
function dgtheme_hex_to_rgb( $hex_color ) {

    $hex_color = str_replace("#", "", $hex_color);

    if(strlen($hex_color) == 3) {
        $r = hexdec( substr( $hex_color, 0, 1 ).substr( $hex_color, 0, 1 ) );
        $g = hexdec( substr( $hex_color, 1, 1 ).substr( $hex_color, 1, 1 ) );
        $b = hexdec( substr( $hex_color, 2, 1 ).substr( $hex_color, 2, 1 ) );
    } else {
        $r = hexdec( substr( $hex_color, 0, 2 ) );
        $g = hexdec( substr( $hex_color, 2, 2 ) );
        $b = hexdec( substr( $hex_color, 4, 2 ) );
    }
    $rgb = array( $r, $g, $b );

    return implode( ", ", $rgb );

}

// COLOR BRIGHTNESS
function dgtheme_color_brightness( $hex, $percent ) {

    $hash = '';

    if ( stristr( $hex, '#' ) ) {
        $hex = str_replace( '#', '', $hex );
        $hash = '#';
    }

    $rgb = array( hexdec( substr( $hex, 0, 2 ) ), hexdec( substr( $hex, 2, 2 ) ), hexdec( substr( $hex, 4, 2) ) );

    for ( $i=0; $i<3; $i++ ) {

        if ($percent > 0) {
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
        } else {
            $positivePercent = $percent - ($percent*2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
        }

        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }

    }

    $hex = '';

    for( $i=0; $i < 3; $i++ ) {

        $hexDigit = dechex($rgb[$i]);

        if(strlen($hexDigit) == 1) {
            $hexDigit = "0" . $hexDigit;
        }

        $hex .= $hexDigit;

    }

    return $hash.$hex;

}

// DEFINE CONTENT WIDTH
if ( ! isset( $content_width ) ) {
    $content_width = 1920;
}

// ADDING IMAGE SIZE
add_image_size( 'dgtheme-blog-image', 1920, 600, array( 'center', 'center' ) );
 
function dgtheme_custom_images( $sizes ) {
    return array_merge( $sizes, array(
        'dgtheme-blog-image' => esc_html__( 'Blog images', 'dgtheme-greenarrow' ),
    ) );
}
add_filter( 'image_size_names_choose', 'dgtheme_custom_images' );

// MENU SUPPORT
require_once get_template_directory() . '/library/dgtheme-bootstrap-navwalker.php';

// ADD ACTIVE CLASS TO MENU ITEMS
function dgtheme_menu_css_class($classes, $item)
{

    $slug    = sanitize_title($item->title);
    $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
    $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

    $classes[] = 'menu-' . $slug;

    $classes = array_unique($classes);

    return array_filter($classes);

}
add_filter('nav_menu_css_class', 'dgtheme_menu_css_class', 10, 2);

// CREATE PAGINATION
function dgtheme_pagination($pages = '', $range = 2) {

    $out = '';
    $showitems = ( $range * 2 ) + 1;

    global $paged;

    if ( empty($paged) ) $paged = 1;

    if ( $pages == '' ) {

        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if ( !$pages ) {
            $pages = 1;
        }
    }

    if ( !is_single() ) {

        if ( 1 != $pages ) {

            $out .= '<div class="pagination"><span class="dgt_pages_count">' . esc_html__('Page', 'dgtheme-greenarrow') . ' ' . $paged . ' ' . esc_html__('of', 'dgtheme-greenarrow') . ' ' . $pages . '</span>';

            if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) $out .= '<a href="'.get_pagenum_link(1).'">&laquo; ' . esc_html__('First', 'dgtheme-greenarrow') . '</a>';
            if ( $paged > 1 && $showitems < $pages ) $out .= '<a href="'.get_pagenum_link($paged - 1).'">&lsaquo; ' . esc_html__('Previous', 'dgtheme-greenarrow') . '</a>';

            for ( $i=1; $i <= $pages; $i++ ) {
                if ( 1 != $pages && ( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems )) {
                    $out .= ( $paged == $i ) ? '<span class="current">'.$i.'</span>' : '<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>';
                }
            }

            if ( $paged < $pages && $showitems < $pages ) $out .= '<a href="'.get_pagenum_link($paged + 1).'">' . esc_html__('Next', 'dgtheme-greenarrow') . ' &rsaquo;</a>';
            if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) $out .= '<a href="'.get_pagenum_link($pages).'">' . esc_html__('Last', 'dgtheme-greenarrow') . ' &raquo;</a>';

            $out .= '<span class="dgt_end_pages"></span></div>';

            echo $out;

        }

    } else {

        $out .= previous_post_link( '<div class="dgt_previous pull-left">%link</div>', '<div class="dgt_post_nav_ico"><i class="dgt_icon_reply"></i></div><div class="dgt_post_nav_title"><i class="dgt_icon_reply"></i> %title</div>' );
        $out .= next_post_link( '<div class="dgt_next pull-right">%link</div>', '<div class="dgt_post_nav_ico"><i class="dgt_icon_share"></i></div><div class="dgt_post_nav_title">%title <i class="dgt_icon_share"></i></div>' );

        echo $out;

    }

}

?>