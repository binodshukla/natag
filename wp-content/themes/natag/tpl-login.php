<?php
/**
 *
 * @package WordPress
 * @subpackage natag
 * Template Name:Login
 */

get_header();
  wp_get_current_user();
  get_currentuserinfo() ;
  global $user_level;
 ?>

		<div id="primaryinn">
		
			<div id="contentlogin" role="main">
			
			     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					              					    
						 <?php if ( is_user_logged_in() ) 
						{  

                                              
							if($user_level == 10) { 
							
								
								//wp_redirect( 'http://localhost/wordpress/wp-login.php', sleep(3)); exit;
								//wp_redirect( home_url( '/wp-admin' ),sleep(10) ); 
								
								printf("<script>location.href='".home_url("/")."?page_id=118'</script>");
							
								
							  }
							  else
							  {
                                                            if($user_level == 1)
                                                            {
                                                          printf("<script>location.href='".home_url("/")."?page_id=348'</script>");
                                                            }
                                                           else
                                                            {
							  printf("<script>location.href='".home_url("/")."?page_id=118'</script>");
								//wp_redirect( home_url( '/?page_id=122' ),301 ); 
							  }
                                                        }
						} 
						?>			
							<h3><?php /* Page Title */?> Member Login</h3>
  
                         
							<div class="memberlogin">
					      	<?php /* Page Content */  the_content(); ?>	
                            Not yet a member <a title="Join Us" href="<?php bloginfo('url');?>/?page_id=116">Join Us</a>
							</div>	
                     				
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
					   
						
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>