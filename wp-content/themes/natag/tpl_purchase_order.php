<?php
ob_start();
/**
 * Template Name: Purchase Order
 * @package WordPress
 * @subpackage natag
 */

get_header(); 
extract($_POST);
if($submit == 'Submit')
{
	$url = get_option('siteurl');
	$user_id = get_current_user_id();
	if(get_user_meta($user_id, 'first_name',true) == "")
	{
	add_user_meta( $user_id, 'first_name', $_POST['fname']);
	}
	else
	{
	update_user_meta( $user_id, 'first_name', $_POST['fname']);	
	}
	if(get_user_meta($user_id, 'address',true) == "")
	{
	add_user_meta( $user_id, 'address', $_POST['address']);
	}
	else
	{
	update_user_meta( $user_id, 'address', $_POST['address']);
	}
	if(get_user_meta($user_id, 'city',true) == "")
	{
	add_user_meta( $user_id, 'city', $_POST['city']);
	}
	else
	{
	update_user_meta( $user_id, 'city', $_POST['city']);
	}
	if(get_user_meta($user_id, 'state',true) == "")
	{
	add_user_meta( $user_id, 'state', $_POST['state']);
	}
	else
	{
	update_user_meta( $user_id, 'state', $_POST['state']);
	}
	if(get_user_meta($user_id, 'zip',true) == "")
	{
	add_user_meta( $user_id, 'zip', $_POST['zip']);
	}
	else
	{
	update_user_meta( $user_id, 'zip', $_POST['zip']);
	}
	if(get_user_meta($user_id, 'location',true) == "")
	{
	add_user_meta( $user_id, 'location', $_POST['location']);
	}
	else
	{
	update_user_meta( $user_id, 'location', $_POST['location']);
	}

	$my_post = array(
	  'post_title'    => $_POST['post_type'],
	  'post_name'    => $_POST['post_type'],
	  'post_content'  => $_POST['spe_inst'],
	  'post_status'   => 'Order sent',
	  'comment_status'=> 'closed',
	  'post_author'   => $user_id,
	  'post_type'     => 'Purchase order',
	  'post_parent'     => $_POST['post_id']
	  );
	// Insert the post into the database
	$post_id=wp_insert_post( $my_post,  $wp_error );

	$gurl = $url."/?purchase=".$post_id;
	
	$my_post_up = array();
	
	$my_post_up['ID'] = $post_id;
	
	$my_post_up['guid'] = $gurl;
	
	$up_post = wp_update_post( $my_post_up );

	add_post_meta($post_id, 'purchase_date', date('Y-m-d')); 
	add_post_meta($post_id, 'code_number', $_POST['code']);
	add_post_meta($post_id, 'payment_type', $_POST['mail']); 
	add_post_meta($post_id, 'freight', $_POST['freight']); 
	add_post_meta($post_id, 'freight_include', $_POST['inc']); 
	add_post_meta($post_id, 'freight_cod', $_POST['cod']); 
	add_post_meta($post_id, 'freight_prepaid', $_POST['prepaid']); 
	add_post_meta($post_id, 'quantity', $_POST['quantity']); 
	add_post_meta($post_id, 'part_descpt', $_POST['purchase_descpt']); 
	add_post_meta($post_id, 'each_price', $_POST['quote_price']); 
	add_post_meta($post_id, 'sub_price', $_POST['subtotal_price']); 
	add_post_meta($post_id, 'total_price', $_POST['totalp']); 
	add_post_meta($post_id, 'special_inst', $_POST['spe_inst']);

	$user_info = get_userdata($user_id);
	$to = $user_info->user_email;
	$uname = ucfirst($user_info->user_nicename);
	$subject = "Purchase order Notification";
	$message = get_option('admin_farmer_generate_purchase_order');
	$message = str_replace('$name',$uname,$message);
	//$message = str_replace('$requestname','Equipment',$message);
	$headers = 'From: National AG';
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mail = mail( $to, $subject, $message, $headers);

	$user_info = get_userdata(1);
	$to = $user_info->user_email;
	$uname = ucfirst($user_info->user_nicename);
	$subject = "Purchase order Notification";
	$message = get_option('admin_farmer_generate_purchase_order');
	$message = str_replace('$name',$uname,$message);
	//$message = str_replace('$requestname','Equipment',$message);
	$headers = 'From: National AG';
	$headers  .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mail = mail( $to, $subject, $message, $headers);
	
	//header("Location:".$url."/?page_id=540&post_id=".$post_id);
	header("Location:".$url."/?page_id=629");

}
$user_id = get_current_user_id();
$myrows = $wpdb->get_results( "SELECT wp_posts.ID,wp_posts.post_title,wp_posts.post_status,wp_posts.post_name,wp_posts.post_date,wp_posts.post_content, wp_posts.post_author,wp_posts.post_type from wp_posts where wp_posts.ID='".$_REQUEST['post_id']."' " );
foreach ( $myrows as $myterms ) 
{
	$id=$myterms->ID;
	$post_status=$myterms->post_status;
	$post_author=$myterms->post_author;
	$post_title=$myterms->post_title;
	$post_name=$myterms->post_name;
	$post_date=$myterms->post_date;
	$post_content = $myterms->post_content;
	$post_type = $myterms->post_type;
?>
		<form name="purchase" action="" method="post">
        <input type="hidden" name="post_type" value="<?php echo $post_type;?>" />
        <input type="hidden" name="post_id" value="<?php echo $_REQUEST['post_id'];?>" />
        <input type="hidden" name="purchase_descpt" value="<?php echo $post_type;?>" />
		<div id="primaryinn">
			<div id="contentinn2" role="main">
					      <!--  ARTICLE BOX STARTS  -->
                <div id="wrapper-inner">
                        <!-- Header Start -->
                        <div class="header">
                            <div class="title">
                                <h1 class="logo2">National Ag</h1>
                            </div>
                            <div class="address">
                                <p class="phone-fax">1578 West 7800 South, Suite 203, West Jordan, Utah, 84088</p>
                                <p class="phone-fax"><span class="phone">Phone:(888) 448 6501</span><span class="fax">Fax:(888) 855 7711.</span></p>
                            </div>
                            <div class="clear"></div>
                            <div class="form-name">
                                <h2>PURCHASE ORDER</h2>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- Header End -->
                        <!-- Container Start -->
                        <div id="containers">
                            <div class="top-list">
                                <ul>
                                    <li>DATE</li>
                                    <li><input type="text" name="date" value="<?php echo date('Y-m-d')?>" readonly="readonly" class="date"/></li>
                                    <li>CODE#</li>
                                    <li><input type="text" name="code" readonly value="<?php echo get_post_meta($id,'code_number',true);?>" class="code"/></li>
                                    <li>Mailling Check</li>
                                    <li><input type="radio" name="mail" value="Mailing" size=10 /></li>
                                    <li>or ACH</li>
                                    <li><input type="radio" name="mail" size=10 value="ACH" /></li><br>
                                    <p class="top-txt">(Check one choice above)</p
                                ></ul>
                            </div>
                            
                            <!-- Customer Details Start -->
                            <div class="customer_address">
                                <p>SHIP TO</p>
                                <ul>
                                    <li>
                                        <div class="ship">
                                            <label>NAME :</label><input type="text" required="required" name="fname" value="<?php echo get_user_meta($user_id, 'first_name',true);?>" size=100 />
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                            <label>ADDRESS :</label><input type="text" required="required" name="address" value="<?php echo get_user_meta($user_id, 'address',true);?>" size=100 />
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                            <label>CITY :</label><input type="text" name="city" required="required" value="<?php echo get_user_meta($user_id, 'city',true);?>" size=40 /><label>STATE :</label><input type="text" required="required" value="<?php echo get_user_meta($user_id, 'state',true);?>" name="state" size=40 />
                                            <label>ZIP :</label><input type="text" name="zip" size=20 required="required" value="<?php echo get_user_meta($user_id, 'zip',true);?>" />
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                            <label>FREIGHT :</label><input type="text" name="freight" value="<?php echo get_post_meta($id,'freight',true);?>" size="40" readonly="readonly" />
                                            <label>INCLUDED :</label><input type="checkbox" name="inc" value="include" id="chck_1" />
                                            <label>COD :</label><input type="checkbox" name="cod" id="chck_2" value="cod" />
                                            <label>PREPAID :</label><input type="checkbox" name="prepaid" id="chck_3" value="prepaid" />
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                            <label>PICKED UP AT THIS LOCATION :</label><input type="text" name="location" value="<?php echo get_user_meta($user_id, 'location',true);?>" size="100" required="required" />
                                        </div>
                                    </li>
                                </ul>
                            </div>			
                            <!-- Customer Details End -->
                            <!-- Particulars Start -->
                            <div id="particulars">
                                <ul class="heading">
                                    <li class="first">QTY</li>
                                    <li class="second">PART NUMBER / DESCRIPTION</li>
                                    <li class="third">EACH</li>
                                    <li class="fourth last">SUB TOTAL</li>
                                </ul>
                                <div class="clear"></div>
                                <ul class="row_1">
                                    <li class="first">
                                        <!--<select name="quantity" class="select" onchange="ajax_cal_total('<?php echo get_option('siteurl')?>/?page_id=497',this.value,'<?php echo trim(get_post_meta($id,'price_quote',true))?>','total_price','total_prices')">
                                        <?php
											$quantityArray = array(0,1,2,3,4,5,6,7,8,9,10);
											$total_amount = trim(get_post_meta($id,'quantity',true));
											$quote_price = trim(get_post_meta($id,'price_quote',true));
											$freight = trim(get_post_meta($id,'freight',true));
											$subtotal_price = $total_amount*$quote_price;
											$total_price = ($total_amount*$quote_price)+$freight;
											foreach($quantityArray as $qa)
											{
												if($qa == trim(get_post_meta($id,'quantity',true)))
												{
													echo '<option value="'.$qa.'" selected="selected">'.$qa.'</option>';
												}
												else
												{
													echo '<option value="'.$qa.'">'.$qa.'</option>';
												}
											}
										?>
                                        </select> -->
                                        <input type="text" size="2" readonly="readonly" value="<?php echo trim(get_post_meta($id,'quantity',true));?>" name="quantity" />
                                    </li>
                                    <li class="second">
										<?php echo ucfirst($post_type);?>
                                    </li>
                                    <li class="third"><input type="text" name="quote_price"  readonly="readonly" value="<?php echo get_post_meta($id,'price_quote',true);?>" size=20 /></li>
                                    <li class="fourth last" id="total_price"><input type="text" name="subtotal_price"  readonly="readonly" value="<?php echo $subtotal_price?>" size=20 /></li>
                                </ul>
                                <div class="clear"></div>
                                <ul class="instruction">
                                    <li class="remark">SPECIAL INSTRUCTIONS <br><br><textarea name="spe_inst" rows="3" cols="64"></textarea></li>
                                    <li class="total-txt">
                                        <ul class="totals">
<!--                                            <li class="third">SUBTOTAL</li>
                                            <li class="fourth last"><input type="text" name="subtotal_price"  readonly="readonly" value="<?php echo $total_price?>" size=20 /></li>
-->                                            <li class="third">FREIGHT</li>
                                            <li class="fourth last"><input type="text" readonly="readonly" name="frt" size=20  value="<?php echo get_post_meta($id,'freight',true);?>"/></li>
                                            <li class="third">TOTAL</li>
                                            <li class="fourth last" id="total_prices"><input type="text" readonly="readonly" name="totalp" size=20 value="<?php echo $total_price?>" /></li>
                                        </ul>					
                                    </li>
                                </ul>
                                
                                <div class="clear"></div>
                            </div>			
                            <!-- Particulars End -->	
                <br>		
                            <div class="customer_address">
                                <ul>
                                    <li>
                                        <div class="ship">
                                            <input type="submit" name="submit" value="Submit" />&nbsp;
                                            <input type="button" onclick="javascript:history.go(-1)" name="back" value="Back" />
                                        </div>
                                    </li>
                                </ul>
                            </div>			
                <br>		
                        <div class="clear"></div>
                        </div>
                        <!-- Container End -->
                        <div class="clear"></div>
                    </div>
			</div><!-- #content -->
			<div class="clr"></div>
		</div><!-- #primary -->
		</form>
<?php } get_footer(); ?>