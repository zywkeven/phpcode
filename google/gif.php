<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<style type="text/css"> 
<!-- 
body {text-align:center} 
.icon td {width:50px;height:37px;background-image:url(http://www.zzsky.cn/effect/images/2008901080950.gif)} 
.capt td {font:normal 11px verdana;padding:2px 0} 
.a {background-position-y:0px} 
.b {background-position-y:-37px} 
.c {background-position-y:-74px} 
.d {background-position-y:-111px} 
.e {background-position-y:-148px} 
.f {background-position-y:-185px} 
.g {background-position-y:-222px} 
.f1 {background-position-x:0px} 
.f2 {background-position-x:-51px} 
.f3 {background-position-x:-101px} 
.f4 {background-position-x:-153px} 
.f5 {background-position-x:-205px} 
.f6 {background-position-x:-257px} 
.f7 {background-position-x:-309px} 
--> 
</style> 
<script language="javascript"> 
 window.onload=function(){ 
  var t=document.getElementsByTagName('table')[0]; 
  var cs=t.rows[1].cells,ct=t.rows[0].cells; 
  for(var i=0;i<cs.length;i++) 
    cssAni(cs[i],ct[i],7); 
} 
function cssAni(osrc,otarget,num,duration){ 
  var t=null,c=1,d=0,n=0,i=Math.floor((duration||300)/num); 
  var s=otarget.className.replace(/.$/,''),r=/over/; 
  osrc.onmouseover=osrc.onmouseout=function(e){ 
    n=r.test((e||event).type)?1:-1; 
    if(!t) t=setInterval(function(){ 
      if((c==1||c==num)&&((d==n||c+n<1)||!(d=n))) 
          return clearInterval(t),t=null; 
      otarget.className=s+(c+=d); 
    },i); 
  }; 
} 
</script>
</head>
<body>
<table> 
  <tr class="icon"> 
    <td class="a f1"></td> 
    <td class="b f1"></td> 
    <td class="c f1"></td> 
    <td class="d f1"></td> 
    <td class="e f1"></td> 
    <td class="f f1"></td> 
    <td class="g f1"></td> 
  </tr> 
  <tr class="capt"> 
    <td><a href="#">A</a></td> 
    <td><a href="#">B</a></td> 
    <td><a href="#">C</a></td> 
    <td><a href="#">D</a></td> 
    <td><a href="#">E</a></td> 
    <td><a href="#">F</a></td> 
    <td><a href="#">G</a></td> 
  </tr> 
</table>
</body>
</html>