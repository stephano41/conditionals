<?php
 
/**
 
 * @package conditionals
 
 */
 
/*
 
Plugin Name: conditionals
 
Plugin URI: 
 
Description: for custom conditional DKI
 
Version: 0.0.2
 
Author: Steven Zhang
 
Author URI: 
 
License: GPLv2 or later
 
Text Domain: conditionals
 
*/

require_once('utils.php');

define("ONLINE_TICKET_NAME", "Online Conference Ticket");

    
    
function generic_timetable_shortcode( $atts = [], $content = null) {
    if (!get_current_user_id()) {
        return null;
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
        return null;
    }

    if (get_user_online(ONLINE_TICKET_NAME)){
        return $a['online_true'];
    } else{
        return $a['online_false'];
    }

}

function which_stream_shortcode($atts = [], $content = null) {
    $a = shortcode_atts( array(
        'is_a' => null,
        'is_b' => null,
    ), $atts );

    if (!get_current_user_id()) {
        return null;
    }

    switch(get_user_stream()){
        case "A":
            // return implode(array_keys($a));
            return $a['is_a'];
        case "B":
            return $a['is_b'];
        default:
            return null;
    }

}

add_shortcode('which_stream', "which_stream_shortcode");
add_shortcode('generic_timetable', 'generic_timetable_shortcode');
add_shortcode('is_online', 'is_online_shortcode');