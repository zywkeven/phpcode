<?php

$autocomplete	= $_POST['autocomplete'];

// Here you can interact with you database, for example:
// $sql = "SELECT * FROM your_table WHERE your_field LIKE '%".$autocomplete."%'";
// On my case I will use a file, called txt_for_autocomplete.txt
// For more details see the User Guide or http://wiki.script.aculo.us/scriptaculous/show/Ajax.Autocompleter

$names = file('txt_for_autocomplete.txt');

echo "<ul>";

foreach ($names as $key => $name) {
	if (strpos(strtolower($name),strtolower($autocomplete)))
		echo "<li>".substr($name,0,27)."</li>";
}

echo "</ul>";

?>