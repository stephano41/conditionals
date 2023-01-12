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

    
    
function generic_timetable_shortcode( $atts = [], $content = null) {
    if (!get_current_user_id()) {
        return 0;
    }

    if (get_user_meta(get_current_user_id(), 'Ticket Type', True) == "Online Conference Ticket"){
        return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/online_timetable.png'>";
    } else{
        return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/in-person_timetable.png'>";
    }
}


add_shortcode('generic_timetable', 'generic_timetable_shortcode');