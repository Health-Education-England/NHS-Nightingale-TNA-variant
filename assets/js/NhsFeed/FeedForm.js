import React, { Component } from 'react';
import PropTypes from "prop-types";

export default class FeedForm extends Component {

    constructor(props) {
        super(props);
        this.job_employer_search = React.createRef();

        const { filters } = this.props;

        this.state = {
            filters: filters,
        };

        this.handleEmployerSearch = this.handleEmployerSearch.bind(this);
    }

    handleEmployerSearch(event) {
        event.preventDefault();
        const {filters} = this.props;
        const job_employer_search = this.job_employer_search.current.value.toLowerCase();
        let options = Object.entries(filters.job_employer.options).map(([name, option]) => {
            option.show = name.toLowerCase().indexOf(job_employer_search) >= 0;
            return {[name]:option};
        });
        filters.job_employer.options = Object.assign(...options);
        this.setState({
            filters: filters,
        });
    }

    render() {
        const { onFiltersChange } = this.props;

        return (
            <form action="#">
            {Object.entries(this.state.filters).map(([name, filter]) => (
                <div key={name}
                     className="nhsuk-form-group">
                    <fieldset className="nhsuk-fieldset">
                        <legend className="nhsuk-fieldset__legend">
                            <strong>{filter.title}</strong>
                        </legend>

                        {name === 'job_employer' && (
                            <span className="nhsuk-hint">
                                <input type="text"
                                       className="nhsuk-input"
                                       placeholder="Search"
                                       ref={this.job_employer_search}
                                       onChange={this.handleEmployerSearch}
                                />
                            </span>
                        )}

                        <div className="nhsuk-checkboxes">
                            {Object.entries(filter.options).map(([option, checked], key) => (
                                    <div key={name + key}
                                         className={`nhsuk-checkboxes__item ${!checked.show && !checked.checked ? 'hidden' : checked.checked ? 'checked' : ''}
                                    `}>
                                        <input className="nhsuk-checkboxes__input"
                                               id={name + key}
                                               name={name}
                                               checked={checked.checked}
                                               onChange={() => onFiltersChange(name,option, !checked.checked)}
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
}

FeedForm.propTypes = {
    filters: PropTypes.object.isRequired,
    onFiltersChange: PropTypes.func.isRequired,
};
