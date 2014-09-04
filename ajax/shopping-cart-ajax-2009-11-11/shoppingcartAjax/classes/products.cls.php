<?
/**************************************************************************************
* Class: Products (List of Products)
* Date: 14-10-09
* Author: Thasnim
* Methods:
* Get Products
* Add Products
* Show Cart
* Update Quantity
* Delete Product
**************************************************************************************/
class Products
{
	function getProducts(){
		$selprod_qry = 'SELECT * FROM products';
		$sel_res=@mysql_query($selprod_qry);
		
		$show = "<li class='vercol'><strong>Products List</strong></li><li class='vercol'><strong>Price</strong></li>";
		while($product=@mysql_fetch_object($sel_res))	
		{	
			$show.= "<li class='vercol'><a href='javascript:void(0)' onclick=\"javascript:getFields('".$product->prod_id."','".$product->prod_name."','".$product->prod_price."')\">".$product->prod_name."</a></li><li class='vercol'>".$product->prod_price."</li>";
		}
		echo $show;
	}// function to get products list from db ends here..

	function addProducts(){
		if($_REQUEST['pname'] != '' && $_REQUEST['price'] != '' && $_REQUEST['qnty'] != '' && $_REQUEST['pid'] != ''){
		$pname = stripslashes($_REQUEST['pname']);
		$price = stripslashes($_REQUEST['price']);
		$qnty = stripslashes($_REQUEST['qnty']);
		$pid = stripslashes($_REQUEST['pid']);

		$pname = mysql_real_escape_string($_REQUEST['pname']);
		$price = mysql_real_escape_string($_REQUEST['price']);
		$qnty = mysql_real_escape_string($_REQUEST['qnty']);
		$pid = mysql_real_escape_string($_REQUEST['pid']);
		$total = $price * $qnty;

		$addprod_qry = "INSERT INTO show_cart VALUES('".$pid."','".$pname."','".$price."','".$qnty."','".$total."')";
		$addres= @mysql_query($addprod_qry)or die("Error:".mysql_error());
			if($addres){
					//to show alert message after submission
					//comment this success msg if alert is not required
					echo "Successfully Added to Cart";
					//to show shopping cart values after submission 
					//remove comments to showCart class(i.e.,$this->showCart()) it will display the list of products after submission
					//$this->showCart();
			}else
			{
				die("Error:".mysql_error());
			}
		}else{
		  echo "Please Enter All Fields Correctly";
		}
	}//end of addproducts method

	function showCart()
	{
		$selprod_qry2 = 'SELECT * FROM show_cart ORDER BY sprod_id ASC;';
		$sel_res2=@mysql_query($selprod_qry2);
		if($sel_res2){
		$showCart = '<table border="0" cellspacing="0" cellpadding="3" class="showcartTable" bordercolor="#000000">
				   <thead>
					  <th class="borclass">&nbsp;</th><th class="borclass" width="200">Product Name</th><th class="borclass">Price</th><th class="borclass" width="150">Quantity</th class="borclass"><th class="borclass">Total</th><th>&nbsp;</th>
				   </thead><tbody>';
				   $grandtot=0;
		while($product=@mysql_fetch_object($sel_res2))	
		{	
		  $showCart.= '<tr>
					   <td class="deltext"><a href="javascript:void(0)" onclick="javascript:RedirectPage(\'delproducts\','.$product->sprod_id.');">x</a></td><td class="borclass" align="left">'.$product->sprod_name.'</td>
					   <td class="borclass">'.$product->sprod_price.'</td><td class="borclass"><input type="text" class="fieldbox" value="'.$product->sprod_quantity.'" id="'.$product->sprod_id.'" /></td><td class="borclass">'.$product->total.'</td>
					   <td class="updtxt">

					   <a href="javascript:void(0)" onclick="javascript:RedirectPage(\'updateproducts\','.$product->sprod_id.');">Update</a></td>
				   </tr>';
				   $grandtot+=$product->total;
		}
		$showCart.= '<tr>
					   <td colspan="4" class="grandtot"><STRONG>GRAND TOTAL</STRONG></td><td class="grandtot">'.sprintf("%.2f", $grandtot).'</td><td class="grandtot">&nbsp;</td></tr>
				   </tr>';
		}else{
			$showCart.= '<tr>
					   <td colspan="6">NO RECORDS AVAILABLE</td>
				   </tr>';
		}
		$showCart.= ' </tbody>
				  </table>';
		echo $showCart;
	}
	
	function updateQnty(){
		$upd_qry = "UPDATE show_cart SET sprod_quantity = '".$_REQUEST['qnty']."',total = sprod_price * '".$_REQUEST['qnty']."' WHERE sprod_id='".$_REQUEST['pid']."';";
		$upd_res=@mysql_query($upd_qry) or die(mysql_error());
		if($upd_res){
			$this->showCart();
		}else
		{
			die("Error:".mysql_error());
		}
	}//update quantity function

	function delProduct(){
		$delqry = 'DELETE FROM show_cart WHERE sprod_id="'.$_REQUEST['pid'].'";'; 
		$del_res=@mysql_query($delqry);
		if($del_res){
			$this->showCart();
		}else
		{
			die("Error:".mysql_error());
		}
	}//delete product from the showcart list
	
}
?>