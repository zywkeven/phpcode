
<html>
<body>
<img src='' name='Image1'>
<script>
function filename()//获得当前页面的文件名
{
var docUrl=document.URL;
var lastPipe=docUrl.lastIndexOf('/');  //当然也可以采用正则表达式
var lastPeriod=docUrl.lastIndexOf('.');
var fileName="";
if(lastPipe<lastPeriod){
fileName=docUrl.substring(lastPipe+1,lastPeriod);
}
else {
fileName="";
}
return fileName;
}
alert(filename())
if(filename()=="index")
{
    document.all.Image1.src='1.jpg';
}
else
{
    document.all.Image1.src='2.jpg';
}

</script>
</body>
</html>

