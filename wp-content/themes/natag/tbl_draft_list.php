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
  $user_id = get_current_user_id();
  global $user_level; 
  global $wpdb;
  if($_REQUEST['delete'] == 'DELETE')
  {
	if (isset($_REQUEST['chk_group'])) {
		$optionArray = $_REQUEST['chk_group'];
		for ($i=0; $i<count($optionArray); $i++) {
		  wp_delete_post($optionArray[$i]);
		}
	}
  }
  ?>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(function () {
	   $('#select-all').click(function (event) {
	
		   var selected = this.checked;
		   // Iterate each checkbox
		   $(':checkbox').each(function () {    this.checked = selected; });
	
	   });
	});
</script>
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
                if($_REQUEST['type'] == 'equipment')
                {
?>
<form name="home" action="<?php echo get_option('siteurl')?>/?page_id=<?php echo $_REQUEST['page_id']?>" method="get">
        <table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="8">
                    <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['type']?>" />
                	<select name="sort">
                    	<option value="">Sort by</option>
                    	<option value="date">Date</option>
                    	<option value="draft">Draft</option>
                    	<option value="sent">Sent</option>
                    	<option value="quote">Quote Ready</option>
                    </select>
                    <input type="submit" name="sort_submit" value="Go" class="form-button" />
                </td>
                <td>
                	<input type="submit" name="delete" value="DELETE" style="background:#336699; cursor:pointer; color:#FFF; border:none;">
                </td>
            </tr>
            <tr class="listtable">
                <th align="center" class="listtd">
 	           <input type="checkbox" name="select-all" id="select-all" />
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
                    Item-name
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
			if($_REQUEST['sort'] == '')
			{
            $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.ID DESC " );
			}
			elseif($_REQUEST['sort'] == 'date')
			{
            $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'draft')
			{
            $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC ");
			}
			elseif($_REQUEST['sort'] == 'sent')
			{
            $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC ");
			}
			elseif($_REQUEST['sort'] == 'quote')
			{
            $myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='equipment' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'publish' order by wp_posts.post_date DESC " );
			}
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
                $id=$myterms->ID;
                $post_status=$myterms->post_status;
                $post_title=$myterms->post_title;
                $post_name=$myterms->post_name;
                $post_date=$myterms->post_date;
            ?>
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
               <input type="checkbox" name="chk_group[]" value="<?php echo $id?>" />
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
                    <?php echo get_post_meta($id,'model_name',true); ?>
                </td>
                <td align="left" class="listtd">
                    <?php 
					if($post_status == 'sent')
					{ 
						echo 'Sent';
					} 
					elseif($post_status == 'draft')
					{ 
						echo 'Draft';
					} 
					else
					{
						echo 'Quote-Ready';
					}
					?>
                </td>
                <td align="left" class="listtd">
                    <?php echo get_post_meta($id,'request_date',true); ?>
                </td>
                <td align="left" class="listtdlast">
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <a href="<?php echo get_option('siteurl')."?page_id=489&post_id=".$id?>">View-Request</a>
                    &nbsp;&nbsp;<a href="<?php echo get_option('siteurl')?>/?page_id=547&type=equipment&post_id=<?php echo $id?>" target="_blank">Print</a>
                </td>
            </tr>
            <?php
            $ct++;
            }   
            ?>
            </table>
            </form>
