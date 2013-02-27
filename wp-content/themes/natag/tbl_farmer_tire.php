<?php
ob_start();
/**
 * Template Name: View Tire
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
extract($_POST);
if($submit == 'Submit')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	
	$my_post = array();
	$my_post['ID'] = $_REQUEST['post_id'];
	$my_post['post_title']    = $fname;
	$my_post['post_name']    = $fname;
	$my_post['post_content']  = $add_descpt;
	$my_post['post_status']   = 'sent';
	// Update the post into the database
	$post_id=wp_update_post( $my_post,  $wp_error );

	update_post_meta($_REQUEST['post_id'], 'code_number', $cname); 
	update_post_meta($_REQUEST['post_id'], 'quantity', $quantity); 
	update_post_meta($_REQUEST['post_id'], 'size', $size); 
	update_post_meta($_REQUEST['post_id'], 'radial', $radial); 
	update_post_meta($_REQUEST['post_id'], 'bpref', $bpref); 
	update_post_meta($_REQUEST['post_id'], 'model', $model); 
	update_post_meta($_REQUEST['post_id'], 'wall', $wall); 
	update_post_meta($_REQUEST['post_id'], 'ply', $ply); 
	update_post_meta($_REQUEST['post_id'], 'tread', $tread); 
	update_post_meta($_REQUEST['post_id'], 'usage', $usage); 
	update_post_meta($_REQUEST['post_id'], 'vehicles_type', $vehicles_type); 
	update_post_meta($_REQUEST['post_id'], 'mounted', $mounted); 
	update_post_meta($_REQUEST['post_id'], 'price_quote', $price_quote);
	update_post_meta($_REQUEST['post_id'], 'best_price', $best_price);
	update_post_meta($_REQUEST['post_id'], 'saved_offer', $saved_offer);
	update_post_meta($_REQUEST['post_id'], 'add_info', $add_info);
	update_post_meta($_REQUEST['post_id'], 'form_submit', $submit);
	update_post_meta($_REQUEST['post_id'], 'request_status', 'pending');
	update_post_meta($_REQUEST['post_id'], 'request_date', date('m/d/Y'));
	update_post_meta($post_id, 'freight', $freight);
	
	$user_info = get_userdata(1);
	$to = $user_info->user_email;
	$uname = ucfirst($user_info->user_nicename);
	$subject = "Tire Request Notification";
	$message = get_option('admin_request_from_farmer');
	$message = str_replace('$name',$uname,$message);
	$message = str_replace('$requestname','Tire',$message);
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
	$my_post = array();
	$my_post['ID'] = $_REQUEST['post_id'];
	$my_post['post_title']    = $fname;
	$my_post['post_name']    = $fname;
	$my_post['post_content']  = $add_descpt;
	// Update the post into the database
	$post_id=wp_update_post( $my_post,  $wp_error );

	update_post_meta($_REQUEST['post_id'], 'code_number', $cname); 
	update_post_meta($_REQUEST['post_id'], 'quantity', $quantity); 
	update_post_meta($_REQUEST['post_id'], 'size', $size); 
	update_post_meta($_REQUEST['post_id'], 'radial', $radial); 
	update_post_meta($_REQUEST['post_id'], 'bpref', $bpref); 
	update_post_meta($_REQUEST['post_id'], 'model', $model); 
	update_post_meta($_REQUEST['post_id'], 'wall', $wall); 
	update_post_meta($_REQUEST['post_id'], 'ply', $ply); 
	update_post_meta($_REQUEST['post_id'], 'tread', $tread); 
	update_post_meta($_REQUEST['post_id'], 'usage', $usage); 
	update_post_meta($_REQUEST['post_id'], 'vehicles_type', $vehicles_type); 
	update_post_meta($_REQUEST['post_id'], 'mounted', $mounted); 
	update_post_meta($_REQUEST['post_id'], 'price_quote', $price_quote);
	update_post_meta($_REQUEST['post_id'], 'best_price', $best_price);
	update_post_meta($_REQUEST['post_id'], 'saved_offer', $saved_offer);
	update_post_meta($_REQUEST['post_id'], 'add_info', $add_info);
	update_post_meta($_REQUEST['post_id'], 'form_submit', $submit);
	update_post_meta($_REQUEST['post_id'], 'request_status', 'pending');
	update_post_meta($_REQUEST['post_id'], 'request_date', date('m/d/Y'));
	update_post_meta($post_id, 'freight', $freight);
	
	header("Location:".$url."/?page_id=506");
	//header("Location:".$url."/?page_id=455&type=tire");
}
elseif($submit == "Generate Purchase Order")
{
	$url = get_option('siteurl');
	header("Location:".$url."/?page_id=494&post_id=".$_REQUEST['post_id']);
}
?>

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
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date,wp_posts.post_content, wp_posts.post_author from wp_posts where wp_posts.post_type='tire' and wp_posts.ID = '".$_REQUEST['post_id']."' order by wp_posts.ID DESC " );
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_author=$myterms->post_author;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				$post_content=$myterms->post_content;
				$parent_post_id = $_REQUEST['post_id'];
				$args = array(
				'numberposts' => 1,
				'post_parent' => $parent_post_id,
				'post_type' => 'purchaseorder'
				);
				$child_post = get_children( $args );
				foreach($child_post as $child)
				{
					$parent_id = $child->post_parent;
				}
				
?>
    	<form action="" method="post" name="parts">
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left;">Your name</div>
				<div style="width:209px; float:left;">
					<input type="text" name="fname" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo $post_name?>" style="width: 173px" > </div>
				<div style="width:152px; float:left;">Your code number </div>
				<div style="width:140px; float:left;"><input name="cname" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'code_number',true); ?>" type="text" ></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			<div style="padding-top:5px;">
			
			<div style="width:79px; float:left;text-align:left;">How many </div>
				<div style="width:141px; float:left;">
					<input type="text" name="quantity" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'quantity',true); ?>"  style="width: 40px"></div>
				<div style="width:38px; float:left;">
					Size</div>
				<div style="width:92px; float:left;">
					<input type="text" name="size" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'size',true); ?>" style="width: 91px" ></div>
				<div style="width:99px; float:left;">
					Radial/Bias</div>
				<div style="width:147px; float:left;">
					<input type="text" name="radial" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'radial',true); ?>" ></div>

			
			
			</div>
			
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand preference (if any) 
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="bpref" value="<?php echo get_post_meta($id,'bpref',true); ?>" style="width: 412px" ></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Model of tire pricing   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="model" value="<?php echo get_post_meta($id,'model',true); ?>" style="width: 410px" ></div>

			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">
				White/black wall    
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="wall" value="<?php echo get_post_meta($id,'wall',true); ?>" style="width: 412px" ></div>

			</div>
			
			<div>
				<div style="float:left;width: 47px; text-align:left;">
				Ply      
				</div>
				<div style="width:235px; float:left;text-align:left;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="ply" value="<?php echo get_post_meta($id,'ply',true); ?>" style="width: 200px; float:left; text-align:left;" ></div>
					<div style="float:left;width: 84px; " class="auto-style2">
				Type of tread  				</div>
				<div style="  float:right;text-align:right;" class="auto-style1">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="tread" value="<?php echo get_post_meta($id,'tread',true); ?>" style="width: 227px" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Typical use   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="usage" value="<?php echo get_post_meta($id,'usage',true); ?>" style="width: 410px" ></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				For a (type of vehicle)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="vehicles_type" value="<?php echo get_post_meta($id,'vehicles_type',true); ?>" style="width: 403px" ></div>

			</div>


			<div>
				<div style="width: 250px; float:left;text-align:left;">
				Do you need tires mounted? 
				</div>
                <?php $mountedarray = array('Yes','No');
					foreach($mountedarray as $ma)
					{
						if($ma == get_post_meta($id,'mounted',true))
						{
							echo '<div style="width: 50px; float:left;">
								 <input checked="checked" name="mounted" value="'.$ma.'" type="radio" />'.$ma.'
								 </div>';
						}
						else
						{
							echo '<div style="width: 50px; float:left;">
								 <input name="mounted" value="'.$ma.'" type="radio" />'.$ma.'
								 </div>';
						}	
					}
				?>
			</div>

			
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Description   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_descpt" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 410px; height: 67px"><?php echo $post_content ?></textarea></div>

			</div>
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_info" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 410px; height: 67px"><?php echo get_post_meta($id,'add_info',true); ?></textarea></div>

			</div>
	 
			<div>
            <div>
				<div style="float:left;width: 184px; text-align:left;">
				Client's price$   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="best_price" value="<?php echo get_post_meta($id,'best_price',true); ?>" style="width: 412px">
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
				<div style="width:336px; float:left;" class="auto-style2">
					<input type="text" name="price_quote" value="<?php echo get_post_meta($id,'price_quote',true); ?>" style="width: 121px" readonly="readonly" >
                </div>
			</div>
			 
			<div>
				<div style="float:left;width: 203px; text-align:left;">
				Freight 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" style="width: 121px" readonly="readonly" name="freight" value="<?php echo get_post_meta($id,'freight',true);?>" ></div>
			</div>

			 <div style="height:50px; clear:both;">
             	<?php 
				if(get_post_meta($id,'form_submit',true) == 'Save')
				{	
				?>
                    <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>">
                    <input type="hidden" name="user_id" value="<?php echo $post_author?>">				
                    <input type="hidden" name="post_id" value="<?php echo $_REQUEST['post_id'] ?>">
                    <input type="submit" class="form-button" name="submit" value="Submit" onclick="return confirm('Are you sure want to submit ?')">
                    <input type="submit" class="form-button" name="submit" value="Save">
					<input type="button" class="form-button" name="button" onClick="javascript:history.go(-1)" value="Back">
                <?php
				}
				elseif(get_post_meta($id,'request_status',true) == 'completed')
				{
					if($id != $parent_id)
					{
				?>
					<input type="submit" class="form-button" name="submit" value="Generate Purchase Order">
					 <input type="hidden" name="post_id" value="<?php echo $_REQUEST['post_id'] ?>">
					<input type="button" class="form-button" name="button" onClick="javascript:history.go(-1)" value="Back">
                <?php
					}
					else
					{
				?>	
                	<strong>Purchase Order Already Generated</strong>&nbsp;
					<input type="button" class="form-button" name="button" onClick="javascript:history.go(-1)" value="Back">
				<?php
                	}
				}
				else
				{
				?>
					<input type="button" class="form-button" name="button" onClick="javascript:history.go(-1)" value="Back">
                <?php
                }
				?>
			 </div>
			 
				<?php
                if(get_post_meta($id,'request_status',true) == 'completed')
                {
					if($id != $parent_id)
					{
				?>
                <div class="customer_address">
                    <ul>
                        <li>
                            <input type="checkbox" name="terms" required="required" value="1" />
                            By checking this box you agree to the 
                            <a href="<?php bloginfo('url')?>/?page_id=731/">Terms and conditions</a>
                        </li>
                    </ul>
                </div>			
                <?php
					}
				}
				?>		
			 
			 
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