<?php
ob_start();
/**
 * Template Name:Fertilizer
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
extract($_POST);
if($submit == 'Submit')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	$my_post = array(
	  'post_title'    => $fname,
	  'post_name'    => $fname,
	  'post_content'  => $add_descpt,
	  'post_status'   => 'sent',
	  'comment_status'=> 'closed',
	  'post_author'   => $user_id,
//	  'post_category' => array($brand,$model),
	  'post_type'     => $fertilizer,
	  'post_parent'           => 0,
	  'menu_order'            => 0,
	  'to_ping'               => '',
	  'pinged'                => '',
	  'post_password'         => '',
	  'post_content_filtered' => '',
	  'post_excerpt'          => '',
	  );
	// Insert the post into the database
	$post_id=wp_insert_post( $my_post,  $wp_error );

	$gurl = $url."/?fertilizer=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'looking_for', $fertilizer); 
	add_post_meta($post_id, 'item_name', $item_name); 
	add_post_meta($post_id, 'app_cost', $app_cost);
	add_post_meta($post_id, 'packaged', $packaged); 
	add_post_meta($post_id, 'quantity', $total_amount); 
	add_post_meta($post_id, 'delivery_date', $delivery_date); 
	add_post_meta($post_id, 'quote_date', $quote_date); 
	add_post_meta($post_id, 'use_fertilizer', $use_fertilizer); 
	add_post_meta($post_id, 'add_descpt', $add_descpt); 
	add_post_meta($post_id, 'best_price', $best_price); 
	add_post_meta($post_id, 'price_quote', $quote_price); 
	add_post_meta($post_id, 'saving_offer', $saving_offer); 
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	add_post_meta($post_id, 'request_status', 'pending');
	add_post_meta($post_id, 'request_date', date('m/d/Y'));
	add_post_meta($post_id, 'freight', $freight);

	$user_info = get_userdata(1);
	$to = $user_info->user_email;
	$uname = ucfirst($user_info->user_nicename);
	$subject = "Fertilizer Request Notification";
	$message = get_option('admin_request_from_farmer');
	$message = str_replace('$name',$uname,$message);
	$message = str_replace('$requestname','Fertilizer/Chemical',$message);
	$headers = 'From: National AG';
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mail = mail( $to, $subject, $message, $headers);
	header("Location:".$url."/?page_id=441");
}
elseif($submit == 'Save')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	$my_post = array(
	  'post_title'    => $fname,
	  'post_name'    => $fname,
	  'post_content'  => $add_descpt,
	  'post_status'   => 'draft',
	  'comment_status'=> 'closed',
	  'post_author'   => $user_id,
//	  'post_category' => array($brand,$model),
	  'post_type'     => $fertilizer,
	  'post_parent'           => 0,
	  'menu_order'            => 0,
	  'to_ping'               => '',
	  'pinged'                => '',
	  'post_password'         => '',
	  'post_content_filtered' => '',
	  'post_excerpt'          => '',
	  );
	// Insert the post into the database
	$post_id=wp_insert_post( $my_post,  $wp_error );

	$gurl = $url."/?fertilizer=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'looking_for', $fertilizer); 
	add_post_meta($post_id, 'item_name', $item_name); 
	add_post_meta($post_id, 'app_cost', $app_cost);
	add_post_meta($post_id, 'packaged', $packaged); 
	add_post_meta($post_id, 'quantity', $total_amount); 
	add_post_meta($post_id, 'delivery_date', $delivery_date); 
	add_post_meta($post_id, 'quote_date', $quote_date); 
	add_post_meta($post_id, 'use_fertilizer', $use_fertilizer); 
	add_post_meta($post_id, 'add_descpt', $add_descpt); 
	add_post_meta($post_id, 'best_price', $best_price); 
	add_post_meta($post_id, 'price_quote', $quote_price); 
	add_post_meta($post_id, 'saving_offer', $saving_offer); 
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	add_post_meta($post_id, 'request_date', date('m/d/Y'));
	add_post_meta($post_id, 'freight', $freight);
	
	header("Location:".$url."/?page_id=506");
}
?>
<script type="text/javascript">
function confirmSubmit()
{
	var con = confirm( 'Are you sure want to submit ?'); 
}
</script>
		<div id="primaryinn">
		<div id="leftsilde">
		<div class="cat">
		<h3>Dashboard</h3>
		</div>
		<?php include("catmenu.php"); ?>
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
							
					      	<?php /* Page Content */  the_content(); ?>				
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
					      <!--  ARTICLE BOX STARTS  -->
	<center>
    	<form action="" method="post" name="fert">
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left;">Your name</div>
				<div style="width:209px; float:left;">
					<input type="text" name="fname" value="" id="fname" style="width: 173px" > </div>
				<div style="width:125px; float:left;">Your code number </div>
				<div style="width:165px; float:left;"><input type="text" id="cname" name="cname" value="" style="width:170px" ></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			
			<div style="text-align:left;">
				<div style="width:91px; float:left;">Fertilizer</div>
				<div style="width:209px; float:left;">
					<input type="radio" name="fertilizer" checked="checked" value="Fertilizer" style="width: 173px" > </div>
				<div style="width:125px; float:left;">Chemical</div>
				<div style="width:165px; float:left;"><input type="radio" name="fertilizer" value="Chemical" style="width:170px" ></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Item name/composition 				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="item_name" name="item_name" value="" style="width: 410px" ></div>

			</div>

			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Total amount needed    
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="total_amount" name="total_amount" value="" style="width: 412px" ></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Packaged in quantities of
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="packaged" name="packaged" value="" style="width: 412px" ></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Delivery needed by  
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="delivery_date" name="delivery_date" style="width: 412px" ></div>

			</div>
			
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Quote needed by  				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="quote_date" name="quote_date" style="width: 412px" ></div>

			</div>


		 

			<div style="clear:both;">
				<div style="float:left;">How do you use: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bulk    </div>
				<div style="float:left;">
					<input name="use_fertilizer" type="radio" checked="checked" value="Bulk" style="width: 65px" /></div>
				<div style="float:left;">Need Tanks </div>
				<div style="float:left;">
					<input name="use_fertilizer" type="radio" value="Tanks" style="width: 64px" /></div>
				<div style="float:left;">Applied   </div>
				<div style="float:left;">
					<input name="use_fertilizer" type="radio" value="Applied" style="width: 79px" /></div>
					<div style="float:left;">Other </div>
				<div style="float:left;">
					<input name="use_fertilizer" type="radio" value="Other" style="width: 79px" /></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Cost of application if applicable $ 
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="app_cost" name="app_cost" value="" style="width: 412px" ></div>
			</div>
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information or description (if needed)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_descpt" style="width: 410px; height: 67px"></textarea></div>

			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_info" style="width: 410px; height: 67px"></textarea></div>

			</div>
			<div>
            <div>
				<div style="float:left;width: 184px; text-align:left;">
				My best local price$   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="best_price" name="best_price" value="" style="width: 412px" >
                </div>
			</div>
			</div>

            <div style="clear:both;"></div>

			<div style="text-align:left;clear:both;">
				<strong>For official use only:</strong></div>
			
			<div>
				<div style="float:left;width: 203px; text-align:left;">
				National Ag Price Quote $ 
				</div>
				<div style="width:336px; float:left;" class="auto-style2">
					<input type="text" name="quote_price" style="width: 121px" readonly="readonly" >
                </div>
			</div>

			<div>
				<div style="float:left;width: 203px; text-align:left;">
				Freight 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" style="width: 121px" readonly="readonly" name="freight" value="" ></div>
			</div>
			 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); height: 150px; clear:both;">
			 For your own information, you should record <br />
				 the date and time you initiated this inquiry.<br />
				 <br>
				 <input type="submit" class="form-button" name="submit" value="Save">&nbsp;
                 <input class="form-button" type="submit" name="submit" value="Submit" onclick="return validate_fert();">
                 &nbsp;<input type="reset" class="form-button" name="submit" value="Cancel">
			 </div>
			 
			 
			 
			 
			 
		</div>
        </form>
		</center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>