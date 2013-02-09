<?php
ob_start();
/**
 * Template Name:Parts
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
	  'post_type'     => 'parts',
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

	$gurl = $url."/?parts=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'quantity', $quantity); 
	add_post_meta($post_id, 'part_name', $part_name); 
	add_post_meta($post_id, 'vehicle_type', $type); 
	add_post_meta($post_id, 'brand_name', $brand_name); 
	add_post_meta($post_id, 'model', $model); 
	add_post_meta($post_id, 'serial_no', $serial_no); 
	add_post_meta($post_id, 'applicable', $applicable); 
	add_post_meta($post_id, 'best_price', $best_price); 
	add_post_meta($post_id, 'price_quote', $price_quote);
	add_post_meta($post_id, 'request', $request);
	add_post_meta($post_id, 'saved_offer', $saved_offer);
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	add_post_meta($post_id, 'request_status', 'pending');
	add_post_meta($post_id, 'request_date', date('m/d/Y'));
	add_post_meta($post_id, 'freight', $freight);
	
	$user_info = get_userdata(1);
	$to = $user_info->user_email;
	$uname = ucfirst($user_info->user_nicename);
	$subject = "Parts Request Notification";
	$message = get_option('admin_request_from_farmer');
	$message = str_replace('$name',$uname,$message);
	$message = str_replace('$requestname','Parts',$message);
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
	  'post_type'     => 'parts',
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

	$gurl = $url."/?parts=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'quantity', $quantity); 
	add_post_meta($post_id, 'part_name', $part_name); 
	add_post_meta($post_id, 'vehicle_type', $type); 
	add_post_meta($post_id, 'brand_name', $brand_name); 
	add_post_meta($post_id, 'model', $model); 
	add_post_meta($post_id, 'serial_no', $serial_no); 
	add_post_meta($post_id, 'applicable', $applicable); 
	add_post_meta($post_id, 'best_price', $best_price); 
	add_post_meta($post_id, 'price_quote', $price_quote); 
	add_post_meta($post_id, 'request', $request);
	add_post_meta($post_id, 'saved_offer', $saved_offer);
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
    	<form action="" method="post" name="parts">
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left;">Your name</div>
				<div style="width:209px; float:left;">
					<input type="text" id="fname" name="fname" value="" style="width: 173px" > </div>
				<div style="width:125px; float:left;">Your code number </div>
				<div style="width:165px; float:left;"><input name="cname" id="cname" value="" type="text" style="width:170px" ></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			<div style="padding-top:5px;">
			
			<div style="width:88px; float:left;text-align:left;">How many </div>
				<div style="width:219px; float:left;text-align:left;">
					<input type="text" id="quantity" name="quantity" value="" style="width:173px;" ></div>
				<div style="width:119px; float:left;text-align:left;">
					Part Name</div>
				<div style="width:170px; float:left;">
					<input type="text" id="part_name" name="part_name" value="" style="width: 170px" ></div>

			
			
			</div>
			
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				For a: year and type of vehicle 
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="type" name="type" value="" style="width: 412px" ></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand name  				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="brand_name" name="brand_name" value="" style="width: 410px" ></div>

			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Model name/number  
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="model" name="model" value="" style="width: 412px" ></div>

			</div>
			

			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Serial number   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" id="serial_no" name="serial_no" value="" style="width: 410px" ></div>

			</div>
			

			<div>
				<div style="width: 183px; float:left;text-align:left;">
				Check if applicable: 
				</div>
				
				<div style="width: 100px; float:left;text-align:left">
					 
						<input checked="checked" name="applicable" type="radio"  value="Aftermarket"/> 
				Aftermarket  
				</div>
				<div style="width: 60px; float:left;">
					 
						<input name="applicable" type="radio" value="OEM" /> 
				OEM				
				</div>
				
				<div style="width: 60px; float:left;">
					 
						<input name="applicable" type="radio" value="Used" /> 
				Used 
								</div>
				<div style="width: 150px; float:left;">
					 
						<input name="applicable" type="radio" value="Remanufactured" /> 
				Remanufactured
								</div>


				
			</div>

			
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information or description (if needed)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_descpt" style="width: 410px; height: 67px"></textarea></div>

			</div>
			<div style="width:100%;text-align:left;">This is an emergency I routine request. <input type="radio" name="request" value="Emergency">Emergency&nbsp;&nbsp;<input type="radio" checked="checked" name="request" value="Routine">Routine&nbsp;&nbsp; </div>
			
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
					<input type="text" name="price_quote" value="" style="width: 121px" readonly="readonly" >
                </div>
			</div>

			<div>
				<div style="float:left;width: 203px; text-align:left;">
				Freight 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" style="width: 121px" readonly="readonly" name="freight" value="" ></div>
			</div>

			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); height: 150px; clear:both;"> <br />For your own information, you should record <br />
				 the date and time you initiated this inquiry.<br />
				 <br>
				 <input class="form-button" type="submit" name="submit" value="Save">&nbsp;<input type="submit" name="submit" value="Submit"  class="form-button" onclick="return validate_parts();">&nbsp;<input class="form-button" type="reset" name="submit" value="Cancel">
			 </div>
			 
			 
			 
			 
		</div>
        </form>
		</center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>