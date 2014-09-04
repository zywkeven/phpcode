<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh" lang="zh">
<head profile="http://www.w3.org/2000/08/w3c-synd/#">
<meta http-equiv="content-language" content="zh-cn" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>51css</title>
<style type="text/css">
/*<![CDATA[*/
a,label {
 display:block;
 width:25px;
 height:25px;
 overflow:hidden
 }
a {
 background:url("bg1.gif") no-repeat
 }
a:hover {
 background:url("bg3.gif") no-repeat
 }
a#b {
 background:url("bg2.gif") no-repeat
 }

/*]]>*/
</style>
</head>
<body>
<label for="cc">
<a href="#b" id="a" onclick="cc.checked=true"></a>
<a href="#a" id="b" onclick="cc.checked=false"></a>
</label>
<input type="checkbox" id="cc" />

<a href="#c" id="d" >ab</a>
<a href="#d" id="c" >cd</a>
</body>
</html>