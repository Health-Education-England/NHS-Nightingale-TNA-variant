<?php if (is_archive()): ?>
<div class="nhsuk-grid-row">
    <?php if (has_post_thumbnail()): ?>
        <div class="nhsuk-grid-column-one-third">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    <div class="nhsuk-grid-column-<?php echo has_post_thumbnail() ? 'two-thirds' : 'full' ; ?> nhsuk-section__content">
        <div class="nhsuk-u-reading-width">
            <h2><?php the_title(); ?></h2>
            <p class="nhsuk-section__description"><?php the_excerpt(); ?></p>
        </div>
        <div class="nhsuk-action-link">
            <a class="nhsuk-action-link__link" href="<?php the_permalink(); ?>">
                <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                </svg>
                <span class="nhsuk-action-link__text">Read more</span>
            </a>
        </div>
    </div>
</div>
<hr>
<?php else :
    get_template_part( 'template-parts/content' );
endif; ?>
