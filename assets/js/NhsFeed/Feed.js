import React from 'react';
import PropTypes from 'prop-types';
import FeedForm from './FeedForm';
import FeedListing from './FeedListing';

export default function Feed(props) {
    const {
        filters,
        items,
        onFiltersChange
    } = props;

    return (
        <div className="nhsuk-grid-row">
            <div className="nhsuk-grid-column-one-third">
                <h3>Filter your results and find the role for you</h3>
                <FeedForm filters={filters}
                          onFiltersChange={onFiltersChange}
                />
            </div>
            <div className="nhsuk-grid-column-two-thirds">
                {items.map((item, key) => (
                    <FeedListing key={key}
                                 item={item} />
                ))}
            </div>
        </div>
    );
}

Feed.propTypes = {
    pagination: PropTypes.object.isRequired,
    filters: PropTypes.object.isRequired,
    items: PropTypes.array.isRequired,
    onFiltersChange: PropTypes.func.isRequired,
};
