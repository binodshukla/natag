<?php
/**
 *
 * @package WordPress
 * @subpackage natag
 * Template Name:List Save
 */

get_header();
  wp_get_current_user();
  get_currentuserinfo() ;
  global $user_level; 
  global $wpdb;
  if($_REQUEST['delete'] == 'Delete')
  {
		  wp_delete_post( $_REQUEST['post_id']);
  }
  ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

		<div id="primaryinn">
		<div id="leftsilde">
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
		<?php //include("catmenu.php"); ?>
		<?php //dynamic_sidebar('Inner Page Sidebar'); ?>
		
		<?php //wp_list_categories('hierarchical' => true,); ?>
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
  
                          
                               <?php if ( is_user_logged_in() ) {
								if($_REQUEST['type'] == 'chemical') {   
							   ?>
            <table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="15">&nbsp;
                	
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="chemcheck" value="delete" />
                </th>
            	<th align="left" class="listtd">
                	Name
                </th>
            	<th align="left" class="listtd">
                	Code No.
                </th>
            	<th align="left" class="listtd">
                	Item name
                </th>
            	<th align="left" class="listtd">
                	Quantity
                </th>
            	<th align="left" class="listtd">
                	Request
                </th>
            	<th align="left" class="listtd">
                	Status
                </th>
            	<th align="left" class="listtd">
                	Date
                </th>
            	<th align="left" class="listtdlast">
                	Action
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='chemical' and wp_posts.post_status = 'draft' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				if(get_post_meta($id,'form_submit',true) == 'Save')
				{
?>
			<form action="" method="post" name="video">
       		<?php
			if($ct%2 == 0)
			{
			?>
            <tr class="odd">
            <?php
			}
			else
			{
			?>
            <tr class="even">
            <?php	
			}
			?>
            	<td align="center" class="listtd">
                	<input type="checkbox" name="chem[<?php echo $ct?>]" value="<?php echo $id?>" />
                </td>
            	<td align="left" class="listtd">
                	<?php echo $post_name; ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'item_name',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'total_amount',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_status',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
					<a href="<?php echo get_option('siteurl')?>/?page_id=411&post_id=<?php echo $id?>">View Request</a>&nbsp;|&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="delete" value="Delete" />
                </td>
            </tr>
            </form>
				
<?php
			$ct++;
				}
            }   
?>
        </table>
                               <?php
								}
								elseif($_REQUEST['type'] == 'equipment')
								{
?>
        <table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
            <tr>
                <td colspan="15">&nbsp;
                    
                </td>
            </tr>
            <tr class="listtable">
                <th align="center" class="listtd">
            <input type="checkbox" name="equipcheck" value="delete" />
                </th>
                <th align="left" class="listtd">
                    Name
                </th>
                <th align="left" class="listtd">
                    Code No.
                </th>
                <th align="left" class="listtd">
                    Quantity
                </th>
                <th align="left" class="listtd">
                    Item name
                </th>
                <th align="left" class="listtd">
                    Model
                </th>
                <th align="left" class="listtd">
                    Request
                </th>
                <th align="left" class="listtd">
                    Status
                </th>
                <th align="left" class="listtd">
                    Date
                </th>
                <th align="left" class="listtdlast">
                    Action
                </th>
            </tr>
            <?php
            $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_status = 'draft' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
                $id=$myterms->ID;
                $post_status=$myterms->post_status;
                $post_title=$myterms->post_title;
                $post_name=$myterms->post_name;
                $post_date=$myterms->post_date;
                if(get_post_meta($id,'form_submit',true) == 'Save')
                {
            ?>
            <form action="" method="post" name="requestequip">
            <?php
            if($ct%2 == 0)
            {
            ?>
            <tr class="odd">
            <?php
            }
            else
            {
            ?>
            <tr class="even">
            <?php	
            }
            ?>
                <td align="center" class="listtd">
                <input type="checkbox" name="equip[<?php echo $ct?>]" value="<?php echo $id?>" />
                </td>
                <td align="left" class="listtd">
                    <?php echo $post_name; ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'code_number',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'equip_count',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'item_name',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'model_name',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'request',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'request_status',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'request_date',true); ?>
                </td>
                <td align="left" class="listtdlast">
                    <a href="<?php echo get_option('siteurl')?>/?page_id=398&post_id=<?php echo $id?>">View Request</a>&nbsp;|&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="delete" value="Delete" />
                </td>
            </tr>
            </form>
                
            <?php
            $ct++;
                }
            }   
            ?>
            </table>
<?php									
								}
								elseif($_REQUEST['type'] == 'fertilizer')
								{
?>
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="15">&nbsp;
                	
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="fertcheck" value="delete" />
                </th>
            	<th align="left" class="listtd">
                	Name
                </th>
            	<th align="left" class="listtd">
                	Code No.
                </th>
            	<th align="left" class="listtd">
                	Item name
                </th>
            	<th align="left" class="listtd">
                	Quantity
                </th>
            	<th align="left" class="listtd">
                	Request
                </th>
            	<th align="left" class="listtd">
                	Status
                </th>
            	<th align="left" class="listtd">
                	Date
                </th>
            	<th align="left" class="listtdlast">
                	Action
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='fertilizer' and wp_posts.post_status = 'draft' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				if(get_post_meta($id,'form_submit',true) == 'Save')
				{
?>
			<form action="" method="post" name="video">
       		<?php
			if($ct%2 == 0)
			{
			?>
            <tr class="odd">
            <?php
			}
			else
			{
			?>
            <tr class="even">
            <?php	
			}
			?>
            	<td align="center" class="listtd">
                	<input type="checkbox" name="fert[<?php echo $ct?>]" value="<?php echo $id?>" />
                </td>
            	<td align="left" class="listtd">
                	<?php echo $post_name; ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'item_name',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'total_amount',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo ucfirst(get_post_meta($id,'request_status',true)); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
					<a href="<?php echo get_option('siteurl')?>/?page_id=402&post_id=<?php echo $id?>">View Request</a>&nbsp;|&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="delete" value="Delete" />
                </td>
            </tr>
            </form>
				
<?php
			$ct++;
				}
            }   
