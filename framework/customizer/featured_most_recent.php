<?php
function tromax_customize_register_featured_most_recent($wp_customize) {
    //FEATURED MOST RECENT
    $wp_customize->add_section(
        'tromax_featured_mr',
        array(
            'title'     => __('Featured Area Most Recent','tromax'),
            'priority'  => 44,
            'panel'     => 'tromax_fetured_content_areas'
        )
    );

    $wp_customize->add_setting(
        'tromax_featured_mr_enable',
        array( 'sanitize_callback' => 'tromax_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'tromax_featured_mr_enable', array(
            'settings' => 'tromax_featured_mr_enable',
            'label'    => __( 'Enable Featured Posts', 'tromax' ),
            'section'  => 'tromax_featured_mr',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'tromax_featured_mr_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'tromax_featured_mr_title', array(
            'settings' => 'tromax_featured_mr_title',
            'label'    => __( 'Title','tromax' ),
            'description'    => __( 'Leave Blank to disable','tromax' ),
            'section'  => 'tromax_featured_mr',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'tromax_featured_mr_cat',
        array( 'sanitize_callback' => 'tromax_sanitize_category' )
    );

    $wp_customize->add_control(
        new Tromax_WP_Customize_Category_Control(
            $wp_customize,
            'tromax_featured_mr_cat',
            array(
                'label'    => __('Posts Category.','tromax'),
                'settings' => 'tromax_featured_mr_cat',
                'section'  => 'tromax_featured_mr'
            )
        )
    );
}
add_action('customize_register', 'tromax_customize_register_featured_most_recent');