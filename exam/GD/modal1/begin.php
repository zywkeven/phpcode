<style>
.exam{
    font-size:18px ;font-weight: normal;font-family:cursive;
    background:orange
}   
</style>  

<form name=exam action="exam2.php" method="POST">
<table class=exam align=center border="1">
<br>
<tr><td colspan="2" align="center"><B>请输入资料</B></td></tr>
<tr><td colspan="2" >大面积:</td></tr>
<tr><td width=60>长:</td><td width=100><input name=lengthlarge size="4"></td></tr>
<tr><td>宽:</td><td><input name=widthlarge  size="4"></td></tr> 
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" >小面积:</td></tr> 
<tr><td>长:</td><td><input name=lengthsmall size="4"></td></tr> 
<tr><td>宽:</td><td><input name=widthsamll size="4"></td></tr> 
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>间距:</td><td><input name=distance size="4"></td></tr> 
<tr><td colspan="2" align="center"> 
 
<input type=submit value="submit"> </td></tr>
</table>
</form>