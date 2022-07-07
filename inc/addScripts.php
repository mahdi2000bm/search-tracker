<?php
    defined( 'ABSPATH' ) || die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>');

    function wp_search_load_script()
    {
        wp_register_script('wp_search_getData', URL_PATH . 'assets/js/getData.js' , array('jquery') , '1.0.0' , true);
        wp_enqueue_script('wp_search_getData');
    }
    add_action('wp_enqueue_scripts', 'wp_search_load_script');

    function rsu_admin_assets()
    {
        wp_register_style('rsu-admin-page', URL_PATH . 'assets/css/rsu-admin-page.css');
        wp_enqueue_style('rsu-admin-page');
    }
    add_action('admin_enqueue_scripts', 'rsu_admin_assets');

	