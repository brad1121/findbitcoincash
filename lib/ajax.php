<?php
add_action('wp_ajax_generate_wallet','generateWallet');
add_action('wp_ajax_nopriv_generate_wallet','generateWallet');

function generateWallet(){
   
    $number = $_POST['bchNumber'] ? $_POST['bchNumber'] : 1 ;
    if(!is_numeric($number)){
        echo 0;
        wp_die();
    }
   
    $addyList = BitcoinCash::newAddress($number);
    //TODO: Store this in the DB creating a draft listing for each one
    echo $addyList;
    wp_die();
}
