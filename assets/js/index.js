import React from 'react';
import { render } from 'react-dom';
import NhsFeed from './NhsFeed/NhsFeed';

if (!window.fetch) {
    fetch.push(
        import(/* webpackChunkName: "polyfill-fetch" */ 'whatwg-fetch')
    );
}

render(
    <NhsFeed feed={window.NHS_FEED} />,
    document.getElementById('nhs-feed')
);
