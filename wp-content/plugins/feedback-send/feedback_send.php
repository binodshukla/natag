<?php
ob_start();
    /* 
    Plugin Name: Send Feedback
    Plugin URI: 
    Description: Send Feedback to Users
    Author: Vikrant Randhawa 
    Version: 1.0 
    Author URI: http://www.zyrro.com
    */  
	add_action('admin_menu', 'add_feedback_send');

	function add_feedback_send() {
		add_menu_page('Send Feedback to Users', 'Send Feedback', 'add_users', 'feedback_send', 'custom_menu_feedback_page', plugins_url('wp-feedback-survey-manager/static/admin/images/feedback_18.png'), 28); 
	}

	function custom_menu_feedback_page(){
		include('show_send_feedback_page.php');
	}
?>