<?php
 
/**
 
 * @package conditionals
 
 */
 
/*
 
Plugin Name: conditionals
 
Plugin URI: 
 
Description: for custom conditional DKI
 
Version: 0.0.4
 
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
        // user is online
        return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/online_timetable.png'>";
    } else{
        // user is inperson, now determine which stream they are
        $stream = strtolower(get_user_stream());

        $stream_array=array("a1", "a2", "a3", "b1", "b2", "b3");
        if (in_array($stream, $stream_array)){
            return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/inperson_stream_" .$stream. "/1.jpg'>\n
            <img src='" . plugin_dir_url( __FILE__ ) ."timetables/inperson_stream_" .$stream. "/2.jpg'>\n
            <img src='" . plugin_dir_url( __FILE__ ) ."timetables/inperson_stream_" .$stream. "/3.jpg'>";
        } else{
            return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/generic_in-person_timetable.png'>";
        }
        

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
        'is_a1' => "A1",
        'is_a2' => "A2",
        'is_a3' => "A3",
        'is_b1' => "B1",
        'is_b2' => "B2",
        'is_b3' => "B3",
    ), $atts );

    if (!get_current_user_id()) {
        return null;
    }

    switch(get_user_stream()){
        case "A1":
            // return implode(array_keys($a));
            return $a['is_a1'];
        case "A2":
            return $a['is_a2'];
        case "A3":
            return $a['is_a3'];
        case "B1":
            return $a['is_b1'];
        case "B2":
            return $a['is_b2'];
        case "B3":
            return $a['is_b3'];
        default:
            return null;
    }

}

function display_user_name_shortcode($atts = [], $content = null) {
    if (!get_current_user_id()) {
        return null;
    }

    $user = wp_get_current_user();
    return $user->display_name;
}

add_shortcode('which_stream', "which_stream_shortcode");
add_shortcode('generic_timetable', 'generic_timetable_shortcode');
add_shortcode('is_online', 'is_online_shortcode');
add_shortcode('display_user_name', 'display_user_name_shortcode');