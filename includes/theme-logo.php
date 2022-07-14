<?php

function wpbootstrap_get_custom_logo() {
    if ( has_custom_logo() ) {
        $logo_id = get_theme_mod( 'custom_logo' );
        $logo_url = esc_url( wp_get_attachment_url( $logo_id ) );
        // Other way:
        // $logo = wp_get_attachment_image_src( $logo_id, 'medium' );
        // Display: esc_url(logo[0]), width = logo[1]

        echo '<a class="navbar-brand" href="' . get_site_url() . '">';
        echo '<img class="custom-logo" src="' . $logo_url . '" width="180" alt="' . get_bloginfo('name') . '">';
        echo '</a>';
    } else {
        echo '<a class="navbar-brand" href="' . get_site_url() . '">';
        echo '<h3>' . get_bloginfo('name') . '</h3>';
        echo '</a>';
    }
}

?>