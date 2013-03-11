<?php
ob_start();
/**
 * Template Name:Update Supplies
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
extract($_POST);
if($submit == 'Send')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	$my_post = array();
	$my_post['ID'] = $_REQUEST['post_id'];
	$my_post['post_title']    = $fname;
	$my_post['post_name']    = $fname;
	$my_post['post_content']  = $add_descpt;
	if($quote_price != '')
	{
	$my_post['post_status']   = 'publish';
	}
	// Update the post into the database
	$post_id=wp_update_post( $my_post,  $wp_error );

	update_post_meta($_REQUEST['post_id'], 'code_number', $cname); 
	update_post_meta($_REQUEST['post_id'], 'quantity', $quantity); 
	update_post_meta($_REQUEST['post_id'], 'bpref', $bpref); 
	update_post_meta($_REQUEST['post_id'], 'item_name', $item_name); 
	update_post_meta($_REQUEST['post_id'], 'request', $request); 
	update_post_meta($_REQUEST['post_id'], 'best_price', $best_price); 
	update_post_meta($_REQUEST['post_id'], 'price_quote', $price_quote); 
	update_post_meta($_REQUEST['post_id'], 'saved_offer', $saved_offer);
	update_post_meta($_REQUEST['post_id'], 'add_info', $add_info);
	update_post_meta($_REQUEST['post_id'], 'form_submit', $submit);
	if($quote_price != '')
	{
	update_post_meta($_REQUEST['post_id'], 'request_status', 'completed');
	}
	update_post_meta($post_id, 'freight', $freight);
	
	$email_not = get_user_meta($_REQUEST['user_id'], "email_not", true);
	$sms_not = get_user_meta($_REQUEST['user_id'], "sms_not", true);
	$no_not = get_user_meta($_REQUEST['user_id'], "no_not", true);
	if($quote_price != '')
	{
		if($no_not == '')
		{
			if($email_not == 'Email')
			{
				$user_info = get_userdata($_REQUEST['user_id']);
				$to = $user_info->user_email;
				$uname = ucfirst($user_info->user_nicename);
				$subject = "Suppliers Quote Request Completed";
				$message = get_option('farmer_admin_quote');
				$message = str_replace('$name',$uname,$message);
				$message = str_replace('$requestname','Equipment',$message);
				$headers = 'From: National AG';
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$mail = mail( $to, $subject, $message, $headers);
			}
			if($sms_not == 'SMS')
			{
				
			}
		}
	}
	header("Location:".$url."/?page_id=441");
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
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<h3>
								<?php /* Page Title */
   							   $headtxt = get_post_meta($post->ID, 'custometitle', true); ?>
								<?php if (!empty($headtxt)){echo $headtxt;}else { the_title();} ?>
                            </h3>
						<?php endwhile;?>
						<?php endif; ?>
					      <!--  ARTICLE BOX STARTS  -->
	<center>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date,wp_posts.post_content, wp_posts.post_author from wp_posts where wp_posts.post_type='supplies' and wp_posts.ID = '".$_REQUEST['post_id']."' order by wp_posts.ID DESC " );
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_author=$myterms->post_author;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				$post_content=$myterms->post_content;
?>
    	<form action="" method="post" name="parts" onsubmit="return confirm('Are you sure you want to Send ?')">
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left;">Your name</div>
				<div style="width:209px; float:left;">
					<input type="text" name="fname" value="<?php echo $post_name; ?>" style="width: 173px" > </div>
				<div style="width:125px; float:left;">Your code number </div>
				<div style="width:165px; float:left;"><input name="cname" value="<?php echo get_post_meta($id,'code_number',true); ?>" type="text" style="width:170px" ></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				How Many
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="quantity" value="<?php echo get_post_meta($id,'quantity',true); ?>" style="width: 412px" ></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand preference  				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="bpref" value="<?php echo get_post_meta($id,'bpref',true); ?>" style="width: 410px" ></div>

			</div>

			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Item Name  
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="item_name" value="<?php echo get_post_meta($id,'item_name',true); ?>" style="width: 412px" ></div>

			</div>

			
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information or description (if needed)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_descpt"  style="width: 410px; height: 67px"><?php echo $post_content?></textarea></div>

			</div>
			<div style="width:100%;text-align:left;">This is an emergency I routine request.
            <?php 
			$rq = array('Emergency','Routine');
			foreach($rq as $r)
			{
				if($r == get_post_meta($id,'request',true))
				{
			?> 
                <input checked="checked" type="radio" name="request" value="<?php echo $r?>"><?php echo $r?> &nbsp; 
            <?php
				}
				else
				{
			?>
                <input type="radio" name="request" value="<?php echo $r?>"><?php echo $r?> &nbsp; 
            <?php		
				}
            }
			?>
            </div>
			
			<div>
				
					<div>
				<div style="float:left;width: 184px; text-align:left;">
				Client's price$   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="best_price" value="<?php echo get_post_meta($id,'best_price',true); ?>" style="width: 412px" ></div>

			</div>

				
			
			</div>
			
			

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_info" style="width: 410px; height: 67px"><?php echo get_post_meta($id,'add_info',true); ?></textarea></div>

			</div>
            <div style="clear:both;"></div>

			<div style="text-align:left;clear:both;">
				<strong>For official use only:</strong>
            </div>
			
            <div>
				<div style="float:left;width: 203px; text-align:left;">
				Note 
				</div>
				<div style="width:336px; float:left;" class="auto-style2">
                <textarea name="admin_note" style="width: 410px; height: 67px"><?php echo get_post_meta($id,'admin_note',true); ?></textarea>
                </div>
			</div>
            
            <div>
				<div style="float:left;width: 203px; text-align:left;">
				National Ag Price Quote $ 
				</div>
				<div style="width:336px; float:left;" class="auto-style2">
					<input type="text" name="price_quote" value="<?php echo get_post_meta($id,'price_quote',true); ?>" style="width: 121px" ></div>
			</div>

			<div>
				<div style="float:left;width: 203px; text-align:left;">
				Freight 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" style="width: 121px" name="freight" value="<?php echo get_post_meta($id,'freight',true); ?>" ></div>
			</div>

	 
			 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); height: 150px; clear:both;">
                <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>">
                <input type="hidden" name="post_id" value="<?php echo $_REQUEST['post_id'] ?>">
                <input type="hidden" name="user_id" value="<?php echo $post_author?>">				
				 <input type="submit" name="submit" class="form-button" value="Send">
			 </div>
			 
			 
			 
			 
		</div>
        </form>
<?php
            }   
?>
		</center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>