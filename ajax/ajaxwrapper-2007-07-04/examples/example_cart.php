<?php
include "../Ajax.php";
$ajax = new Ajax();
?>

<html>
<head>
<title>My Sample Cart</title>

<?=$ajax->js('../js/');?>

<style>
body {
	font-size: 10px;
	font-family: Verdana;
}
#cart {
	position: absolute;
	left: 400px;
	top: 100px;
	border:1px solid #D5D5D5;
	margin-top:10px;
	width:400px;
	height:200px;
}
</style>

</head>
<body>
<div id="list"></div>

<img src="../image/cell1.png" id="cell1">
<img src="../image/cell2.png" id="cell2">
<img src="../image/cell3.png" id="cell3">

<?=$ajax->dragable_element('cell1');?>
<?=$ajax->dragable_element('cell2');?>
<?=$ajax->dragable_element('cell3');?>

<div id="cart">Drag Items Here</div>

<?=$ajax->drop_receiving_element('cart', array('url' => 'example_cart_data.php', 'update' => 'cart'));?>

</body>
</html>
