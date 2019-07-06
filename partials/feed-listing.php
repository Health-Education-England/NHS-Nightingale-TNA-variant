<?php foreach($vacancies as $key=>$vacancy) :?>
    <?php if (!isset($homepage)) :?>
        <div class="nhsuk-grid-row">
        <?php //for homepage show 1st 3 ?>
    <?php elseif($key > 3) : break; endif; ?>

        <div class="<?php if (!isset($homepage)) :?>nhsuk-grid-column-one-third nhsuk-promo<?php else: ?>nhsuk-grid-column-one-quarter nhsuk-promo-group__item<?php endif; ?>" data-id="<?php echo $vacancy->id ?>">
            <a class="nhsuk-promo__link-wrapper" href="<?php echo $vacancy->job_url ?>" target="_blank">
                <div class="nhsuk-promo__content">
                    <h2 class="nhsuk-promo__heading"><?php echo isset($homepage) ? $vacancy->job_title : $vacancy->job_title . ' - ' . $vacancy->job_reference ;?></h2>

                    <?php if (!isset($homepage)) :?>
                    <?php /* "job_employer", "job_closedate", "job_postdate", "job_staff_group"  */ ?>
                    <div class="nhsuk-summary-list">
                        <?php foreach(["job_type", "job_salary", "job_location", "job_staff_group", "job_employer"] as $summary) :?>
                            <div class="nhsuk-summary-list__row">
                                <dt class="nhsuk-summary-list__key"><?php echo ucfirst(str_replace(['job_', '_'], ['', ' '], $summary)); ?></dt>
                                <dd class="nhsuk-summary-list__value"><?php echo $vacancy->{$summary}; ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <span class="nhsuk-button">Read more</span>

                    <!-- <p class="nhsuk-promo__description"><?php echo $vacancy->job_description ?></p> -->
                </div>
            </a>
        </div>

    <?php if (!isset($homepage)) :?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>