<table border=1>
<tr>
<td>

<table>
<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td>
<span id=show ><span  scroll='yellow' style="color:#AAADFE">没网在夺在上</span><span scroll='red' style="color:#AAADFE">可耕地奔跑</span></span></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>

</td>
</tr>
</table>

<script>
var tags=show.all.tags("span");

for(var i=0;i<tags.length;i++)
{
  
if(!tags[i].scroll) continue; 
  
eval("var c"+i+"=0");
 
setInterval("var str=tags["+i+"].innerText;if(c"+i+"==str.length)c"+i+"=0;tags["+i+"].innerHTML=str.substring(0,c"+i+")+'<font color="+tags[i].scroll+">'+str.substr(c"+i+"++,1)+'</font>'+str.substr(c"+i+");",600)
}
     
    </script>

