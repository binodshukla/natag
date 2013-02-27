<?php
ob_start();
/**
 * Template Name: Decline Survey
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
if($_GET['message_id'])
{	
	$decline_query = "update ".$wpdb->prefix."send_feedback set feedback_status = 2 where id = ".$_GET['message_id'];
	$wpdb->query($decline_query);
	
	// Start Mailing
	$feedback_query = "select * from ".$wpdb->prefix."send_feedback where id = ".$_GET['message_id'];
	$feedback_data = $wpdb->get_results($feedback_query);
	
	$user_id = $feedback_data[0]->user_id;
	$user_info = get_userdata($user_id);
	$admin_info = get_userdata(1);
	$to = $admin_info->user_email;
	$uname = ucfirst($admin_info->display_name);
	$username = ucfirst($user_info->display_name);
	$subject = $username." declined survey";
	$message = get_option('admin_decline_survey');
	$message = str_replace('$name',$uname,$message);
	$message = str_replace('$username',$username,$message);
	$headers = 'From: National AG';
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mail = mail( $to, $subject, $message, $headers);

}
?>
<div id="primaryinn">
<div id="leftsilde">
  <div class="leftcontact" style="margin-top: 0px; padding-top: 0px; border-top: 0px;">
    <h3>Contact Us</h3>
    <img src="<?php bloginfo('template_directory')?>/images/leftcontactimg.jpg" width="206" height="37">
    <p> National Ag <br/>
      1578 West 7800 South #203<br/>
      West Jordan, UT 84088
    <div class="leftcontentl"> Office:<br/>
      Fax:<br/>
      Email:<br/>
      Toll Free:<br/>
    </div>
    <div class="leftcontentr"> (801) 255-3511<br/>
      (801) 255-7711<br/>
      quinn@natag.net<br/>
      888-448-6501<br/>
    </div>
    <div class="clr"></div>
    </p>
  </div>
</div>
<div id="contentinn" role="main">
	<div class="cat">
    <h3><?php the_title(); ?></h3>
  </div>
  	<?php echo $post->post_content; ?>
  </div>
</div>
<?php get_footer(); ?>
