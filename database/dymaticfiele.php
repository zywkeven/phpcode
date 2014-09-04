<?php
include("../conn/conn.php");  
?>

<table width="300" border="1" >
<form name="form1" method="POST" action="insert.php">

<tr align="center">
<td height="30" colspan="2"><h2>用户资料录入</h2></td>
</tr>
<?php
$ss=mysql_list_fields("pgm2","city");
$count=mysql_num_fields($ss);
for($i=1;$i<$count;$i++)
{
    ?>
    <tr>
    <td width=80 height=20 align=center><?php echo mysql_field_name($ss,$i);?></td>
    <td width="220"><input name="<?php echo mysql_field_name($ss,$i);?>" type="text" size="20"></td>
    </tr>
     
    <?php
}?>
<tr>
<td> &nbsp;</td>

<td height="22"><input type="submit" name="Submit" value="提交">
<input type="reset" name="Submit2" value="重置"></td>
</tr>
</form>
</table>
