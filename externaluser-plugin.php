<?php
/**
 * Plugin Name: External User 
 * Plugin URI: 
 * Description: To get external users from https://jsonplaceholder.typicode.com/users/
 * Version: 1.0
 * Author: Mehul Dave
 * Author URI: 
 */
 /**
 * Function add_my_custom_page
 * Description: To create a new page and show data from External User api.
 */
function add_my_custom_page() {
    // Create post object
	ob_start();
	include "Classes.php";
	$myvar = ob_get_clean();
    $my_post = array(
      'post_title'    => wp_strip_all_tags( 'External User' ),
      'post_content'  => $myvar,
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
    );

    // Insert the post into the database
    wp_insert_post( $my_post );
	
}

register_activation_hook(__FILE__, 'add_my_custom_page');

 /**
 * Function set_scripts_type_attribute
 * Description: To include module type js.
 */
function set_scripts_type_attribute( $tag, $handle, $src ) {
    
        $tag = '<script type="module" src="'. plugin_dir_url( __FILE__ ).'js/user.js"></script>';
		$tag .= '<script type="module" src="'. plugin_dir_url( __FILE__ ).'js/app.js"></script>';
    
    return $tag;
}
add_filter( 'script_loader_tag', 'set_scripts_type_attribute', 10, 3 );
?>