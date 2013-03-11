<?php
/**
 * 
 * @package WordPress
 * @subpackage natag
 */
/*Template Name:Newsletter*/
get_header(); ?>

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
				<?php //dynamic_sidebar('Natag Upcoming Events'); ?>
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
                        	<h4>Newsletter</h4>
                            
							 <!-- get the tetimonial title, content, image-->
							<?php 
							//$cat= "Featured Articles";
							//$cat_id = get_cat_id($cat);
							//$qry = query_posts("showposts=4&cat=".$cat_id); 
							 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							 query_posts("cat=9&post_type=post&paged=$paged&showposts=5");						
														
							?>
							<?php if(have_posts()):while(have_posts()):the_post(); ?>
                           
                                	<div class="article" style="border-bottom:1px dotted #ACACAC; padding-top:10px;">
									<div style="float:left;width:175px;height:175px;">
									
									  <?php if(function_exists('has_post_thumbnail') && has_post_thumbnail()){ ?>

										 
									<?php
										 the_post_thumbnail( array (142,142) ); ?>
									<?php }
									
									else{ ?>
									
									<img  style="color:#ADA48D" src="<?php bloginfo('template_directory') ?>/images/logo.png" width="142" height="142" />
									  
									<?php }
									
									 ?>
									 </div>
	
									<div style="float:left;width:475px;height:200px;">
									<div class="newsletterleft"><div class="newstitle"><h5><a><?php the_title(); ?></a></h5> </div>
									<?php $postid = get_the_ID();
													$newspdf=get_post_meta($postid, 'NewsletterPDF', true); 
												if ($newspdf) : ?>
													<div class="newspdf"><a href="<?php echo $newspdf; ?>" target="_blank" ><img src="<?php bloginfo('template_directory');?>/images/pdf.png" height="30"/></a></div>
										  <?php endif; ?>
									<div class="clr"></div>
									</div><div class="newsletterright"><?php the_time('M jS, Y') ?></div>
									<div class="clr"></div>
                                      <div><?php the_content_limit(300, ""); ?></div>
									  
									  <div >
																		  
										<a href="<?php the_permalink(); ?>"><div class="More_button" style="float:right;"></div>  </a>
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
           </div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>