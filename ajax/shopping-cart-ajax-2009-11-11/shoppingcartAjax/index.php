<?php
/*****************************************************************************************************
  Filename : index.php
  Author   : Shaik Thasnim
  Date     : 14/10/09
  Purpose  : Shoppingcart using Ajax to display total products and amount without refreshing the page
 *****************************************************************************************************/
include_once('includes/config.php');
//products display function
 function displayProducts()
{
	include_once(CLASSES.'products.cls.php');
	$getObj= new Products();
	$getObj -> getProducts();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ajax Shopping Cart</title>
<script type="text/javascript" src="js/redirect.js">
</script>
<script language="javascript">
function getFields(pid,pname,price){
	document.addProdFrm.pid.value=pid;
	document.addProdFrm.pname.value=pname;
	document.addProdFrm.price.value=price;
}
</script>
<link rel="stylesheet" type="text/css" href="css/general.css"/>
</head>
<body onload>
	<div id="maincontainer">
		<div id="outerborder">
			<div id="contentwrapper">
				<!-- header -->
				<div id="header">
					<h1>Shopping Cart Layout</h1>
				</div><!-- header ends-->

				<!-- middle content -->
				<div id="mid_content">
				<p><a href="javascript:void(0);" onclick="javascript:RedirectPage('showcart','null');"><strong>Show Cart</strong><a></p>
				<div id="left_content"><ul><?=displayProducts();?></ul></div>
				<div id="right_content">
				<form name="addProdFrm" id="addProdFrm" method="POST" >
				<input type="hidden" id="pid">
				  <fieldset>
					<legend>Add to Cart:</legend>
						<table border='0' cellspacing='2' cellpadding='0'>
						<tr><td class="fieldtxt" >
						Product Name:</td><td ><input type="text" size="24" class="fieldbox" id="pname" name="pname" readonly/></td></tr>
						<tr><td class="fieldtxt">Price:</td><td><input type="text" size="24" class="fieldbox" id="price" name="price" readonly/></td></tr>
						<tr><td class="fieldtxt">Quantity:</td><td><input type="text" size="24" class="fieldbox" id="qnty" name="qnty"/></td></tr>
						<tr><td>&nbsp;</td><td ><input type="button" name="add_product" Value="Add" class="btn" onclick="javascript:RedirectPage('addproducts',document.getElementById('pid').value)">&nbsp;&nbsp;<input type="reset" name="reset" Value="Clear" class="btn"></td></tr>	
						</table>
				  </fieldset>
				</form>
				</div>
				</div><!-- middle content end-->
				<!-- bottom content-->
				<div id="btm_content">
				<p>Select Products From the Products List,add quantity and click Show Cart to get Total.</p>
				</div><!-- bottom content end-->
			</div>
		</div>
	</div>
</body>
</html>
