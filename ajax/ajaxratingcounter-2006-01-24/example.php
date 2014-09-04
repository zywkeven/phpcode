<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Ajax Rating Counter</title>
	
		<script src="javascript.js" type="text/javascript"></script>
		<style type="text/css">

		.ratingText {
			font-family: verdana;
			font-weight: bold;
			font-size: 16px;
			color: #FFFFFF;
			background-color: #FF0000;
			width: 135px;			
		}
		</style>
	</head>
<body>
<?php
	/**
	 * Example file
	 * 
	 */
	
	// file/ database to be accessed for rating of 'id'
	$file1 = file_get_contents('rating.txt');
	$filearray1 = explode(',', $file1);
	$rating1 = array_sum($filearray1)/count($filearray1);
	
	
	// file/ database to be accessed for rating of 'newid'
	$file2 = file_get_contents('rating2.txt');
	$filearray2 = explode(',', $file2);
	$rating2 = array_sum($filearray2)/count($filearray2);
	
	
	require_once('AjaxRatingCounter.inc.php');
	$ajaxRatingCounter  = new AjaxRatingCounter();

	$ajaxRatingCounter->addStars($rating1, 'id');
	$ajaxRatingCounter->addStars($rating2, 'newid');
	echo $ajaxRatingCounter->displayStars();
?>

</body></html>