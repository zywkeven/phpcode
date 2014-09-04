<?php
	/**
	 * Backend file to manage rating
	 * 
	 */
	
	if($_GET['idName'] == 'id') {
		// add the rating to the field/database
		$fp = fopen('rating.txt', 'a') or die ("Failed to open file: <b>rating.txt</b> for editing.");
		fwrite($fp, ','.$_GET['id']) or die ("Failed to write into file: <b>rating.txt</b>.");
		fclose($fp);
		
		// display the current(new) rating
		$file = file_get_contents('rating.txt');
		$filearray = explode(',', $file);
		echo array_sum($filearray)/count($filearray);
	}
	elseif ($_GET['idName'] == 'newid') {
		// add the rating to the field/database
		$fp = fopen('rating2.txt', 'a') or die ("Failed to open file: <b>rating2.txt</b> for editing.");
		fwrite($fp, ','.$_GET['id']) or die ("Failed to write into file: <b>rating2.txt</b>.");
		fclose($fp);
		
		// display the current(new) rating
		$file = file_get_contents('rating2.txt');
		$filearray = explode(',', $file);
		echo array_sum($filearray)/count($filearray);
	}
	else {
		echo "ERROR";
	}
	
?>