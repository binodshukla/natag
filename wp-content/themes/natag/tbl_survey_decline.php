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
	$decline_query = "update wp_send_feedback set feedback_status = 2 where id = ".$_GET['message_id'];
	$wpdb->query($decline_query);
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
