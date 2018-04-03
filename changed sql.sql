
CREATE TABLE `g5_shop_cart` (

  `it_sc_price` float NOT NULL DEFAULT '0',
  `cp_price` float NOT NULL DEFAULT '0',
  `io_price` float NOT NULL DEFAULT '0',
  `it_weit` int(11) NOT NULL DEFAULT '0',
  `de_weit_g` int(11) NOT NULL DEFAULT '0',
  `de_weit_cost` float NOT NULL DEFAULT '0',
  `de_weit_cost_add` float NOT NULL DEFAULT '0'
}

CREATE TABLE `g5_shop_default` (
  `de_paypal_client_api_id` varchar(255) NOT NULL,
  `de_paypal_client_api_pw` varchar(255) NOT NULL,
  `de_paypal_client_api_signature` varchar(255) NOT NULL,
  `de_weit_g` int(11) NOT NULL DEFAULT '0',
  `de_weit_cost` float NOT NULL DEFAULT '0',
  `de_weit_cost_add` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `g5_shop_item` (

  `it_cust_price` float NOT NULL DEFAULT '0',
  `it_price` float NOT NULL DEFAULT '0',
  `it_point` float NOT NULL DEFAULT '0',
  `it_supply_point` float NOT NULL DEFAULT '0',
 
  `it_sc_price` float NOT NULL DEFAULT '0',
  `it_sc_minimum` float NOT NULL DEFAULT '0',
  `it_weit` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `g5_shop_item_option` (

  `io_price` float NOT NULL DEFAULT '0',
)



CREATE TABLE `g5_shop_order` (
  
  
  `od_cart_price` float NOT NULL DEFAULT '0',
  
  `od_send_cost` float NOT NULL DEFAULT '0',
  `od_send_cost2` float NOT NULL DEFAULT '0',
  
  `od_receipt_price` float NOT NULL DEFAULT '0',
  `od_cancel_price` float NOT NULL DEFAULT '0',
    `od_refund_price` float NOT NULL DEFAULT '0',
  `od_misu` float NOT NULL DEFAULT '0',
   `od_weit` int(11) NOT NULL DEFAULT '0',
  `od_weit_cost` float NOT NULL DEFAULT '0',
  `de_weit_g` float NOT NULL DEFAULT '0',
  `de_weit_cost` float NOT NULL DEFAULT '0',
  `de_weit_cost_add` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
