<?php
/**
 * 
 * @package WordPress
 * @subpackage natag
 */
/*Template Name:Testimonial*/
get_header(); 
global $wpdb;
?>
<!-- natag testimonical--> 
		<div id="primaryinn">
		<div id="leftsilde">
		<?php //include("catmenu.php"); ?>
		<?php //dynamic_sidebar('Inner Page Sidebar'); ?>
		 <!--Start Event widget-->
		 <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							query_posts("cat=8&post_type=post&paged=$paged&showposts=5");	?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		      
		        <?php endwhile; endif;   ?>	 
				<?php dynamic_sidebar('Natag Upcoming Events'); ?>
	         <!--End Event widget-->
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
			<div class="article_box">
                        	<h3>Testimonials</h3>
							 <!-- get the tetimonial title, content, image-->
							<?php 
							 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							query_posts("cat=7&post_type=Testimonials&paged=$paged&showposts=5");						
							?>
							<?php if(have_posts()):while(have_posts()):the_post(); ?>
                                	<div class="article" style="border-bottom:1px dotted #ACACAC; padding-top:10px;">
									<div style="float:left;width:175px;height:auto;">
									 <h5><a href="#"><?php the_title(); ?></a></h5>
									<!-- <h5><a><?php the_title(); ?></a></h5>-->
									<?php 
									$postid = get_the_ID();
									$testimage=get_post_meta($postid, 'testimage', true); 
									if ($testimage) 
									{ 
									?>
                                   <img src="<?php echo $testimage; ?>" width="142" height="142" /><br/>
									<?php 
									} 
									else 
									{
									?>
									<?php if(function_exists('has_post_thumbnail') && has_post_thumbnail()){ ?>
									<?php
                                    the_post_thumbnail( array (142,142) ); ?>
									<?php 
									}
                                    else
									{ 
									?>
                           <!-- <img src="<?php bloginfo('template_directory') ?>/images/logo.png" width="142" height="142" />-->
									<?php 
									}
									}
									 ?>
									 </div>
										<div style="float:left;width:475px;">
                                      <div style="float:left;width:475px;"><?php the_content(); ?></div>
									  <div>
									  <div style="margin:0 0 0 0; text-align:right;">	
										<?php $postid = get_the_ID();
													$testiname=get_post_meta($postid, 'testiname', true); 
												if ($testiname) : ?>
													<?php echo $testiname; ?><br/>
										  <?php endif; ?>
										<?php $testiaddress=get_post_meta($postid, 'testiaddress', true); 
												if ($testiaddress) : ?>
										<?php echo $testiaddress; ?><br/>
										  <?php endif; ?>
										<?php $siteuri=get_post_meta($postid, 'siteurl', true); 
												if ($siteuri) : ?>
												<a href="<?php echo $siteuri; ?>" target="_blank" ><?php echo $siteuri; ?></a>
										  <?php endif; ?>
										  </div>
										<!-- <a href="<?php the_permalink(); ?>"><div class="More_button" style="float:right;"></div>  </a>-->
										  <div class="clr"></div>
									  </div>
									  </div>
									  <div class="clr"></div>
                                    </div>
									<!-- end the tetimonial title, content, image-->
                                <!-- get the Custom field -->
								<!-- end the Custom field -->
							<?php endwhile; endif;  ?>	 
                            <div class="clear"></div>
                        </div>
							<div style="height:30px;">                               
                              <?php posts_nav_link('<span></span>','<span style="float:left;margin-left:30px;"><< Previous Page</span>','<span style="float:right;margin-right:30px;">Next Page >></span>'); ?>
							  </div>
					<div style="clear:both;"></div>
							<?php wp_reset_query();?>
						<div>	<?php //echo do_shortcode('[gravityform id=2 name=Testimonials title=false description=false ajax=true]'); ?> </div>
			</div><!-- #content -->
			<div class="clr"></div>
<!- test queries-->
<?php
	#$q=$wpdb->get_results('SELECT * FROM wp_posts Where post_type=products');
	/*$CustomerInfo = $wpdb->get_results("SELECT * FROM wp_posts Where post_type=products");
	foreach ($CustomerInfo as $cusinfo)
	{
		$customer_name=$cusinfo->post_title;
		echo $customer_name;
	}
	$i=0;
	while(array_count_values($CustomerInfo)>i)
	{
		$q1=$wpdb->get_results('SELECT ID FROM wp_posts Where post_title=$CustomerInfo[i]');    
		echo $CustomerInfo[i];
		$j=0;
		while(array_count_values($q1)>j)
		{
			$submenu=$wpdb->get_results('SELECT meta_value FROM wpdb->wp_postmeta Where post_id=$q1[j]');
			$j++;
		}
		$i++;
	}*/
?>
<!- test queries-->
		</div><!-- #primary -->
<?php get_footer(); ?>