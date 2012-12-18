<?php
/**
 * Template Name:Equipment
 * @package WordPress
 * @subpackage natag
 */

get_header(); 

extract($_POST);
if($submit == 'Send')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	$my_post = array(
	  'post_title'    => $fname,
	  'post_name'    => $fname,
	  'post_content'  => $descpt,
	  'post_status'   => 'draft',
	  'comment_status'=> 'closed',
	  'post_author'   => $user_id,
//	  'post_category' => array($brand,$model),
	  'post_type'     => 'equipment',
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

	$gurl = $url."/?equip=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'equip_count', $equip_count); 
	add_post_meta($post_id, 'brand_preference', $bpreference); 
	add_post_meta($post_id, 'item_name', $item_name); 
	add_post_meta($post_id, 'model_name', $model_name); 
	add_post_meta($post_id, 'equip_size', $equip_size); 
	add_post_meta($post_id, 'capacity', $capacity); 
	add_post_meta($post_id, 'powered_by', $powered_by); 
	add_post_meta($post_id, 'gas', $gas); 
	add_post_meta($post_id, 'electric', $electric); 
	add_post_meta($post_id, 'diesel', $diesel); 
	add_post_meta($post_id, 'equip_type', $equip_type); 
	add_post_meta($post_id, 'add_info', $descpt); 
	add_post_meta($post_id, 'request', $request); 
	add_post_meta($post_id, 'local_price', $local_price); 
	add_post_meta($post_id, 'national_price', $national_price); 
	add_post_meta($post_id, 'saved_offer', $saved_offer); 
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	
	header("Location:".$url."/?page_id=".$page_id);
}
elseif($submit == 'Save')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	$my_post = array(
	  'post_title'    => $fname,
	  'post_name'    => $fname,
	  'post_content'  => $descpt,
	  'post_status'   => 'draft',
	  'comment_status'=> 'closed',
	  'post_author'   => $user_id,
//	  'post_category' => array($brand,$model),
	  'post_type'     => 'equipment',
	  'post_author'   => 1,
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

	$gurl = $url."/?equip=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'code_number', $cname); 
	add_post_meta($post_id, 'equip_count', $equip_count); 
	add_post_meta($post_id, 'brand_preference', $bpreference); 
	add_post_meta($post_id, 'item_name', $item_name); 
	add_post_meta($post_id, 'model_name', $model_name); 
	add_post_meta($post_id, 'equip_size', $equip_size); 
	add_post_meta($post_id, 'capacity', $capacity); 
	add_post_meta($post_id, 'powered_by', $powered_by); 
	add_post_meta($post_id, 'gas', $gas); 
	add_post_meta($post_id, 'electric', $electric); 
	add_post_meta($post_id, 'diesel', $diesel); 
	add_post_meta($post_id, 'equip_type', $equip_type); 
	add_post_meta($post_id, 'add_info', $descpt); 
	add_post_meta($post_id, 'request', $request); 
	add_post_meta($post_id, 'local_price', $local_price); 
	add_post_meta($post_id, 'national_price', $national_price); 
	add_post_meta($post_id, 'saved_offer', $saved_offer); 
	add_post_meta($post_id, 'add_info', $add_info);
	add_post_meta($post_id, 'form_submit', $submit);
	
	header("Location:".$url."/?page_id=".$page_id);
}
?>

		<div id="primaryinn">
		<div id="leftsilde">
		<div class="cat">
		<h3>Categories</h3>
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
    	<form action="" method="post" name="equip">
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
                <div style="width:91px; float:left;">Your name</div>
                <div style="width:209px; float:left;">
                    <input type="text" style="width: 173px" name="fname" value="" > </div>
                <div style="width:125px; float:left;">Your code number </div>
                <div style="width:165px; float:left;"><input type="text" style="width:170px" name="cname" value="" ></div>
            </div>                                 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				How Many 
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" style="width: 412px" name="equip_count" value="" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand preference (if any) 				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" style="width: 410px" name="bpreference" value="" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Item name   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" style="width: 412px" name="item_name" value="" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Model name/number  
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" style="width: 412px" name="model_name" value="" ></div>
			</div>
			<div style="text-align:left;">
				<div style="width:91px; float:left;">Size</div>
				<div style="width:209px; float:left;">
					<input type="text" style="width: 173px" name="equip_size" value="" > </div>
				<div style="width:125px; float:left;">Capacity</div>
				<div style="width:165px; float:left;"><input type="text" style="width:170px" name="capacity" value="" ></div>
			</div>
			<div style="clear:both;">
				<div style="float:left;">Powered by: PTO/RM  </div>
				<div style="float:left;">
					<input name="powered_by" value="" type="text" style="width: 65px" /></div>
				<div style="float:left;">Gas/HP</div>
				<div style="float:left;">
					<input name="gas" value="" type="text" style="width: 80px" /></div>
				<div style="float:left;">Electric/HP </div>
				<div style="float:left;">
					<input name="electric" value="" type="text" style="width: 80px" /></div>
				<div style="float:left;">Diesel/HP </div>
				<div style="float:left;">
					<input name="diesel" value="" type="text" style="width: 80px" /></div>
			</div>
			<div style="width:100%;text-align:left;">Do you want New or Used. <input type="radio" name="equip_type" value="New">New &nbsp; <input type="radio" name="equip_type" value="Used">Used</div>
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information or description (if needed)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="descpt" style="width: 410px; height: 67px"></textarea></div>
			</div>
			<div style="width:100%;text-align:left;">This is an emergency / routine request. <input type="radio" name="request" value="Emergency">Emergency &nbsp; <input type="radio" name="request" value="Routine">Routine</div>
			<div>
					<div>
				<div style="float:left;width: 184px; text-align:left;">
				My best local price$   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" name="local_price" value="" style="width: 412px" ></div>
			</div>
			</div>
			<div>
				<div style="float:left;width: 203px; text-align:left;">
				National Ag Price Quote $ 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" style="width: 121px" name="national_price" value="" ></div>
					<div style="float:left;width: 117px; " class="auto-style2">
				Savings offered $				</div>
				<div style="  float:right;text-align:right; width: 138px;" class="auto-style1">
					<input type="text" style="width: 104px" name="saved_offer" value="" ></div>
			</div>
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>">
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_info" style="width: 410px; height: 67px"></textarea></div>
			</div>
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); height: 150px; clear:both;">
			 For your own information, you should record <br />
				 the date and time you initiated this inquiry.<br />
				 <br>
				 <input type="submit" name="submit" value="Save">&nbsp;<input type="submit" name="submit" value="Send">&nbsp;<input type="reset" name="submit" value="Cancel">
 			 </div>
                    <!--  ARTICLE BOX ENDS  -->	
		</div>
        </form>
    </center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>