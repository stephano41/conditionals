<?php

function get_user_online($ticket_name){
    return get_user_meta(get_current_user_id(), 'Ticket Type', True) == $ticket_name;
}