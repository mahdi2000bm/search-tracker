<?php
    defined( 'ABSPATH' ) || die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>');

    function search_tracker_front()
    {
        wp_enqueue_script('search-tracker', URL_PATH . 'assets/js/getData.js' , array('jquery') , '1.0.0' , true);
    }
    add_action('wp_enqueue_scripts', 'search_tracker_front');

    function search_tracker_admin()
    {
        wp_enqueue_style('search-tracker', URL_PATH . 'assets/css/rsu-admin-page.css');
    }
    add_action('admin_enqueue_scripts', 'search_tracker_admin');

	