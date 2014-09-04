<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- JavaScript 实现动态增加、删除表单域 -->
<HTML>
<HEAD>
<TITLE> New Document </TITLE>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<SCRIPT LANGUAGE="JavaScript">

var i=0
function fireAdd(){
var temp = document.getElementById("third");
temp.insertRow(temp.rows.length);
temp.rows.item(temp.rows.length -1).insertCell(0);
var xx=temp.rows.length -1 ;//-1
var sHTML
sHTML='<TABLE border=\"1\" style=\"border-collapse: collapse\" bordercolor=\"#111111\"width=\"100%\">' +
'<TR>' +
'<TD align=\"center\" colspan=\"4\">个人信息 (' + i++ +')</TR>' +
'<TR>' +
'<TD align=\"right\">姓名:</TD>' +
'<TD>&nbsp;<INPUT TYPE=\"text\" NAME=\"tName\"></TD>' +
'<TD align=\"right\">性别:</TD>' +
'<TD>&nbsp;<INPUT TYPE=\"radio\" checked NAME=\"rSex\">先生&nbsp;&nbsp;<INPUT TYPE=\"radio\" NAME=\"rSex\">女士</TD>' +
'</TR>' +
'<TR>' +
'<TD align=\"right\">职务:</TD>' +
'<TD>&nbsp;<SELECT NAME=\"\">' +
'<option value=\"其它\">&nbsp;其它&nbsp;</option>' +
'<option value=\"经理\">&nbsp;经理&nbsp;</option>' +
'</SELECT>' +
'</TD>' +
'<TD align=\"right\">邮件:</TD>' +
'<TD>&nbsp;<INPUT TYPE=\"text\" NAME=\"tMail\"></TD>' +
'</TR>' +
'<TR>' +
'<TD align=\"center\" colspan=\"4\"><input type=\"button\" value=\" 删除 \" onclick=\"Delete(this);\">'
'</TR>' +
'</TABLE>';
temp.rows.item(temp.rows.length-1).cells.item(0).innerHTML=sHTML;  
temp.rows.item(temp.rows.length-1).cells.item(0).childNodes.item(0).rows.item(3).cells.item(0).childNodes.item(0).text=xx;
}
function Delete(x)
{
var temp = document.getElementById("third");
temp.deleteRow(x.text.valueOf())
for (var j=0;j<temp.rows.length;j++)
{
temp.rows.item(j).cells.item(0).childNodes.item(0).rows.item(3).cells.item(0).childNodes.item(0).text=j;
}
}



</SCRIPT>
</HEAD>
<BODY>
<table border="1" style="border-collapse: collapse" bordercolor="#111111" width="100%">
<tr>
<td width="100%" align="center">Register</td>
</tr>
<tr>
<td align="center">
<TABLE border="1" width="80%" style="border-collapse: collapse" bordercolor="#111111" id="first">
<TR>
<TD align="right" width="15%">公司:</TD>
<TD>&nbsp;<INPUT TYPE="text" NAME="tCompany" size="60">
</TD>
</TR>
<TR>
<TD align="right">地址:</TD>
<TD>&nbsp;<INPUT TYPE="text" NAME="tAddress" size="60">
</TD>
</TR>
<TR>
<TD align="right">电话:</TD>
<TD>&nbsp;<INPUT TYPE="text" NAME="tTelephone" size="30">
</TD>
</TR>
<TR>
<TD align="right">传真:</TD>
<TD>&nbsp;<INPUT TYPE="text" NAME="tFax" size="30">
</TD>
</TR>
</table>
</td>
</tr>
<tr>
<td align="center">
<INPUT TYPE="button" value=" 添加 " onclick="fireAdd()">
</td>
</tr>
<tr>
<td align="center">
<TABLE align=center border=0 width="100%" height="100%" id="second">
<TR>
<TD width="100%" height="300" align="center">
<DIV style=" OVERFLOW: auto;BORDER-RIGHT: 1px solid; BORDER-TOP: 1px solid; BORDER-LEFT: 1px solid; BORDER-BOTTOM: 1px solid; WIDTH: 80%; HEIGHT: 100%">
<div width="100%" id="third">
</div>
</DIV>
</TD>
</TR>
</TABLE>
</td>
</tr>
<tr>
<td align="center">
<TABLE border="1" width="40%" style="border-collapse: collapse" bordercolor="#111111">
<TR>
<TD width="10%">&nbsp;<INPUT TYPE="checkbox" NAME="">寄资料</TD>
</TR>
<TR>
<TD>&nbsp;<INPUT TYPE="checkbox" NAME="">去</TD>
</TR>
</TABLE>
</td>
</tr>
<tr>
<td align="center">
<INPUT TYPE="submit" value=" 提交 ">&nbsp;&nbsp;<INPUT TYPE="reset" value=" 清空 ">
</td>
</tr>
</table>
</BODY>
</HTML>

