<?php

// Enable post feature image support.
function addFeaturedImageSupport() {
    add_theme_support( 'post-thumbnails' );
    add_image_size('single-post-thumbnail', 600, 350, true);
    add_image_size('blog-list-thumbnail', 120, 120, false);
    add_image_size('blog-list-medium-thumbnail', 300, 300, false);
    add_image_size('image_for_slider', 300, 280, false);
}

add_action('after_setup_theme', 'addFeaturedImageSupport');
