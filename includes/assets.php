<?php

// Load asset files
function loadAssetFiles() {
    wp_enqueue_style('bootstrapCss', get_theme_file_uri('assets/css/bootstrap.min.css'));
    wp_enqueue_style('bootstrapIconCss', get_theme_file_uri('assets/css/bootstrap-icons.css'));
    wp_enqueue_style('themeCss', get_theme_file_uri('style.css'));
    wp_enqueue_script('bootstrapJs', get_theme_file_uri('assets/js/bootstrap.bundle.min.js'), null, null, true);
}
add_action('wp_enqueue_scripts', 'loadAssetFiles');