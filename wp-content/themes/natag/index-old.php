<?php
/**
* Header template used by Eclipse.
*
* Authors: Tyler Cunningham, Trent Lapinski
* Copyright: © 2012
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Eclipse.
* @since 1.0
*/

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
						
										<?include (ABSPATH . '/wp-content/plugins/coin-slider-4-wp/coinslider.php'); ?> 
						</div>
													
						<div class="shadow"></div>
						<div id="clent_content">			
							<div class="client_photo"></div>
							<div class="client_content">
								<div class="client_heading"><h1>Welcome to National Ag</h1></div>
								<div class="client_inner_heading"><h2>Healping family farmers stay on the farm</h2></div>
								<div class="inner_para"><p align="justify">During the best of times with high markets, family operations need us. When times are not the best; when market prices are not the highest, they really need us! During the best of times with high markets, family operations need us. When times are not the best; when market prices are not the highest, they really need us! </p>
								</div>
							</div>						
						</div>
						<div style="clear:both;"></div>
						<div id="main_content">	
						
							<div class="left_content">							
								<div class="photo1"></div>
								<div class="main_content_heading"><h3>Our Products</h3></div>
								<div class="main_content_para"><p align="justify">A Nationwide professional purchasing agency with a 40+ year record of successfully helping our clients cut costs and reap profits </p>
								</div>
								<a href="#"><div class="More_button"></div></a>
							</div>							
							
							<div class="right_content">
							
								<div class="photo2"></div>
								<div class="main_content_heading"><h3>We Are</h3></div>
								<div class="main_content_para"><p align="justify">A Nationwide professional purchasing agency with a 40+ year record of successfully helping our clients cut costs and reap profits </p>
								</div>
								<a href="#"><div class="More_button"></div></a>
							
							</div>											
						</div>
						<div style="clear:both;"></div>
						<div style="border:1px solid #d7d7d7;margin-top:20px;"></div>
						<div style="clear:both;"></div>
						<div id="bottom_content">	
						
							<div class="bottom_content_1">	
								<div class="bottom_heading"><h3>We Are Not</h3></div>
								<div class="main_content_para"><p align="justify">'A buyers club', or 'a new concept'.  </p>
								<p align="justify">The largest Ag operations have benefited from the services of Professional Purchasing agents since World War II</p>
								</div>
								<a href="#"><div class="More_button margintop"></div></a>
							</div>
							<div class="bottom_content_2">	
								<div class="bottom_heading"><h3>Agriculture Facts</h3></div>
								<div class="main_content_para agri"><p>Farmers that considered themselves more willing to try new practices were more likely to have larger farms, higher returns, and were in more stable financial condition.</p></div>
									<div style="clear:both;"></div>
								<a href="#"><div class="More_button"></div></a>
							</div>
							<div class="bottom_content_3">	
								<div class="bottom_heading"><h3>Client Testimonials</h3></div>
									<div class="photo3"></div>
								<div class="main_content_para last client_testi"><p>
"It's about time we, as farmers are able to buy wholesale; being (as) we usually buy retail and sell wholesale. Please continue the good work." - Andy N., MO (Client)</p></div>
								<a href="#"><div class="More_button "></div></a>

                                           <?php dynamic_sidebar( 'Testimonials' ); ?>
							</div>	

                                                          						
																	
						</div>
						
						
					</div>
			</div>
		</div>
	</section>	
</center>

<?php get_footer(); ?>