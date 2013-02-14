<?php
	ob_start();
    /* 
    Plugin Name: Custom Social Media Links
    Plugin URI: 
    Description: Custom Social Media Links
    Author: Vikrant Randhawa 
    Version: 1.0 
    Author URI: http://www.zyrro.com
    */  
	function custom_social_media_links(){
		include('custom_social_media_links_show.php');
	}
	
	function custom_social_media_links_menu() {
		add_submenu_page('options-general.php', 'Custom Social Media Links', 'Custom Social Media Links', 'read', 'custom_social_media_links_menu','custom_social_media_links');
	}
	
	add_action('admin_menu', 'custom_social_media_links_menu');
?>