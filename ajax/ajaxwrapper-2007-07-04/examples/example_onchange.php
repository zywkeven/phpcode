<?php
include "../Ajax.php";
$ajax = new Ajax();
?>

<html>
<head>
<title>My Sample</title>

<?=$ajax->js('../js/');?>

</head>
<body>

<select onchange="<?=$ajax->remote_function(array('update' => 'options', 'url' => 'example_onchange_data.php')); ?>"> 
<option value="0">Hello</option>
<option value="1">World</option>
</select>

<div id="options">When change combobox, this text will be turn on the value echoed by ajax_onchange_data.php</div>

</body>
</html>