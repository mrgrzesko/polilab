<?php

function my_scripts_method() {
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/dist/css/main.css' );

    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/assets/dist/js/main.js', array(), '1.1', 'all');

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

function wg_mytheme_setup() {

    register_nav_menus(
        array(
            'main_menu' => __( 'Main Menu', 'wg_menu' ),
        )
    );

}
add_action( 'after_setup_theme', 'wg_mytheme_setup' );

require_once 'class-wp-bootstrap-navwalker.php';

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

if ( function_exists('register_sidebar') ) {

    register_sidebar(array(
        'id' => 'footer-sidebar-1',
        'name' => __('Footer Sidebar 1', 'appwise'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'id' => 'footer-sidebar-2',
        'name' => __('Footer Sidebar 2', 'appwise'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'id' => 'footer-sidebar-3',
        'name' => __('Footer Sidebar 3', 'appwise'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'id' => 'footer-sidebar-4',
        'name' => __('Footer Sidebar 4', 'appwise'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));

    register_sidebar(array(
        'id' => 'footer-sidebar-5',
        'name' => __('Footer Sidebar 5', 'appwise'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ));

}

function disable_emojis_tinymce( $plugins ) {
    if( is_array($plugins) ) {
        $plugins = array_diff( $plugins, array( 'wpemoji' ) );
    }
    return $plugins;
}

add_action('init', 'disable_emoji_feature');

add_filter( 'option_use_smilies', '__return_false' );
add_filter('wpcf7_autop_or_not', '__return_false');