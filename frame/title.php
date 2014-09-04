<script language="JavaScript"> 
   var msg = "大量大量的实用经验,请访问YC网盟网友制作"; 
   var speed = 300; 
   var msgud = " " + msg; 
   function titleScroll() { 
   if (msgud.length <msg.length) msgud += " - " + msg; 
   msgud = msgud.substring(1, msgud.length); 
   document.title = msgud.substring(0, msg.length); 
   window.setTimeout("titleScroll()", speed); 
   } 
   </script> 
<html> 
   <head>
   <meta charset='utf-8'> 
   <title>改变窗体的标题 风越ASP代码生成器</title> 
   </head> 

   <script language="JavaScript"> 
   a=setInterval("move()",100); 
   </script> 
   <body onload="window.setTimeout('titleScroll()', 500)" > 
   </body> 
   </html> 