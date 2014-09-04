<meta charset='utf-8'>
<script language="javascript">
var sInitColor = null;
function callColorDlg(){
    if (sInitColor == null) {
            var sColor = dlgHelper.ChooseColorDlg();
    }else{
            var sColor = dlgHelper.ChooseColorDlg(sInitColor);
    }      alert(sColor);
    sColor = sColor.toString(16);
    if (sColor.length < 6) {
      var sTempString = "000000".substring(0,6-sColor.length);
      sColor = sTempString.concat(sColor);
    }
    sColor = "#" + sColor
    document.getElementById("font").style.color=sColor;//颜色应用
}
</script>
<span id="font">aaaaaaa</span>
<input ID="ofntColor" onclick="callColorDlg()" type=button value="请选择颜色">
<OBJECT id="dlgHelper" CLASSID="clsid:3050f819-98b5-11cf-bb82-00aa00bdce0b" width="0px" height="0px"></OBJECT>