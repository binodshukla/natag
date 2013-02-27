<?php
ob_start();
/**
 * Template Name: View Purchase Order
 * @package WordPress
 * @subpackage natag
 */

extract($_POST);
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
?><head>
<title><?php echo bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>
		
<div id="primaryinn2">
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
                                    <li><?php echo get_post_meta($id,'purchase_date',true);?></li>
                                    <li>CODE#</li>
                                    <li><?php echo get_post_meta($id,'code_number',true);?></li>
                                    <li>&nbsp;&nbsp;&nbsp;</li>
                                    <li><?php echo get_post_meta($id,'payment_type',true);?></li>
                                 </ul>
                            </div>
                            
                            <!-- Customer Details Start -->
                            <div class="customer_address">
                                <p>SHIP TO</p>
                                <ul>
                                    <li>
                                        <div class="ship">
                                           NAME :<?php echo get_user_meta($post_author, 'first_name',true);?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                           ADDRESS :<?php echo get_user_meta($post_author, 'address',true);?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                           CITY :<?php echo get_user_meta($post_author, 'city',true);?>
                                           STATE :<?php echo get_user_meta($post_author, 'state',true);?>
                                           ZIP :<?php echo get_user_meta($post_author, 'zip',true);?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                           FREIGHT :<?php echo get_post_meta($id,'freight',true); ?>
                                           INCLUDED :<?php echo get_post_meta($id,'freight_include',true); ?>
                                           COD :<?php echo get_post_meta($id,'freight_cod',true); ?>
                                           PREPAID :<?php echo get_post_meta($id,'freight_prepaid',true); ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ship">
                                           PICKED UP AT THIS LOCATION :
											<?php echo get_user_meta($post_author, 'location',true); ?>
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
                                        <?php echo get_post_meta($id,'quantity',true); ?>
                                    </li>
                                    <li class="second"><?php echo get_post_meta($id,'part_descpt',true); ?></li>
                                    <li class="third"><?php echo get_post_meta($id,'each_price',true); ?></li>
                                    <li class="fourth last" id="total_price"><?php echo get_post_meta($id,'sub_price',true); ?></li>
                                </ul>
                                <div class="clear"></div>
                                <ul class="instruction">
                                    <li class="remark">SPECIAL INSTRUCTIONS <br><br><?php echo get_post_meta($id,'special_inst',true); ?></li>
                                    <li class="total-txt">
                                        <ul class="totals">
<!--                                            <li class="third">SUBTOTAL</li>
                                            <li class="fourth last"><input type="text" name="subtotal_price"  readonly="readonly" value="<?php echo $total_price?>" size=20 /></li>
-->                                            <li class="third">FREIGHT</li>
                                            <li class="fourth last"><?php  
											if(get_post_meta($id,'freight',true)!="")
											{
												echo get_post_meta($id,'freight',true);
											}
											else
											{
												echo '&nbsp;';	
											}
											?></li>
                                            <li class="third">TOTAL</li>
                                            <li class="fourth last" id="total_prices"><?php echo get_post_meta($id,'total_price',true); ?></li>
                                        </ul>					
                                    </li>
                                </ul>
                                
                                <div class="clear"></div>
                            </div>			
                            <!-- Particulars End -->	
                <br>	
                <br>		
                        <div class="clear"></div>
                        </div>
                        <!-- Container End -->
                        <div class="clear"></div>
                    </div>
			</div><!-- #content -->
			<div class="clr"></div>
			<div>
            <!--<a href="javascript:void();" onClick="window.print();">Print</a></div>-->
        </div>
        <!-- #primary -->
        <script>
			window.print();
			window.close();
		</script>
<?php } ?>