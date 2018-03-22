<?php

include_once('./_common.php');
include_once("./paypal/paypal_config.php");
include_once("./paypal/paypal_functions.php");

if(isset($_POST['PayerID'])){
	//echo "hello3";
	//echo $_POST['token'];
	include G5_SHOP_PATH.'/paypal/return.php'; 
	//echo "hello4";
}else 

	include G5_SHOP_PATH.'/paypal/paypal_ec_mark.php';
	