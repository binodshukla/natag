<?php
ob_start();
/**
 *
 * @package WordPress
 * @subpackage natag
 * Template Name: Save Notification
 */

get_header();
  wp_get_current_user();
  get_currentuserinfo() ;
  global $user_level; ?>
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
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<!--<h3><?php /* Page Title */
   							   $headtxt = get_post_meta($post->ID, 'custometitle', true); ?>
                               <?php if (!empty($headtxt)){echo $headtxt;}else { the_title();} ?></h3>-->
  
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
                                    <li>Your quote has been submitted</li>
                                    <li><a href="<?php bloginfo('url');?>/?page_id=140">Click Here</a> to proceed to your Dashboard</li>
                                </ul>
                               <?php
								}
								else
								{
							   ?>
                                <ul class="gallery clearfix">
                                    <li>Your request for estimate has been saved</li>
                                    <li><a href="<?php bloginfo('url');?>/?page_id=140">Click Here</a> to proceed to your Dashboard</li>
                                </ul>
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