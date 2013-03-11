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
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">
<title><?php if (is_home()) {



	echo bloginfo('name');



} elseif (is_category()) {



	echo __('Categor&iacute;a ' ); wp_title('&laquo;  ', TRUE, 'right');



	echo bloginfo('name');



} elseif (is_tag()) {



	echo __('Etiqueta '); wp_title('&laquo;  ', TRUE, 'right');



	echo bloginfo('name');



} elseif (is_search()) {



	echo __('Resultados de la b&uacute;squeda');



	echo the_search_query();



	echo '&laquo; @ ';



	echo bloginfo('name');



} elseif (is_404()) {



	echo '404 '; wp_title('  ', TRUE, 'right');



	echo bloginfo('name');



} else {



	echo wp_title('  ', TRUE, 'right');



	echo bloginfo('name');



} ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/validate_form.js"></script>
<?php wp_head(); ?>
</head>
<body>
<center>
<header>
		<div id="headerbg">
		
		<?php if(is_front_page()) {?>
		<div id="header">
			<a href="<?php bloginfo('url')?>"><div class="logo"></div></a>
			<?php } else {?>
			<div id="headerinner">
		<div class="logobg1">	
		<div class="headerinner">
		<a href="<?php bloginfo('url')?>"><div class="logo"></div></a>
			<?php } ?>
				
				<div id="social_area">
                	<?php
					if(get_option('youtube_url'))
					{
					?>
						<a href="<?php echo get_option('youtube_url'); ?>" target="_blank"><div class="vimeo"></div></a>
                    <?php
					}
					if(get_option('linkedin_url'))
					{
					?>
						<a href="<?php echo get_option('linkedin_url'); ?>" target="_blank"><div class="linkedin"></div></a>
                    <?php
					}
					if(get_option('facebook_url'))
					{
					?>
						<a href="<?php echo get_option('facebook_url'); ?>" target="_blank"><div class="facebook"></div></a>
                    <?php
					}
					if(get_option('twitter_url'))
					{
					?>
						<a href="<?php echo get_option('twitter_url'); ?>" target="_blank"><div class="twitter"></div></a>
                    <?php
					}
					if(get_option('googleplus_url'))
					{
					?>
                    	<a href="<?php echo get_option('googleplus_url'); ?>" target="_blank"><div class="googleplus"></div></a>
                    <?php
					}
					?>
                    <?php if ( is_user_logged_in() ) {?>
					<a href="<?php bloginfo('url');?>/?page_id=140"><div class="member_dash"></div></a>
                    <?php }else{ ?>
					<a href="<?php bloginfo('url');?>/?page_id=140"><div class="member_section"></div></a>
					<a href="<?php bloginfo('url');?>/?page_id=116"><div class="member_join"></div></a>
					<?php } ?>
					<?php if(is_front_page()) { ?>
					<div class="spllinks">
					<?php } else { ?>
					<div class="spllinksinner">
					<?}?>
						<a href="<?php bloginfo('url');?>/?page_id=301">Blog</a> |
						<a href="<?php bloginfo('url');?>/?page_id=299">Newsletter</a> |
						<a href="<?php bloginfo('url');?>/?page_id=303">Specials</a> |
						<a href="<?php bloginfo('url');?>/?page_id=305">Ads</a>
					</div>
					<?php if(is_front_page()) { ?>
					<div class="homesearch">
					<?php } ?>
					<?php if(!is_front_page()) { ?>
					<div class="search">
					<?php } ?>
						<input type="search" placeholder="&nbsp;SEARCH FOR" class="text_box">
					</div>
				</div>
					<div class="clear"></div>
				
         <?php //if(!is_front_page()) {?>
			</div>
			</div>
			<?php //} ?>
				
			</div>
			<div class="menu_bg">
				<!--<div class="menu_bg">
				<div id="nav">
						<ul id="menu"> 
							<li><a href="/natag/" class="first">HOME</a></li>
							<li><a href="/natag/?page_id=8">ABOUT US</a></li>
							<li><a href="/natag/?page_id=29">PRODUCTS</a></li> 					
							<li><a href="/natag/?page_id=31">OUR SERVICES</a></li>
							<li><a href="/natag/?page_id=33" >CONTACT US</a></li>
							<div style="clear:both;"></div>				
						</ul>								
				</div>				
			</div>	-->
			
    <div id="nav" role="navigation">
		<ul id="menu">
		<?php wp_nav_menu(array('menu' => 'Top Menu')); ?>
		</ul>								
	</div>		
			</div>			
		</div>
		
		<div style="clear:both;"></div>		
	</header>		
</center>

