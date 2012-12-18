<?php
	error_reporting(0);
	global $wpdb;
?>
  		<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="18">&nbsp;
                	
                </td>
            </tr>
            <tr>
            	<th align="center" colspan="18" style="border-bottom:1px solid #333;">
                	<span style="font-size:17px; font-family:Arial, Helvetica, sans-serif; color:#333;">All Tyre</span>
                </th>
            </tr>
			<tr>
            	<td colspan="18">&nbsp;
                	
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
                	Size
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Radial/Bias
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Brand preference 
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Model of tire pricing
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Tube/tubeless
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Wall
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Ply
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Tread
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Typical use 
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Type of vehicle
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Mounted
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Best Price $
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	National Ag Price Quote $
                </th>
            	<th align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-left:1px solid #333;border-top:1px solid #333;">
                	Savings offered $
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name from wp_posts where wp_posts.post_type='tyre' order by wp_posts.ID DESC " );
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
                	<?php echo get_post_meta($id,'quantity',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'size',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'radial',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'bpref',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'model',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'tyre_type',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'wall',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'ply',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'tread',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'usage',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'vehicles_type',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'mounted',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;">
                	<?php echo get_post_meta($id,'best_price',true); ?>
                </td>
            	<td align="left" style="padding:5px 0 5px 5px;border-bottom:1px solid #333;border-right:1px solid #333;">
					<?php echo get_post_meta($id,'price_quote',true); ?>
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



