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
        <main id="maincontent" class="nhsuk-main-wrapper nhsuk-grid-row">
            <div class="nhsuk-grid__item nhsuk-grid-column-two-thirds">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', get_post_type() );

                        // If comments are open or we have at least one comment, load up the comment template.
//                            if ( comments_open() || get_comments_number() ) :
//                                comments_template();
//                            endif;

                    endwhile; // End of the loop.
                    ?>
            </div>
            <div class="nhsuk-grid__item nhsuk-grid-column-one-third">
                <?php nightingale_2_0_post_thumbnail(); ?>
            </div>
            <div class="nhsuk-grid__item nhsuk-grid-column-full">
                <?php get_template_part('partials/pagination'); ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
