<?php
$feed_data = _fetchVacancies();
$vacancies = $feed_data->vacancy_details;

$filters = [
    "job_type" => [
        'title' => 'Contract Type',
    ],
    "job_staff_group" => [
        'title' => 'Sector'
    ],
    "job_employer" => [
        'title' => 'Employer'
    ],
];

foreach($vacancies as $vacancy){
    foreach($filters as $name => $filter) {
        $filters[$name]['options'][$vacancy->$name] = true;
    }
}
?>
<div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-one-third">
        <h3>Filter your results and find the role for you</h3>
        <form action="#">
            <?php foreach($filters as $name => $filter): ?>
            <div class="nhsuk-form-group">
                <fieldset class="nhsuk-fieldset" aria-describedby="field_<?php echo $name; ?>">
                    <legend class="nhsuk-fieldset__legend"><strong><?php echo $filter['title']?></strong></legend>
                    <?php if(isset($filter['description']) && $filter['description']): ?>
                    <span class="nhsuk-hint" id="field_<?php echo $name; ?>"><?php echo $filter['description']?></span>
                    <?php endif; ?>
                    <div class="nhsuk-checkboxes">
                        <?php
                            $count = 0;
                            $options = array_keys($filter['options']);
                            sort($options);
                            foreach($options as $option):
                        ?>
                        <div class="nhsuk-checkboxes__item">
                            <input class="nhsuk-checkboxes__input" id="<?php echo $name . '_' . $count; ?>" name="<?php echo $name; ?>" type="checkbox" value="<?php echo $option; ?>">
                            <label class="nhsuk-label nhsuk-checkboxes__label" for="<?php echo $name . '_' . $count; ?>"><?php echo $option; ?></label>
                        </div>
                        <?php $count++; endforeach; ?>
                    </div>
                </fieldset>
            </div>
            <?php endforeach; ?>
        </form>
    </div>
    <div class="nhsuk-grid-column-two-thirds">
        <?php include(locate_template('partials/feed-listing.php')); ?>
    </div>
</div>
