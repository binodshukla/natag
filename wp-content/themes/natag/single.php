<?php
/**
 * The Template for displaying all single posts.
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
		 <?php  //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							//query_posts("cat=8&post_type=post&paged=$paged&showposts=5");	?>
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
			<?php if (!in_category(9)) { ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'single' ); ?>
					<!-- command the reply on newsletter -->
					<?php  comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
        		<?php } else { ?>	
              <?php while ( have_posts() ) : the_post(); ?>
			  <h3><?php	  the_title();	  ?></h3>
			  <?php the_content(); ?>		
			  <?php endwhile; // end of the loop. ?>
                <?php } ?>					
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->
<!-- #main -->
<?php get_footer(); ?>