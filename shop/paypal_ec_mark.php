<?php
include_once('./_common.php');
include_once("./paypal/paypal_config.php");
include_once("./paypal/paypal_functions.php");


// //'------------------------------------
// //' Calls the SetExpressCheckout API call
// //'
// //' The CallMarkExpressCheckout function is defined in the file paypal_functions.php,
// //' it is included at the top of this file.
// //'-------------------------------------------------

//$itemDetail = $_SESSION['post_value'];
$shippingDetail = $_POST;


$resArray = CallShortcutExpressCheckout ($shippingDetail, RETURN_URL, CANCEL_URL);

//echo "hello2";
$ack = strtoupper($resArray["ACK"]);
if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")  //if SetExpressCheckout API call is successful
{
	
	echo $resArray["TOKEN"];
} 
else  
{
	//echo "hello3";
	//Display a user friendly Error on the page using any of the following error information returned by PayPal
	$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
	$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
	$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
	$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

	echo "SetExpressCheckout API call failed. ";
	echo "Detailed Error Message: " . $ErrorLongMsg;
	echo "Short Error Message: " . $ErrorShortMsg;
	echo "Error Code: " . $ErrorCode;
	echo "Error Severity Code: " . $ErrorSeverityCode;
}

?>