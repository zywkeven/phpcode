<?php
include "../Ajax.php";
$ajax = new Ajax();
?>

<html>
<head>
<title>My Sample Tooltip</title>

<?=$ajax->js('../js/');?>

<style>
/* ----- Tooltips */
.tip .title { font: italic 17px Georgia, serif; padding: 5px; display: block; background: #0F6788; color: #fff; }
.tip .content { font-size: 11px; padding: 5px; width: 150px; background: dodgerblue; color: #fff; }

.dark, .darkborder { width: 200px; }
.dark .title, .darkborder .title { border: 5px solid #999999; border-bottom: none; padding: 5px; font: italic 17px Georgia, serif; display: block; background: #606060; color: #fff; }
.dark .content, .darkborder .content { font-size: 11px; padding: 10px; background: #808080; color: #fff; border: 5px solid #999999; }
.darkborder .content { border-top: none; }

/* ----- Page */
body{ background: #f5f5f5 url(http://www.illustate.com/images/menu/bar_active.gif) top repeat-x; font: 11px Lucida Grande, Verdana, Arial, Helvetica, sans serif; }

h1{ font: italic 23px Georgia, serif; display: block; color: dodgerblue; }

ul.tooltips { clear: both; list-style-type: none; margin: 0; padding: 0;}
ul.tooltips li { height: 18px; line-height: 18px; margin-bottom: 4px; cursor: pointer; float: left; clear: both; border-bottom: 1px solid dodgerblue;}

#tip4 { position: absolute; right: 180px; bottom: 90px; height: 18px; line-height: 18px; cursor: pointer; border-bottom: 1px solid dodgerblue;}

div.code { clear: both; float: left; margin: 10px 0 0 10px; border: 1px solid #cccccc; background: #efefef; padding: 8px;}
#source { margin-top: 0px; }
#showsource { font-size: 9px; line-height: 12px; margin-left: 10px; background: #cccccc; color: #fff; height: 15px; float: left; clear: both; padding: 0 8px 0 8px; margin-top: 10px; cursor: pointer;}

</style>
</head>
<body>

<p id="tp1">ToolTip 1</p>
<p id="tp2">ToolTip 2</p>

<!-- On the array bellow you can set more options. See the User Guide -->

<?
echo $ajax->tooltip('tp1', 'My Content For My ToolTip, this is using tip Class, you can create your own css.',array("title" => "'ToolTip 1 Title'", "className" => "'tip'"));

echo $ajax->tooltip('tp2', 'My Content For My ToolTip, this is using darkborder Class.',array("title" => "'ToolTip 2 Title'", "className" => "'darkborder'"));
?>


</body>
</html>