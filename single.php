<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nightingale_2.0
 */

get_header();
?>

    <div id="primary" class="nhsuk-width-container">
        <main id="maincontent" class="nhsuk-main-wrapper">
            <div class="nhsuk-grid-row">
                <div class="nhsuk-grid__item nhsuk-grid-column-two-thirds">
                    <div class="nhsuk-grid-row">

                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' );

                            // If comments are open or we have at least one comment, load up the comment template.
//                            if ( comments_open() || get_comments_number() ) :
//                                comments_template();
//                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>

                    <div class="nhsuk-grid-row">
                        <div class="nhsuk-grid__item nhsuk-grid-column-full-width">
                        <nav class="nhsuk-pagination" role="navigation" aria-label="Pagination">
                            <ul class="nhsuk-list nhsuk-pagination__list">
                                <?php if ($prev = get_previous_post()) :?>
                                <li class="nhsuk-pagination-item--previous">
                                    <a class="nhsuk-pagination__link nhsuk-pagination__link--prev" href="<?php echo get_post_permalink($prev); ?>">
                                        <span class="nhsuk-pagination__title">Previous</span>
                                        <span class="nhsuk-u-visually-hidden">:</span>
                                        <span class="nhsuk-pagination__page"><?php echo $prev->post_title; ?></span>
                                        <svg class="nhsuk-icon nhsuk-icon__arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M4.1 12.3l2.7 3c.2.2.5.2.7 0 .1-.1.1-.2.1-.3v-2h11c.6 0 1-.4 1-1s-.4-1-1-1h-11V9c0-.2-.1-.4-.3-.5h-.2c-.1 0-.3.1-.4.2l-2.7 3c0 .2 0 .4.1.6z"></path>
                                        </svg>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if ($next = get_next_post()) :?>
                                <li class="nhsuk-pagination-item--next">
                                    <a class="nhsuk-pagination__link nhsuk-pagination__link--next" href="<?php echo get_post_permalink($next); ?>">
                                        <span class="nhsuk-pagination__title">Next</span>
                                        <span class="nhsuk-u-visually-hidden">:</span>
                                        <span class="nhsuk-pagination__page"><?php echo $next->post_title; ?></span>
                                        <svg class="nhsuk-icon nhsuk-icon__arrow-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M19.6 11.66l-2.73-3A.51.51 0 0 0 16 9v2H5a1 1 0 0 0 0 2h11v2a.5.5 0 0 0 .32.46.39.39 0 0 0 .18 0 .52.52 0 0 0 .37-.16l2.73-3a.5.5 0 0 0 0-.64z"></path>
                                        </svg>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
