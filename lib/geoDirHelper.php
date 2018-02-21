<?php
/*
Helper class to fetching/setting geoDir values
*/
class GeodirHelper{
    private static $instance;
    /**
	 * Returns an instance of this class.
	 */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new GeodirHelper();
		}
		return self::$instance;
	}
    public function __construct(){
        
    }
    public function get_wallet_by_id($postID){
        return get_post($postID);
    }
    public function get_wallet_by_name($name){
        global $wpdb;
        $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $name, 'place' ) );
    
        if ( $page ) return get_post( $page );
    
        return null;
    }
    public function add_wallet($walletFields){
        /* TODO
        This will need checks and testing to ensure we add not only the wallet specific info, but also any geoDirectory info in the right format
        */
        return wp_insert_post( $walletFields );

    }
    public function update_wallet($postID, $walletAddress){
        return update_post_meta($postID, 'geodir_walletaddress', $walletAddress);
    }
    public function delete_wallet($postID){
        wp_trash_post( $postID  ); 
    }


    public function set_wallet_meta_by_key($postID, $metaKey, $metaValue){
        return update_post_meta($postID, $metaKey, $metaValue);
    }

}