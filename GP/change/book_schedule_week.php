<?php require_once('../Connections/link.php'); ?>
<?php
	include_once("../common/inc_initialize_nodb.php"); 
 	$thisLevel='book';	
 	include_once("../common/fun_checklogin.php"); ?>
<?php
$colname_list_week =  time();
if (isset($_GET['dateStart'])) {
  $colname_list_week = (get_magic_quotes_gpc()) ? $_GET['dateStart'] : addslashes($_GET['dateStart']);
}
mysql_select_db($database_link, $link);
$query_list_week = sprintf("SELECT * FROM book_schedule", $colname_list_week); // WHERE dateStart != '%s'
$list_week = mysql_query($query_list_week, $link) or die(mysql_error());
$row_list_week = mysql_fetch_assoc($list_week);
$totalRows_list_week = mysql_num_rows($list_week);
?>
<html>
<head>
<style type="text/css">
<!--
.schTxt {
 	background: #FFFFCC; 
 	border: 1px solid #FFFF99;
	position: absolute;
}
.schTxt a:link,
 .schTxt a:visited {
	text-decoration: none;
	width: 100%;
}
.schTxt a:hover {
 	background: #FFCC00; 
 	border: 1px solid #FFCC99;
 	text-decoration: none;
}
-->
</style>
<?php include_once("../common/inc_head.php"); ?>
<!-- script files: configuration and core script -->
<script language="JavaScript" src="../cal2/cal_tpl.js"></script>
<script language="JavaScript" src="../cal2/cal_strings.js"></script>
<script language="JavaScript" src="../cal2/calendar.js"></script>


<link rel="stylesheet" href="../cal2/calendar.css">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
</head>

<body>
<?php include_once("../common/inc_pagetop.php"); ?>
<table border="0" cellpadding="0" cellspacing="0" class="bodyBg">
  <tr>
    <td >
	  <h1>Booking Calendar
      </h1>
	  <table width="100%">
  <tr>
  <td style="line-height: 140%; background: #E0E0E0">
     
	</div><div style="height: 200px; border: 1px solid #FFCC00; margin: 3px">
	<div style="font-family: Georgia, Times New Roman, Times, serif; font-size: 24px; background:#FFCC00" onClick="window.location='book_schedule_edit.php?action_type=add'">
	<?php  echo date("y")."  ".date("m");
  ?>
	&nbsp;&nbsp;&nbsp;<span class="smallButton1"><a href="#"><?php echo $row_v_basic['add'][$Lang] ?></a></span>
</div>
	  
    <table>  
    <tr> 
     <div class="schTxt">
      <td>
     <a href="#"> 
     
     <font size=+1><?php echo "1"; ?> </font>
     
          </a></td><td><font size=+1>&nbsp; <a href="#"> <?php echo "2"; ?></font>
      </td> 
      
      
     </tr>
     </div>
     
      </a> 
	</div>
	 
  
  </td>
  </tr>
</table> </td>
  </tr>
</table>
</body>
</html>

