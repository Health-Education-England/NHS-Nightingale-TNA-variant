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

include_once(get_stylesheet_directory() . '/functions/Feed.php');
$feed = new Feed();
$vacancies = $feed->importFeed();

get_header();
?>
    <div id="primary" class="nhsuk-width-container">
        <main id="maincontent" class="nhsuk-main-wrapper">
            <div class="nhsuk-grid-row">
                <?php while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; ?>
            </div>

            <?php // get_template_part('partials/feed'); ?>
            <div id="nhs-feed"></div>
            <script>
                window.NHS_FEED = <?php echo json_encode($vacancies->vacancy_details); ?>;
            </script>
            <?php assets_for_entrypoint('main', 'js')?>
        </main>
    </div>
<?php
get_footer();

