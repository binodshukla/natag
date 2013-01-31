<?php
ob_start();
/**
 * Template Name: Print Request
 * @package WordPress
 * @subpackage natag
 */
?>
<title><?php echo ucfirst($_REQUEST['type']); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
		<?php
			if($_REQUEST['type'] == 'equipment'):
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
        ?>
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
                <div style="width:91px; float:left; padding:10px;">Your name</div>
                <div style="width:137px; float:left; padding:10px;">
				<?php echo $post_name; ?>
                </div>
                <div style="width:125px; float:left; padding:10px;">Your code number </div>
                <div style="width:165px; float:left; padding:10px;">
				<?php echo get_post_meta($id,'code_number',true); ?>
                </div>
            </div>                                 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				How Many 
				</div>
				<div style="width:413px; float:left;text-align:left;">
					<?php echo get_post_meta($id,'quantity',true); ?>
                </div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Brand preference (if any) 				</div>
				<div style="width:413px; float:left;text-align:left;">
					<?php echo get_post_meta($id,'brand_preference',true); ?>
                </div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Item name   
				</div>
				<div style="width:413px; float:left;text-align:left;">
					<?php echo get_post_meta($id,'item_name',true); ?>
                </div>
			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">
				Model name/number  
				</div>
				<div style="width:413px; float:left;text-align:left;">
					<?php echo get_post_meta($id,'model_name',true); ?>
                </div>
			</div>
			<div style="text-align:left;">
				<div style="width:183px; float:left;">Size</div>
				<div style="width:139px; float:left;">
					<?php echo get_post_meta($id,'equip_size',true); ?> 
                </div>
				<div style="width:125px; float:left;">Capacity</div>
				<div style="width:100px; float:left;">
				<?php echo get_post_meta($id,'capacity',true); ?>
                </div>
			</div>
			<div style="clear:both;">
				<div style="float:left; width:182px; text-align:left;">Powered by: PTO/RM  </div>
				<div style="float:left;">
					<?php echo get_post_meta($id,'powered_by',true); ?>
                </div>
				<div style="float:left;">Gas/HP</div>
				<div style="float:left;">
					<?php echo get_post_meta($id,'gas',true); ?>
                 </div>
				<div style="float:left;">Electric/HP </div>
				<div style="float:left;">
					<?php echo get_post_meta($id,'electric',true); ?>
                </div>
				<div style="float:left;">Diesel/HP </div>
				<div style="float:left;">
					<?php echo get_post_meta($id,'diesel',true); ?>
                </div>
			</div>
            <div style="clear:both;"></div>
			<div style="width:182px;text-align:left; float:left;">Do you want New or Used.</div>
			<div style="width:139px;text-align:left; float:left;">
			<?php echo get_post_meta($id,'equip_type',true); ?>
            </div>
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   
				</div>
				<div style="width:413px; float:left;text-align:left;">
					<?php echo $post_content ?>
                </div>
			</div>

			<div>
					<div>
				<div style="float:left;width: 184px; text-align:left;">
				My best local price$   
				</div>
				<div style="width:413px; float:left;text-align:left;">
					<?php echo get_post_meta($id,'local_price',true); ?>
                </div>
			</div>
			</div>
			<div>
				<div style="float:left;width: 183px; text-align:left;">
				National Ag Price Quote $ 
				</div>
				<div style="width:136px; float:left; text-align:left;" class="auto-style2">
					<?php echo get_post_meta($id,'price_quote',true); ?>
                </div>
			</div>
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">
				Additional information   
				</div>
				<div style="width:413px; float:left;text-align:justify;">
					<?php echo get_post_meta($id,'add_info',true); ?>
                </div>
			</div>
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); clear:both;">
 			 </div>
                    <!--  ARTICLE BOX ENDS  -->	
		</div>
	<?php
                }   
    ?>
    </center>				
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->
        <script>
			window.print();
			window.close();
		</script>
		<?php
			elseif($_REQUEST['type'] == 'fertilizer'):
		?>
<div id="primaryinn2">
			<div id="contentinn2" role="main">
	<center>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date,wp_posts.post_content, wp_posts.post_author,wp_posts.post_type from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.ID = '".$_REQUEST['post_id']."' order by wp_posts.ID DESC " );
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_author=$myterms->post_author;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				$post_type=$myterms->post_type;
				$post_content=$myterms->post_content;
				$parent_post_id = $_REQUEST['post_id'];
