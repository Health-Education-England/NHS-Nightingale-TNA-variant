<?php
include_once(get_stylesheet_directory() . '/functions/Feed.php');
$feed = new Feed();
$vacancies = $feed->importFeed();
?>
<div class="nhsuk-grid-row">
    <div class="nhsuk-grid-column-one-third">
        <h3>Filter your results and find the role for you</h3>
        <form action="#">
            <div class="nhsuk-form-group">
                <fieldset class="nhsuk-fieldset" aria-describedby="example-disabled-hint">
                    <legend class="nhsuk-fieldset__legend"><strong>Type</strong></legend>
                    <span class="nhsuk-hint" id="example-disabled-hint">What type of contract are you looking for?</span>
                    <div class="nhsuk-radios">
                        <div class="nhsuk-radios__item">
                            <input class="nhsuk-radios__input" id="type_1" name="type_0" type="radio" value="fixed">
                            <label class="nhsuk-label nhsuk-radios__label" for="type_0">Fixed term</label>
                        </div>
                        <div class="nhsuk-radios__item">
                            <input class="nhsuk-radios__input" id="type_1" name="type_1" type="radio" value="permanent">
                            <label class="nhsuk-label nhsuk-radios__label" for="type_1">Permanent</label>
                        </div>
                        <div class="nhsuk-radios__item">
                            <input class="nhsuk-radios__input" id="type_2" name="type_2" type="radio" value="training">
                            <label class="nhsuk-label nhsuk-radios__label" for="type_2">Training</label>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
    <div class="nhsuk-grid-column-two-thirds">
        <?php include(locate_template('partials/feed-listing.php')); ?>
    </div>
</div>
