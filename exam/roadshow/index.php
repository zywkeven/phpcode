
<form name=form1 method="POST" action="road.php" >
<table align=center bgcolor="#EE00DD" border=1>

<tr><td align="center" colspan="2">��������</td></tr>

<tr><td>�޶�����</td><td><input type=text name="flow" value="1500">&nbsp;����/Сʱ</td></tr>

<tr><td>��ʼ����</td><td><input type=text name="date1" value="<?php echo date('Y-m-d',time()+28800)?>"></td></tr>
<tr><td>��ֹ����</td><td><input type=text name="date2" value="<?php echo date('Y-m-d',time()+28800)?>"></td></tr>
<tr><td>����Χϵ��</td><td><input type=text name="rate" value="5">&nbsp;%</td></tr>
<tr><td>���ʱ��</td><td><input type=text name="interval" value="60">&nbsp;(����Ϊ15��������)</td></tr>
 
<tr><td colspan="2"><a href="javascript:jump();">�鿴���м�¼</a></td></tr>
<tr>
<td align="center" colspan="2"> 
<button type=submit name="post">����</button>&nbsp;&nbsp; 
<button type=reset name="resetbtn">reset</button>     
</td>
</tr>
 <script src=common.js ></script> 
</form>


