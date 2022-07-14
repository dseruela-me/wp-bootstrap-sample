<?php
/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    Dosth
 */


function wpbootstrap_customize_register( $wp_customize ) {
    // All the Customize Options you create goes here
    $wp_customize->get_section('title_tagline')->priority = 1;
    $wp_customize->get_section('static_front_page')->priority = 2;
    $wp_customize->get_section('static_front_page')->title = __( 'Homepage Preferences', 'wpbootstrap' );

    // Theme Options Panel
    $wp_customize->add_panel( 'wpbootstrap_theme_options', [
        'priority'      =>  100,
        'title'         =>  __( 'Theme Options', 'wpbootstrap' ),
        'description'   =>  __( 'Theme modifications like color scheme, theme texts and layout preferences can be done here', 'wpbootstrap' ),
    ] );

    // Text Options Section Inside Theme
    $wp_customize->add_section( 'wpbootstrap_text_options', [
        'title'     =>  __( 'Text Options', 'wpbootstrap' ),
        'priority'  =>  1,
        'panel'     =>  'wpbootstrap_theme_options',
    ] );

    // Setting for Copyright text.
    $wp_customize->add_setting( 'wpbootstrap_copyright_text', [
        'type'              =>  'option',
        'default'           =>  __( 'All rights reserved ', 'wpbootstrap' ),
        'sanitize_callback' =>  'sanitize_text_field',
        'transport'         =>  'refresh',
    ] );

    // Control for Copyright text
    $wp_customize->add_control( 'wpbootstrap_copyright_text', [
        'type'          =>  'text',
        'priority'      =>  10,
        'section'       =>  'wpbootstrap_text_options',
        'label'         =>  'Copyright text',
        'description'   =>  'Text put here will be displayed in the footer',
    ] );

    // Setting for Read More text.
    $wp_customize->add_setting( 'wpbootstrap_readmore_text', [
        'type'              =>  'option',
        'default'           =>  __( 'Read More', 'wpbootstrap' ),
        'sanitize_callback' =>  'sanitize_text_field',
        'transport'         =>  'refresh',
    ] );

    // Control for Read More text
    $wp_customize->add_control( 'wpbootstrap_readmore_text', [
        'type'          =>  'text',
        'priority'      =>  10,
        'section'       =>  'wpbootstrap_text_options',
        'label'         =>  'Read More text',
        'description'   =>  'Text put here will be the text for Read More link in the archives',
    ] );
}

add_action( 'customize_register', 'wpbootstrap_customize_register' );

// Enable custom logo customizer
function wpbootstrap_config_custom_logo() {
    add_theme_support( 'custom-logo' );
}

add_action( 'after_setup_theme', 'wpbootstrap_config_custom_logo' );