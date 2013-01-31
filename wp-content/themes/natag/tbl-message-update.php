<?php
ob_start();
/**
 * Template Name:Update Message
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
extract($_POST);
if($action == 'update')
{	
	update_option( 'admin_request_from_farmer', $admin_request_from_farmer );
	update_option( 'farmer_admin_quote', $farmer_admin_quote );
	update_option( 'admin_register_farmer', $admin_register_farmer );
	update_option( 'farmer_admin_active', $farmer_admin_active );
	update_option( 'admin_farmer_generate_purchase_order', $admin_farmer_generate_purchase_order );
	update_option( 'farmer_complete_order', $farmer_complete_order );
	
	$url = get_option('siteurl');
	header("Location:".$url."/?page_id=549");
}
$admin_request_from_farmer = get_option('admin_request_from_farmer');
$farmer_admin_quote = get_option('farmer_admin_quote');
$admin_register_farmer = get_option('admin_register_farmer');
$farmer_admin_active = get_option('farmer_admin_active');
$admin_farmer_generate_purchase_order = get_option('admin_farmer_generate_purchase_order');
$farmer_complete_order = get_option('farmer_complete_order');
?>
<link href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" type="text/css" rel="stylesheet"/>
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
                        	Newsletter for Request of Estimation
                        </td>
                    </tr>
                    <tr>
                    	<td style="padding: 5px;">
                        	<form name="email_templates_form" id="email_templates_form" method="post" action="">
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Administrator Mail Templates</a></li>
                                    <li><a href="#tabs-2">User Mail Templates</a></li>
                                </ul>
                                <div id="tabs-1">
	                                <div>
                                        <p>
                                            Email template for request for estimation.
                                        </p>
                                        <p>
                                            <textarea name="admin_request_from_farmer" id="admin_request_from_farmer" style="width: 100%;"><?php echo $admin_request_from_farmer; ?></textarea>
                                        </p>
                                        <p>
                                        	Email template for new user registration.
                                        </p>
                                        <p>
                                            <textarea name="admin_register_farmer" id="admin_register_farmer" style="width: 100%;"><?php echo $admin_register_farmer; ?></textarea>
                                        </p>
                                        <p>
                                        	Email template on generating purchase order.
                                        </p>
                                        <p>
                                            <textarea name="admin_farmer_generate_purchase_order" id="admin_farmer_generate_purchase_order" style="width: 100%;"><?php echo $admin_farmer_generate_purchase_order; ?></textarea>
                                        </p>
                                    </div>
                                </div>
                                <div id="tabs-2">
    	                            <div>
                                    	<p>
                                        	Email template when after quote is ready.
                                        </p>
                                        <p>
                                            <textarea name="farmer_admin_quote" id="farmer_admin_quote" style="width: 100%;"><?php echo $farmer_admin_quote; ?></textarea>
                                        </p>
                                        <p>
                                        	Email template on user activation.
                                        </p>
                                        <p>
                                            <textarea name="farmer_admin_active" id="farmer_admin_active" style="width: 100%;"><?php echo $farmer_admin_active; ?></textarea>
                                        </p>
                                        <p>
                                        	Email template on completing purchase order.
                                        </p>
                                        <p>
                                            <textarea name="farmer_complete_order" id="farmer_complete_order" style="width: 100%;"><?php echo $farmer_complete_order; ?></textarea>
                                        </p>
                                    </div>
                                </div>
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
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script type="text/javascript">
	$("#tabs").tabs();
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas"
	});
</script>
<?php get_footer(); ?>