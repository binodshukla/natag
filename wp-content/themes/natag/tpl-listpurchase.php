<?php
/**
 *
 * @package WordPress
 * @subpackage natag
 * Template Name:List of Purchase Order
 */

get_header();
wp_get_current_user();
get_currentuserinfo() ;
$user_id = get_current_user_id();
global $user_level; 
global $wpdb;
if($_REQUEST['delete'] == 'DELETE')
{
	if (isset($_REQUEST['chk_group'])) {
	$optionArray = $_REQUEST['chk_group'];
	for ($i=0; $i<count($optionArray); $i++) {
	  wp_delete_post($optionArray[$i]);
	}
	}
}

if($_REQUEST['submit'] == 'Order Placed')
{

	$my_id = $_REQUEST['post_id'];
	$post_id_7 = get_post($my_id); 
	$author = $post_id_7->post_author;

	if (isset($_REQUEST['chk_group'])) 
	{
		$optionArray = $_REQUEST['chk_group'];
		for ($i=0; $i<count($optionArray); $i++) 
		{
			$my_post = array();
			$my_post['ID'] = $optionArray[$i];
			$my_post['post_status'] = 'Order Recieved';
			// Update the post into the database
			wp_update_post( $my_post );	

			$user_info = get_userdata($author);
			$to = $user_info->user_email;
			$uname = ucfirst($user_info->user_nicename);
			$subject = "Purchase Order Completed";
			$message = get_option('farmer_complete_order');
			$message = str_replace('$name',$uname,$message);
			//$message = str_replace('$requestname','Fertilizer/Chemical',$message);
			$headers = 'From: National AG';
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$mail = mail( $to, $subject, $message, $headers);
		}
	}
	else
	{
		$my_post = array();
		$my_post['ID'] = $_REQUEST['post_id'];
		$my_post['post_status'] = 'Order Recieved';
		// Update the post into the database
		wp_update_post( $my_post );	

		$user_info = get_userdata($author);
		$to = $user_info->user_email;
		$uname = ucfirst($user_info->user_nicename);
		$subject = "Purchase Order Completed";
		$message = get_option('farmer_complete_order');
		$message = str_replace('$name',$uname,$message);
		//$message = str_replace('$requestname','Fertilizer/Chemical',$message);
		$headers = 'From: National AG';
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$mail = mail( $to, $subject, $message, $headers);
	}

}

?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(function () {
	   $('#select-all').click(function (event) {
	
		   var selected = this.checked;
		   // Iterate each checkbox
		   $(':checkbox').each(function () {    this.checked = selected; });
	
	   });
	});
</script>

		<div id="primaryinn">
		<div id="leftsilde">
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
		<?php //include("catmenu.php"); ?>
		<?php //dynamic_sidebar('Inner Page Sidebar'); ?>
		
		<?php //wp_list_categories('hierarchical' => true,); ?>
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
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					        
							<h3><?php /* Page Title */
   							   $headtxt = get_post_meta($post->ID, 'custometitle', true); ?>
                               <?php if (!empty($headtxt)){echo $headtxt;}else { the_title();} ?></h3>
  
                          
                               <?php if ( is_user_logged_in() ) {
								   
							   ?>
			<form name="home" action="" method="post">
            <table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            <td colspan="8" align="right">
            <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
            <input type="submit" name="delete" value="DELETE" class="form-button">
			<?php if($user_level == 10) {?>
	            <input type="submit" name="submit" class="form-button" value="Order Placed" />
            <?php }?>
             </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="select-all" id="select-all" />
                </th>
            	<th align="left" class="listtd">
                	Request-Name
                </th>
            	<th align="left" class="listtd">
                	Code No.
                </th>
            	<th align="left" class="listtd">
                	Quantity
                </th>
            	<th align="left" class="listtd">
                	Each Price
                </th>
            	<th align="left" class="listtd">
                	Total
                </th>
            	<th align="left" class="listtd">
                	Status
                </th>
            	<th align="left" class="listtd">
                	Date
                </th>
            	<th align="left" class="listtdlast">
                	Action
                </th>
            </tr>
<?php
			if($user_level != 10) {
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='purchaseorder' and wp_posts.post_author='".$user_id."' order by wp_posts.ID DESC " );
			}
			elseif($user_level == 10)
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='purchaseorder' order by wp_posts.ID DESC " );
			}
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
?>
       		<?php
			if($ct%2 == 0)
			{
			?>
            <tr class="odd">
            <?php
			}
			else
			{
			?>
            <tr class="even">
            <?php	
			}
			?>
            	<td align="center" class="listtd">
                	<input type="checkbox" name="chk_group[]" value="<?php echo $id?>" />
                </td>
            	<td align="left" class="listtd">
                	<?php echo ucfirst($post_name); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'quantity',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'each_price',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'total_price',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php 
						if($post_status == 'ordersent' && $user_level == 10){ echo 'Order Pending';} 
						elseif($post_status == 'ordersent'){ echo 'Order-Sent';}
						elseif($post_status == 'orderrecieved' && $user_level == 10){ echo 'Order Place';}
						elseif($post_status == 'orderrecieved'){ echo 'Order-Complete';}
					?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'purchase_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
					<a href="JavaScript:newPopup('<?php echo get_option('siteurl')?>/?page_id=540&post_id=<?php echo $id?>')">Print</a>&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" /> 
				<?php if($user_level == 10) {?>
                    <input type="button" name="submit" onclick="javascript:location.href='<?php echo get_option('siteurl')?>/?page_id=544&post_id=<?php echo $id?>&submit=Order Placed'" class="form-button" value="Order Placed" />
                <?php }?>
                </td>
            </tr>
<?php
			$ct++;
            }   
?>
        </table>
        </form>
                               <?php
                                } ?>
							<div class="editprofilecn">
					      	<?php /* Page Content */  the_content(); ?>	
							</div>							
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>