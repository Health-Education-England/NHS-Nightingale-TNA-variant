<?php
/**
 * Blocks Partners
 */

$url = get_field('external_url');
?>
<div class="nhsuk-grid-column-one-quarter partners">
    <?php if ($url) :?><a class="nhsuk-promo__link-wrapper" href="<?php echo $url; ?>" target="_blank" aria-label="<?php echo the_title(); ?>"><?php endif; ?>
        <?php the_post_thumbnail(null, ['class' => 'nhsuk-promo__img wp-post-image']); ?>
    <?php if ($url) :?></a><?php endif; ?>
</div>
