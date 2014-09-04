<body>
<td align=center ><span onclick="showPophelp('wlecome',18,20,0,180)">个人主页</span></td>
<td ><span onclick="javascript:body.style.cursor='help'";style="cursor:help"<big><b>?</b></big></span></td> 

<OBJECT id=pophelp type="application/x-oleobject" classid="clsid:adb880a6-d8ff-11cf-9377-00aa003b7a11">

</OBJECT>

<script>
popstyle="Verdana,10,,";
function showPophelp(helpstr,w,h,Foreground,Background)
{
    if(document.body.style.cursor=='help')
    pophelp.TextPopup(helpstr,popstyle,w,h,Foreground,Background);
}
document.onclick=resetCursor;
function resetCursor(){
    if(!(event.srcElement.innerText=="?"))
   document.body.style.cursor='default';
}
</script>
</body> 