import React from 'react';
import PropTypes from "prop-types";

export default function FeedForm(props) {
    const { filters, onFiltersChange } = props;

    return (
        <form action="#">
            {Object.entries(filters).map(([name, filter]) => (
                <div key={name}
                     className="nhsuk-form-group">
                    <fieldset className="nhsuk-fieldset">
                        <legend className="nhsuk-fieldset__legend">
                            <strong>{filter.title}</strong>
                        </legend>
                        <div className="nhsuk-checkboxes">
                            {Object.entries(filter.options).map(([option, checked], key) => (
                                <div key={name + key}
                                     className="nhsuk-checkboxes__item">
                                    <input className="nhsuk-checkboxes__input"
                                           id={name + key}
                                           name={name}
                                           checked={checked}
                                           onChange={() => onFiltersChange(name,option, !checked)}
                                           type="checkbox"
                                           value={option} />
                                    <label className="nhsuk-label nhsuk-checkboxes__label"
                                           htmlFor={name + key}
                                    >{option}</label>
                                </div>
                            ))}
                        </div>
                    </fieldset>
                </div>
            ))}
        </form>
    );
}

FeedForm.propTypes = {
    filters: PropTypes.object.isRequired,
    onFiltersChange: PropTypes.func.isRequired,
};
