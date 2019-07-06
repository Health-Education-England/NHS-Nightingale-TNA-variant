import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Feed from './Feed';

export default class NhsFeed extends Component {
    constructor(props) {
        super(props);

        this.state = {
            pagination: {
                page: 1,
                per_page: 5,
                total_pages: 0,
            },
            filters: {
                job_type: {
                    title: 'Contract Type',
                    isSet: false,
                    options: {},
                },
                job_staff_group: {
                    title: 'Sector',
                    isSet: false,
                    options: {},
                },
                job_employer: {
                    title: 'Employer',
                    isSet: false,
                    options: {},
                },
            },
            items: [],
        };

        this.onFiltersChange = this.onFiltersChange.bind(this);
    }

    componentDidMount() {
        const filters = this.setFilterOptions(),
            { pagination } = this.state,
            { vacancies, total_pages } = this.paginate(this.props.feed, pagination.page, pagination.per_page);
        pagination.total_pages = total_pages;
        this.setState({
            pagination: pagination,
            filters: filters,
            items: vacancies,
        });
    }

    setFilterOptions() {
        let filters = this.state.filters;

        // formData = new FormData(event.target.form);

        Object.entries(filters).map(([name, filter]) => {
            let options = filter.options;

            // Object.entries(options).map(([key, option]) => (
            //     options[key] = formData.getAll(name).includes(key)
            // ));

            // set all options to false
            this.props.feed.map((item) => {
                options[item[name]] = false;
            });

            filters[name].options = options;
        });

        return filters;
    }

    paginate(items, page, per_page) {
        const offset = (page - 1) * per_page;
        return {
            total_pages: Math.ceil(this.props.feed.length / per_page),
            vacancies: items.slice(offset).slice(0, per_page),
        };
    }

    onFiltersChange(name, option, value) {
        let { filters, pagination } = this.state;

        if (name === 'pagination') {
            pagination[option] = value;
        } else {
            filters[name]['options'][option] = value;
            filters[name]['isSet'] = Object.entries(filters[name].options).reduce((set, optionMeta) => {
                const [value, checked] = optionMeta;
                return set || checked;
            }, false);
        }

        // are any filters set?
        const isSet = Object.entries(filters).reduce((set, filterMeta) => {
            const [filterName, filter] = filterMeta;
            return set || filter.isSet;
        }, false);

        const filteredVacancies = isSet ? this.props.feed.filter((item) => {
            let found = null;
            found = Object.entries(filters).reduce((found, filterMeta) => {
                const [filterName, filter] = filterMeta;
                if(!filter.isSet) {
                    return found;
                }
                const inFilter = Object.entries(filter.options).reduce((found, optionMeta) => {
                    const [value, checked] = optionMeta;
                    return found || (checked && item[filterName] === value);
                }, false);
                return found === null ? inFilter : found && inFilter;
            }, found);
            return found;
        }) : this.props.feed;

        const { vacancies, total_pages } = this.paginate(filteredVacancies, pagination.page, pagination.per_page);
        pagination.total_pages = total_pages;

        this.setState({
            pagination: pagination,
            filters: filters,
            items: vacancies,
        });
    }

    render() {
        return (
            <Feed
                {...this.state}
                {...this.props}
                onFiltersChange={this.onFiltersChange}
            />
        );
    }
}

NhsFeed.propTypes = {
    feed: PropTypes.array.isRequired,
};
