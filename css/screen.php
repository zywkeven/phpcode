<script>


function pp()
{
    document.all.table1.style.width='100%';
    document.all.table1.style.height='100%'; 
    document.all.td2.style.width=document.all.td3.style.width='2%';
} 
function DUform(N){
    if(N==1){document.body.scrollTop+=document.body.scrollHeight}
    else
    document.body.scrollTop=0
}
</script>


<body onResize="pp()" onload="pp()"> 
<td id=td2><img id=img2 src=pic.bmp width=20 height=20 onclick="DUform(1)"></td>
<td id=td3><img id=img1 src=pic.bmp width=20 height=20 onclick="DUform(2)"></td> 
<table id=table1>
<?php
for($i=0;$i<50;$i++)
echo '<tr><td>kdjfsl</td></tr>';
?>
</table>
</body>
</html>