?>
        </table>
<?php									
								}
								elseif($_REQUEST['type'] == 'supplies')
								{
?>
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="15">&nbsp;
                	
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="supplicheck" value="delete" />
                </th>
            	<th align="left" class="listtd">
                	Name
                </th>
            	<th align="left" class="listtd">
                	Code No.
                </th>
            	<th align="left" class="listtd">
                	Quantity
                </th>
            	<th align="left" class="listtd">
                	Item Name 
                </th>
            	<th align="left" class="listtd">
                	Request
                </th>
            	<th align="left" class="listtd">
                	Status
                </th>
            	<th align="left" class="listtd">
                	Date
                </th>
            	<th align="left" class="listtdlast">
                	Action
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_status = 'draft' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				if(get_post_meta($id,'form_submit',true) == 'Save')
				{
?>
			<form action="" method="post" name="video">
       		<?php
			if($ct%2 == 0)
			{
			?>
            <tr class="odd">
            <?php
			}
			else
			{
			?>
            <tr class="even">
            <?php	
			}
			?>
            	<td align="center" class="listtd">
                	<input type="checkbox" name="supply[<?php echo $ct?>]" value="<?php echo $id?>" />
                </td>
            	<td align="left" class="listtd">
                	<?php echo $post_name; ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'quantity',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'item_name',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_status',true); ?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
					<a href="<?php echo get_option('siteurl')?>/?page_id=417&post_id=<?php echo $id?>">View Request</a>&nbsp;|&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="delete" value="Delete" />
                </td>
            </tr>
            </form>
				
<?php
			$ct++;
				}
            }   
?>
        </table>
<?php									
								}
								elseif($_REQUEST['type'] == 'parts')
								{
?>
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="15">&nbsp;
                	
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="partcheck" value="delete" />
                </th>
            	<th align="left" class="listtd">
                	Name
                </th>
            	<th align="left" class="listtd">
                	Code No.
                </th>
            	<th align="left" class="listtd">
                	Quantity
                </th>
            	<th align="left" class="listtd">
                	Part Name
                </th>
            	<th align="left" class="listtd">
                	Model
                </th>
            	<th align="left" class="listtd">
                	Status
                </th>
            	<th align="left" class="listtd">
                	Date
                </th>
            	<th align="left" class="listtdlast">
                	Action
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='parts' and wp_posts.post_status = 'draft' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				if(get_post_meta($id,'form_submit',true) == 'Save')
				{
?>
			<form action="" method="post" name="video">
       		<?php
			if($ct%2 == 0)
			{
			?>
            <tr class="odd">
            <?php
			}
			else
			{
			?>
            <tr class="even">
            <?php	
			}
			?>
            	<td align="center" class="listtd">
                	<input type="checkbox" name="part[<?php echo $ct?>]" value="<?php echo $id?>" />
                </td>
            	<td align="left" class="listtd">
                	<?php echo $post_name; ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'quantity',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'part_name',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'model',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_status',true); ?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
					<a href="<?php echo get_option('siteurl')?>/?page_id=414&post_id=<?php echo $id?>">View Request</a>&nbsp;|&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="delete" value="Delete" />
                </td>
            </tr>
            </form>
				
<?php
			$ct++;
				}
            }   
?>
        </table>
<?php									
								}
								elseif($_REQUEST['type'] == 'tyre')
								{
?>
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="18">&nbsp;
                	
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="tyrecheck" value="delete" />
                </th>
            	<th align="left" class="listtd">
                	Name
                </th>
            	<th align="left" class="listtd">
                	Code No.
                </th>
            	<th align="left" class="listtd">
                	Quantity
                </th>
            	<th align="left" class="listtd">
                	Model
                </th>
            	<th align="left" class="listtd">
                	Vehicle Type
                </th>
            	<th align="left" class="listtd">
                	Status
                </th>
            	<th align="left" class="listtd">
                	Date
                </th>
            	<th align="left" class="listtdlast">
                	Action
                </th>
            </tr>
<?php
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='tyre' and wp_posts.post_status = 'Save' order by wp_posts.ID DESC " );
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
				if(get_post_meta($id,'form_submit',true) == 'Save')
				{
?>
			<form action="" method="post" name="video">
       		<?php
			if($ct%2 == 0)
			{
			?>
            <tr class="odd">
            <?php
			}
			else
			{
			?>
            <tr class="even">
            <?php	
			}
			?>
            	<td align="center" class="listtd">
                	<input type="checkbox" name="tyre[<?php echo $ct?>]" value="<?php echo $id?>" />
                </td>
            	<td align="left" class="listtd">
                	<?php echo $post_name; ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'code_number',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'quantity',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'model',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'vehicles_type',true); ?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_status',true); ?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
					<a href="#">View Request</a>&nbsp;|&nbsp;
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="delete" value="Delete" />
                </td>
            </tr>
            </form>
				
<?php
			$ct++;
				}
            }   
?>
        </table>
<?php									
								}
                                } ?>
							<div class="editprofilecn">
					      	<?php /* Page Content */  the_content(); ?>	
							</div>							
							<?php endwhile; else: ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
						
					   
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
						
		
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->

<?php get_footer(); ?>