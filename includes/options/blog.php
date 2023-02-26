<?php

// DEFAULT BLOG OPTIONS
function dgtheme_default_blog_options() {
    
    $defaults = array(
        'dgt_show_left_sidebar'     =>  '1',
        'dgt_show_right_sidebar'    =>  '',
        'dgt_single_left_sidebar'   =>  '',
        'dgt_single_right_sidebar'  =>  '',
        'dgt_single_sidebar_type'   =>  '1',
    );
    
    return apply_filters( 'dgtheme_default_blog_options', $defaults );

}

// INITIALIZE BLOG OPTIONS
function dgtheme_initialize_blog_options() {

    if( false == get_option( 'dgtheme_blog_options' ) ) {
        add_option( 'dgtheme_blog_options', apply_filters( 'dgtheme_default_blog_options', dgtheme_default_blog_options() ) );
    }

    add_settings_section(
        'dgtheme_blog_settings_section',
        esc_html__( 'Blog Options', 'dgtheme-greenarrow' ),
        'dgtheme_blog_page_options_callback',
        'dgtheme_blog_options'
    );
    add_settings_section(
        'dgtheme_single_settings_section',
        esc_html__( 'Posts Options', 'dgtheme-greenarrow' ),
        'dgtheme_single_page_options_callback',
        'dgtheme_blog_options'
    );

    add_settings_field(
        'dgtheme_show_left_sidebar',
        esc_html__( 'Show left sidebar', 'dgtheme-greenarrow' ),
        'dgtheme_blog_options_callback',
        'dgtheme_blog_options',
        'dgtheme_blog_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_left_sidebar',
            'name'      => 'dgt_show_left_sidebar',
            'desc'      => esc_html__( 'Show sidebar on the left side', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_left_sidebar',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_show_right_sidebar',
        esc_html__( 'Show right sidebar', 'dgtheme-greenarrow' ),
        'dgtheme_blog_options_callback',
        'dgtheme_blog_options',
        'dgtheme_blog_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_right_sidebar',
            'name'      => 'dgt_show_right_sidebar',
            'desc'      => esc_html__( 'Show sidebar on the right side', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_right_sidebar',
            'class'     => ''
        )
    );

    add_settings_field(
        'dgtheme_single_left_sidebar',
        esc_html__( 'Show left sidebar in single post', 'dgtheme-greenarrow' ),
        'dgtheme_blog_options_callback',
        'dgtheme_blog_options',
        'dgtheme_single_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_single_left_sidebar',
            'name'      => 'dgt_single_left_sidebar',
            'desc'      => esc_html__( 'Show sidebar on the left side', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_single_left_sidebar',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_single_right_sidebar',
        esc_html__( 'Show right sidebar in single post', 'dgtheme-greenarrow' ),
        'dgtheme_blog_options_callback',
        'dgtheme_blog_options',
        'dgtheme_single_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_single_right_sidebar',
            'name'      => 'dgt_single_right_sidebar',
            'desc'      => esc_html__( 'Show sidebar on the right side', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_single_right_sidebar',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_single_sidebar_type',
        esc_html__( 'Select sidebars type', 'dgtheme-greenarrow' ),
        'dgtheme_blog_options_callback',
        'dgtheme_blog_options',
        'dgtheme_single_settings_section',
        array(
            'type'      => 'sidebar_select',
            'id'        => 'dgt_single_sidebar_type',
            'name'      => 'dgt_single_sidebar_type',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_single_sidebar_type',
            'class'     => ''
        )
    );
    
    register_setting(
        'dgtheme_blog_options',
        'dgtheme_blog_options',
        'dgtheme_sanitize_input'
    );
    
}
add_action( 'admin_init', 'dgtheme_initialize_blog_options' );

// BLOG PAGE DESCRIPTION
function dgtheme_blog_page_options_callback() {
    echo '<p>' . esc_html__( 'Options for blog', 'dgtheme-greenarrow' ) . '</p>';
}
function dgtheme_single_page_options_callback() {
    echo '<p>' . esc_html__( 'Options for single post', 'dgtheme-greenarrow' ) . '</p>';
}

// BLOG SELECT OPTIONS
function dgtheme_single_sidebar_select_options() {
    $select = array(
        '1' => array(
            'value' =>  '1',
            'label' => esc_html__( 'Blog Sidebars', 'dgtheme-greenarrow' )
        ),
        '2' => array(
            'value' => '2',
            'label' => esc_html__( 'Custom Sidebars', 'dgtheme-greenarrow' )
        )
    );
    return apply_filters( 'dgtheme_single_sidebar_select_options', $select );
}

// BLOG CALLBACKS
function dgtheme_blog_options_callback($args)
{
    extract( $args );

    $option_name = 'dgtheme_blog_options';
    $options = get_option( $option_name );

    switch ( $type ) {
        case 'checkbox' :
            $html = '<input type="'.$type.'" id="'.$id.'" name="'.$option_name.'['.$name.']" value="1" '.checked( 1, isset( $options[$id] ) ? $options[$id] : 0, false ).' />'; 
            $html .= '<label for="'.$label_for.'">&nbsp;'.$desc.'</label>';
            
            echo $html;
        break;
        case 'sidebar_select' :
            $selected = $options[$id];
            $p = '';
            $r = '';

            $html = '<select id="'.$id.'" name="'.$option_name.'['.$name.']">';

            foreach ( dgtheme_single_sidebar_select_options() as $option ) {
                $label = $option['label'];
                if ( $selected == $option['value'] )
                    $p = '<option selected="selected" value="' . esc_attr( $option['value'] ) . '">'.$label.'</option>';
                else
                    $r .= '<option value="' . esc_attr( $option['value'] ) . '">'.$label.'</option>';
            }
            $html .= $p . $r;
            $html .= '</select>';

            echo $html;
        break;
    }
}

?>