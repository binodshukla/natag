<?php
ob_start();
/**
 *
 * @package WordPress
 * @subpackage natag
 * Template Name:Former Portal
 */

get_header();
  wp_get_current_user();
  get_currentuserinfo() ;
  global $user_level; 

	$feedback_query = "select * from ".$wpdb->prefix."send_feedback where user_id = ".$current_user->ID;
	$feedback_data = $wpdb->get_results($feedback_query);
?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

		<div id="primaryinn">
		<div id="leftsilde">
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
		<?php //include("catmenu.php"); ?>
		<?php //dynamic_sidebar('Inner Page Sidebar'); ?>
		
		<?php //wp_list_categories('hierarchical' => true,); ?>
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
			
			
<?php
$user_id = get_current_user_id();
$email_not = get_user_meta($user_id, "email_not", true);
$sms_not = get_user_meta($user_id, "sms_not", true);
$no_not = get_user_meta($user_id, "no_not", true);
if($_POST['submit'] == "Save"):

	if($email_not == '' && $no_not == '')
	{
		add_user_meta( $user_id, 'email_not', $_POST['not_email']);
		add_user_meta( $user_id, 'no_not', $_POST['not_no']);
	}
	else
	{
		if($_POST['not_no'] == '')
		{
			update_user_meta($user_id, 'email_not', $_POST['not_email']);
			update_user_meta($user_id, 'no_not', $_POST['not_no']);
		}
		else
		{
			update_user_meta($user_id, 'email_not', '');
			update_user_meta($user_id, 'no_not', $_POST['not_no']);
		}
	}

header("location:".get_option('siteurl')."/?page_id=118");
endif;

