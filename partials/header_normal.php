
<div class="nhsuk-width-container nhsuk-header__container">
    <!-- to be made a toggleable area, thinking white stripe with organisation logo...?
        <div
        class="nhsuk-header__logo">
            <a class="nhsuk-header__link" href="/" aria-label="NHS homepage">
                <?php
    the_custom_logo();
    $nightingale_2_0_description = get_bloginfo('description', 'display');
    ?>
            </a>
        </div> -->

    <div class="nhsuk-header__logo">
        <a class="nhsuk-header__link" href="/" aria-label="NHS homepage">
            <svg class="nhsuk-logo nhsuk-logo--white" xmlns="http://www.w3.org/2000/svg" role="presentation"
                 focusable="false" viewBox="0 0 40 16">
                <path fill="#fff" d="M0 0h40v16H0z"></path>
                <path fill="#005eb8"
                      d="M3.9 1.5h4.4l2.6 9h.1l1.8-9h3.3l-2.8 13H9l-2.7-9h-.1l-1.8 9H1.1M17.3 1.5h3.6l-1 4.9h4L25 1.5h3.5l-2.7 13h-3.5l1.1-5.6h-4.1l-1.2 5.6h-3.4M37.7 4.4c-.7-.3-1.6-.6-2.9-.6-1.4 0-2.5.2-2.5 1.3 0 1.8 5.1 1.2 5.1 5.1 0 3.6-3.3 4.5-6.4 4.5-1.3 0-2.9-.3-4-.7l.8-2.7c.7.4 2.1.7 3.2.7s2.8-.2 2.8-1.5c0-2.1-5.1-1.3-5.1-5 0-3.4 2.9-4.4 5.8-4.4 1.6 0 3.1.2 4 .6"></path>
                <image src="https://assets.nhs.uk/images/nhs-logo.png" xlink:href=""></image>
            </svg>
        </a>
    </div>
    <div class="nhsuk-header__transactional-service-name">
        <a class="nhsuk-header__transactional-service-name--link" href="/" title="<?php echo get_bloginfo( 'name' ); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" class="nhsuk-logo nhsuk-logo--hee"/>
        </a>
    </div>
    <div class="nhsuk-header__content" id="content-header">

        <div class="nhsuk-header__menu">
            <button class="nhsuk-header__menu-toggle" id="toggle-menu" aria-controls="header-navigation"
                    aria-label="Open menu">Menu
            </button>
        </div>

        <div class="nhsuk-header__search">
            <?php get_search_form(); ?>
        </div>

    </div>

</div>
