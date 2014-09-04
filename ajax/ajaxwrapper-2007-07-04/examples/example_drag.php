<?php
include "../Ajax.php";
$ajax = new Ajax();
?>

<html>
<head>
<title>My Sample</title>

<?=$ajax->js('../js/');?>

<style>
.ontab {
background-color:#FFAE00;
border:1px solid #CCCCCC;
color:#FFFFFF;
cursor:pointer;
font-size:12px;
font-weight:bold;
text-align:center;
width:14%;
}
.ontab table {
background-color:#FFAE00;
border:1px solid #CCCCCC;
color:#FFFFFF;
cursor:pointer;
font-size:12px;
font-weight:bold;
text-align:center;
}
.offtab {
background-color:#E5E5E5;
border:1px solid #CCCCCC;
cursor:pointer;
font-size:12px;
font-weight:normal;
text-align:center;
width:14%;
}
</style>

</head>
<body>

<a onclick="<?=$ajax->show(array('mydiv'));?>">Show Window</a>

<div id="mydiv" style="position:absolute; top: 120px; left:500px; z-index:999; width:300px; display:none;">
	<div class="ontab" style="width:100%;">
	<table width="100%"><tr><td width="95%" align="center">Window Title</td><td><a onclick="<?=$ajax->hide(array('mydiv'))?>"><img src="../image/fechar.png" border="0"/></td></tr></table>
	</div>
	<div class="offtab" id="content" style="width:100%;">
		Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In pede pede, dapibus eget, auctor at, consequat sed, enim. Curabitur imperdiet varius mi. Nullam tempor fringilla arcu.

In hac habitasse platea dictumst. Mauris et nisi. Cras eu metus. Etiam vitae felis. Fusce semper facilisis velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse justo erat, nonummy eu, bibendum nec, iaculis convallis, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut auctor metus at dui. Maecenas faucibus, mauris eget gravida tristique, ante eros ullamcorper massa, id fermentum urna ipsum et tellus. Nam lectus massa, convallis id, ornare porta, iaculis et, pede.
	</div>
</div>

<?=$ajax->dragable_element('mydiv');?>

</body>
</html>