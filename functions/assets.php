<?php


class EntriesJson {
    private $entryPoints;

    public function __construct( $path ) {
        if ( file_exists( $path ) ) {
            $this->entryPoints = json_decode( file_get_contents( $path ), true );
        } else {
            $this->entryPoints = [];
        }
    }

    public function get() {
        return $this->entryPoints;
    }

    public function remove($entry, $type, $key) {
        unset($this->entryPoints[$entry][$type][$key]);
    }

    public function getPath( $key = '', $default = null ) {
        $collection = $this->entryPoints;
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
        $entrypoints = new EntriesJson( get_stylesheet_directory() . '/dist/entrypoints.json' );
    }
    foreach($entrypoints->get()[$name][$type] as $file) {
        foreach($entrypoints->get() as $entry=>$entrypoint){
            foreach($entrypoint[$type] as $key=>$otherFile) {
                if($otherFile == $file){
                    $entrypoints->remove($entry, $type, $key);
                }
            }
        }
        echo "<script src=" . $dist_path . $file ."></script>";
    }
}

// add_action( 'wp_enqueue_scripts', 'assets', 100 );
