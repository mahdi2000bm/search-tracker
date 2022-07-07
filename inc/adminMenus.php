<?php
    defined( 'ABSPATH' ) ||     die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>');
        
    add_action('admin_menu','adminMenuHandler');
    
    function adminMenuHandler(){
        add_menu_page('جستجوی پیشرفته رزسا','جستجوی رزسا','manage_options','wp_user_search','wpSearchFunHandler','dashicons-database');
    }

    function wpSearchFunHandler(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'rozesa_search_tracker';
        /*
        *LIMIT RESULT PAGINATION 
        */
        $Limit = 50;
        $all_resultstb = $wpdb->get_results("SELECT * FROM $table_name");
        $pageCount = ceil(count($all_resultstb)/$Limit);
        $paginate =  (isset($_GET['result']) && is_numeric($_GET['result']) && $_GET['result'] <= $pageCount ) ? ($_GET['result'] - 1) * $Limit : 0;
        $resultstb = $wpdb->get_results("SELECT * FROM $table_name ORDER BY searched_at DESC LIMIT $paginate , $Limit");
        include RSUPATHDIR . "tpl/mainPage.php";
    }
    
