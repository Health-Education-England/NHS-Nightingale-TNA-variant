<?php

function nhsAssets() {
    wp_enqueue_script( 'cookieNotice',  get_stylesheet_directory_uri() . '/assets/js/cookie.js', [], false, true );
}
add_action( 'wp_enqueue_scripts', 'nhsAssets', 100 );
