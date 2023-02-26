<?php

// DEFAULT FOOTER OPTIONS
function dgtheme_default_footer_options() {
    
    $defaults = array(
        'dgt_show_footer_section'        =>  '',
        'dgt_footer_section_column'      =>  '4',
        'dgt_alternative_copyright'      =>  '',
        'dgt_footer_copyright_position'  =>  '1',
        'dgt_show_footer_menu'           =>  '1',
        'dgt_footer_menu_position'       =>  '2',
        'dgt_show_footer_social'         =>  '',
        'dgt_footer_social_position'     =>  ''
    );
    
    return apply_filters( 'dgtheme_default_footer_options', $defaults );

}

// INITIALIZE FOOTER OPTIONS
function dgtheme_initialize_footer_options() {

    if( false == get_option( 'dgtheme_footer_options' ) ) {
        add_option( 'dgtheme_footer_options', apply_filters( 'dgtheme_default_footer_options', dgtheme_default_footer_options() ) );
    }
    
    add_settings_section(
        'dgtheme_footer_settings_section',
        esc_html__( 'Footer Options', 'dgtheme-greenarrow' ),
        'dgtheme_footer_page_options_callback',
        'dgtheme_footer_options'
    );

    add_settings_field(
        'dgtheme_show_footer_section',
        esc_html__( 'Footer widget section', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_footer_section',
            'name'      => 'dgt_show_footer_section',
            'desc'      => esc_html__( 'Show footer widget section', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_footer_section',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_footer_section_column',
        esc_html__( 'Number of columns', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'footer_select',
            'id'        => 'dgt_footer_section_column',
            'name'      => 'dgt_footer_section_column',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_footer_section_column',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_alternative_copyright',
        esc_html__( 'Additional copyright', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_alternative_copyright',
            'name'      => 'dgt_alternative_copyright',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_alternative_copyright',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_footer_copyright_position',
        esc_html__( 'Copyright position in footer', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'footer_select_position',
            'id'        => 'dgt_footer_copyright_position',
            'name'      => 'dgt_footer_copyright_position',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_footer_copyright_position',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_show_footer_menu',
        esc_html__( 'Show footer menu', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_footer_menu',
            'name'      => 'dgt_show_footer_menu',
            'desc'      => esc_html__( 'Show menu in footer', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_footer_menu',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_footer_menu_position',
        esc_html__( 'Menu position in footer', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'footer_select_position',
            'id'        => 'dgt_footer_menu_position',
            'name'      => 'dgt_footer_menu_position',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_footer_menu_position',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_show_footer_social',
        esc_html__( 'Show footer social', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_footer_social',
            'name'      => 'dgt_show_footer_social',
            'desc'      => esc_html__( 'Show social in footer', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_footer_social',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_footer_social_position',
        esc_html__( 'Social position in footer', 'dgtheme-greenarrow' ),
        'dgtheme_footer_options_callback',
        'dgtheme_footer_options',
        'dgtheme_footer_settings_section',
        array(
            'type'      => 'footer_select_position',
            'id'        => 'dgt_footer_social_position',
            'name'      => 'dgt_footer_social_position',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_footer_social_position',
            'class'     => ''
        )
    );
    
    register_setting(
        'dgtheme_footer_options',
        'dgtheme_footer_options',
        'dgtheme_sanitize_input'
    );

}
add_action( 'admin_init', 'dgtheme_initialize_footer_options' );

// FOOTER PAGE DESCRIPTION
function dgtheme_footer_page_options_callback() {
    echo '<p>' . esc_html__( 'Options for footer', 'dgtheme-greenarrow' ) . '</p>';
}

// FOOTER SELECT OPTIONS
function dgtheme_footer_select_options() {
    $select = array(
        '1' => array(
            'value' =>  '12',
            'label' => esc_html__( 'One column', 'dgtheme-greenarrow' )
        ),
        '2' => array(
            'value' => '6',
            'label' => esc_html__( 'Two columns', 'dgtheme-greenarrow' )
        ),
        '3' => array(
            'value' => '4',
            'label' => esc_html__( 'Three columns', 'dgtheme-greenarrow' )
        ),
        '4' => array(
            'value' => '3',
            'label' => esc_html__( 'Four columns', 'dgtheme-greenarrow' )
        )
    );
    return apply_filters( 'dgtheme_footer_select_options', $select );
}
function dgtheme_footer_select_position_options() {
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
    return apply_filters( 'dgtheme_footer_select_position_options', $select );
}

// FOOTER CALLBACKS
function dgtheme_footer_options_callback($args)
{
    extract( $args );

    $option_name = 'dgtheme_footer_options';
    $options = get_option( $option_name );

    switch ( $type ) {
        case 'text' :
            $html = '<input class="'.$class.'" type="'.$type.'" id="'.$id.'" name="'.$option_name.'['.$name.']" value="'.esc_attr( $options[$id] ).'" />';
            if ($desc != '') $html .= '<br /><span class="description">'.$desc.'</span>';

            echo $html;
        break;
        case 'checkbox' :
            $html = '<input type="'.$type.'" id="'.$id.'" name="'.$option_name.'['.$name.']" value="1" '.checked( 1, isset( $options[$id] ) ? $options[$id] : 0, false ).' />'; 
            $html .= '<label for="'.$label_for.'">&nbsp;'.$desc.'</label>';
            
            echo $html;
        break;
        case 'footer_select' :
            $selected = $options[$id];
            $p = '';
            $r = '';

            $html = '<select id="'.$id.'" name="'.$option_name.'['.$name.']">';

            foreach ( dgtheme_footer_select_options() as $option ) {
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
        case 'footer_select_position' :
            $selected = $options[$id];
            $p = '';
            $r = '';

            $html = '<select id="'.$id.'" name="'.$option_name.'['.$name.']">';

            foreach ( dgtheme_footer_select_position_options() as $option ) {
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