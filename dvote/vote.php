<?php
$voteENTRYindex = $_POST['votingRADIO'];

require_once( "dvote.php" );

$dvote = new dvote( "vote.ini" ) ;
$dvote->setTotalVotesLabel( "Total Votes" ) ;

if ( $dvote->checkVoter( "cookiename", "testtable" ) ) $dvote->vote( $voteENTRYindex ) ;
?>
<html>
<head>
<title>Example Script - Voting Pool</title>
<LINK REL="StyleSheet" HREF="vote.css" TYPE="text/css">
</head>
<body>
<?php $dvote->generateStatistics(); ?>
</body>
</html>
