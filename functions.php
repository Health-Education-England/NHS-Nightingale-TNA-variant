<?php

include('functions/assets.php');
include('functions/setup.php');
// include('functions/breadcrumbs.php');
include('functions/Feed.php');

function fetchVacancies(){
        $feed = new Feed();
        wp_send_json($feed->importFeed());
}
add_action( 'wp_ajax_fetchVacancies', 'fetchVacancies' );
add_action( 'wp_ajax_nopriv_fetchVacancies', 'fetchVacancies' );
