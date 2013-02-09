<?php
ob_start();
//phpinfo();
//die();
/**
 * Template Name:Update Message
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
global $wpdb;
extract($_POST);
if($action == 'update')
{	
	if($email == 'request for estimation'):	
	update_option('admin_request_from_farmer', stripslashes($admin_request_from_farmer));
	elseif($email=='new user registration'):
	update_option('admin_register_farmer', stripslashes($admin_register_farmer));
	elseif($email=='generating purchase order'):
	update_option('admin_farmer_generate_purchase_order', stripslashes($admin_farmer_generate_purchase_order));
	elseif($email=='quote is ready'):
	update_option( 'farmer_admin_quote', stripslashes($farmer_admin_quote) );
	elseif($email=='user activation'):
	update_option( 'farmer_admin_active', stripslashes($farmer_admin_active) );
	elseif($email=='completing purchase order'):
	update_option( 'farmer_complete_order', stripslashes($farmer_complete_order) );
	endif;
	$url = get_option('siteurl');
	header("Location:".$url."/?page_id=549&type=".$email);
}
/*$admin_request_from_farmer = get_option('admin_request_from_farmer');
$farmer_admin_quote = get_option('farmer_admin_quote');
$admin_register_farmer = get_option('admin_register_farmer');
$farmer_admin_active = get_option('farmer_admin_active');
$admin_farmer_generate_purchase_order = get_option('admin_farmer_generate_purchase_order');
$farmer_complete_order = get_option('farmer_complete_order');*/
?>
		<div id="primaryinn">
		<div id="leftsilde">
		<div class="cat">
		<div class="cat">
		<h3>User Info</h3>
		</div>
        <?php if ( is_user_logged_in() ) {?>
        <div class="submenu" contentindex="0c" style="display: block; ">
        <ul>
			<li>
			<a href="#" class="usernameheader"> <?php echo $current_user->display_name; ?></a>
            </li>
            <li>
            <a href="<?php bloginfo('url');?>/?page_id=122/" target="_blank">Edit Profile</a>
            </li>
            <li>
            <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">Logout</a>
            </li>
        </ul>    
        </div>
        <?php }?>
		<div class="leftcontact">
		<h3>Contact Us</h3>
		<img src="<?php bloginfo('template_directory')?>/images/leftcontactimg.jpg" width="206" height="37">
		<p>
		National Ag <br/>
		1578 West 7800 South #203<br/>
		West Jordan, UT 84088

		<div class="leftcontentl">
		Office:<br/>
		Fax:<br/>
        Email:<br/>

		Toll Free:<br/>
		</div>
		<div class="leftcontentr">
		(801) 255-3511<br/>
		(801) 255-7711<br/>
		quinn@natag.net<br/>
		888-448-6501<br/>
		</div>
		<div class="clr"></div>
		         
		</p>
		</div>
		
		</div></div>
			<div id="contentinn" role="main">
            <center>
        		<table width="100%" style="border-right:#999 1px dotted;">
                	<tr>
                    	<td class="notification">
                        	Manage Email Templates
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding: 5px;">
                        	<form name="email_templates_form" id="email_templates_form" method="post" action="">
                            <div>
                            <?php if($_REQUEST['type']=='request for estimation'):?>
                                <p>
                                    Email template for request for estimation.
                                </p>
                                <p>
                                    <?php $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = 'admin_request_from_farmer' LIMIT 1", $option ) ); $value = $row->option_value;?>
                                    <textarea class="ckeditor" name="admin_request_from_farmer" id="admin_request_from_farmer" style="width: 100%;"><?php echo $value; ?></textarea>
                                    <input type="hidden" name="email" value="<?php echo $_REQUEST['type']?>" />
                                </p>
                            <?php elseif($_REQUEST['type']=='new user registration'):?>    
                                <p>
                                    Email template for new user registration.
                                </p>
                                <p>
                                    <?php $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = 'admin_register_farmer' LIMIT 1", $option ) ); $value = $row->option_value;?>
                                    <textarea class="ckeditor" name="admin_register_farmer" id="admin_register_farmer" style="width: 100%;"><?php echo $value; ?></textarea>
                                    <input type="hidden" name="email" value="<?php echo $_REQUEST['type']?>" />
                                </p>
                            <?php elseif($_REQUEST['type']=='generating purchase order'):?>    
                                <p>
                                    Email template on generating purchase order.
                                </p>
                                <p>
                                    <?php $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = 'admin_farmer_generate_purchase_order' LIMIT 1", $option ) ); $value = $row->option_value;?>
                                    <textarea class="ckeditor" name="admin_farmer_generate_purchase_order" id="admin_farmer_generate_purchase_order" style="width: 100%;"><?php echo $value; ?></textarea>
                                    <input type="hidden" name="email" value="<?php echo $_REQUEST['type']?>" />
                                </p>
                            <?php elseif($_REQUEST['type']=='quote is ready'):?>    
                                <p>
                                    Email template when quote is ready.
                                </p>
                                <p>
                                <?php $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = 'farmer_admin_quote' LIMIT 1", $option ) ); $value = $row->option_value;?>
                                    <textarea class="ckeditor" name="farmer_admin_quote" id="farmer_admin_quote" style="width: 100%;"><?php echo $value; ?></textarea>
                                    <input type="hidden" name="email" value="<?php echo $_REQUEST['type']?>" />
                                </p>
                            <?php elseif($_REQUEST['type']=='user activation'):?>    
                                <p>
                                    Email template on user activation.
                                </p>
                                <p>
                                 <?php $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = 'farmer_admin_active' LIMIT 1", $option ) ); $value = $row->option_value;?>
                                    <textarea class="ckeditor" name="farmer_admin_active" id="farmer_admin_active" style="width: 100%;"><?php echo $value; ?></textarea>
                                    <input type="hidden" name="email" value="<?php echo $_REQUEST['type']?>" />
                                </p>
                            <?php elseif($_REQUEST['type']=='completing purchase order'):?>    
                                <p>
                                    Email template on completing purchase order.
                                </p>
                                <p>
                                <?php $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = 'farmer_complete_order' LIMIT 1", $option ) ); $value = $row->option_value;?>
                                    <textarea class="ckeditor" name="farmer_complete_order" id="farmer_complete_order" style="width: 100%;"><?php echo $value; ?></textarea>
                                    <input type="hidden" name="email" value="<?php echo $_REQUEST['type']?>" />
                                </p>
                             <?php endif;?>   
                            </div>
                            <div>
                                <br />
                                <input type="hidden" name="action" value="update" />
                                <input type="submit" name="submit" class="form-button" value="Update"/>
                            </div>
                            </form>
                        </td>
                    </tr>
              </table>
            </center>				
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/ckeditor/ckeditor.js"></script>
<?php get_footer(); ?>