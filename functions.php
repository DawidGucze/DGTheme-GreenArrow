<?php

// LOAD TRANSLATION
load_theme_textdomain( 'dgtheme-greenarrow', get_template_directory() . '/languages' );

// INCLUDE THEME SUPPORT AND OPTIONS
get_template_part('includes/theme', 'support');
get_template_part('includes/theme', 'options');

// ADDING THEME SUPPORT
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );

// REGISTER SCRIPTS
function dgtheme_register_scripts() {

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '', true);
    wp_register_script('flexnav', get_template_directory_uri() . '/js/flexnav.js', array( 'jquery' ), '', true);
    wp_register_script('script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true);

    wp_enqueue_script('bootstrap');
    wp_enqueue_script('flexnav');
    wp_enqueue_script('script');

}
add_action('wp_enqueue_scripts', 'dgtheme_register_scripts');

// REGISTER STYLES
function dgtheme_register_styles() {

    wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '', 'all' );
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '', 'all' );
    wp_register_style( 'flexnav', get_template_directory_uri() . '/css/flexnav.css', array(), '', 'all' );
    wp_register_style( 'dgtfont', get_template_directory_uri() . '/css/dgtfont.css', array(), '', 'all' );

    wp_enqueue_style( 'style');
    wp_enqueue_style( 'bootstrap');
    wp_enqueue_style( 'flexnav');
    wp_enqueue_style( 'dgtfont');

}
add_action('wp_enqueue_scripts', 'dgtheme_register_styles');

// REGISTER THEME COLOR
function dgtheme_register_theme_color() {

    wp_register_style( 'color', get_template_directory_uri() . '/css/color.css', array(), '', 'all' );
    wp_enqueue_style( 'color' );

    $basic_options = get_option( 'dgtheme_basic_options' );
    $theme_color = ( isset( $basic_options['dgt_theme_color'] ) ) ? $basic_options['dgt_theme_color'] : '#26ad60';

    $darker = -0.8;
    $dark = dgtheme_color_brightness( $theme_color, $darker );

    $transparent = 0.85;
    $rgba = dgtheme_hex_to_rgb( $theme_color ) . ', ' . $transparent;

    $custom_css = '
        #dgt_go_top,
        #dgt_header:after,
        #dgt_top_bar ul li a:hover,
        .dgt_search_icon:hover,
        .dgt_search_icon:focus,
        .dgt_search.dgt_search_open .dgt_search_icon,
        .nav .open > a,
        .nav .open > a:hover,
        .nav .open > a:focus,
        .dropdown-menu > li > a:hover,
        .dropdown-menu > li > a:focus,
        .dropdown-menu > .active > a,
        .dropdown-menu > .active > a:hover,
        .dropdown-menu > .active > a:focus,
        .dgt_main_menu .navbar-nav > .active > a,
        .dgt_main_menu .navbar-nav > .active > a:focus,
        .dgt_main_menu .navbar-nav > .active > a:hover,
        .dropdown-submenu:hover > a,
        .dgt_title_container,
        .dgt_post_container .dgt_post_footer .dgt_show_more:hover,
        .dgt_post_container .dgt_post_thumbnail .dgt_date,
        .dgt_post .dgt_sticky_post,
        #dgt_comments .comment-respond #submit,
        a.comment-reply-link,
        .widget .dgt_search_submit,
        .widget .calendar_wrap table td a:hover,
        .widget .calendar_wrap tfoot td#prev a:hover,
        .widget .calendar_wrap tfoot td#next a:hover,
        .dgt_widget_section .widget .dgt_search_icon:hover,
        .dgt_widget_section .widget .dgt_search_icon:focus,
        .dgt_widget_section .widget input[type="submit"]:hover,
        .dgt_widget_section .widget input[type="submit"]:focus,
        .dgt_responsive_menu_btn:hover,
        .dgt_responsive_menu_btn:focus,
        .single #dgt_pages {
            background-color: ' . esc_attr( $theme_color ) . ';
        }

        #dgt_go_top:hover,
        #dgt_comments:hover .comment-respond:hover #submit,
        a.comment-reply-link:hover,
        .widget .dgt_search_submit:hover,
        .single #dgt_pages a:hover {
            background-color: ' . esc_attr( $dark ) . ';
        }

        .dgt_post_container .dgt_post_thumbnail .dgt_mask,
        .dgt_post_thumbnail .dgt_title_container {
            background-color: rgba(' . esc_attr( $rgba ) . ');
        }

        .dropdown li:first-child,
        .dropdown-menu .dropdown-submenu .dropdown-menu li:first-child,
        .dgt_post_container .dgt_post_content blockquote p,
        .dgt_widget_section .widget input[type="submit"]:hover,
        .dgt_widget_section .widget input[type="submit"]:focus {
            border-top-color: ' . esc_attr( $theme_color ) . ';
        }

        .dgt_search_box,
        .dgt_post_container,
        .search .page .dgt_post_container,
        .pagination span,
        .pagination .current,
        .pagination a:hover,
        #dgt_comments #respond,
        #dgt_comments .comment,
        .dgt_sidebar .widget,
        .dgt_mobile_sidebar .widget,
        .dgt_foot_bar {
            border-bottom-color: ' . esc_attr( $theme_color ) . ';
        }

        #dgt_comments #respond:hover,
        .widget .dgt_search_submit:hover + .dgt_search_box {
            border-bottom-color: ' . esc_attr( $dark ) . ';
        }

        #dgt_comments .comment.bypostauthor {
            border-top-color: ' . esc_attr( $theme_color ) . ';
        }

        a,
        .dgt_site_title a,
        .dgt_post_container .dgt_post_content .dgt_post_title a:hover,
        .dgt_post_container .dgt_post_meta .dgt_meta a:hover,
        .dgt_post_container .dgt_post_footer .dgt_show_more,
        .pagination span,
        .pagination .current,
        .pagination a:hover,
        .widget a:hover,
        .widget .calendar_wrap table td a,
        .dgt_foot_bar ul li a:hover,
        .dgt_foot_bar ul li a:active,
        .dgt_show_love a {
            color: ' . esc_attr( $theme_color ) . ';
        }

        a:hover {
            color: ' . esc_attr( $dark ) . ';
        }

        @media all and (max-width: 1023px) {
            .single #dgt_pages .dgt_wide a {
                background-color: ' . esc_attr( $dark ) . ';
            }
            .dgt_post_container .dgt_post_footer .dgt_show_more {
                background-color: ' . esc_attr( $theme_color ) . ';
                color: #ffffff;
            }
        }
    ';

    wp_add_inline_style( 'color', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'dgtheme_register_theme_color' );

