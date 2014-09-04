<?php

/**
 * testtreeview.php
 *
 * @version $Id$
 * @copyright 2009
 *
 * This page is an example using the AJAX treeview.class.php
 *
 * The example establishes a connection on port 3306 to my database server.
 * To allow this, the server which runs the example may not be behind a proxy
 * and you must free this port on your firewall.
 *
 * It connects to a database with about 43000 records of a car brand and
 * model index. The car models are ordered in a tree with the levels
 * country, make, model, series and engines.
 *
 * Clicking on the text selects the node and displays the amount of the sub
 * nodes or a photo of the car if available. For this, an AJAX function is
 * called which return the html code to be placed into the container div element.
 *
 * The connection parameters allow you to read from the database but not modify
 * the records.
 */

include "treeview.class.php";

$db = mysql_connect('www.3sweb.net', 'clcar_r', 'LVKmN96XBteTT8cR');
mb_internal_encoding('UTF-8');
mysql_set_charset('utf8', $db);
mysql_select_db('classiccars');

$oTv = new treeView('carindex', 'disp');
$oTv->jFunct = "showContent(pNode)";
$oTv->sortOrder = 'disp';

if (isset($_POST['parent'])) {
	echo $oTv->treeNode($_POST['parent'], $_POST['last']);
	exit;
}

if (isset($_POST['id'])) {
	$s = '';
	$aEntry = getRec('carindex', $_POST['id']);
	if ($aEntry['country']) {
		$aCnt = queryTable("select count(id) as count from make where make.country = $aEntry[country]");
		$s = "<h3>$aEntry[disp]</h3>";
		$s .= "This country has $aCnt[count] makes.";
	} else if ($aEntry['make']) {
		$aCnt = queryTable("select count(id) as count from model where model.make = $aEntry[make]");
		$s = "<h3>$aEntry[disp]</h3>";
		$s .= "This make produced $aCnt[count] models.";
	} else if ($aEntry['model']) {
		$aCnt = queryTable("select count(id) as count from serie where serie.model = $aEntry[model]");
		$s = "<h3>$aEntry[disp]</h3>";
		$s .= "From this model where $aCnt[count] series produced.";
	} else if ($aEntry['serie']) {
		$aSerie = getRec('serie', $aEntry['serie']);
		if ($aSerie['image']) {
			$aImage = getRec('images', $aSerie['image']);
			$s = "<img id=\"carimg\" src=\"http://www.ccarshow.net/images/series/$aImage[imgname]\" />";
		} else {
			$s = "<h4>No Image available</h4>";
		}
	}
	echo $s;
	exit;
}

function getRec($table, $id){
	$sq = "select * from $table where id=$id";
	return queryTable($sq);
}

function queryTable($sq) {
	$rs = mysql_query($sq);
	return mysql_fetch_assoc($rs);
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>Test Treeview</title>
		<link rel="stylesheet" type="text/css" href="treeview.css">
		<style type="text/css">
			#tree {float: left}
			#content {float: left; height: 300px; width: 500px; margin-left: 10px}
			#carimg	{ width: 400px; height:300px }
		</style>
		<script type="text/javascript" src="tree.js"></script>
		<script type="text/javascript">
			function showContent(oNode){
				var nodeId = oNode.id.substr(2);
				sendString('id='+nodeId, location.pathname, 'content');
			}

			function sendString(pString, pUrl, pDest, pFunc){
				var nPar = arguments.length;
				var oRq = new XMLHttpRequest();
				oRq.open("POST", pUrl, true);
				oRq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				oRq.onreadystatechange = function () {
					if (oRq.readyState == 4) {
						if (oRq.status == 200) {
							var oDest = document.getElementById(pDest);
							oDest.innerHTML = oRq.responseText;
							if (pFunc) {
								pFunc();
							}
						}
					}
				}
				oRq.send(pString);
			}
		</script>
	</head>
	<body>
	<h3>Test treeView</h3>
	<div id="tree"><?=$oTv->treeView()?></div>
	<div id="content"></div>
	</body>
</html>