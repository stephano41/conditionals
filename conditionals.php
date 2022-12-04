<?php
 
/**
 
 * @package conditionals
 
 */
 
/*
 
Plugin Name: conditionals
 
Plugin URI: 
 
Description: for custom conditional DKI
 
Version: 0.0.1
 
Author: Steven Zhang
 
Author URI: 
 
License: GPLv2 or later
 
Text Domain: conditionals
 
*/function wporg_shortcode( $atts = [], $content = null) {
    // do something to $content
    // always return
    // check if logged in
    if (get_current_user_id()) { 

        return get_user_meta(get_current_user_id(), 'Stream', True);
    } else {
        return "You are not logged in!";
    }
}
    
    

add_shortcode('wporg', 'wporg_shortcode');