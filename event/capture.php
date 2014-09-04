<html>
<head>
<script language="javascript>">
function setDocCatpture(enable)
{
   /* if(!enable)
    {
        document.captureEvents(Event.CLICK)
    }else
    document.releaseEvents(Event.CLICK);
          */
}
function doMainClick(e)
{
    if(e.target.type=="button")
    {
        alert("Captured in top document")
    }  
}
//document.captureEvents(Event.CLICK);
window.onclick=doMainClick;
</script>
</head>
<form>
<input type=checkbox onMouseUp="setDocCatpture(this.checked)" checked >enalbe document Capture
<hr>
<input type=button value="Buttonm'main1'" name=main1 onclick="alert('Event finally reached button '+this.name)">
</form>  
</html>
