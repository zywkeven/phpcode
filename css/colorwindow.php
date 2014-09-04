<input name="color"type="text" id="color" size="3" readonly style="background:black" onclick="colorpick(this)">
 <script>
function colorpick(field){
    var rtn=window.showModelessDialog("color.php","","dialogWidth:350px;dialogHeight:170px;status:no;help:no;scrolling=no;scrollbars=no");
    if(rtn!=null)
   { //document.body.style.background=rtn; 
    field.style.background=rtn;
   } 
    return ;
}
</script>
 