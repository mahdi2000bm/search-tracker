<?php
/*
*Plugin Name: Rozesasearch
Description: لیست سرچ های کاربر را به برای ما ذخیره میکند
*Author: mhdibaqri 
*Author URI: #
*/

    defined( 'ABSPATH' ) || die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>');
   

    define( 'PATHDIR' , plugin_dir_path(__FILE__));
    define( 'URL_PATH',plugin_dir_url(__FILE__));
    define( 'ASSETS_PATH', plugin_dir_url(__FILE__) . 'assets/');

    /*Create table*/
    
    if ( !class_exists( 'ADR_CrateTable' ) ) {

        class ADR_CrateTable {
            public function __construct() {
                include( PATHDIR . '/inc/activation.php' );
                register_activation_hook( __FILE__, 'Create_table' );
            }
        }
        new ADR_CrateTable();
    }
    
    if (is_admin()){ include( PATHDIR . '/inc/adminMenus.php' ); }
    include( PATHDIR . '/inc/addScripts.php' );
    include( PATHDIR . '/inc/ajaxHandler.php' );   
    