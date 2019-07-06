<?php

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css - meh
 *
 * Enqueue scripts in the following order:
 * 2. /theme/dist/scripts/main.js
 */
class JsonManifest {
    private $manifest;

    public function __construct( $manifest_path ) {
        if ( file_exists( $manifest_path ) ) {
            $this->manifest = json_decode( file_get_contents( $manifest_path ), true );
        } else {
            $this->manifest = [];
        }
    }

    public function get() {
        return $this->manifest;
    }

    public function getPath( $key = '', $default = null ) {
        $collection = $this->manifest;
        if ( is_null( $key ) ) {
            return $collection;
        }
        if ( isset( $collection[ $key ] ) ) {
            return $collection[ $key ];
        }
        foreach ( explode( '.', $key ) as $segment ) {
            if ( ! isset( $collection[ $segment ] ) ) {
                return $default;
            } else {
                $collection = $collection[ $segment ];
            }
        }

        return $collection;
    }
}

function assets_for_entrypoint($name, $type) {
    $dist_path = get_stylesheet_directory_uri() . '/dist/';
    static $entrypoints;

    if ( empty( $entrypoints ) ) {
        $entrypoints = new JsonManifest( get_stylesheet_directory() . '/dist/entrypoints.json' );
    }

    foreach($entrypoints->get()[$name][$type] as $file) {
        // wp_enqueue_style( 'nhs_css', asset_path( 'styles/main.css' ), false, null );
        echo "<script src=" . $dist_path . $file ."></script>";
    }
}

// add_action( 'wp_enqueue_scripts', 'assets', 100 );