?>		
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					        
							<h3><?php /* Page Title */
   							   $headtxt = get_post_meta($post->ID, 'custometitle', true); ?>
                               <?php if (!empty($headtxt)){echo $headtxt;}else { the_title();} ?></h3>
  
                           <!-- <div id="adtopbar">
								<!--<?php if ( is_user_logged_in() ) {?>
								  <div class="editProfile"><a href="#" class="usernameheader"> <?php echo $current_user->display_name; ?></a><a href="<?php bloginfo('url');?>/?page_id=122/" target="_blank">Edit Profile</a></div><div class="pipe">|</div><div id="logout"><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">Logout</a></div>
								  <div class="clr"></div>
							  <?php } ?>
		                   </div>-->
                               <?php if ( is_user_logged_in() ) {
								if($user_level == 10) {   
							   ?>
                                <ul class="gallery clearfix">
                                    <li><a href="#inline_demo2" rel="prettyPhoto[inline]">All Request for Price</a></li>
                                    <li><a href="<?php echo get_option('siteurl')?>/?page_id=544">All List of Orders</a></li>
                                    <li><a href="<?php echo get_option('siteurl')?>/?page_id=549">Update Notification Messages</a></li>
                                </ul>
                                <div id="inline_demo2" style="display:none;">
                                	<p>All Request for Price:</p>
                                    <p>
								<?php
											$num_equip = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_status='sent' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$num_equip++;	
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=379">Equipment </a>
                                        &nbsp;(<?php echo $num_equip?>&nbsp;Pending)<br />
								<?php
											$num_fert = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_status='sent' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$num_fert++;	
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=381">Fertilizers/Chemical</a>
                                        &nbsp;(<?php echo $num_fert?>&nbsp;Pending)<br />
<!--								<?php
											$num_chem = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='chemical' and wp_posts.post_status='sent' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$num_chem++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=383">Chemical</a>
                                        &nbsp;(<?php echo $num_chem?>&nbsp;Pending)<br />
-->								<?php
											$num_parts = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='parts' and wp_posts.post_status='sent' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$num_parts++;	
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=385">Parts</a>
                                        &nbsp;(<?php echo $num_parts?>&nbsp;Pending)<br />
								<?php
											$num_supp = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_status='sent' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$num_supp++;	
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=387">Supplies</a>
                                        &nbsp;(<?php echo $num_supp?>&nbsp;Pending)<br />
								<?php
											$num_tyre = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='tire' and wp_posts.post_status='sent' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$num_tyre++;	
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=389">Tires</a>
                                        &nbsp;(<?php echo $num_tyre?>&nbsp;Pending)
                                    </p>
                                </div>
                               <?php
								}
								else
								{
							   ?>
                                <ul class="gallery clearfix">
                                    <li><a href="#inline_demo" rel="prettyPhoto[inline]">Request for Price</a></li>
                                    <li><a href="#inline_demo2" rel="prettyPhoto[inline]">List of Requests</a></li>
                                    <li><a href="<?php echo get_option('siteurl')?>/?page_id=544">List of Orders</a></li>
                                    <li><a href="#inline_demo3" rel="prettyPhoto[inline]">Notification Settings</a></li>
                                </ul>
                                <div id="inline_demo" style="display:none;">
                                    <p>Request for Estimate:</p>
                                    <p>
                                        <a class="menuitem" href="<?php echo get_option('siteurl');?>/?page_id=354">Equipment</a><br />
                                        <a class="menuitem" href="<?php echo get_option('siteurl');?>/?page_id=356">Fertilizers/Chemical</a><br />
                                        <a class="menuitem" href="<?php echo get_option('siteurl');?>/?page_id=358">Parts</a><br />
                                        <a class="menuitem" href="<?php echo get_option('siteurl');?>/?page_id=360">Supplies</a><br />
                                        <a class="menuitem" href="<?php echo get_option('siteurl');?>/?page_id=362">Tires</a>        
                                    </p>
                                </div>
                                <div id="inline_demo2" style="display:none;">
                                	<p>All Request:</p>
                                    <p>
								<?php
											$numdraft_equip = 0;
											$numsent_equip = 0;
											$numpublish_equip = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_status='publish' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numpublish_equip++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_status='draft' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numdraft_equip++;
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_status='sent' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numsent_equip++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=455&type=equipment">Equipment </a>
                                        &nbsp;(<?php echo $numdraft_equip?>&nbsp;Draft/<?php echo $numsent_equip?>&nbsp;Sent/<?php echo $numpublish_equip?>&nbsp;Quote Ready)<br />
								<?php
											$numsent_fert = 0;
											$numdraft_fert = 0;
											$numpublish_fert = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_status='publish' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numpublish_fert++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_status='draft' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numdraft_fert++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_status='sent' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numsent_fert++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=455&type=fertilizer">Fertilizers/Chemical</a>
                                        &nbsp;(<?php echo $numdraft_fert?>&nbsp;Draft/<?php echo $numsent_fert?>Sent/<?php echo $numpublish_fert?>&nbsp;Quote Ready)<br />
								<?php
											$numdraft_chem = 0;
											$numsent_chem = 0;
											$numpublish_chem = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='chemical' and wp_posts.post_status='publish' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numpublish_chem++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='chemical' and wp_posts.post_status='draft' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numdraft_chem++;
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='chemical' and wp_posts.post_status='sent' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numsent_chem++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=455&type=chemical">Chemical</a>
                                        &nbsp;(<?php echo $numdraft_chem?>&nbsp;Draft/<?php echo $numsent_chem?>Sent/<?php echo $numpublish_chem?>&nbsp;Quote Ready)<br />
								<?php
											$numdraft_parts = 0;
											$numsent_parts = 0;
											$numpublish_parts = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='parts' and wp_posts.post_status='publish' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numpublish_parts++;
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='parts' and wp_posts.post_status='draft' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numdraft_parts++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='parts' and wp_posts.post_status='sent' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numsent_parts++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=455&type=parts">Parts</a>
                                        &nbsp;(<?php echo $numdraft_parts?>&nbsp;Draft/<?php echo $numsent_parts?>Sent/<?php echo $numpublish_parts?>&nbsp;Quote Ready)<br />
								<?php
											$numdraft_supp = 0;
											$numsent_supp = 0;
											$numpublish_supp = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_status='publish' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numpublish_supp++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_status='draft' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numdraft_supp++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_status='sent' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numsent_supp++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=455&type=supplies">Supplies</a>
                                        &nbsp;(<?php echo $numdraft_supp?>&nbsp;Draft/<?php echo $numsent_supp?>Sent/<?php echo $numpublish_supp?>&nbsp;Quote Ready)<br />
								<?php
											$numdraft_tyre = 0;
											$numsent_tyre = 0;
											$numpublish_tyre = 0;
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='tire' and wp_posts.post_status='publish' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numpublish_tyre++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='tire' and wp_posts.post_status='draft' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
                                                $id=$myterms->ID;
												$numdraft_tyre++;	
											}
                                            $myrows = $wpdb->get_results( "SELECT wp_posts.ID from wp_posts where wp_posts.post_type='tire' and wp_posts.post_status='sent' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
                                            foreach ( $myrows as $myterms ) 
                                            {
												$id=$myterms->ID;
												$numsent_tyre++;
											}
								?>
                                    	<a href="<?php echo get_option('siteurl');?>/?page_id=455&type=tire">Tires</a>
                                        &nbsp;(<?php echo $numdraft_tyre?>&nbsp;Draft/<?php echo $numsent_tyre?>Sent/<?php echo $numpublish_tyre?>&nbsp;Quote Ready)
                                    </p>
                                </div>
                                <div id="inline_demo3" style="display:none;">
                                    <p>Chosse your Notification Type:</p>
                                    <p>
                                    	<form name="not_type" action="<?php echo get_option('siteurl');?>/?page_id=118" method="post">
                                        <?php
                                        if($email_not != '')
										{
										?>	
                                        	<input type="checkbox" name="not_email" checked="checked" value="Email" />By Emails
                                        <?php
										}
										else
										{
										?>
                                        	<input type="checkbox" name="not_email"  value="Email" />By Emails
                                        <?php	
										}
                                        if($no_not != '')
										{
										?>
                                        	<input type="checkbox" checked="checked" name="not_no" value="Donot want" />Do not want Notifications
										<?php
										}
										else
										{
										?>
                                        	<input type="checkbox" name="not_no" value="Donot want" />Do not want Notifications
                                         <?php
										}
										 ?>   
                                            <input type="submit" name="submit" value="Save" />
                                        </form>
                                    </p>
                                </div>
                                 <?php } } ?>
							<div class="editprofilecn">
					      	<?php /* Page Content */  the_content(); ?>	
							</div>							
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
					   
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
						
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>