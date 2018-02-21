<?php
/*
Handle the schedulded tasks to be run
*/


//Give us a frequent schedule
add_filter( 'cron_schedules', '_add_cron_interval' );
function _add_cron_interval( $schedules ) {
   $schedules['thirty_seconds'] = array(
       'interval' => 30,
       'display'  => esc_html__( 'Every Thirty Seconds' ),
   );
   return $schedules;
}

add_action( 'fbc_cron', 'fbc_cron_run' );

function fbc_cron_run(){
    /*
    I will run every 30sec
    */
}

// This tells wp to set the reoccuring task every 30sec
wp_schedule_event( time(), 'thirty_seconds', 'fbc_cron' );