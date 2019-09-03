<?php
/**
 * Template Name: Jobs
 *
 * The template for displaying pages with tabbed navigation at the top.
 *
 * Note: the parent page is shown under the "Overview" tab and
 * the order of the other tabs is controlled by the child pages' 'order' fields.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nightingale_2.0
 */

get_header();
?>
    <div id="primary" class=" nhsuk-grid-row nhs-feed-wrapper">
        <div class="nhsuk-grid-column-full">
            <?php while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; ?>

            <?php // get_template_part('partials/feed'); ?>
            <?php echo do_shortcode('[nhsjobfeed]'); ?>
        </div>
    </div>
<?php
get_footer();

