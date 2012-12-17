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
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
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
					<a href="#"><div class="vimeo"></div></a>
					<a href="#"><div class="linkedin"></div></a>
					<a href="#"><div class="facebook"></div></a>
					<a href="#"><div class="twitter"></div></a>
					<a href="<?php bloginfo('url');?>/?page_id=140"><div class="member_section"></div></a>
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

