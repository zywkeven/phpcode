
<form name=form1 method="POST" action="road.php" >
<table align=center bgcolor="#EE00DD" border=1>

<tr><td align="center" colspan="2">车辆流量</td></tr>

<tr><td>限定流量</td><td><input type=text name="flow" value="1500">&nbsp;辆次/小时</td></tr>

<tr><td>起始日期</td><td><input type=text name="date1" value="<?php echo date('Y-m-d',time()+28800)?>"></td></tr>
<tr><td>终止日期</td><td><input type=text name="date2" value="<?php echo date('Y-m-d',time()+28800)?>"></td></tr>
<tr><td>允许范围系数</td><td><input type=text name="rate" value="5">&nbsp;%</td></tr>
<tr><td>间隔时间</td><td><input type=text name="interval" value="60">&nbsp;(必须为15的整数倍)</td></tr>
 
<tr><td colspan="2"><a href="javascript:jump();">查看运行记录</a></td></tr>
<tr>
<td align="center" colspan="2"> 
<button type=submit name="post">运行</button>&nbsp;&nbsp; 
<button type=reset name="resetbtn">reset</button>     
</td>
</tr>
 <script src=common.js ></script> 
</form>


