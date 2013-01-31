<?php
ob_start();
/**
 * Template Name:Update Message
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
extract($_POST);
if($request == 'Save')
{
	$url = get_option('siteurl');
	
	header("Location:".$url."/?page_id=549");
}
?>

		<div id="primaryinn">
		<div id="leftsilde">
		<div class="cat">
		<div class="cat">
		<h3>User Info</h3>
		</div>
        <?php if ( is_user_logged_in() ) {?>
        <div class="submenu" contentindex="0c" style="display: block; ">
        <ul>
			<li>
			<a href="#" class="usernameheader"> <?php echo $current_user->display_name; ?></a>
            </li>
            <li>
            <a href="<?php bloginfo('url');?>/?page_id=122/" target="_blank">Edit Profile</a>
            </li>
            <li>
            <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">Logout</a>
            </li>
        </ul>    
        </div>
        <?php }?>
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
		
		</div></div>
			<div id="contentinn" role="main">
            <center>
        		<table width="100%" style="border-right:#999 1px dotted;">
                	<tr>
                    	<td class="notification">
                        	Newsletter for Request of Estimation
                        </td>
                    </tr>
                </table>
            </center>				
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>