<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nightingale_2.0
 */

get_header();
?>
    <div id="primary" class=" nhsuk-grid-row">
            <div class="nhsuk-grid__item nhsuk-grid-column-full">
                <?php
                    global $wp;
                    $hasPage = false;
                    $post = get_page_by_path($wp->request);
                    if ($post && $post->post_status == 'publish') {
                        setup_postdata($post);
                        $hasPage = true;
                        ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php the_title(); ?></h1>
                            <div class="archive-description"><?php the_content(); ?></div>
                        </header><!-- .page-header -->
                        <?php
                        wp_reset_postdata();
                    }
                ?>

                <?php if ( have_posts() ) : ?>

                    <?php if(!$hasPage) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                        the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->
                    <?php endif; ?>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        ?>
                    <div class="nhsuk-grid-row">
                        <?php
                        get_template_part( 'template-parts/content', get_post_type() );
                        ?>
                    </div><hr/>
                    <?php
                    endwhile;

                    nightingale_pagination();

                // else :

                //     get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
