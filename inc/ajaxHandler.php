<?php
    defined( 'ABSPATH' ) || die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>');

     add_action('wp_ajax_searchFormText', 'wp_handler' ); 
     add_action('wp_ajax_nopriv_searchFormText', 'wp_handler' );

     function wp_handler(){

          global $wpdb;

          $user = wp_get_current_user();
          $current_user =  $user->ID;

          $table_name = $wpdb->prefix .'rozesaSearchedUser';
          $searched_text = $_POST['data'];
          $insert_sql = "INSERT INTO $table_name (userid , searched_text) VALUES ( '$current_user', '$searched_text')";
          require_once ABSPATH . 'wp-admin/includes/upgrade.php';
          dbDelta($insert_sql);  
          } 
