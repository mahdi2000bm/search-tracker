<?php
    defined( 'ABSPATH' ) || die('<p style="background: #ff00003b; padding: 24px; font-family: sans-serif; border-radius: 8px;">access denied :)</p>');

     add_action('wp_ajax_searchFormText', 'wp_handler' ); 
     add_action('wp_ajax_nopriv_searchFormText', 'wp_handler' );

     function wp_handler(){
          global $wpdb;
          $user = wp_get_current_user();
          $current_user =  $user->ID;

          $table_name = $wpdb->prefix .'rozesa_search_tracker';
          $searched_text = $_POST['data'];
          $insert_sql = "INSERT INTO $table_name (userid , searched_text) VALUES ( '$current_user', '$searched_text')";
          require_once ABSPATH . 'wp-admin/includes/upgrade.php';
          dbDelta($insert_sql);  
          } 

          add_action('wp_ajax_get_last_products', 'getLastProducts' ); 
          add_action('wp_ajax_nopriv_get_last_products', 'getLastProducts' );

          function getLastProducts(){
      
              global $wpdb;
              $productsResult = [];

              $postTable = $wpdb->prefix .'posts';
      
              $lastProducts = $wpdb->get_results("SELECT post_title , id FROM $postTable WHERE post_type = 'product' AND  post_status = 'publish' LIMIT 3");
      
              foreach ($lastProducts as $lastProduct){
                      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $lastProduct->id ), 'single-post-thumbnail' );
                      $permalink = get_permalink( $lastProduct->id );
                      echo $image[0] . "|-|";
                      echo $lastProduct->post_title . "|-|" . "$permalink" . "||";
              }
              array_push( $productsResult, [
                "id"=>$lastProduct->id,
                "title"=>"$lastProduct->post_title" ,
                "link"=>$permalink,
                "imagelink"=>$image[0]
            ]);
              $jsondata = json_encode($productsResult , JSON_UNESCAPED_UNICODE);
              echo $jsondata;
          }  