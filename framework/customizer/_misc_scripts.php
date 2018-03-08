<?php

function tromax_customize_register_misc( $wp_customize ) {
    //Upgrade to Pro
    $wp_customize->add_section(
        'tromax_sec_pro',
        array(
            'title'     => __('Important Links','tromax'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'tromax_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Tromax_WP_Customize_Upgrade_Control(
            $wp_customize,
            'tromax_pro',
            array(
                'description'	=> '<a class="tromax-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'tromax').'</a>
                                    <a class="tromax-important-links" href="http://demo.inkhive.com/tromax-plus/" target="_blank">'.__('Tromax Plus Live Demo', 'tromax').'</a>
                                    <a class="tromax-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'tromax').'</a>
                                    <a class="tromax-important-links" href="https://wordpress.org/support/theme/tromax/reviews" target="_blank">'.__('Review Tromax on WordPress', 'tromax').'</a>',
                'section' => 'tromax_sec_pro',
                'settings' => 'tromax_pro',
            )
        )
    );
}
add_action('customize_register', 'tromax_customize_register_misc');