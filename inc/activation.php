<?php
    defined( 'ABSPATH' ) || die('<p style="background: #ff000080; padding: 24px; font-family: sans-serif; border-radius: 8px; border: 2px solid #ff000078;">access denied :)</p>');
    
    global $Rozesa_searchedeUser;

    function Create_table() {
        global $wpdb;
        global $Rozesa_searchedeUser;
        
        $table_name = $wpdb->prefix . 'rozesa_search_tracker';

            $sql = "CREATE TABLE $table_name (
                id int NOT NULL AUTO_INCREMENT,
                userid mediumint(9)  NOT NULL,
                searched_at datetime NOT NULL,
                searched_text text NOT NULL,
                PRIMARY KEY  (id)
            ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );   


    }