<?php									
				}
				elseif($_REQUEST['type'] == 'fertilizer' || $_REQUEST['type'] == 'chemical')
				{
?>
<form name="home" action="<?php echo get_option('siteurl')?>/?page_id=<?php echo $_REQUEST['page_id']?>" method="get">
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="7">
                    <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['type']?>" />
                	<select name="sort">
                    	<option value="">Sort by</option>
                    	<option value="date">Date</option>
                    	<option value="draft">Draft</option>
                    	<option value="sent">Sent</option>
                    	<option value="quote">Quote Ready</option>
                    </select>
                    <input type="submit" name="sort_submit" value="Go" class="form-button" />
                </td>
                <td>
                	<input type="submit" name="delete" value="DELETE" style="background:#336699; cursor:pointer; color:#FFF; border:none;">
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="select-all" id="select-all" />
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
			if($_REQUEST['sort'] == '')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.ID DESC " );
			}
			elseif($_REQUEST['sort'] == 'date')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'draft')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'sent')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'quote')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where (wp_posts.post_type='fertilizer' or wp_posts.post_type='chemical') and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'publish' order by wp_posts.post_date DESC " );
			}
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
?>
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
                	 <input type="checkbox" name="chk_group[]" value="<?php echo $id?>" />
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
                	<?php echo get_post_meta($id,'quantity',true); ?>
                </td>
            	<td align="left" class="listtd">
                    <?php 
					if($post_status == 'sent')
					{ 
						echo 'Sent';
					} 
					elseif($post_status == 'draft')
					{ 
						echo 'Draft';
					} 
					else
					{
						echo 'Quote-Ready';
					}
					?>
                </td>
            	<td align="left" class="listtd">
                	<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <a href="<?php echo get_option('siteurl')."?page_id=482&post_id=".$id?>">View-Request</a>
                    &nbsp;&nbsp;<a href="<?php echo get_option('siteurl')?>/?page_id=547&type=fertilizer&post_id=<?php echo $id?>" target="_blank">Print</a>
                </td>
            </tr>
<?php
			$ct++;
            }   
?>
        </table>
        </form>
<?php									
			}
			elseif($_REQUEST['type'] == 'supplies')
			{
?>
<form name="home" action="<?php echo get_option('siteurl')?>/?page_id=<?php echo $_REQUEST['page_id']?>" method="get">
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="8">
                    <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['type']?>" />
                	<select name="sort">
                    	<option value="">Sort by</option>
                    	<option value="date">Date</option>
                    	<option value="draft">Draft</option>
                    	<option value="sent">Sent</option>
                    	<option value="quote">Quote Ready</option>
                    </select>
                    <input type="submit" name="sort_submit" value="Go" class="form-button" />
                </td>
                <td>
                	<input type="submit" name="delete" value="DELETE" style="background:#336699; cursor:pointer; color:#FFF; border:none;">
                </td>
            </tr>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="select-all" id="select-all" />
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
			if($_REQUEST['sort'] == '')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.ID DESC " );
			}
			elseif($_REQUEST['sort'] == 'date')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'draft')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'sent')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'sent' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'quote')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='supplies' and wp_posts.post_author='".$user_id."' and  wp_posts.post_status = 'publish' order by wp_posts.post_date DESC " );
			}
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
?>
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
                	<input type="checkbox" name="chk_group[]" value="<?php echo $id?>" />
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
                    <?php 
					if($post_status == 'sent')
					{ 
						echo 'Sent';
					} 
					elseif($post_status == 'draft')
					{ 
						echo 'Draft';
					} 
					else
					{
						echo 'Quote-Ready';
					}
					?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <a href="<?php echo get_option('siteurl').'?page_id=467&post_id='.$id?>">View-Request</a>
                    &nbsp;&nbsp;<a href="<?php echo get_option('siteurl')?>/?page_id=547&type=supplies&post_id=<?php echo $id?>" target="_blank">Print</a>
                </td>
            </tr>
<?php
			$ct++;
			}
?>
        </table>
        </form>
