<?php
ob_start();
/**
 * Template Name:View Equipment
 * @package WordPress
 * @subpackage natag
 */
?>

		<div id="primaryinn2">
			<div id="contentinn2" role="main">
	<center>
		<?php
                    $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date,wp_posts.post_content, wp_posts.post_author from wp_posts where wp_posts.post_type='equipment' and wp_posts.ID='".$_REQUEST['post_id']."' order by wp_posts.ID DESC " );
                    foreach ( $myrows as $myterms ) 
                    {
                        $id=$myterms->ID;
                        $post_status=$myterms->post_status;
						$post_author=$myterms->post_author;
                        $post_title=$myterms->post_title;
                        $post_name=$myterms->post_name;
                        $post_date=$myterms->post_date;
						$post_content = $myterms->post_content;
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
    	<form action="" method="post" name="equip">
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
                <div style="width:91px; float:left;">Your name</div>
                <div style="width:209px; float:left;">
                    <input type="text" style="width: 173px" name="fname" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo $post_name; ?>" > </div>
                <div style="width:125px; float:left;">Your code number </div>
                <div style="width:165px; float:left;"><input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width:170px" name="cname" value="<?php echo get_post_meta($id,'code_number',true); ?>" ></div>
            </div>                                 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				How Many 
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 412px" name="equip_count" value="<?php echo get_post_meta($id,'quantity',true); ?>" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand preference (if any) 				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 410px" name="bpreference" value="<?php echo get_post_meta($id,'brand_preference',true); ?>" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Item name   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 412px" name="item_name" value="<?php echo get_post_meta($id,'item_name',true); ?>" ></div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Model name/number  
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 412px" name="model_name" value="<?php echo get_post_meta($id,'model_name',true); ?>" ></div>
			</div>
			<div style="text-align:left;">
				<div style="width:91px; float:left;">Size</div>
				<div style="width:209px; float:left;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 173px" name="equip_size" value="<?php echo get_post_meta($id,'equip_size',true); ?>" > </div>
				<div style="width:125px; float:left;">Capacity</div>
				<div style="width:165px; float:left;"><input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width:170px" name="capacity" value="<?php echo get_post_meta($id,'capacity',true); ?>" ></div>
			</div>
			<div style="clear:both;">
				<div style="float:left;">Powered by: PTO/RM  </div>
				<div style="float:left;">
					<input name="powered_by" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'powered_by',true); ?>" type="text" style="width: 65px" /></div>
				<div style="float:left;">Gas/HP</div>
				<div style="float:left;">
					<input name="gas" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'gas',true); ?>" type="text" style="width: 80px" /></div>
				<div style="float:left;">Electric/HP </div>
				<div style="float:left;">
					<input name="electric" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'electric',true); ?>" type="text" style="width: 80px" /></div>
				<div style="float:left;">Diesel/HP </div>
				<div style="float:left;">
					<input name="diesel" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> value="<?php echo get_post_meta($id,'diesel',true); ?>" type="text" style="width: 80px" /></div>
			</div>
            <div style="clear:both;"></div>
			<div style="width:100%;text-align:left;">Do you want New or Used.
            <?php 
			$et = array('New','Used');
			foreach($et as $e)
			{
				if($e == get_post_meta($id,'equip_type',true))
				{
			?> 
                <input checked="checked" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> type="radio" name="equip_type" value="<?php echo $e?>"><?php echo $e?> &nbsp; 
            <?php
				}
				else
				{
			?>
                <input type="radio" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="equip_type" value="<?php echo $e?>"><?php echo $e?> &nbsp; 
            <?php		
				}
            }
			?>
            </div>
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information or description (if needed)   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="descpt" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 410px; height: 67px"><?php echo $post_content ?></textarea></div>
			</div>

			<div>
					<div>
				<div style="float:left;width: 184px; text-align:left;">
				My best local price$   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<input type="text" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> name="local_price" value="<?php echo get_post_meta($id,'local_price',true); ?>" style="width: 412px" ></div>
			</div>
			</div>
			<div>
				<div style="float:left;width: 203px; text-align:left;">
				National Ag Price Quote $ 
				</div>
				<div style="width:136px; float:left;" class="auto-style2">
					<input type="text" readonly="readonly" style="width: 121px" name="national_price" value="<?php echo get_post_meta($id,'price_quote',true); ?>" ></div>
			</div>
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   
				</div>
				<div style="width:413px; float:left;text-align:right;">
					<textarea name="add_info" <?php if($post_status=='sent' || $post_status=='publish'){ echo 'readonly="readonly"';}?> style="width: 410px; height: 67px"><?php echo get_post_meta($id,'add_info',true); ?></textarea></div>
			</div>
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); height: 150px; clear:both;">
 			 </div>
                    <!--  ARTICLE BOX ENDS  -->	
		</div>
        </form>
	<?php
                }   
    ?>
    </center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

