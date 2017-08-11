<?php
function tromax_customize_register_social_icons($wp_customize){
    // Social Icons
    $wp_customize->add_section('tromax_social_section', array(
        'title' => __('Social Icons','tromax'),
        'priority' => 44 ,
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','tromax'),
        'facebook' => __('Facebook','tromax'),
        'twitter' => __('Twitter','tromax'),
        'google-plus' => __('Google Plus','tromax'),
        'instagram' => __('Instagram','tromax'),
        'rss' => __('RSS Feeds','tromax'),
        'vine' => __('Vine','tromax'),
        'vimeo-square' => __('Vimeo','tromax'),
        'youtube' => __('Youtube','tromax'),
        'flickr' => __('Flickr','tromax'),
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'tromax_social_'.$x, array(
            'sanitize_callback' => 'tromax_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'tromax_social_'.$x, array(
            'settings' => 'tromax_social_'.$x,
            'label' => __('Icon ','tromax').$x,
            'section' => 'tromax_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'tromax_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'tromax_social_url'.$x, array(
            'settings' => 'tromax_social_url'.$x,
            'description' => __('Icon ','tromax').$x.__(' Url','tromax'),
            'section' => 'tromax_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function tromax_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'tromax_customize_register_social_icons');