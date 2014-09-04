<html>
<meta charset="utf-8">
<link rel=stylesheet type=text/css href=main.css>
<a href="#" >ksdjfkdsjfkjsd</a>

<style>
<!--
body { font-family: Tahoma; font-size: 8pt }
.leftmenu {
width:150px;
}
.leftmenu li {
display: inline;
white-space: nowrap;
}

.leftmenu span,
.leftmenu a:active,
.leftmenu a:visited,
.leftmenu a:link {
display: block;
text-decoration: none;
margin: 6px 10px 6px 0px;
padding: 2px 6px 2px 6px;
color: #00527f;
background-color: #d9e8f3;
border: 1px solid #004266;
}

.leftmenu a:hover {
color: red;
background-color: #8cbbda;
}

.leftmenu span {
color: #a13100;
}

-->
</style>
</head>
<ul class="leftmenu">
<li><a target="_blank" href="http://www.microsoft.com/china">www.Microsoft.com</a>
<li><a target="_blank" href="http://www.google.com">www.Google.com</a>
<li><a target="_blank" href="http://www.pc.net/">www.pc51.Net</a>
</ul>




该文章转载自宋氏电脑 技术无忧：http://www.pc51.net/www/html-css/2007-01-03/1983.html



<html> 
<head> 
<title>CSS制作多种链接样式实例</title> 
<style type="text/css"> 
<!-- 
a:link { color: #CC3399; text-decoration: none} 
a:visited { color: #FF3399; text-decoration: none} 
a:hover { color: #800080; text-decoration: underline} 
a:active { color: #800080; text-decoration: underline} 

a.red:link { color: #FF0000; text-decoration: none} 
a.red:visited { color: #FF0000; text-decoration: none} 
a.red:hover { color: #606060; text-decoration: underline} 
a.red:active { color: #606060; text-decoration: underline} 

a.ameth:link { color: #400040; text-decoration: none} 
a.ameth:visited { color: #400040; text-decoration: none} 
a.ameth:hover { color: #FF3399; text-decoration: underline} 
a.ameth:active { color: #FF3399; text-decoration: underline} 

div.other a:link { color: #004000; text-decoration: none} 
div.other a:visited { color: #004000; text-decoration: none} 
div.other a:hover { color: #008000; text-decoration: underline} 
div.other a:active { color: #008000; text-decoration: underline} 
--> 
</style> 
<!-- 链接样式表 --> 
</head> 
<body> 
第一种样式(默认的) <a href="http://www.dayanmei.com">个人日志</a> <br> 
第二种样式 <a class="red" href="http://www.dayanmei.com">个人日志</a><br> 
另外一种实现链接样式的方法 <a class="ameth" href="http://www.dayanmei.com">个人日志</a><br> 
<div class="other">DIV容器实现链接样式的方法 <a class="other" href="http://www.dayanmei.com">个人日志</a></div><br> 
</body> 
</html> 
 
当然,你完全可以将CSS代码写入一个CSS文件,这样做的好处,不仅是你的网页HTML代码简洁了,而且你会发现速度也跟着提升了,因为浏览器会缓存你的CSS文件,更重要的是你要改变样式时只需要改变CSS样式表文件就可以了
这样写
css样式文件 default.css

a:link { color: #CC3399; text-decoration: none}
a:visited { color: #FF3399; text-decoration: none}
a:hover { color: #800080; text-decoration: underline}
a:active { color: #800080; text-decoration: underline}
a.red:link { color: #FF0000; text-decoration: none}
a.red:visited { color: #FF0000; text-decoration: none}
a.red:hover { color: #606060; text-decoration: underline}
a.red:active { color: #606060; text-decoration: underline}
a.ameth:link { color: #400040; text-decoration: none}
a.ameth:visited { color: #400040; text-decoration: none}
a.ameth:hover { color: #FF3399; text-decoration: underline}
a.ameth:active { color: #FF3399; text-decoration: underline}
div.other a:link { color: #004000; text-decoration: none}
div.other a:visited { color: #004000; text-decoration: none}
div.other a:hover { color: #008000; text-decoration: underline}
div.other a:active { color: #008000; text-decoration: underline}

现在,你只需要将CSS包含进你的HTML文件就可以了
index.htm

<html> 
<head> 
<title>CSS制作多种链接样式实例</title> 
<link rel="stylesheet" type="text/css" href="default.css"> 
<!-- 链接样式表 -->
</head> 
<body> 
第一种样式(默认的) <a href="http://www.dayanmei.com">个人日志</a> <br>
第二种样式 <a class="red" href="http://www.dayanmei.com">个人日志</a><br>
另外一种实现链接样式的方法 <a class="ameth" href="http://www.dayanmei.com">个人日志</a><br>
<div class="other">DIV容器实现链接样式的方法 <a class="other" href="http://www.dayanmei.com">个人日志</a></div><br>
</body> 
</html> 
文章来自：老李的日志。源地址：http://www.dayanmei.com/blog.php/ID_274.htm