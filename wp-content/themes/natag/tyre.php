<?php
ob_start();
/**
 * Template Name:Tyre
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
	  'post_type'     => 'tire',
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

	$gurl = $url."/?tyre=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'quantity', $quantity); 
	add_post_meta($post_id, 'size', $size); 
	add_post_meta($post_id, 'radial', $radial); 
	add_post_meta($post_id, 'bpref', $bpref); 
	add_post_meta($post_id, 'model', $model); 
	add_post_meta($post_id, 'wall', $wall); 
	add_post_meta($post_id, 'ply', $ply); 
	add_post_meta($post_id, 'tread', $tread); 
	add_post_meta($post_id, 'usage', $usage); 
	add_post_meta($post_id, 'vehicles_type', $vehicles_type); 
	add_post_meta($post_id, 'mounted', $mounted); 
	add_post_meta($post_id, 'price_quote', $price_quote);
	add_post_meta($post_id, 'best_price', $best_price);
	add_post_meta($post_id, 'saved_offer', $saved_offer);
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	add_post_meta($post_id, 'request_status', 'pending');
	add_post_meta($post_id, 'request_date', date('m/d/Y'));
	
	$to = get_option('admin_email');
	$subject = "Tire Request Notification";
	$message = "You have recieve a new Tire Request, Please check you Admin";
	$headers = 'From: National AG';
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
	  'post_type'     => 'tire',
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

	$gurl = $url."/?tyre=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'quantity', $quantity); 
	add_post_meta($post_id, 'size', $size); 
	add_post_meta($post_id, 'radial', $radial); 
	add_post_meta($post_id, 'bpref', $bpref); 
	add_post_meta($post_id, 'model', $model); 
	add_post_meta($post_id, 'wall', $wall); 
	add_post_meta($post_id, 'ply', $ply); 
	add_post_meta($post_id, 'tread', $tread); 
	add_post_meta($post_id, 'usage', $usage); 
	add_post_meta($post_id, 'vehicles_type', $vehicles_type); 
	add_post_meta($post_id, 'mounted', $mounted); 
	add_post_meta($post_id, 'price_quote', $price_quote);
	add_post_meta($post_id, 'best_price', $best_price);
	add_post_meta($post_id, 'saved_offer', $saved_offer);
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	add_post_meta($post_id, 'request_date', date('m/d/Y'));
	
	
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
					<input type="text" name="fname" value="" style="width: 173px" > </div>
				<div style="width:152px; float:left;">Your code number </div>
				<div style="width:140px; float:left;"><input name="cname" value="" type="text" ></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			<div style="padding-top:5px;">
			
			<div style="width:79px; float:left;text-align:left;">How many </div>
				<div style="width:141px; float:left;">
					<input type="text" name="quantity" value="" ></div>
				<div style="width:38px; float:left;">
					Size</div>
				<div style="width:92px; float:left;">
					<input type="text" name="size" value="" style="width: 91px" ></div>
				<div style="width:99px; float:left;">
					Radial/Bias</div>
				<div style="width:147px; float:left;">
					<input type="text" name="radial" value="" ></div>

			
			
			</div>
			
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand preference (if any) 
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="bpref" value="" style="width: 412px" ></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Model of tire pricing   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="model" value="" style="width: 410px" ></div>

			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">
				White/black wall    
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="wall" value="" style="width: 412px" ></div>

			</div>
			
			<div>
				<div style="float:left;width: 47px; text-align:left;">
				Ply      
				</div>
				<div style="width:235px; float:left;text-align:right;">
					<input type="text" name="ply" value="" style="width: 224px" ></div>
					<div style="float:left;width: 84px; " class="auto-style2">
				Type of tread  				</div>
				<div style="  float:right;text-align:right;" class="auto-style1">
					<input type="text" name="tread" value="" style="width: 227px" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Typical use   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="usage" value="" style="width: 410px" ></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				For a (type of vehicle)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="vehicles_type" value="" style="width: 403px" ></div>

			</div>


			<div>
				<div style="width: 250px; float:left;text-align:left;">
				Do you need tires mounted? 
				</div>
				<div style="width: 49px; float:left;">
					 
						<input checked="checked" name="mounted" value="No" type="radio" /> 
				No
				</div>
				<div style="width: 63px; float:left;">
					 
						<input name="mounted" value="Yes" type="radio" /> 
				Yes
				</div>
			</div>

			
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Description   
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
					<input type="text" name="best_price" value="" style="width: 412px">
                </div>
			</div>
			</div>
			
            <div style="clear:both;"></div>

			<div style="text-align:left;clear:both;">
				<strong>For official use only:</strong>
            </div>

			<div>
				<div style="float:left;width: 203px; text-align:left;">
				National Ag Price Quote $ 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" name="price_quote" value="" style="width: 121px" readonly="readonly" >
                </div>
			</div>
			 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); height: 150px; clear:both;">
			 <br />For your own information, you should record <br />
				 the date and time you initiated this inquiry.<br />
				 <br>
				 <input type="submit" name="submit" value="Save" class="form-button">&nbsp;<input class="form-button" type="submit" name="submit" value="Submit" onclick="return confirmSubmit();">&nbsp;<input type="reset" name="submit" value="Cancel"  class="form-button">
			 </div>
			 
			 
			 
			 
		</div>
        </form>
		</center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>