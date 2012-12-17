<?php
/**
 *
 * @package WordPress
 * @subpackage natag
 * Template Name:Former Portal
 */

get_header();
  wp_get_current_user();
 ?>

		<div id="primaryinn">
		<div id="leftsilde">
		<div class="cat">
		<h3>Categories</h3>
		</div>
		<?php include("catmenu.php"); ?>
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
					        
							<h3><?php /* Page Title */
   							   $headtxt = get_post_meta($post->ID, 'custometitle', true); ?>
                               <?php if (!empty($headtxt)){echo $headtxt;}else { the_title();} ?></h3>
  
                            <div id="adtopbar">
								<?php if ( is_user_logged_in() ) {?>
								  <div class="editProfile"><a href="#" class="usernameheader"> <?php echo $current_user->display_name; ?><a href="<?php bloginfo('url')?>/?page_id=122/" target="_blank">Edit Profile</a></div><div class="pipe">|</div><div id="logout"><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">Logout</a></div>
								  <div class="clr"></div>
							  <?php } ?>

		                   </div>
							<div class="editprofilecn">
					      	<?php /* Page Content */  the_content(); ?>	
							</div>							
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
					   
						
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>