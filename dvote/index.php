<html>
<head>
<title>Example Script - Voting Pool</title>
<LINK REL="StyleSheet" HREF="vote.css" TYPE="text/css">
</head>
<body>
<?php
require_once("dvote.php");

$dvote = new dvote("vote.ini");
$dvote->generateVotingTable();
?>
</body>
</html>