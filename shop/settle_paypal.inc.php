<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$is_paypal_use = false;
if($default['de_paypal_client_api_id'] && $default['de_paypal_client_api_pw'] && $default['de_paypal_client_api_signature']) {
    $is_paypal_use = true;
    require_once(G5_SHOP_PATH.'/paypal/paypal_config.php');
}
?>