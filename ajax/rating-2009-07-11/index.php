<?php include('RatingManager.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Star Rating</title>
<script type="text/javascript" src="js.js"></script>
	<link rel="stylesheet" type="text/css" href="stars.css" />
</head>

<body>

<?php 
	
	$ratingManager = RatingManager::getInstance();
	$ratingManager->drawStars(1);
	print "<br>";
	$ratingManager->drawStars(2);
	print "<br>";
	$ratingManager->drawStars(3);

?>

</body>
</html>