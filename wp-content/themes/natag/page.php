<?php
/**
 *
 * @package WordPress
 * @subpackage natag
 */

get_header(); ?>

		<div id="primaryinn">
		<div id="leftsilde">
		<!--<div class="cat">
		<h3>Upcoming Events</h3>
		</div>-->
		<?php //include("catmenu.php"); ?>
		 <!--Start Event widget-->
		 <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							query_posts("cat=8&post_type=post&paged=$paged&showposts=5");	?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		      
		        <?php endwhile; endif;   ?>	 
				<?php dynamic_sidebar('Natag Upcoming Events'); ?>
	         <!--End Event widget-->
		
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
  
                              <?php /* Page Image */
							  $headimg = get_post_meta($post->ID, 'pageimageurl', true); ?>
<?php if (!empty($headimg)){ ?> <img src="<?php echo $headimg; ?>" height="143" width="629" /> <?php } ?>    
							
					      	<?php /* Page Content */  the_content(); ?>				
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
					      <!--  ARTICLE BOX STARTS  -->
                    	<div class="article_box">
                        	<h4>Recent Post</h4>
                            <ul>
							
							<?php 
							//$cat= "Featured Articles";
							$cat_id = get_cat_id($cat);
							//$qry = query_posts("showposts=4&cat=".$cat_id); 
							$qry = query_posts("showposts=4&cat=-1,-4"); 							
							
							$i=1;
							?>
							<?php if(have_posts()):while(have_posts()):the_post(); ?>
                            	<li class="<?php if($i%4==0){ ?>nopad<?php }else{ ?><?php } ?>">
                                	<div class="article">
									  <?php if(function_exists('has_post_thumbnail') && has_post_thumbnail()){ ?>

										<a href="<?php the_permalink(); ?>">
										 <?php
										 the_post_thumbnail( array (142,142) ); ?>
										 </a>
										 
									<?php } ?>
	<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                      
                                    </div>
                                </li>
							<?php endwhile; endif; wp_reset_query(); ?>	                                
                            </ul>
                            <div class="clear"></div>
                        </div>
                    <!--  ARTICLE BOX ENDS  -->	
						
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>