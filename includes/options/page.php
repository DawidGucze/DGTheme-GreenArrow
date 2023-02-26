<?php

// DEFAULT PAGE OPTIONS
function dgtheme_default_page_options() {
    
    $defaults = array(
        'dgt_page_left_sidebar'   =>  '',
        'dgt_page_right_sidebar'  =>  '',
        'dgt_page_sidebar_type'   =>  '2',
    );
    
    return apply_filters( 'dgtheme_default_page_options', $defaults );

}

// INITIALIZE PAGE OPTIONS
function dgtheme_initialize_page_options() {

    if( false == get_option( 'dgtheme_page_options' ) ) {
        add_option( 'dgtheme_page_options', apply_filters( 'dgtheme_default_page_options', dgtheme_default_page_options() ) );
    }

    add_settings_section(
        'dgtheme_page_settings_section',
        esc_html__( 'Page Options', 'dgtheme-greenarrow' ),
        'dgtheme_page_page_options_callback',
        'dgtheme_page_options'
    );

    add_settings_field(
        'dgtheme_page_left_sidebar',
        esc_html__( 'Show left sidebar on page', 'dgtheme-greenarrow' ),
        'dgtheme_page_options_callback',
        'dgtheme_page_options',
        'dgtheme_page_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_page_left_sidebar',
            'name'      => 'dgt_page_left_sidebar',
            'desc'      => esc_html__( 'Show sidebar on the left side', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_page_left_sidebar',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_page_right_sidebar',
        esc_html__( 'Show right sidebar on page', 'dgtheme-greenarrow' ),
        'dgtheme_page_options_callback',
        'dgtheme_page_options',
        'dgtheme_page_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_page_right_sidebar',
            'name'      => 'dgt_page_right_sidebar',
            'desc'      => esc_html__( 'Show sidebar on the right side', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_page_right_sidebar',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_page_sidebar_type',
        esc_html__( 'Select sidebars type', 'dgtheme-greenarrow' ),
        'dgtheme_page_options_callback',
        'dgtheme_page_options',
        'dgtheme_page_settings_section',
        array(
            'type'      => 'sidebar_select',
            'id'        => 'dgt_page_sidebar_type',
            'name'      => 'dgt_page_sidebar_type',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_page_sidebar_type',
            'class'     => ''
        )
    );
    
    register_setting(
        'dgtheme_page_options',
        'dgtheme_page_options',
        'dgtheme_sanitize_input'
    );
    
}
add_action( 'admin_init', 'dgtheme_initialize_page_options' );

// PAGE PAGE DESCRIPTION
function dgtheme_page_page_options_callback() {
    echo '<p>' . esc_html__( 'Options for page', 'dgtheme-greenarrow' ) . '</p>';
}

// PAGE SELECT OPTIONS
function dgtheme_page_sidebar_select_options() {
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
    return apply_filters( 'dgtheme_page_sidebar_select_options', $select );
}

// PAGE CALLBACKS
function dgtheme_page_options_callback($args)
{
    extract( $args );

    $option_name = 'dgtheme_page_options';
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

            foreach ( dgtheme_page_sidebar_select_options() as $option ) {
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