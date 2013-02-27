<?php
/**
 * Template Name:Home
 * @package WordPress
 * @subpackage natag
 */

global $wpdb;
?>

<?php get_header(); ?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://23.23.144.161/natag/wp-content/themes/natag/js/jquery.flexslider.js"></script>
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>-->

<center>
	<section>	
		<div id="container">		
			<div class="inner_container">	
                <div id="content">
                    <div class="ss2_wrapper">
                        <?php if (function_exists('slideshow')) { slideshow($output = true, $post_id = false, $gallery_id = false, $params = array()); } ?>
                        <!--<?include (ABSPATH . '/wp-content/plugins/coin-slider-4-wp/coinslider.php'); ?> -->
                    </div>
                    <div class="shadow"></div>
                    <div style="clear:both;"></div>
                        <?php
                        //$cat= "Featured Articles";
                        $cat_id = 6;
                        //$qry = query_posts("showposts=1&cat=".$cat_id);
                        $qry = query_posts("showposts=1&cat=".$cat_id."&order=DESC");
                        //$qry = query_posts("showposts=1&cat=-1");
                        ?>
					<?php if(have_posts()):while(have_posts()):the_post(); ?>
                    <div id="main_content">
                        <div class="client_photo">
                         <?php if(function_exists('has_post_thumbnail') && has_post_thumbnail()){ ?>

                            <a href="<?php the_permalink(); ?>">
                             <?php
                             the_post_thumbnail( array (268,268) ); ?>
                             </a>
                             
                        <?php } ?>
                        </div>
                        <div style="padding-left:20px; float:left; width:700px;">
                            <div style="width:100%;">
                                <div class="client_heading"> 
                                    <h1>Welcome to National Ag </h1>
                                </div>
                                <div class="client_inner_heading">
                                     <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                </div>
                                <div style="width:100%;float:left;padding-top:20px;">
                                    <b><?php the_content(); ?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
					<?php endwhile; endif; wp_reset_query(); ?>	                                
                    <div id="main_content">
                        <div class="left_content">
                            <?php 
                            $myabout = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE ID = 29"); 
                            $thumb_id = get_post_meta($myabout->ID,'_thumbnail_id',true);
                            $myaboutthumb = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE ID = ".$thumb_id.""); 
                            ?>
                            <div class="photo1">
                                <img src="<?php echo $myaboutthumb->guid; ?>" />
                            </div>
                            <div class="main_content_heading">
                                <h3><?php echo $myabout->post_title;?></h3>
                            </div>
                            <div class="main_content_para">
                                <p align="justify"><?php echo $myabout->post_excerpt;?></p>
                            	<a href="<?php bloginfo('url')?>/?page_id=29"><div class="More_button"></div></a>
                            </div>
                        </div>
                        
                        <div class="right_content">
                            <?php 
                            $myabout = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE ID = 8"); 
                            $thumb_id = get_post_meta($myabout->ID,'_thumbnail_id',true);
                            $myaboutthumb = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE ID = ".$thumb_id.""); 
                            ?>
                            <div class="photo2">
                                <img src="<?php echo $myaboutthumb->guid; ?>" />
                            </div>
                            <div class="main_content_heading">
                                <h3><?php echo $myabout->post_title;?></h3>
                            </div>
                            <div class="main_content_para">
                                <p align="justify"><?php echo $myabout->post_excerpt;?> </p>
                           		<a href="<?php bloginfo('url')?>/?page_id=8"><div class="More_button"></div></a>
                            </div>
                        </div>											
                    </div>
                    <div style="clear:both;"></div>
                    <div style="border:1px solid #d7d7d7;margin-top:20px;"></div>
                    <div style="clear:both;"></div>
                    <div id="bottom_content">	
                        <div class="bottom_content_1">	
                        <?php
                        $myabout = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE ID = 157");
                        ?>
                            <div class="bottom_heading">
                                <h3><?php echo $myabout->post_title;?></h3>
                            </div>
                            <div class="main_content_para">
                                <p align="justify"><?php echo $myabout->post_excerpt;?></p>
                            </div>
                            <div style="clear:both;"></div>
                            <a href="<?php bloginfo('url')?>/?page_id=157"><div class="More_button margintop"></div></a>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="bottom_content_2">	
                        <?php
                        $myabout = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE ID = 159");
                        ?>
                            <div class="bottom_heading">
                                <h3><?php echo $myabout->post_title;?></h3>
                            </div>
                            <div class="main_content_para agri">
                                <p align="justify"><?php echo $myabout->post_excerpt;?></p>
                            </div>
                            <div style="clear:both;"></div>
                            <a href="<?php bloginfo('url')?>/?page_id=159"><div class="More_button"></div></a>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="bottom_content_3">	
                            <style type="text/css">
                                .testimonialimg > img,.testimonialimg img, .testimonialimg .wp-post-image{margin-top:0px;float:left;width:75px;height:75px;border:3px solid #C2B7B7;margin-right:10px;}/* Added for testimonial image */
                            </style>
                        <?php dynamic_sidebar( 'Testimonials' ); ?>
                            <div style="clear:both;"></div>
                            <a href="<?php bloginfo('url')?>/?page_id=175"><div class="More_button"></div></a>
                            <div style="clear:both;"></div>
                        </div>	
                    </div>
                </div>
			</div>
		</div>
	</section>	
</center>

<?php get_footer(); ?>