?>
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left;">Your name</div>
				<div style="width:209px; float:left;">
					<?php echo ucfirst($post_name);?>
                </div>
				<div style="width:125px; float:left;">Your code number </div>
				<div style="width:165px; float:left;"><?php echo get_post_meta($id,'code_number',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">Request Type</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo ucfirst($post_type); ?></div>

			</div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">Item name/composition</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'item_name',true); ?>"</div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Total amount needed</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'quantity',true); ?></div>
            </div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Packaged in quantities of</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'packaged',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Delivery needed by</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'delivery_date',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">Quote needed by</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'quote_date',true); ?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left; width:184px; text-align:left;">How do you use: </div>
                <div style="float:left; text-align:left; width:400px;"><?php echo get_post_meta($id,'use_fertilizer',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">Cost of application if applicable $</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'app_cost',true); ?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional information</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo $post_content;?></div>
			</div>
			
			<div>
                <div>
				<div style="float:left;width: 184px; text-align:left;">My best local price $ </div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'best_price',true); ?></div>
				</div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">National Ag Price Quote $ </div>
				<div style="width:136px; float:left; text-align:left;" class="auto-style2"><?php echo get_post_meta($id,'price_quote',true); ?></div>
			</div>
		
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional information </div>
				<div style="width:413px; float:left;text-align:justify;"><?php echo get_post_meta($id,'add_info',true); ?></div>
			</div>
	 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); clear:both;">
			 </div>
		</div>
<?php
            }   
?>
		</center>				
			</div><!-- #content -->
			<div class="clr"></div>
		</div>
        <script>
			window.print();
			window.close();
		</script>
        <?php
			elseif($_REQUEST['type'] == 'supplies'):
		?>
<div id="primaryinn2">
			<div id="contentinn2" role="main">
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
				$parent_post_id = $_REQUEST['post_id'];
?>
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left; padding:10px;">Your name</div>
				<div style="width:145px; float:left; padding:10px;"><?php echo ucfirst($post_name); ?></div>
				<div style="width:125px; float:left; padding:10px;">Your code number </div>
				<div style="width:99px; float:left; padding:10px;"><?php echo get_post_meta($id,'code_number',true); ?></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			<div>
				<div style="float:left;width: 184px; text-align:left;">How Many</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'quantity',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Brand preference</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'bpref',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Item Name</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'item_name',true); ?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional description</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo $post_content?></div>
			</div>

			<div style="width:227px;text-align:left; float:left;">This is an emergency I routine request.</div>
			<div style="width:322px;text-align:left; float:left;"><?php echo get_post_meta($id,'request',true); ?></div>
				
            <div>
				<div style="float:left;width: 184px; text-align:left;">My best local price $ </div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'best_price',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">National Ag Price Quote $</div>
				<div style="width:136px; float:left; text-align:left" class="auto-style2"><?php echo get_post_meta($id,'price_quote',true); ?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional information</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'add_info',true); ?></div>
			</div>
			 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); clear:both;">
			 </div>
		</div>
<?php
            }   
?>
		</center>				
			</div><!-- #content -->
			<div class="clr"></div>
		</div>        
        <script>
			window.print();
			window.close();
		</script>
		<?php
			elseif($_REQUEST['type'] == 'parts'):
		?>
<div id="primaryinn2">
			<div id="contentinn2" role="main">
	<center>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date,wp_posts.post_content, wp_posts.post_author from wp_posts where wp_posts.post_type='parts' and wp_posts.ID = '".$_REQUEST['post_id']."' order by wp_posts.ID DESC " );
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
?>
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left; padding:10px;">Your name</div>
				<div style="width:145px; float:left; padding:10px;"><?php echo ucfirst($post_name)?></div>
				<div style="width:125px; float:left; padding:10px;">Your code number </div>
				<div style="width:99px; float:left; padding:10px;"><?php echo get_post_meta($id,'code_number',true); ?></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			<div style="padding-top:5px;">
			
			<div style="width:88px; float:left;text-align:left;">How many </div>
				<div style="width:219px; float:left;text-align:left;"><?php echo get_post_meta($id,'quantity',true); ?></div>
				<div style="width:119px; float:left;text-align:left;">Part Name</div>
				<div style="width:170px; float:left; text-align:left;"><?php echo get_post_meta($id,'part_name',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">For a: year and type of vehicle</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'vehicle_type',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Brand name</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'brand_name',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Model name/number</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'model',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">Serial number</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'serial_no',true); ?></div>
			</div>
			
			<div>
				<div style="width: 183px; float:left;text-align:left;">Check if applicable:</div>
                <div style="width: 400px; float:left;text-align:left;"><?php echo get_post_meta($id,'applicable',true);?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional information</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo $post_content;?></textarea></div>
			</div>

			<div style="width:223px; float:left;text-align:left;">This is an emergency I routine request.</div>
            <div style="width:213px; float:left;text-align:left;"><?php echo get_post_meta($id,'request',true);?> </div>
			
			<div>
            <div>
				<div style="float:left;width: 184px; text-align:left;">My best local price $</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'best_price',true); ?></div>
			</div>
			</div>
			
			<div>
				<div style="float:left;width: 183px; text-align:left;">National Ag Price Quote $</div>
				<div style="width:136px; float:left; text-align:left;" class="auto-style2"><?php echo get_post_meta($id,'price_quote',true); ?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional information</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'add_info',true); ?></div>
			</div>
			 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); clear:both;">
			 </div>
		</div>
