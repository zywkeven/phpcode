<?php require_once('../Connections/link.php'); ?>
<?php
	include_once("../common/inc_initialize_nodb.php"); 
 	$thisLevel='book';	
 	include_once("../common/fun_checklogin.php"); ?>
<?php
$colname_list_week =  time();
if (isset($_GET['mthStart'])) {
  $colname_list_week = (get_magic_quotes_gpc()) ? $_GET['mthStart'] : addslashes($_GET['mthStart']);
}
mysql_select_db($database_link, $link);
$query_list_week = sprintf("SELECT * FROM book_schedule", $colname_list_week); // WHERE dateStart != '%s'
$list_week = mysql_query($query_list_week, $link) or die(mysql_error());
$row_list_week = mysql_fetch_assoc($list_week);
$totalRows_list_week = mysql_num_rows($list_week);
?>
<?php

    // get this month and this years as an int
    $thismonth = ( int ) date( "m" );
    $thisyear = date( "Y" );
    
    // find out the number of days in the month
    $numdaysinmonth = cal_days_in_month( CAL_GREGORIAN, $thismonth, $thisyear );
    
    // create a calendar object
    $jd = cal_to_jd( CAL_GREGORIAN, date( "m" ),date( 1 ), date( "Y" ) );
    
    // get the start day as an int (0 = Sunday, 1 = Monday, etc)
    $startday = jddayofweek( $jd , 0 );
    
    // get the month as a name
    $monthname = jdmonthname( $jd, 1 )

?>

<html>
<head>
<?php include_once("../common/inc_head.php"); ?>
<!-- script files: configuration and core script -->
<script language="JavaScript" src="../cal2/cal_tpl.js"></script>
<script language="JavaScript" src="../cal2/cal_strings.js"></script>
<script language="JavaScript" src="../cal2/calendar.js"></script>
<link rel="stylesheet" href="../cal2/calendar.css">
<style type="text/css" media="all">
    #cal table {
    
        width: 125px;
    
    }
    
    #cal th {
        padding: 1px;
        border: 1px solid #666666;
        text-align: center;
		width: 100px;
    }
    #cal td {
        padding: 1px;
        border: 1px solid #666666;
        text-align: center;
		width: 100px;
		height: 70px;
    }

</style>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
</head>

<body>
<?php include_once("../common/inc_pagetop.php"); ?>
<table border="0" cellpadding="0" cellspacing="0" class="bodyBg">
  <tr>
    <td>
<table align="center" id="cal">
    <tr>
        <td colspan="7"><div align="center"><strong><?= $monthname ?></strong></div></td>
    </tr>
    <tr>
        <th><strong>S</strong></th>
        <th><strong>M</strong></th>
        <th><strong>T</strong></th>
        <th><strong>W</strong></th>
        <th><strong>T</strong></th>
        <th><strong>F</strong></th>
        <th><strong>S</strong></th>
    </tr>
    <tr>
<?php

    // put render empty cells

    $emptycells = 0;

    for( $counter = 0; $counter <  $startday; $counter ++ ) {
    
        echo "\t\t<td>-</td>\n";
        $emptycells ++;
    
    }
    
    // renders the days
    
    $rowcounter = $emptycells;
    $numinrow = 7;
    
    for( $counter = 1; $counter <= $numdaysinmonth; $counter ++ ) {
    
        $rowcounter ++;
        
        echo "\t\t<td>$counter";
		
//== my contents 
//		echo $calDate=date( "Y" )."-".date( "m" )."-".$counter;
    	 if(date("j",strtotime($row_list_week['dateStart'])==$counter)) {
	 do { ?>
    <div style="background: #FFFFCC; border: 1px solid #FFFF99"><a href="#" onClick="window.location='book_schedule_edit.php?action_type=edit&recordID=<?php echo $row_list_week['scheduleID']; ?>'">
	<span title="<?php echo $row_list_week['custID']; ?>" class="txtPackage"><?php echo date("H:i",strtotime($row_list_week['dateStart'])); ?></span>
	<span title="<?php echo $row_list_week['custID']; ?>" class="txtPackage"><?php echo $row_list_week['bookType']; ?></span><br>
	<?php echo $row_list_week['custName']; ?>
	<?php echo $row_list_week['dateEnd']; ?>
	<?php echo $row_list_week['detail']; ?></a>
	</div>
  <?php
   } while ($row_list_week = mysql_fetch_assoc($list_week)); 
	  } else {
	  return;
	  }

		
		
		
		
//== end of my contents		
		echo "</td>\n";
        
        if( $rowcounter % $numinrow == 0 ) {
        
            echo "\t</tr>\n";
            
            if( $counter < $numdaysinmonth ) {
            
                echo "\t<tr>\n";
            
            }
        
            $rowcounter = 0;
        
        }
    
    }
    
    // clean up
    $numcellsleft = $numinrow - $rowcounter;
    
    if( $numcellsleft != $numinrow ) {
    
        for( $counter = 0; $counter < $numcellsleft; $counter ++ ) {
        
            echo "\t\t<td>-</td>\n";
            $emptycells ++;
        
        }
    
    }

?>
    </tr>
</table>




<table>
  <tr>
  <td style="line-height: 140%; background: #E0E0E0">
  
  
  
  </td>
  </tr>
</table>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($list_week);
?>
