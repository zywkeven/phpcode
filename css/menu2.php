<html>
<body>
<script language="JavaScript">
var zindex=100
function dropit2(whichone){
if (window.themenu&&themenu.id!=whichone.id)
themenu.style.visibility="hidden"
themenu=whichone
if (document.all){
themenu.style.left=document.body.scrollLeft+event.clientX-event.offsetX
themenu.style.top=document.body.scrollTop+event.clientY-event.offsetY+30
if (themenu.style.visibility=="hidden"){
themenu.style.visibility="visible"
themenu.style.zIndex=zindex++}
else{
hidemenu()}}}
function dropit(e,whichone){
if (window.themenu&&themenu.id!=eval(whichone).id)
themenu.visibility="hide"
themenu=eval(whichone)
if (themenu.visibility=="hide")
themenu.visibility="show"
else
themenu.visibility="hide"
themenu.zIndex++
themenu.left=e.pageX-e.layerX
themenu.top=e.pageY-e.layerY+30
return false}
function hidemenu(whichone){
if (window.themenu)
themenu.style.visibility="hidden"}
function hidemenu2(){
themenu.visibility="hide"}
if (document.all)
document.onclick=hidemenu
</script>
<ilayer height=35px>
<layer visibility=show>
<span class=iewrap1>
<span class=iewrap2 onClick="dropit2(dropmenu0);event.cancelBubble=true;return false"><font face=����><a href="#" onClick="if(document.layers) return dropit(event, 'document.dropmenu0')">menu</a></font>
</span>
</span>
</layer>
</ilayer><br>
<div id=dropmenu0 style="position:absolute;left:0;top:0;layer-background-color:#408080;background-color:#408080;visibility:hidden;border:1px solid black;padding:0px">
<script language="JavaScript">
var menu1=new Array()
menu1[0]='<a href="http://www.sina.com/"><font color="#ffcc00">����</font></a><br>'
menu1[1]='<a href="http://www.sohu.com/"><font color="#ffcc00">�Ѻ�</font></a><br>'
menu1[2]='<a href="http://www.163.com/"><font color="#ffcc00">����</font></a><br>'
if (document.all)
dropmenu0.style.padding="4px"
for (i=0;i<menu1.length;i++)
document.write(menu1[i])
</script>
</div>
 
</body>
</html>