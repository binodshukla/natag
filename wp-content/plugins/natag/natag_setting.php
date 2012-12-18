<?php
ob_start();
    /* 
    Plugin Name: Add Menus 
    Plugin URI: 
    Description: Add Menus in Admin
    Author: Vikrant Randhawa 
    Version: 1.0 
    Author URI: http://www.zyrro.com
    */  


add_action('admin_menu', 'add_custom_menu_page');

function add_custom_menu_page() {
	add_menu_page('Equipments', 'Equipments', 'add_users', 'equipments', 'custom_menu_page', plugins_url('myplugin/images/icon.png'), 6); 
	add_menu_page('Fertilizers', 'Fertilizers', 'add_users', 'fertilizers', 'custom_menu_page_fertilizers', plugins_url('myplugin/images/icon.png'), 7); 
	add_menu_page('Chemicals', 'Chemicals', 'add_users', 'chemicals', 'custom_menu_page_chemicals', plugins_url('myplugin/images/icon.png'), 8); 
	add_menu_page('Parts', 'Parts', 'add_users', 'parts', 'custom_menu_page_parts', plugins_url('myplugin/images/icon.png'), 9); 
	add_menu_page('Supplies', 'Supplies', 'add_users', 'supplies', 'custom_menu_page_supplies', plugins_url('myplugin/images/icon.png'), 10); 
	add_menu_page('Tyre', 'Tyre', 'add_users', 'tyre', 'custom_menu_page_tyre', plugins_url('myplugin/images/icon.png'), 10); 
}

function custom_menu_page(){
    include('show_post_admin.php');
}
function custom_menu_page_fertilizers(){
    //include('show_post_admin.php');
	 include('show_fertilizer_admin.php');
}
function custom_menu_page_chemicals(){
    //include('show_post_admin.php');
	 include('show_chemical_admin.php');
}
function custom_menu_page_parts(){
    //include('show_post_admin.php');
	 include('show_parts_admin.php');
}
function custom_menu_page_supplies(){
    //include('show_post_admin.php');
	 include('show_supplies_admin.php');
}
function custom_menu_page_tyre(){
    //include('show_post_admin.php');
	 include('show_tyre_admin.php');
}
?>