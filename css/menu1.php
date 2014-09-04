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
themenu.top=e.pageY-e.layerY+19
return false}
function hidemenu(whichone){
if (window.themenu)
themenu.style.visibility="hidden"}
function hidemenu2(){
themenu.visibility="hide"}
if (document.all)
document.onclick=hidemenu
</script>
<ILAYER left=420 top=220 height=35px>
<layer visibility=show>
<span class=iewrap1>
<span class=iewrap2 onclick="dropit2(dropmenu0);event.cancelBubble=true;return false">
<a href="#" onclick="if(document.layers) return dropit(event,'document.dropmenu0')"
>下拉</a>
</span>
</span>
</layer>
</ilayer>
<div id=dropmenu0
style="position:absolute;visibility:hidden;background:red">
<script>
var menu1=new Array()
menu1[0]='<a href="scroll.php">scroll</a><br>';
menu1[1]='<a href="total.php">total</a><br>';   
menu1[2]='<a href="filter.php">filter</a><br>';  
if(document.all)
dropmenu0.style.padding='5px';
for(i=0;i<menu1.length;i++)
document.write(menu1[i]);
</script>
</div>
<script> /*
if(document.layers){
document.dropmenu0.captureevents(Event.CLICK);
document.dropmenu0.onclick=hidenmenu2;
}    */
</script> 
