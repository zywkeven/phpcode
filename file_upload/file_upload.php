 <script src="check.js"></script> 
<FORM name="form1" ACTION="file_upload2.php" method="post" ENCTYPE="multipart/form-data" 
onsubmit="return checkvalue()"> 
<table border=1 align=center>  
<tr>
<td>上传文件:</td>
<td><input type="file" name="upfile"  SIZE="25"></td>
</tr>

<tr>
<td>文件名:</td>
<td><input type="text" name="filename"  maxlength="200"></td>
</tr> 

<tr>
<td colspan=2 align=center>
<input type=submit VALUE="Upload" name="Submit"></td>
</tr> 
 
</table>
</FORM> 

