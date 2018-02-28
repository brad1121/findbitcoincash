<?php
/*
Plugin Name:  Find Bitcoin Cash Plugin
Plugin URI:   https://findbitcoin.cash
Description:  Pluging to handle the features of the findbitcoin.cash website
Version:      0.0.1
Author:       brad1211
Author URI:   https://github.com/brad1121/findbitcoincash
License:      MIT
*/

/*
preprend fbc where possible to avoid naming conflicts for function names and globals with other plugins
*/


define('BCH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
include_once "vendor/autoload.php";


include_once "lib/logging.php";
include_once "bitcoinCash/wallet.php";
include_once "lib/shortCodes.php";
include_once "lib/taskRunner.php";
include_once "lib/geoDirHelper.php";
include_once "lib/ajax.php";


// enqueue and localise scripts
wp_enqueue_script( 'bchPls',  plugin_dir_url( __FILE__ ) . "assets/js/bch.js",['jquery'],false,true );
wp_localize_script( 'bchPls', 'bchaj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

wp_enqueue_style( 'findBch' , plugin_dir_url( __FILE__ ) . "assets/css/findBitcoinCash.css");

/* Check geoDir is active */
/*
if(!is_plugin_active('GeoDirectory')){
    function no_geoDir() {
        ?>
        <div class="error notice">
            <p>GeoDirector Plugin not found - Find Bitcoin Cash Plugin will not work correctly</p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'no_geoDir' );
}
*/
