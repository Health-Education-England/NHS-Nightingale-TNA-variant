<?php

class Feed
{
    protected $feed = "https://www.jobs.nhs.uk/search_xml?keyword=nursing%20associate&field=title";

    public function importFeed()
    {
        //cache bit
        $hash = md5($this->feed);
        if ( false === ( $raw_recruitment = get_transient( $hash ) ) ) {
            $raw_recruitment = wp_remote_retrieve_body(wp_remote_get($this->feed));
            set_transient( $hash, $raw_recruitment, HOUR_IN_SECONDS );
        }

        return json_decode(json_encode(simplexml_load_string($raw_recruitment)));
    }
}
