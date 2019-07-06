import React from 'react';
import PropTypes from 'prop-types';
import FeedForm from './FeedForm';
import FeedListing from './FeedListing';
import FeedPagination from './FeedPagination';

export default function Feed(props) {
    const {
        filters,
        pagination,
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
                <FeedPagination pagination={pagination}
                                onFiltersChange={onFiltersChange}
                />
                {items.map((item, key) => (
                    <FeedListing key={key}
                                 item={item} />
                ))}
                <FeedPagination pagination={pagination}
                                onFiltersChange={onFiltersChange}
                />
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