<?php
            }   
?>
		</center>				
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div>
        <script>
			window.print();
			window.close();
		</script>
		<?php
			elseif($_REQUEST['type'] == 'tire'):
		?>
<div id="primaryinn2">
			<div id="contentinn2" role="main">
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
?>
	 	<div style="border: 1px dotted #C0C0C0; width: 600px; padding-right: 30px; padding-left: 20px; padding-bottom: 50px;font-family:Arial, Helvetica, sans-serif;font-size:12px;">  
            <div style="text-align:left;">
				<div style="width:91px; float:left; padding:10px;">Your name</div>
				<div style="width:145px; float:left; padding:10px;"><?php echo ucfirst($post_name);?></div>
				<div style="width:152px; float:left; padding:10px;">Your code number </div>
				<div style="width:99px; float:left; padding:10px;"><?php echo get_post_meta($id,'code_number',true); ?></div>
			</div>
			 
			<div style="text-align:left;clear:both;"><br />
				<strong>I am looking for:</strong></div>
			
			<div style="padding-top:5px;">
				<div style="width:184px; float:left;text-align:left;">How many </div>
				<div style="width:34px; float:left; text-align:left;"><?php echo get_post_meta($id,'quantity',true); ?></div>
				<div style="width:38px; float:left; text-align:left;">Size</div>
				<div style="width:55px; float:left; text-align:left;"><?php echo get_post_meta($id,'size',true); ?></div>
				<div style="width:99px; float:left; text-align:left;">Radial/Bias</div>
				<div style="width:147px; float:left; text-align:left;"><?php echo get_post_meta($id,'radial',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">Brand preference (if any)</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'bpref',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Model of tire pricing</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'model',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">White/black wall</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'wall',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">Ply</div>
				<div style="width:173px; float:left;text-align:left;"><?php echo get_post_meta($id,'ply',true); ?></div>
                <div style="float:left;width: 84px; " class="auto-style2">Type of tread</div>
				<div style="float:left;text-align:left;" class="auto-style1"><?php echo get_post_meta($id,'tread',true); ?></div>
			</div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">Typical use</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'usage',true); ?></div>
			</div>
			
			<div>
				<div style="float:left;width: 184px; text-align:left;">For a (type of vehicle)</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'vehicles_type',true); ?></div>
			</div>

			<div>
				<div style="width: 184px; float:left;text-align:left;">Do you need tires mounted ?</div>
				<div style="width:350px; float:left;text-align:left;"><?php echo get_post_meta($id,'mounted',true); ?></div>
			</div>

			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Description</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo $post_content ?></div>
			</div>
			
			<div style="clear:both;">
				<div style="float:left;width: 184px; text-align:left;">Additional information</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'add_info',true); ?></div>
			</div>
	 
			<div>
            <div>
				<div style="float:left;width: 184px; text-align:left;">My best local price $</div>
				<div style="width:413px; float:left;text-align:left;"><?php echo get_post_meta($id,'best_price',true); ?></div>
			</div>
			</div>
			
            <div style="clear:both;"></div>

			<div>
				<div style="float:left;width: 184px; text-align:left;">National Ag Price Quote $</div>
				<div style="width:136px; float:left; text-align:left;" class="auto-style2"><?php echo get_post_meta($id,'price_quote',true); ?></div>
			</div>
			 
			 <div style="background-image: url('<?php bloginfo('template_directory'); ?>/images/Form_Fotter.jpg'); clear:both;">
			 </div>
		</div>
<?php
            }   
?>
		</center>
			</div><!-- #content -->
			<div class="clr"></div>
		</div>
        <script>
			window.print();
			//window.close();
		</script>
        <?php	
			endif;
		?>
