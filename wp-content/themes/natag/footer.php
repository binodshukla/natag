<?php
/**
* Footer template used by Eclipse.
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
<style rel="stylesheet">
.footer-group ul {
	margin-bottom: 10px;
	margin-top: 0px;
}
.footer-group li {
	font-size: 11px;
	line-height: 18px;
	margin-right: 10px;
}
.footer-group a:link, .footer-group a:visited, .footer-group a:active {
	color: #000;
	text-decoration: underline;
}
.footer-group a:hover, .footer-group a:focus {
	color: #FFF;
}
.footer-group .title {
	margin-bottom: 5px;
}
.footer-group .title a:link, .footer-group .title a:visited, .footer-group .title a:active {
	text-transform: uppercase;
	text-decoration: none;
	color: #000;
	font-weight: bold;
}
.footer-group .title a:hover, .footer-group .title a:focus {
	color: #fff;
}
.footer-1 {
	float: left;
	width: 120px;

}
.footer-2 {
	float: left;
	width: 120px;
}
.footer-3 {
	float: left;
	width: 120px;
}
.footer-4 {
	float: left;
	width: 80px;
}
</style>
<center>
<div style="clear:both;"></div>	
	<footer>
	
		<div id="footer_bg">
		
			<div class="footer_content">
			
				<a class="policylink" href="#"><div class="copyright_content"><p><span style="color:#fff">&copy; 2012 Natag | </span><span class="policy">Privacy Policy</span></p></div></a>
				
				<div class="footer-group" style="float:left; margin:65px 0px 0px 80px; padding:10px 20px 5px; width:470px;text-align:left;" >
					<div class="footer-1" >
						<ul>
							<li class="title" ><a href="<?php bloginfo('url');?>/?page_id=329" title="Related Links">RELATED LINKS</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=301" >Blog</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=299" >Newsletter</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=303" >Specials</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=305" >Ads</a></li>
						</ul>
					</div>
					<div class="footer-2">
						<ul>
							<li class="title" ><a href="<?php bloginfo('url');?>" title="Home Links">HOME LINKS</a></li>
							<li><a href="<?php bloginfo('url');?>">Home</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=8">About Us</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=29">Products</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=31">Our Services</a></li>
						</ul>
					</div>
					<div class="footer-3">
						<ul>
							<li class="title" ><a href="<?php bloginfo('url');?>/?page_id=331" title="Others">OTHERS</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=293">Our Staff</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=288">FAQ</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=283">History</a></li>
							<li><a href="<?php bloginfo('url');?>/?page_id=33">Contact Us</a></li>
						</ul>
					</div>
				</div>
				
				<div id="bottom_social_area">
					<a href="#" class="bottom_facebook" title="Facebook"></a>
					<a href="#" class="bottom_twitter" title="Twitter"></a>
					<a href="#" class="bottom_vimeo" title="Vimeo"></a>
					<a href="#" class="bottom_linked" title="Linked In"></a>
				</div>
				<div style="clear:both;"></div>		
			</div>
		</div>
	</footer>	
	</center>

<?php wp_footer(); ?>
</body>
</html>