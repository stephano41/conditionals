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
 
*/

require_once('utils.php');

define("ONLINE_TICKET_NAME", "Online Conference Ticket");

    
    
function generic_timetable_shortcode( $atts = [], $content = null) {
    if (!get_current_user_id()) {
        return 0;
    }

    if (get_user_online(ONLINE_TICKET_NAME)){
        return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/online_timetable.png'>";
    } else{
        return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/in-person_timetable.png'>";
    }
}


function is_online_shortcode($atts = [], $content = null) {
    $a = shortcode_atts( array(
        'online_true' => null,
        'online_false' => null,
    ), $atts );

    if (!get_current_user_id()) {
        return 0;
    }

    if (get_user_online(ONLINE_TICKET_NAME)){
        return $a['online_true'];
    } else{
        return $a['online_false'];
    }

}

add_shortcode('generic_timetable', 'generic_timetable_shortcode');
add_shortcode('is_online', 'is_online_shortcode');