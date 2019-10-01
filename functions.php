<?php
include('functions/functions.php');
include('functions/setup.php');

function assets() {
    // Scripts
    wp_register_script('nhsglobal', get_template_directory_uri().'/js/nhsuk.min.js', array(), '1.0', true);

    wp_enqueue_script('nhsglobal');
}
add_action('wp_enqueue_scripts', 'assets', 100);