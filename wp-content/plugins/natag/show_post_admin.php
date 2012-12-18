<?php
	error_reporting(0);
	global $wpdb;
?>
  		<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="15">&nbsp;
                	
                </td>
            </tr>
            <tr>
            	<th align="center" colspan="15" style="border-bottom:1px solid #333;">
                	<span style="font-size:17px; font-family:Arial, Helvetica, sans-serif; color:#333;">All Equipments</span>
                </th>
            </tr>
			<tr>
            	<td colspan="15">&nbsp;
                	
                </td>
            </tr>
       		<tr>
            	<th align="center" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Sno.
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Name
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Code No.
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Quantity
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Brand preference
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Item name
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Model name/number
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Size
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Capacity
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Request
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Best local price$
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	National Ag Price Quote $
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Savings offered $
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name from wp_posts where wp_posts.post_type='equipment' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
?>
			<form action="" method="post" name="video">
       		<tr>
            	<td align="center" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;">
                	<?php echo $ct;?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo $post_name; ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'equip_count',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'brand_preference',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'item_name',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'model_name',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'equip_size',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'capacity',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'request',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'local_price',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'national_price',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-right:1px solid #333;">
					<?php echo get_post_meta($id,'saved_offer',true); ?>
                </td>
            </tr>
            </form>
				
<?php
			$ct++;
            }   
?>
        </table>