<?php									
				}
				elseif($_REQUEST['type'] == 'parts')
				{
?>
<form name="home" action="<?php echo get_option('siteurl')?>/?page_id=<?php echo $_REQUEST['page_id']?>" method="get">
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="8">
                    <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['type']?>" />
                	<select name="sort">
                    	<option value="">Sort by</option>
                    	<option value="date">Date</option>
                    	<option value="draft">Draft</option>
                    	<option value="sent">Sent</option>
                    	<option value="quote">Quote Ready</option>
                    </select>
                    <input type="submit" name="sort_submit" value="Go" class="form-button" />
                </td>
                <td>
                	<input type="submit" name="delete" value="DELETE" style="background:#336699; cursor:pointer; color:#FFF; border:none;">
                </td>
            </tr>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="select-all" id="select-all" />
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
			if($_REQUEST['sort'] == '')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='parts' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.ID DESC " );
			}
			elseif($_REQUEST['sort'] == 'date')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='parts' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'draft')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='parts' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'sent')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='parts' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'sent' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'quote')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='parts' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'publish' order by wp_posts.post_date DESC " );
			}
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
?>
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
                	<input type="checkbox" name="chk_group[]" value="<?php echo $id?>" />
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
                    <?php 
					if($post_status == 'sent')
					{ 
						echo 'Sent';
					}
					elseif($post_status == 'draft')
					{
						echo 'Draft';
					}
					else
					{
						echo 'Quote-Ready';
					}
					?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <a href="<?php echo get_option('siteurl').'?page_id=472&post_id='.$id?>">View-Request</a>
                    &nbsp;&nbsp;<a href="<?php echo get_option('siteurl')?>/?page_id=547&type=parts&post_id=<?php echo $id?>" target="_blank">Print</a>
                </td>
            </tr>
<?php
			$ct++;
            }   
?>
        </table>
        </form>
<?php									
			}
			elseif($_REQUEST['type'] == 'tire')
			{
?>
<form name="home" action="<?php echo get_option('siteurl')?>/?page_id=<?php echo $_REQUEST['page_id']?>" method="get">
<table border="0" cellpadding="0px" width="100%" align="center" cellspacing="0">
			<tr>
            	<td colspan="8">
                    <input type="hidden" name="page_id" value="<?php echo $_REQUEST['page_id']?>" />
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['type']?>" />
                	<select name="sort">
                    	<option value="">Sort by</option>
                    	<option value="date">Date</option>
                    	<option value="draft">Draft</option>
                    	<option value="sent">Sent</option>
                    	<option value="quote">Quote Ready</option>
                    </select>
                    <input type="submit" name="sort_submit" value="Go" class="form-button" />
                </td>
                <td>
                	<input type="submit" name="delete" value="DELETE" style="background:#336699; cursor:pointer; color:#FFF; border:none;">
                </td>
            </tr>
       		<tr class="listtable">
            	<th align="center" class="listtd">
                	<input type="checkbox" name="select-all" id="select-all" />
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
			if($_REQUEST['sort'] == '')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='tire' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.ID DESC " );
			}
			elseif($_REQUEST['sort'] == 'date')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='tire' and wp_posts.post_author='".$user_id."' and (wp_posts.post_status = 'draft' or wp_posts.post_status = 'publish' or wp_posts.post_status = 'sent') order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'draft')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='tire' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'draft' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'sent')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='tire' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'sent' order by wp_posts.post_date DESC " );
			}
			elseif($_REQUEST['sort'] == 'quote')
			{
			$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date from wp_posts where wp_posts.post_type='tire' and wp_posts.post_author='".$user_id."' and wp_posts.post_status = 'publish' order by wp_posts.post_date DESC " );
			}
            $ct=1;
            foreach ( $myrows as $myterms ) 
            {
				$id=$myterms->ID;
				$post_status=$myterms->post_status;
				$post_title=$myterms->post_title;
				$post_name=$myterms->post_name;
				$post_date=$myterms->post_date;
?>
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
                	<input type="checkbox" name="chk_group[]" value="<?php echo $id?>" />
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
                    <?php 
					if($post_status == 'sent')
					{ 
						echo 'Sent';
					} 
					elseif($post_status == 'draft')
					{ 
						echo 'Draft';
					} 
					else
					{
						echo 'Quote-Ready';
					}
					?>
                </td>
            	<td align="left" class="listtd">
					<?php echo get_post_meta($id,'request_date',true); ?>
                </td>
            	<td align="left" class="listtdlast">
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <a href="<?php echo get_option('siteurl').'?page_id=517&post_id='.$id?>">View-Request</a>
                    &nbsp;&nbsp;<a href="<?php echo get_option('siteurl')?>/?page_id=547&type=tire&post_id=<?php echo $id?>" target="_blank">Print</a>
                </td>
            </tr>
<?php
			$ct++;
            }   
?>
        </table>
		</form>
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