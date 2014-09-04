<?php
/*************************************************************
  Filename : products.php
  Author   : Shaik Thasnim
  Date     : 14/10/09
  Purpose  : To perfom add,update and delete operations
 **************************************************************/
error_reporting(E_ALL);
//include config file
include_once('includes/config.php');
include_once(CLASSES.'products.cls.php');
$obj = new Products;
switch($_REQUEST['action']){	
	case 'addproducts':	
	$obj->addProducts();
	break;
	case 'updateproducts':
	$obj->updateQnty();
	break;
	case 'delproducts':
	$obj->delProduct();
	break;
	case 'showcart':
	$obj->showCart();		
	break;
	default:		
	break;
}
?>

