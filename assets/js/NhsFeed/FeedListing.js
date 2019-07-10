import React from 'react';
import PropTypes from "prop-types";

export default function FeedListing(props) {
    const { item } = props;
    const attributes = ["job_type", "job_salary", "job_location", "job_staff_group", "job_employer"];

    return (
        <div className="nhsuk-grid-column-full-width nhsuk-promo"
             data-id={ item.id }>
            <a className="nhsuk-promo__link-wrapper"
               href={item.job_url}
               target="_blank"
               rel="noopener noreferrer">
                <div className="nhsuk-promo__content">
                    <h2 className="nhsuk-promo__heading">
                        {item.job_title + ' - ' + item.job_reference}
                    </h2>
                    <dl className="nhsuk-summary-list">
                        {attributes.map((attribute, key) => (
                            <div
                                key={key}
                                className="nhsuk-summary-list__row"
                            >
                                <dt className="nhsuk-summary-list__key"
                                    style={{textTransform: 'capitalize'}}>
                                    {attribute.replace('job_','').replace('_',' ')}
                                </dt>
                                <dd className="nhsuk-summary-list__value">
                                    {item[attribute]}
                                </dd>
                            </div>
                        ))}
                    </dl>
                    <span className="nhsuk-button">Read more</span>
                    {/*<p class="nhsuk-promo__description">{item.job_description}</p>*/}
                </div>
            </a>
        </div>
    );
}

FeedListing.propTypes = {
    item: PropTypes.object.isRequired,
};
