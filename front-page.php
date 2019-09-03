<?php
/**
 * Homepage
 */

get_header();
?>

    <div id="primary" class=" nhsuk-grid-row">

        <div class="nhsuk-grid__item nhsuk-grid-column<?php echo has_post_thumbnail() ? '-two-thirds' : '-full'; ?>">
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
        <?php if ( has_post_thumbnail() ) :?>
            <div class="nhsuk-grid__item nhsuk-grid-column-one-third">
                <?php the_post_thumbnail(); ?>
                <a href="" class="nhsuk-button">Fint out more</a>
            </div>
        <?php endif; ?>

        <?php
            $message_content = get_field('message_content');
            if($message_content) :
                $message_title = get_field('message_title');
                $message_url = get_field('message_url');
                $message_button = get_field('message_button');
        ?>
            <div class="nhsuk-grid__item nhsuk-grid-column-full">
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
                    <?php echo $message_content; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php query_posts('post_type=faqs'); if ( have_posts() ) : ?>
            <div class="nhsuk-grid__item nhsuk-grid-column-full">
                <h2>FAQs</h2>
                <?php while ( have_posts() ) : the_post();
                    get_template_part( 'partials/blocks', get_post_type() );
                endwhile; ?>
            </div>
        <?php endif; wp_reset_query(); ?>

        <?php
            $feed_vacancies = _fetchVacancies();
            $homepage = true;

            if ($feed_vacancies && ($vacancies = $feed_vacancies->vacancy_details) && count($vacancies)) :
        ?>
            <div class="nhsuk-grid__item nhsuk-grid-column-full">
                <h2>Latest Jobs</h2>
                <div class="nhsuk-grid-row nhsuk-promo-group">
                    <?php include(locate_template('partials/feed-listing.php')); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php query_posts('post_type=case-studies'); if ( have_posts() ) :?>
            <div class="nhsuk-grid__item nhsuk-grid-column-full">
                <h2>Latest Case Studies</h2>
                <?php get_template_part( 'partials/blocks' ); ?>
            </div>
        <?php endif; ?>

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
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
