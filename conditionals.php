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
function timetable_shortcode( $atts = [], $content = null) {
    // do something to $content
    // always return
    // check if logged in
    if (get_current_user_id()) { 
        switch (get_user_meta(get_current_user_id(), 'Stream', True)){
            case 'A':
                return "<a href='https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.mommyismyteacher.com%2Fletter-a-printables&psig=AOvVaw2KsEkmfPPFhrx7xBhHrgCt&ust=1670231884155000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCJjBnOPQ3_sCFQAAAAAdAAAAABAE'>you're A</a>";
            case 'B':
                return "<img src='" . plugin_dir_url( __FILE__ ) ."timetables/640px-LetterB.png'>";
        }
    }
    return 0;
}
    
    

add_shortcode('timetable', 'timetable_shortcode');