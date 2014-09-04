<meta charset='utf-8'>

<div id='testid' >0</div>
<input type='button' onclick='setTimeTip()' value='click'>
<script>
function setTimeTip(){
    var cou=0;
    this.timetip=function(){
        document.getElementById('testid').innerHTML=cou;
        cou++;   
        if (cou>5){
            clearInterval(ad);
        }
    }
    var ad=setInterval("timetip()",1000);
    
    
    
}
</script>
