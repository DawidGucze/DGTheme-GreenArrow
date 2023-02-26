<?php

// DEFAULT SOCIAL OPTIONS
function dgtheme_default_social_options() {
    
    $defaults = array(
        'dgt_facebook_url'    =>  'http://facebook.com',
        'dgt_twitter_url'     =>  'http://twitter.com',
        'dgt_googleplus_url'  =>  'http://plus.google.com',
        'dgt_instagram_url'   =>  'http://instagram.com',
        'dgt_linkedin_url'    =>  'http://linkedin.com',
        'dgt_pinterest_url'   =>  'http://pinterest.com',
        'dgt_flickr_url'      =>  'http://flickr.com',
        'dgt_youtube_url'     =>  'http://youtube.com',
        'dgt_vimeo_url'       =>  'http://vimeo.com'
    );
    
    return apply_filters( 'dgtheme_default_social_options', $defaults );
    
}

// INITIALIZE SOCIAL OPTIONS
function dgtheme_initialize_social_options() {

    if( false == get_option( 'dgtheme_social_options' ) ) {
        add_option( 'dgtheme_social_options', apply_filters( 'dgtheme_default_social_options', dgtheme_default_social_options() ) );
    }
    
    add_settings_section(
        'dgtheme_social_settings_section',
        esc_html__( 'Social Options', 'dgtheme-greenarrow' ),
        'dgtheme_social_page_options_callback',
        'dgtheme_social_options'
    );
    
    add_settings_field(
        'dgtheme_facebook_url',
        esc_html__( 'Facebook', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_facebook_url',
            'name'      => 'dgt_facebook_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_facebook_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_twitter_url',
        esc_html__( 'Twitter', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_twitter_url',
            'name'      => 'dgt_twitter_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_twitter_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_googleplus_url',
        esc_html__( 'Google+', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_googleplus_url',
            'name'      => 'dgt_googleplus_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_googleplus_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_instagram_url',
        esc_html__( 'Instagram', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_instagram_url',
            'name'      => 'dgt_instagram_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_instagram_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_linkedin_url',
        esc_html__( 'Linkedin', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_linkedin_url',
            'name'      => 'dgt_linkedin_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_linkedin_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_pinterest_url',
        esc_html__( 'Pinterest', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_pinterest_url',
            'name'      => 'dgt_pinterest_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_pinterest_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_flickr_url',
        esc_html__( 'Flickr', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_flickr_url',
            'name'      => 'dgt_flickr_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_flickr_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_youtube_url',
        esc_html__( 'YouTube', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_youtube_url',
            'name'      => 'dgt_youtube_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_youtube_url',
            'class'     => ''
        )
    );
    add_settings_field(
        'dgtheme_vimeo_url',
        esc_html__( 'Vimeo', 'dgtheme-greenarrow' ),
        'dgtheme_social_options_callback',
        'dgtheme_social_options',
        'dgtheme_social_settings_section',
        array(
            'type'      => 'text',
            'id'        => 'dgt_vimeo_url',
            'name'      => 'dgt_vimeo_url',
            'desc'      => '',
            'std'       => '',
            'label_for' => 'dgt_vimeo_url',
            'class'     => ''
        )
    );
    
    register_setting(
        'dgtheme_social_options',
        'dgtheme_social_options',
        'dgtheme_sanitize_input'
    );
    
}
add_action( 'admin_init', 'dgtheme_initialize_social_options' );

// SOCIAL PAGE DESCRIPTION
function dgtheme_social_page_options_callback() {
    echo '<p>' . esc_html__( 'Provide the URL to the social networks you\'d like to display.', 'dgtheme-greenarrow' ) . '</p>';
}

// SOCIAL CALLBACKS
function dgtheme_social_options_callback($args)
{
    extract( $args );

    $option_name = 'dgtheme_social_options';
    $options = get_option( $option_name );

    switch ( $type ) {
        case 'text' :
            $html = '<input class="'.$class.'" type="'.$type.'" id="'.$id.'" name="'.$option_name.'['.$name.']" value="'.esc_url( $options[$id] ).'" />';
            if ($desc != '') $html .= '<br /><span class="description">'.$desc.'</span>';

            echo $html;
        break;
    }
}

?>