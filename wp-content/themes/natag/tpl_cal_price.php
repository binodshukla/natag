<?php

/*
* Template Name: Calculate Price
* @package WordPress
* @subpackage natag
*/

$quantity = $_REQUEST['quantity'];
$quote_price = $_REQUEST['quote_price'];
$total_price = $quantity*$quote_price;
echo '<input type="text" name="total_price"  readonly="readonly" value="'.$total_price.'" size=20 />';
?>
