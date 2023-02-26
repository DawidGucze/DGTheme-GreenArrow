<?php

// DEFAULT BASIC OPTIONS
function dgtheme_default_basic_options() {
    
    $defaults = array(
        'dgt_upload_mobile_logo'  =>  '',
        'dgt_theme_color'         =>  '#26AD60',
        'dgt_layout_style'        =>  '2',
        'dgt_basic_email'         =>  '',
        'dgt_basic_phone'         =>  '',
        'dgt_basic_address'       =>  '',
        'dgt_show_some_love'      =>  ''
    );
    
    return apply_filters( 'dgtheme_default_basic_options', $defaults );
    
}

// INITIALIZE BASIC OPTIONS
function dgtheme_initialize_basic_options() {

    if( false == get_option( 'dgtheme_basic_options' ) ) {
        add_option( 'dgtheme_basic_options', apply_filters( 'dgtheme_default_basic_options', dgtheme_default_basic_options() ) );
    }
    
    add_settings_section(
        'dgtheme_basic_settings_section',
        esc_html__( 'Basic Options', 'dgtheme-greenarrow' ),
        'dgtheme_basic_page_options_callback',
        'dgtheme_basic_options'
    );

    add_settings_field(
        'dgtheme_upload_mobile_logo',
        esc_html__( 'Mobile logo', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'button',
            'id'        => 'dgt_upload_mobile_logo',
            'name'      => 'dgt_upload_mobile_logo',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_upload_mobile_logo',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_theme_color',
        esc_html__( 'Set theme color', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'select_color',
            'id'        => 'dgt_theme_color',
            'name'      => 'dgt_theme_color',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_theme_color',
            'class'     => 'color-picker'
        )
    );
    add_settings_field(
        'dgtheme_layout_style',
        esc_html__( 'Select theme layout', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'basic_select_layout',
            'id'        => 'dgt_layout_style',
            'name'      => 'dgt_layout_style',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_layout_style',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_basic_email',
        esc_html__( 'Your email', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_basic_email',
            'name'      => 'dgt_basic_email',
            'desc'      => 'contact information in top bar must be enabled',
            'std'       => '',
            'label_for' => 'dgt_basic_email',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_basic_phone',
        esc_html__( 'Your phone', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_basic_phone',
            'name'      => 'dgt_basic_phone',
            'desc'      => 'contact information in top bar must be enabled',
            'std'       => '',
            'label_for' => 'dgt_basic_phone',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_basic_address',
        esc_html__( 'Your address', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_basic_address',
            'name'      => 'dgt_basic_address',
            'desc'      => 'contact information in top bar must be enabled',
            'std'       => '',
            'label_for' => 'dgt_basic_address',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_show_some_love',
        esc_html__( 'Show me some love', 'dgtheme-greenarrow' ),
        'dgtheme_basic_options_callback',
        'dgtheme_basic_options',
        'dgtheme_basic_settings_section',
        array(
            'type'      => 'checkbox',
            'id'        => 'dgt_show_some_love',
            'name'      => 'dgt_show_some_love',
            'desc'      => esc_html__( 'Show me some love and keep a link to GreenArrow theme in your footer.', 'dgtheme-greenarrow' ),
            'std'       => '',
            'label_for' => 'dgt_show_some_love',
            'class'     => ''
        )
    );

    register_setting(
        'dgtheme_basic_options',
        'dgtheme_basic_options',
        'dgtheme_sanitize_input'
    );
    
}
add_action( 'admin_init', 'dgtheme_initialize_basic_options' );

// BASIC PAGE DESCRIPTION
function dgtheme_basic_page_options_callback() {
    echo '<p>' . esc_html__( 'Basic theme options', 'dgtheme-greenarrow' ) . '</p>';
}

// BASIC SELECT OPTIONS
function dgtheme_basic_select_layout_options() {
    $select = array(
        '1' => array(
            'value' => '1',
            'label' => esc_html__( 'Full width', 'dgtheme-greenarrow' )
        ),
        '2' => array(
            'value' =>  '2',
            'label' => esc_html__( 'Wide', 'dgtheme-greenarrow' )
        ),
        '3' => array(
            'value' => '3',
            'label' => esc_html__( 'Boxed', 'dgtheme-greenarrow' )
        )
    );
    return apply_filters( 'dgtheme_basic_select_layout_options', $select );
}

// BASIC CALLBACKS
function dgtheme_basic_options_callback($args)
{
    extract( $args );

    $option_name = 'dgtheme_basic_options';
    $options = get_option( $option_name );

    switch ( $type ) {
        case 'select_color' :
            $color = ( $options[$id] != "" ) ? sanitize_text_field( $options[$id] ) : '';
            $html = '<input class="'.$class.'" type="text" id="'.$id.'" name="'.$option_name.'['.$name.']" value="'.esc_attr( $color ).'" />';
            $html .= '<div id="colorpicker"></div>';

            echo $html;
        break;
        case 'button' :
            wp_enqueue_media();
            $isset_image = ( $options[$id] ) ? ' isset_image' : '';
            $html = '<div class="dgt_logo_preview_wrapper'.$isset_image.'"><img id="dgt_logo_preview" src="'.esc_url( $options[$id] ).'"></div>';
            $html .= '<input class="button button-seccondary" type="'.$type.'" id="'.$id.'" name="'.$name.'" value="' . esc_html__( 'Upload image', 'dgtheme-greenarrow' ) . '" />';
            if ( $options[$id] ) $html .= '<input id="dgt_reset" class="button button-secondary" type="button" value="' . esc_html__( 'Reset', 'dgtheme-greenarrow' ) . '" >';
            $html .= '<input type="hidden" name="'.$option_name.'['.$name.']" id="dgt_attachment_url" value="'.esc_url( $options[$id] ).'">';

            echo $html;
        break;
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
        case 'basic_select_layout' :
            $selected = $options[$id];
            $p = '';
            $r = '';

            $html = '<select id="'.$id.'" name="'.$option_name.'['.$name.']">';

            foreach ( dgtheme_basic_select_layout_options() as $option ) {
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