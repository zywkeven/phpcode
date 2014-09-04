<?php

include "../Ajax.php";
$ajax = new Ajax();

$id = $_POST['id'];

// Using this id you can do many things. You can interact with your 
// database or with your session here. I simple switched it and show a 
// phrase according to id

switch ($id){
	case 'cell1':
		$name = 'Black Cell Phone';
		break;
	case 'cell2':
		$name = 'White Cell Phone';
		break;
	case 'cell3':
		$name = 'Motorola Cell Phone';
		break;
}

$content =  '<img src="../image/'.$id.'.png" width="20" height="30"> '.$name.'<br>';

$script =
"<script type='text/javascript'>
	$('".$id."').style.visibility = 'hidden';
	new Insertion.After('list', '".$content."');
</script>";

echo $script;
?>