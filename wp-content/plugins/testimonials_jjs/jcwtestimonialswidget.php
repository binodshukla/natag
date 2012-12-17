<?php
/*
Plugin Name: JJS Testimonial Widget
Plugin URI: http://www.jehovahjirehsoftwares.com/
Description: This plugin for testimonials widget with fade in and fade out effect through custom post type (Testimonials).We Should create custom post type called 'Testimonials'.
Author: Charles (lap)
Version: 1.0
Author URI: http://www.jehovahjirehsoftwares.com/
*/
 
 
class testimonialwidget extends WP_Widget
{
  function testimonialwidget()
  {
    $widget_ops = array('classname' => 'testimonialwidget', 'description' => 'Display Testimonials' );
    $this->WP_Widget('testimonialwidget', 'JJS Testimonials', $widget_ops);
  }
 
  function form($instance)
  {
  $defaults = array(
			//'title' => __('Testimonials', 'testimonialwidget'),
			'title' => 'Testimonials',
			//'title' => 145,
			'min_height' => 200,
			'char_limit' => 300
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
  
  
  
   
    //$title = $instance['title'];
echo '<p><label for="'.$this->get_field_id( 'title' ).'">'.__('Title', 'testimonialwidget').' </label><input class="widefat" type="text" id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'" value="'.htmlspecialchars($instance['title'], ENT_QUOTES).'" /></p>';
  
  echo '<p><label for="'.$this->get_field_id( 'min_height' ).'">'.__('Minimum Height', 'testimonialwidget').' </label><input class="widefat" type="text" id="'.$this->get_field_id( 'min_height' ).'" name="'.$this->get_field_name( 'min_height' ).'" value="'.htmlspecialchars($instance['min_height'], ENT_QUOTES).'" /><br/><span class="setting-description"><small>'.__('If set empty it will take min height 200px.', 'testimonialwidget').'</small></span></p>';
  
 echo '<p><label for="'.$this->get_field_id( 'char_limit' ).'">'.__('Character limit', 'testimonialwidget').' </label><input class="widefat" type="text" id="'.$this->get_field_id( 'char_limit' ).'" name="'.$this->get_field_name( 'char_limit' ).'" value="'.htmlspecialchars($instance['char_limit'], ENT_QUOTES).'" /></p>';
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    //extract($args, EXTR_SKIP);
		extract( $args );
			$title 		= apply_filters('widget_title', $instance['title']); // the widget title
			//$postperpage 	= $instance['number']; // the number of posts to show
			
    echo $before_widget;
	
		
	$min_height .= '160px';
	
	$html = <<<EOF
	<style>
		.testimonialswidget_testimonials2 
		{
		min-height: $min_height;
		}
	</style>
EOF;
	
	echo $html; ?>
	
	<!--<style>
		.testimonialswidget_testimonials2 {
		min-height:150PX;
	}
	
	</style>-->
	<script type="text/javascript">
			function nextTestimonial2() {
				if (!jQuery('.testimonialswidget_testimonials2').first().hasClass('hovered')) {
					var active = jQuery('.testimonialswidget_testimonials2 .testimonialswidget_active');
					var next = (jQuery('.testimonialswidget_testimonials2 .testimonialswidget_active').next().length > 0) ? jQuery('.testimonialswidget_testimonials2 .testimonialswidget_active').next() : jQuery('.testimonialswidget_testimonials2 .testimonialswidget_testimonial:first');
				active.fadeOut(1250, function(){
					active.removeClass('testimonialswidget_active');
					next.fadeIn(500);
					next.addClass('testimonialswidget_active');
				});
			}
		}

		jQuery(document).ready(function(){
				jQuery('.testimonialswidget_testimonials2').hover(function() { jQuery(this).addClass('hovered') }, function() { jQuery(this).removeClass('hovered') });
				setInterval('nextTestimonial2()', 10 * 1000);
		});
	</script>
	<?
    echo '<div class="testimonialswidget_testimonials testimonialswidget_testimonials2">';
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	
		$blog_url = get_bloginfo('url'); 
    if (!empty($title))
    /**  echo $before_title . "<a href='".$blog_url."/testimonial-listing'>".$title."</a>". $after_title; ?> */
      
       echo $before_title ." ".$title." ". $after_title; ?>
 
   
   	<?php $testimonialsqry = new WP_Query(array('post_type' => 'Testimonials','posts_per_page' => $postperpage, 'nopaging' => 0, 'post_status' => $posttype, 'order' => 'ASC'));
			if ($testimonialsqry->have_posts()) {
			$first = true;
			while ($testimonialsqry->have_posts()) : $testimonialsqry->the_post();
			$do_not_duplicate = $post->ID;			
			?>
				<?php if(!$first){?>	
					<div style="display : none;padding-left:10px;padding-top:38px;text-align:justify;" class="testimonialswidget_testimonial"><?php //the_title();?>
					<div class="testimonialimg"><?php the_post_thumbnail(array(75,75)); ?></div>
					<?php the_content_limit(150,"");?>
					<?php $postid = get_the_ID();
						$testiname=get_post_meta($postid, 'testiname', true); 
						if ($testiname) : ?>
							<?php $pntname=$testiname; ?>
				  <?php endif; ?>
					<?php $testiaddress=get_post_meta($postid, 'testiaddress', true); 
						  if ($testiaddress) : ?>
							<?php $pntaddress=$testiaddress; ?>
							
					<?php endif; ?>
					<div style="float:right;margin-right:10px;"><?php echo "&mdash;&nbsp;".get_the_title($postid).", ".$pntaddress;?></div>
					<div style="clear:both;"></div>
					</div>
				<?php }else {?>
					<div style="display : block;padding-left:10px;padding-top:38px;text-align:justify;" class="testimonialswidget_testimonial testimonialswidget_active">
					<div class="testimonialimg"><?php the_post_thumbnail(array(75,75)); ?></div>
					<?php the_content_limit(180,"");?>
					<?php $postid = get_the_ID();
						$testiname=get_post_meta($postid, 'testiname', true); 
						if ($testiname) : ?>
							<?php $pntname=$testiname; ?>
				  <?php endif; ?>
					<?php $testiaddress=get_post_meta($postid, 'testiaddress', true); 
						  if ($testiaddress) : ?>
							<?php $pntaddress=$testiaddress; ?>
					<?php endif; ?>
					<div style="float:right;margin-right:10px;"><?php echo "&mdash;&nbsp;".get_the_title($postid).", ".$pntaddress;?></div>
					<div style="clear:both;"></div>
					</div>
				<?php $first = false; }?>
			
			<?php endwhile;
			}  ?>
 <?php
	echo "</div>";
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("testimonialwidget");') );?>