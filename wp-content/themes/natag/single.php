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
		<div class="cat">
		<h3>Categories</h3>
		</div>
		<?php include("catmenu.php"); ?>
		<?php //dynamic_sidebar('Inner Page Sidebar'); ?>
		
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