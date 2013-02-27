<?php
ob_start();
/**
 * Template Name:User Register
 * @package WordPress
 * @subpackage natag
 */

get_header(); 

extract($_POST);
if($submit == 'Register')
{
$url = get_option('siteurl');
$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users WHERE user_email = '".$email_add."'");
if($user_count == 0)
{
	//$pass = md5($_POST['password']);
	$user_id = wp_insert_user( array ('user_login' => $uname, 'user_nicename' => $uname, 'first_name' => $fname, 'last_name' => $lname, 'user_email' => $email_add, 'user_pass' => $password));
	add_user_meta( $user_id, 'user_pass', $password);
	add_user_meta( $user_id, 'user_code', $access_code);
	
	$user_info = get_userdata(1);
	$to = $user_info->user_email;
	$uname = ucfirst($user_info->user_nicename);
	$subject = "New User Registration";
	$message = get_option('admin_register_farmer');
	$message = str_replace('$name',$uname,$message);
	$message = str_replace('$user_id',$user_id,$message);
	$headers = 'From: National AG';
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mail = mail( $to, $subject, $message, $headers);
	
	header("Location:".$url."/?page_id=553");
}
else
{
	header("Location:".$url."/?page_id=729");
}
//[register message="Registration Successful , You will receive registration confirmation soon in your email inbox"  password="yes" notify="info@digitekvision.com"]
}
?>  
<script>
function validate()
{
	var cuname=document.getElementById('cuname').value;
	var cemail=document.getElementById('cemail').value;
	var cemailc=document.getElementById('cemailc').value;
	var cpass=document.getElementById('cpass').value;
	var cpassc=document.getElementById('cpassc').value;
	var ccode=document.getElementById('ccode').value;

	if(cuname=="")
	{
		alert("Please enter User Name");
		document.getElementById('cuname').focus();
		return false;
	}
	else if(cemail=="")
	{
		alert("Please enter Email");
		document.getElementById('cemail').focus();
		return false;
	}
	else if(cemailc=="")
	{
		alert("Please confirm Email");
		document.getElementById('cemailc').focus();
		return false;
	}
	else if(cemail!=cemailc)
	{
		alert("Email and confirm Email donot match");
		document.getElementById('cemailc').focus();
		return false;
	}
	else if(cpass=="")
	{
		alert("Please enter Password");
		document.getElementById('cpass').focus();
		return false;
	}
	else if(cpassc=="")
	{
		alert("Please confirm Password");
		document.getElementById('cpassc').focus();
		return false;
	}
	else if(cpass!=cpassc)
	{
		alert("Password and confirm Password donot match");
		document.getElementById('cpassc').focus();
		return false;
	}
	else if(ccode=="")
	{
		alert("Please enter your Code");
		document.getElementById('ccode').focus();
		return false;
	}
	return true;
}

</script>
  <div id="primaryinn">
		<div id="leftsilde">
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
		
		</div>
			<div id="contentinn" role="main">
					<?php ///if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php /* Page Title */
   							  // $headtxt = get_post_meta($post->ID, 'custometitle', true); ?>
                               <?php //if (!empty($headtxt)){echo $headtxt;}else { the_title();} ?>
					      	<?php /* Page Content */  //the_content(); ?>	
                               <?php
                                //endwhile; endif; ?>
            <center>
        		<table width="100%" style="border-right:#999 1px dotted;">
                	<tr>
                    	<td class="notification">
                        	User Registration
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Please fill out this form to sign up for this site
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<form action="" method="post" id="regForm" name="notification" onSubmit="return validate();">
                        	<table width="100%">
                            	<tr>
                                	<td class="equip-note"><label for="cuname">Your Username</label> <span style="color:#F00">*</span></td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="text" name="uname" id="cuname" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="equip-note">First Name</td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="text" name="fname" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="equip-note">Last Name</td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="text" name="lname" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="notification">Contact Info</td>
                                </tr>
                            	<tr>
                                	<td class="equip-note"><label for="cemail">Email Address</label><span style="color:#F00">*</span></td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="text" id="cemail" name="email_add" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="equip-note"><label for="cemailc">Confirm Email</label><span style="color:#F00">*</span></td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="text" name="email_add2" id="cemailc" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="notification">Choose a Password</td>
                                </tr>
                            	<tr>
                                	<td class="equip-note"><label for="cpass">Password</label><span style="color:#F00">*</span></td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="password" id="cpass" name="password" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="equip-note"><label for="cpassc">Confirm Password</label><span style="color:#F00">*</span></td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="password" name="password2" id="cpassc" value="" size="60">
                                    </td>
                                </tr>
                            	<tr>
                                	<td class="equip-note"><label for="ccode">Enter Client Code</label><span style="color:#F00">*</span></td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="text" name="access_code" id="ccode" value="" size="60">
                                    </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input type="submit" name="submit" value="Register" class="form-button">
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </td>
                    </tr>
                </table>
            </center>				
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>