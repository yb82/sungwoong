<?php
//if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
//Seller Sandbox Credentials- Sample credentials already provided
define("PP_USER_SANDBOX", $default['de_paypal_client_api_id']);
define("PP_PASSWORD_SANDBOX", $default['de_paypal_client_api_pw']);
define("PP_SIGNATURE_SANDBOX", $default['de_paypal_client_api_signature']);

//Seller Live credentials.
define("PP_USER","seller_username_here");
define("PP_PASSWORD", "seller_password_here");
define("PP_SIGNATURE","seller_signature_here");

//Set this constant ADDRESS_OVERRIDE = true to prevent from changing the shipping address
define("ADDRESS_OVERRIDE", true);

//The URL in your application where Paypal returns control to -after success (RETURN_URL) using Express Checkout Mark Flow
define("RETURN_URL_MARK",'http://'.$_SERVER['HTTP_HOST'].preg_replace('/paypal_ec_redirect.php/','return.php',$_SERVER['SCRIPT_NAME']));

//The URL in your application where Paypal returns control to -after success (RETURN_URL) and after cancellation of the order (CANCEL_URL) 
//define("RETURN_URL",G5_SHOP_PATH."/orderformupdate.php");
//define("CANCEL_URL",G5_SHOP_PATH.'/orderform.php');

define("RETURN_URL",'http://'.$_SERVER['HTTP_HOST'].'/shop/paypal/return.php');
define("CANCEL_URL",'http://'.$_SERVER['HTTP_HOST'].'/shop/index.php');

//Whether Sandbox environment is being used, Keep it true for testing
define("SANDBOX_FLAG", true);

if(SANDBOX_FLAG){
	$merchantID=PP_USER_SANDBOX;  /* Use Sandbox merchant id when testing in Sandbox */
	$env= 'sandbox';
}
else {
	$merchantID=PP_USER;  /* Use Live merchant ID for production environment */
	$env='production';
}

//Proxy Config
define("PROXY_HOST", "127.0.0.1");
define("PROXY_PORT", "808");

//In-Context in Express Checkout URLs for Sandbox
define("PP_CHECKOUT_URL_SANDBOX", "https://www.sandbox.paypal.com/checkoutnow?token=");
define("PP_NVP_ENDPOINT_SANDBOX","https://api-3t.sandbox.paypal.com/nvp");

//In-Context in Express Checkout URLs for Live
define("PP_CHECKOUT_URL_LIVE","https://www.paypal.com/checkoutnow?token=");
define("PP_NVP_ENDPOINT_LIVE","https://api-3t.paypal.com/nvp");

//Version of the APIs
define("API_VERSION", "109.0");

//ButtonSource Tracker Code
define("SBN_CODE","PP-DemoPortal-EC-JSV4-php");
?>
