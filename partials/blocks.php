<?php
/**
 * Blocks
 */
?>
<div class="nhsuk-grid-row nhsuk-promo-group">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="nhsuk-grid-column-one-third nhsuk-promo-group__item">
        <div class="nhsuk-promo">
            <a class="nhsuk-promo__link-wrapper" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(null, [
                        'class' => 'nhsuk-promo__img'
                ]); ?>
                <div class="nhsuk-promo__content">
                    <h2 class="nhsuk-promo__heading"><?php the_title(); ?></h2>
                    <p class="nhsuk-promo__description"><?php the_excerpt(); ?></p>
                </div>
            </a>
        </div>
    </div>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
