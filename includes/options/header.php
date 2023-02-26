<?php

// DEFAULT HEADER OPTIONS
function dgtheme_default_header_options() {
    
    $defaults = array(
        'dgt_show_top_bar'            =>  '1',
        'dgt_show_contact_info'       =>  '',
        'dgt_contact_info_position'   =>  '1',
        'dgt_show_social'             =>  '1',
        'dgt_social_position'         =>  '2',
        'dgt_show_top_bar_menu'       =>  '1',
        'dgt_top_bar_menu_position'   =>  '1',
        'dgt_show_search'             =>  '1'
    );
    
    return apply_filters( 'dgtheme_default_header_options', $defaults );
    
}

// INITIALIZE HEADER OPTIONS
function dgtheme_initialize_header_options() {

    if( false == get_option( 'dgtheme_header_options' ) ) {
        add_option( 'dgtheme_header_options', apply_filters( 'dgtheme_default_header_options', dgtheme_default_header_options() ) );
    }
    
    add_settings_section(
        'dgtheme_header_settings_section',
        esc_html__( 'Header Options', 'dgtheme-greenarrow' ),
        'dgtheme_header_page_options_callback',
        'dgtheme_header_options'
    );

    add_settings_field(
        'dgtheme_show_top_bar',
        esc_html__( 'Show top bar', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_top_bar',
            'name'      => 'dgt_show_top_bar',
            'desc'      => esc_html__( 'Show top bar in header', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_top_bar',
            'class'     => ''
        )
    );

    add_settings_field(
        'dgtheme_show_contact_info',
        esc_html__( 'Show contact informations', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_contact_info',
            'name'      => 'dgt_show_contact_info',
            'desc'      => esc_html__( 'Show contact information in top bar', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_contact_info',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_contact_info_position',
        esc_html__( 'Contact position in the top bar', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'header_select_position',
            'id'        => 'dgt_contact_info_position',
            'name'      => 'dgt_contact_info_position',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_contact_info_position',
            'class'     => ''
        )
    );

    add_settings_field(
        'dgtheme_show_social',
        esc_html__( 'Show social on top', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_social',
            'name'      => 'dgt_show_social',
            'desc'      => esc_html__( 'Show social in the top bar', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_social',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_social_position',
        esc_html__( 'Social position in the top bar', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'header_select_position',
            'id'        => 'dgt_social_position',
            'name'      => 'dgt_social_position',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_social_position',
            'class'     => ''
        )
    );

    add_settings_field(
        'dgtheme_show_top_bar_menu',
        esc_html__( 'Show top bar menu', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_top_bar_menu',
            'name'      => 'dgt_show_top_bar_menu',
            'desc'      => esc_html__( 'Show menu in top bar', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_top_bar_menu',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_top_bar_menu_position',
        esc_html__( 'Menu position in the top bar', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'header_select_position',
            'id'        => 'dgt_top_bar_menu_position',
            'name'      => 'dgt_top_bar_menu_position',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_top_bar_menu_position',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_show_search',
        esc_html__( 'Show search form in header', 'dgtheme-greenarrow' ),
        'dgtheme_header_options_callback',
        'dgtheme_header_options',
        'dgtheme_header_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_search',
            'name'      => 'dgt_show_search',
            'desc'      => esc_html__( 'Show search form in header', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_search',
            'class'     => ''
        )
    );

    register_setting(
        'dgtheme_header_options',
        'dgtheme_header_options',
        'dgtheme_sanitize_input'
    );
    
}
add_action( 'admin_init', 'dgtheme_initialize_header_options' );

// HEADER PAGE DESCRIPTION
function dgtheme_header_page_options_callback() {
    echo '<p>' . esc_html__( 'Options for header', 'dgtheme-greenarrow' ) . '</p>';
}

// HEADER SELECT OPTIONS
function dgtheme_header_select_position_options() {
    $select = array(
        '1' => array(
            'value' =>  '1',
            'label' => esc_html__( 'Left', 'dgtheme-greenarrow' )
        ),
        '2' => array(
            'value' => '2',
            'label' => esc_html__( 'Right', 'dgtheme-greenarrow' )
        )
    );
    return apply_filters( 'dgtheme_header_select_position_options', $select );
}

// HEADER CALLBACKS
function dgtheme_header_options_callback($args)
{
    extract( $args );

    $option_name = 'dgtheme_header_options';
    $options = get_option( $option_name );

    switch ( $type ) {
        case 'checkbox' :
            $html = '<input type="'.$type.'" id="'.$id.'" name="'.$option_name.'['.$name.']" value="1" '.checked( 1, isset( $options[$id] ) ? $options[$id] : 0, false ).' />'; 
            $html .= '<label for="'.$label_for.'">&nbsp;'.$desc.'</label>';
            
            echo $html;
        break;
        case 'header_select_position' :
            $selected = $options[$id];
            $p = '';
            $r = '';

            $html = '<select id="'.$id.'" name="'.$option_name.'['.$name.']">';

            foreach ( dgtheme_header_select_position_options() as $option ) {
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