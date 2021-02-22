<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

    <meta name='robots' content='noindex,nofollow' />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header class="header">
        <div class="header__container">
            <div class="header__logo">
                <a href="<?php echo site_url('/'); ?>">
                    <object data="<?php echo get_template_directory_uri(); ?>/assets/dist/svg/color.svg" type="image/svg+xml">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/svg/color.svg" alt="logo"/>
                    </object>
                </a>
            </div>


            <nav>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'main_menu',
                    'depth' => 3,
                    'container' => false,
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ) );
                ?>

            </nav>

            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu-mobile">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'main_menu',
                    'depth' => 3,
                    'container' => false,
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
            </div>

        </div>
    </header>


