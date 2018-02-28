<?php

if(!defined('BCH_PLUGIN_PATH')){
    // Shouldnt hit this, but if we do, make an attempt;
    define ('BCH_PLUGIN_PATH', ABSPATH.'wp-content/plugins/findbitcoincash/'); 
}
class BitcoinCash{
    public static function newAddress($number = 1){        
            $BCHGUZZLE = new GuzzleHttp\Client();            
            $response = $BCHGUZZLE->request('GET',"https://fbc-app.herokuapp.com/address/" . $number);            
            return $response->getBody();        
    }
}