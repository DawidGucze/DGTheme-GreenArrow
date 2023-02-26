<?php

// CREATE MENU
function dgtheme_theme_menu() {

    add_theme_page(
        esc_html__( 'GreenArrow Settings', 'dgtheme-greenarrow' ),
        esc_html__( 'GreenArrow Settings', 'dgtheme-greenarrow' ),
        'administrator',
        'dgtheme_theme_options',
        'dgtheme_setting_page_display'
    );

}
add_action( 'admin_menu', 'dgtheme_theme_menu' );

// CREATE ADMIN BAR MENU
function dgtheme_admin_bar_menu() {

    global $wp_admin_bar;

    $wp_admin_bar->add_menu( array(
        'parent'  =>  false,
        'id'      =>  'dgt_admin_topbar_menu',
        'title'   =>  esc_html__( 'GreenArrow Settings', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options')
    ));
    $wp_admin_bar->add_menu( array(
        'parent'  =>  'dgt_admin_topbar_menu',
        'id'      =>  'dgt_admin_topbar_menu_basic',
        'title'   =>  esc_html__( 'Basic Options', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options&tab=basic_options')
    ));
    $wp_admin_bar->add_menu( array(
        'parent'  =>  'dgt_admin_topbar_menu',
        'id'      =>  'dgt_admin_topbar_menu_header',
        'title'   =>  esc_html__( 'Header Options', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options&tab=header_options')
    ));
    $wp_admin_bar->add_menu( array(
        'parent'  =>  'dgt_admin_topbar_menu',
        'id'      =>  'dgt_admin_topbar_menu_blog',
        'title'   =>  esc_html__( 'Blog Options', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options&tab=blog_options')
    ));
    $wp_admin_bar->add_menu( array(
        'parent'  =>  'dgt_admin_topbar_menu',
        'id'      =>  'dgt_admin_topbar_menu_page',
        'title'   =>  esc_html__( 'Page Options', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options&tab=page_options')
    ));
    $wp_admin_bar->add_menu( array(
        'parent'  =>  'dgt_admin_topbar_menu',
        'id'      =>  'dgt_admin_topbar_menu_social',
        'title'   =>  esc_html__( 'Social Options', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options&tab=social_options')
    ));
    $wp_admin_bar->add_menu( array(
        'parent'  =>  'dgt_admin_topbar_menu',
        'id'      =>  'dgt_admin_topbar_menu_footer',
        'title'   =>  esc_html__( 'Footer Options', 'dgtheme-greenarrow' ),
        'href'    =>  admin_url( 'themes.php?page=dgtheme_theme_options&tab=footer_options')
    ));

}
add_action( 'wp_before_admin_bar_render', 'dgtheme_admin_bar_menu' );

// DISPLAY SETTINGS PAGE
function dgtheme_setting_page_display( $active_tab = '' ) {
?>

    <div class="wrap">
    
        <div id="icon-themes" class="icon32"></div>
        <h2><?php esc_html_e( 'GreenArrow Options', 'dgtheme-greenarrow' ); ?></h2>
        <?php settings_errors(); ?>
        
        <?php

            $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'basic_options';

            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            }

        ?>
        
        <h2 class="nav-tab-wrapper">
            <a href="?page=dgtheme_theme_options&tab=basic_options" class="nav-tab<?php echo $active_tab == 'basic_options' ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Basic Options', 'dgtheme-greenarrow' ); ?></a>
            <a href="?page=dgtheme_theme_options&tab=header_options" class="nav-tab<?php echo $active_tab == 'header_options' ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Header Options', 'dgtheme-greenarrow' ); ?></a>
            <a href="?page=dgtheme_theme_options&tab=blog_options" class="nav-tab<?php echo $active_tab == 'blog_options' ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Blog Options', 'dgtheme-greenarrow' ); ?></a>
            <a href="?page=dgtheme_theme_options&tab=page_options" class="nav-tab<?php echo $active_tab == 'page_options' ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Page Options', 'dgtheme-greenarrow' ); ?></a>
            <a href="?page=dgtheme_theme_options&tab=social_options" class="nav-tab<?php echo $active_tab == 'social_options' ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Social Options', 'dgtheme-greenarrow' ); ?></a>
            <a href="?page=dgtheme_theme_options&tab=footer_options" class="nav-tab<?php echo $active_tab == 'footer_options' ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Footer Options', 'dgtheme-greenarrow' ); ?></a>
        </h2>
        
        <form id="dgt_options_form" method="post" action="options.php">
            <?php
            
                if ( $active_tab == 'basic_options' ) {
                
                    settings_fields( 'dgtheme_basic_options' );
                    do_settings_sections( 'dgtheme_basic_options' );
                    
                } elseif ( $active_tab == 'header_options' ) {
                
                    settings_fields( 'dgtheme_header_options' );
                    do_settings_sections( 'dgtheme_header_options' );
                    
                } elseif ( $active_tab == 'blog_options' ) {
                
                    settings_fields( 'dgtheme_blog_options' );
                    do_settings_sections( 'dgtheme_blog_options' );
                    
                } elseif ( $active_tab == 'page_options' ) {
                
                    settings_fields( 'dgtheme_page_options' );
                    do_settings_sections( 'dgtheme_page_options' );
                    
                } elseif ( $active_tab == 'social_options' ) {
                
                    settings_fields( 'dgtheme_social_options' );
                    do_settings_sections( 'dgtheme_social_options' );
                    
                } else {
                
                    settings_fields( 'dgtheme_footer_options' );
                    do_settings_sections( 'dgtheme_footer_options' );
                    
                }
                
                submit_button();
            ?>
        </form>
        
    </div>
<?php
}

// INCLUDE OPTIONS
get_template_part('includes/options/basic');
get_template_part('includes/options/header');
get_template_part('includes/options/blog');
get_template_part('includes/options/page');
get_template_part('includes/options/social');
get_template_part('includes/options/footer');

// SANITIZE OPTIONS
function dgtheme_sanitize_input( $input ) {

    $output = array();

    foreach( $input as $key => $value ) {

        if( isset( $input[$key] ) ) {

            $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
            
        }
        
    }

    return apply_filters( 'dgtheme_sanitize_input', $output, $input );

}

function dgtheme_sanitize_social_options( $input ) {

    $output = array();

    foreach( $input as $key => $val ) {
    
        if( isset ( $input[$key] ) ) {
            $output[$key] = esc_url_raw( strip_tags( stripslashes( $input[$key] ) ) );
        }
    
    }

    return apply_filters( 'dgtheme_sanitize_social_options', $output, $input );

}

?>