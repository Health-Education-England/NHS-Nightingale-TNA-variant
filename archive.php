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

                    <?php if(get_post_type() == 'faqs'):?>
                        <form method="get" action="" id="faqsearch" class="nhsuk-header__search-form">
                            <div class="autocomplete-container" id="autocomplete-container">
                                <div class="autocomplete__wrapper" role="combobox" aria-expanded="false">
                                    <input type='search' placeholder="Search FAQs" class="search-field__listbox autocomplete__input">
                                </div>
                            </div>
                            <!-- <button class="nhsuk-search__submit" type="submit">
                                <svg class="nhsuk-icon nhsuk-icon__search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <path d="M19.71 18.29l-4.11-4.1a7 7 0 1 0-1.41 1.41l4.1 4.11a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 10a5 5 0 1 1 5 5 5 5 0 0 1-5-5z"></path>
                                </svg>
                                <span class="nhsuk-u-visually-hidden">Search</span>
                            </button> -->
                        </form>
                        <script src="/wp-content/themes/nhstna-theme/js/faqsearch.js"></script>
                        <hr>
                    <?php endif; ?>

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
                    <div class="nhsuk-grid-row <?php if(get_post_type() == 'faqs'):?>faqslisting<?php endif; ?>">
                        <?php
                        get_template_part( 'template-parts/content', get_post_type() );
                        ?>
                    </div><?php if(get_post_type() != 'faqs'):?><hr/><?php endif; ?>
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
