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

include_once "lib/templateEngine.php";
include_once "lib/taskRunner.php";
include_once "lib/gerDirHelper.php";

/* Check geoDir is active */
if(!is_plugin_active('geodirectory/geodirectory.php')){
    function no_geoDir() {
        ?>
        <div class="error notice">
            <p>GeoDirector Plugin not found - Find Bitcoin Cash Plugin will not work correctly</p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'no_geoDir' );
}