// REGISTER ADMIN COLOR PICKER
function dgtheme_enqueue_color_picker( $hook_suffix ) {

    global $wp_version;
    
    if ( 3.5 <= $wp_version ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
    } else {
        wp_enqueue_style( 'farbtastic' );
        wp_enqueue_script( 'farbtastic' );
    }
    
    wp_enqueue_script( 'colors-picker', get_template_directory_uri() . '/js/colors-picker.js' );

}

// REGISTER ADMIN STYLES
function dgtheme_register_admin_styles() {

    wp_register_style( 'admin', get_template_directory_uri() . '/css/admin.css', array(), '', 'all' );

    wp_enqueue_style('admin');

}

// REGISTER ADMIN MEDIA SELECTOR
function dgtheme_media_selector_script() {

    $dgtheme_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );

    echo '<script type="text/javascript">
        jQuery( document ).ready( function( $ ) {

            var file_frame;
            var set_to_post_id = ' . $dgtheme_saved_attachment_post_id . '

            jQuery("#dgt_upload_mobile_logo").on("click", function( event ){
                event.preventDefault();

                if ( file_frame ) {

                    file_frame.uploader.uploader.param( "post_id", set_to_post_id );
                    file_frame.open();

                    return;

                } else {

                    wp.media.model.settings.post.id = set_to_post_id;

                }

                file_frame = wp.media.frames.file_frame = wp.media({
                    title: "' . esc_html__( 'Select a image to upload', 'dgtheme-greenarrow' ) . '",
                    button: {
                        text: "' . esc_html__( 'Use this image', 'dgtheme-greenarrow' ) . '",
                    },
                    multiple: false
                });

                file_frame.on( "select", function() {

                    attachment = file_frame.state().get("selection").first().toJSON();

                    $( "#dgt_logo_preview" ).attr( "src", attachment.url ).css( "width", "auto" );
                    $( "#dgt_attachment_url" ).val( attachment.url );

                });

                file_frame.open();
            });

            jQuery("#dgt_reset").on("click", function( event ){

                $( "#dgt_logo_preview" ).attr( "src", "" );
                $( "#dgt_attachment_url" ).val( "" );

            });

        });
    </script>';

}

// PRINT ADMIN SCRIPTS
if ( is_admin() ) {
    $theme_admin_page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : '';
    if ( $theme_admin_page == 'dgtheme_theme_options' ) {

        add_action( 'admin_print_styles', 'dgtheme_register_admin_styles' );
        add_action( 'admin_enqueue_scripts', 'dgtheme_enqueue_color_picker' );
        add_action( 'admin_print_footer_scripts', 'dgtheme_media_selector_script' );

    }
}

// REGISTER MENUS
register_nav_menus( array(
    'main_menu'     =>  esc_html__( 'Main Menu', 'dgtheme-greenarrow' ),
    'top_bar_menu'  =>  esc_html__( 'Top Bar Menu', 'dgtheme-greenarrow' ),
    'footer_menu'   =>  esc_html__( 'Footer Menu', 'dgtheme-greenarrow' )
));

// REGISTER SIDEBARS
function dgtheme_register_sidebars() {

    register_sidebar( array(
        'name'           =>  esc_html__( 'Left Blog Sidebar', 'dgtheme-greenarrow' ),
        'id'             =>  'blog-left-sidebar',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Right Blog Sidebar', 'dgtheme-greenarrow' ),
        'id'             =>  'blog-right-sidebar',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Left Custom Sidebar', 'dgtheme-greenarrow' ),
        'id'             =>  'custom-left-sidebar',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Right Custom Sidebar', 'dgtheme-greenarrow' ),
        'id'             =>  'custom-right-sidebar',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Footer - column 1', 'dgtheme-greenarrow' ),
        'id'             =>  'footer-1',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Footer - column 2', 'dgtheme-greenarrow' ),
        'id'             =>  'footer-2',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Footer - column 3', 'dgtheme-greenarrow' ),
        'id'             =>  'footer-3',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));
    register_sidebar( array(
        'name'           =>  esc_html__( 'Footer - column 4', 'dgtheme-greenarrow' ),
        'id'             =>  'footer-4',
        'before_widget'  =>  '<div id="%1$s" class="widget %2$s">',
        'after_widget'   =>  '</div>',
        'before_title'   =>  '<div class="widget-title"><h3>',
        'after_title'    =>  '</h3></div>'
    ));

}
add_action( 'widgets_init', 'dgtheme_register_sidebars' );

?>