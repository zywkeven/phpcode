<?php
include "../Ajax.php";
$ajax = new Ajax();
?>

<html>
<head>
<title>My Sample</title>

<?=$ajax->js('../js/');?>

<style>
    div#ac_auto_complete {
      position:absolute;
      width:250px;
      background-color:white;
      border:1px solid #888;
      margin:0px;
      padding:0px;
    }
    div#ac_auto_complete ul {
      list-style-type:none;
      margin:0px;
      padding:0px;
    }
    div#ac_auto_complete ul li.selected { background-color: #ffb;}
    div#ac_auto_complete ul li {
      list-style-type:none;
      display:block;
      margin:0;
      padding:2px;
      height:32px;
      cursor:pointer;
    }
</style>

</head>
<body>

<input type="text" id="ac" name="autocomplete" size="30">

<div id="ac_auto_complete">Results will be here.</div>

<?=$ajax->auto_complete_field('ac',array('url' => 'example_autocomplete_data.php', 'frequency' => '1'));?>

</body>
</html>