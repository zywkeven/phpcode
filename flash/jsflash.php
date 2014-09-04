<script>
function jsAlert(v) {
alert(v);
}
//调用flash中的方法，"my_mv"为html页中swf的id
function callExternal() {
thisMovie("my_mv").flAlert();
}
//搭建js与flash互通的环境
function thisMovie(movieName) {
if (navigator.appName.indexOf("Microsoft") != -1) {
return window[movieName]
}else{
return document[movieName]
}
}
</script>

<script>
html 页中的 JavaScript 函数：
function GetSwfUrl()
{
var pics1 = parseInt(Math.random()*5)+1;
var pics2 = parseInt(Math.random()*5)+1;
document.my_swfId.SetVariable("pic01Num", pics1);
document.my_swfId.SetVariable("pic02Num", pics2);
}

说明：pic01Num 和 pic02Num 为 Flash 中定义的变量，以上函数将 JS 变量 pics1 和 pics1 分别赋值予 Flash 变量 pic01Num 和 pic02Num 。my_swfId 为 html 页中 swf 的 id .

***************

在 Flash 中与 JS 的通信可以用传统的 getURL，Flash8 以后，可以用 ExternalInterface 。ExternalInterface 在功能上与 fscommand()、CallFrame() 和 CallLabel() 方法相似，但它更灵活、更通用。推荐对 JavaScript 和 ActionScript 之间的通讯使用 ExternalInterface 。

getURL调用JS：
getURL("javascript:GetSwfUrl()"); 

ExternalInterface调用JS：
import flash.external.ExternalInterface;//导入 ExternalInterface 类
ExternalInterface.call("GetSwfUrl()");
</script>