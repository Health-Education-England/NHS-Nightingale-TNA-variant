<?php
/**
 * Homepage
 */

get_header();
?>

    <section class="nhsuk-grid-row">
        <div class="nhsuk-width-container">
            <div class="nhsuk-grid__item nhsuk-grid-column-two-thirds">
                <?php
                if ( have_posts() ) :
                    if ( is_home() && ! is_front_page() ) :
                        ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                    <?php
                    endif;
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_type() );
                    endwhile;
                    the_posts_navigation();
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
            </div>
            <div class="nhsuk-grid__item nhsuk-grid-column-one-third">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

    <section class="nhsuk-grid-row">
        <div class="nhsuk-width-container">
            <?php
                $message_content = get_field('message_content');
                if($message_content) :
                    $message_title = get_field('message_title');
                    $message_url = get_field('message_url');
                    $message_button = get_field('message_button');
            ?>
                <div class="nhsuk-grid-column-full">
                    <div class="nhsuk-grid__item nhsuk-grid-row">
                        <div class="nhsuk-warning-callout">
                            <?php if ($message_title) :?>
                                <h3 class="nhsuk-warning-callout__label">
                                    <?php echo $message_title; ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ($message_url) :?>
                                <a href="<?php echo $message_url; ?>" class="nhsuk-button nhsuk-button--secondary" style="float:right;margin-top: 55px;">
                                    <?php echo $message_button ? : 'Read more'; ?>
                                </a>
                            <?php endif?>
                            <p><?php echo $message_content; ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- <section class="nhsuk-grid-row white-row">
        <div class="nhsuk-width-container">
            <?php // query_posts('post_type=faqs&posts_per_page=6'); if ( have_posts() ) : ?>
                <div class="nhsuk-grid__item nhsuk-grid-column-full">
                    <h2>FAQs</h2>
                    <?php // while ( have_posts() ) : the_post();
                       // get_template_part( 'partials/blocks', get_post_type() );
                    // endwhile; ?>

                    <br>
                    <div class="nhsuk-action-link text-center">
                        <a class="nhsuk-action-link__link" href="/faqs/">
                            <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                            </svg>
                            <span class="nhsuk-action-link__text">View all FAQs</span>
                        </a>
                    </div>
                </div>
            <?php // endif; wp_reset_query(); ?>
        </div>
    </section> -->

    <section class="nhsuk-grid-row">
        <div class="nhsuk-width-container">
            <?php
                $feed_vacancies = _fetchVacancies();
                $homepage = true;

                if ($feed_vacancies && ($vacancies = $feed_vacancies->vacancy_details) && count($vacancies)) :
            ?>
                <div class="nhsuk-grid__item nhsuk-grid-column-full">
                    <h2>Latest Vacancies</h2>
                    <div class="nhsuk-grid-row nhsuk-promo-group homepage-vacancies">
                        <?php include(locate_template('partials/feed-listing.php')); ?>
                    </div>

                    <div class="nhsuk-action-link text-center">
                        <a class="nhsuk-action-link__link" href="/vacancies/">
                            <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                            </svg>
                            <span class="nhsuk-action-link__text">View all Vacancies</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="nhsuk-grid-row white-row">
        <div class="nhsuk-width-container">
            <?php query_posts('post_type=case-studies&posts_per_page=3'); if ( have_posts() ) :?>
                <div class="nhsuk-grid__item nhsuk-grid-column-full">
                    <h2>Latest Case Studies</h2>
                    <?php get_template_part( 'partials/blocks' ); ?>

                    <div class="nhsuk-action-link text-center">
                        <a class="nhsuk-action-link__link" href="/case-studies/">
                            <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                            </svg>
                            <span class="nhsuk-action-link__text">View all Case Studies</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="nhsuk-grid-row">
        <div class="nhsuk-width-container">
            <?php query_posts('post_type=partners'); if ( have_posts() ) : ?>
                <div class="nhsuk-grid__item nhsuk-grid-column-full">
                    <h2>Our Partners</h2>
                    <div class="nhsuk-grid-row">
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'partials/blocks', get_post_type() );
                    endwhile; ?>
                    </div>
                </div>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section><!-- #primary -->

<?php
get_footer();
