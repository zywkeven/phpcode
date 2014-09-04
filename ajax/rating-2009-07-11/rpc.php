<?php
include('RatingManager.inc.php'); 
$ratingManager = RatingManager::getInstance();
 // $_REQUEST['j'] vote values 
 // $_REQUEST['q'] product id voted
 // $_REQUEST['t'] IP address of the personal
$ratingManager->updateVote($_REQUEST['j'], $_REQUEST['q'], $_REQUEST['t']);
?>