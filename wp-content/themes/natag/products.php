<?php
/**
 * Template Name: Products Template
 * @package WordPress
 * @subpackage natag
 */

get_header(); ?>
<style rel="stylesheet">
.eshop fieldset, .eshop fieldset legend, ul.eshoppanels > li, .eshop th
{
	background-color: #ffffff;
	padding-top: 20px;
	list-style: none;
}

ul.eshoppanels > li span
{
	color: #157bc3;
	font-size: 18px;
}
ul.eshoppanels > li {
	width:200px;
	height:200px;	
}
table.eshop img,
ul.eshop li a img,
ul.eshoppanels li,
.paginate ul li {
	float:left;
	clear:none;
}
.eshopform fieldset.eshoppayvia li {
	float:left;
}
.eshop * {
	color:#606060;
}
table.eshop th,
table.eshop td,
.eshop legend {
	border:1px solid #ccc;
}
.eshopform .eshopshiprates {
	background:#fff;
}
ul.eshoppanels > li {
	border:1px solid #e7e7e7;
}
.eshop legend {
	border:1px solid #eee;
}
.eshop fieldset,
.eshop fieldset legend,
ul.eshoppanels > li,
.eshop th {
	background:#eee;
}

ul.eshoppanels > li {
	border-radius:10px;
	-moz-box-shadow:2px 2px 2px rgba(0,0,0,0.2);
	-webkit-box-shadow:2px 2px 2px rgba(0,0,0,0.2);
	-box-shadow:2px 2px 2px rgba(0,0,0,0.2);
}

.eshop li,
ul.eshopfeatured li,
ul.eshopfeatured li,
ul.eshopsubpages li,
ul.eshopcats li,
ul.eshoprandomlist li,
ul.eshopshowproduct li,
ul.eshoppanels li,
.eshop fieldset.eshoppayvia li,
.pagfoot ul li,
ul.continue-proceed li {
	list-style-type:none;
	list-style-image:none;
}

/* LAYOUT */
.eshop .eshopbutton {
	width:auto;
	padding:0 3px;
	margin-right:10px;
}

</style>
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
  
                              <?php /* Page Image */
							  $headimg = get_post_meta($post->ID, 'pageimageurl', true); ?>
<?php if (!empty($headimg)){ ?> <img src="<?php echo $headimg; ?>" height="143" width="629" /> <?php } ?>    
							
					      	<?php /* Page Content */  //the_content(); ?>				
							
							<div style="width:85%;min-height:300px;border:1px solid #f00;margin:0 auto;">
								
								<ul class="eshop eshoppanels"  >

								  <li class="eshop-product-1696"  ><a  href="http://www.jjsoftwear.com/casual-wear7/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/casualwear7-200x300.png" class="attachment-175x175 wp-post-image" alt="casualwear7" title="casualwear7" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear7/" ><span></span></a></li>
								  
								  <li class="eshop-product-1693"  ><a  href="http://www.jjsoftwear.com/casual-wear6/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/c4-200x300.png" class="attachment-175x175 wp-post-image" alt="Casual Wear6" title="Casual Wear6" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear6/" ><span></span></a></li>

								  <li class="eshop-product-1690"  ><a  href="http://www.jjsoftwear.com/casual-wear5/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/c5-200x300.png" class="attachment-175x175 wp-post-image" alt="Casual Wear5" title="Casual Wear5" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear5/" ><span></span></a></li>

								  <li class="eshop-product-1687"  ><a  href="http://www.jjsoftwear.com/casual-wear4/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/c6-200x300.png" class="attachment-175x175 wp-post-image" alt="Casual Wear4" title="Casual Wear4" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear4/" ><span></span></a></li>
								  
								  <li class="eshop-product-1683"  ><a  href="http://www.jjsoftwear.com/casual-wear3/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/c7-200x300.png" class="attachment-175x175 wp-post-image" alt="Casual Wear3" title="Casual Wear3" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear3/" ><span></span></a></li>
								  
								  <li class="eshop-product-1679"  ><a  href="http://www.jjsoftwear.com/casual-wear2/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/27-200x300.png" class="attachment-175x175 wp-post-image" alt="Casual Wear2" title="Casual Wear2" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear2/" ><span></span></a></li>
								  
								  <li class="eshop-product-1675"  ><a  href="http://www.jjsoftwear.com/casual-wear1/" border=0 ><img width="116" height="175" src="http://www.jjsoftwear.com/wp-content/uploads/2011/11/115-200x300.png" class="attachment-175x175 wp-post-image" alt="Casual Wear1" title="Casual Wear1" border="0" /></a><a href="http://www.jjsoftwear.com/casual-wear1/" ><span></span></a></li>
																  
																 
							  </ul>								
								
								
								
							</div>
							
							
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