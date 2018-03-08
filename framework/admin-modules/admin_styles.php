<?php
/**
 * Enqueue Scripts for Admin
 */

function tromax_custom_wp_admin_style() {
wp_enqueue_style( 'tromax-admin_css', get_template_directory_uri() . '/assets/css/admin.css' );
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

}
add_action( 'customize_controls_print_styles', 'tromax_custom_wp_admin_style' );
