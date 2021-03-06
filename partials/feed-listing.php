<?php foreach($vacancies as $key=>$vacancy) :?>
    <?php if (!isset($homepage)) :?>
    <div class="nhsuk-grid-row">
    <?php elseif($key > 2) : break; endif; ?>
        <div class="<?php if (!isset($homepage)) :?>nhsuk-grid-column-one-third nhsuk-promo<?php else: ?>nhsuk-grid-column-one-third nhsuk-promo-group__item<?php endif; ?>" data-id="<?php echo $vacancy->id ?>">
            <a class="nhsuk-promo__link-wrapper" href="<?php echo $vacancy->job_url ?>" target="_blank">
                <div class="nhsuk-promo__content">
                    <h2 class="nhsuk-promo__heading"><?php echo isset($homepage) ? $vacancy->job_title : $vacancy->job_title . ' - ' . $vacancy->job_reference ;?></h2>

                    <?php /* "job_type", "job_employer", "job_staff_group",  "job_postdate", "job_staff_group", "job_employer" */ ?>
                    <dl class="nhsuk-summary-list">
                        <?php foreach(["job_location", "job_salary"] as $summary) :?>
                            <div class="nhsuk-summary-list__row">
                                <dt class="nhsuk-summary-list__key"><?php echo ucfirst(str_replace(['job_', '_'], ['', ' '], $summary)); ?></dt>
                                <dd class="nhsuk-summary-list__value"><?php echo $vacancy->{$summary}; ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>

                    <div class="nhsuk-action-link">
                        <span class="nhsuk-action-link__link">
                            <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                            </svg>
                            <span class="nhsuk-action-link__text">View Vacancy</span>
                        </span>
                    </div>
                    <!-- <span class="nhsuk-button">Read more</span> -->
                    <!-- <p class="nhsuk-promo__description"><?php echo $vacancy->job_description ?></p> -->
                </div>
            </a>
        </div>
    <?php if (!isset($homepage)) :?>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
