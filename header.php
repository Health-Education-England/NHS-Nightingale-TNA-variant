<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nightingale_2.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="<?php echo get_bloginfo('template_directory'); ?>/node_modules/nhsuk-frontend/dist/nhsuk.min.js"
            defer></script>
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?php echo get_bloginfo('template_directory');
    ?>/node_modules/nhsuk-frontend/packages/assets/favicons/apple-touch-icon.png">
    <link rel="icon" href="<?php echo get_bloginfo('template_directory');
    ?>/node_modules/nhsuk-frontend/packages/assets/favicons/favicon.png">

    <?php wp_head(); ?>
</head>

<body class="js-enabled">


<a class="skip-link screen-reader-text"
   href="#content"><?php esc_html_e('Skip to content', 'nightingale-2-0'); ?></a>

<header class="nhsuk-header nhsuk-header--transactional" role="banner">
    <?php
    $header_layout = get_theme_mod('header_styles', 'normal');
    get_template_part('partials/header_'. $header_layout);
    ?>

    <nav class="nhsuk-header__navigation" id="header-navigation" role="navigation" aria-label="Primary navigation"
         aria-labelledby="label-navigation">
        <p class="nhsuk-header__navigation-title"><span id="label-navigation">Menu</span>
            <button class="nhsuk-header__navigation-close" id="close-menu">
                <svg class="nhsuk-icon nhsuk-icon__close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                     aria-hidden="true" focusable="false">
                    <path d="M13.41 12l5.3-5.29a1 1 0 1 0-1.42-1.42L12 10.59l-5.29-5.3a1 1 0 0 0-1.42 1.42l5.3 5.29-5.3 5.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l5.29-5.3 5.29 5.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z"></path>
                </svg>
                <span class="nhsuk-u-visually-hidden">Close menu</span>
            </button>
        </p>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_class' => 'nhsuk-header__navigation-list',
            'walker' => new Walker_Nightingale_Menu(),
            'container' => false,
            'depth' => 0  // limit menu depth (otherwise login button goes astray)
        ));
        ?>

    </nav>

</header>

<div id="content" class="nhsuk-width-container--full">
    <?php nightingale_breadcrumb() ?>

    <?php
    // add ACF generated HERO block
    if (is_singular()) {
        include_once('wp-content/plugins/nhsl-blocks/blocks/content-hero.php');
    }
    //end hero image section

    ?>