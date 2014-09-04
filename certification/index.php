<? 
/* 检查$PHP_AUTH_USER和$PHP_AUTH_PW中的值*/ 
if ((!isset($PHP_AUTH_USER)) || (!isset($PHP_AUTH_PW))) { 
/* 如果没有值，则发送一个能够引发对话框出现的头部*/ 
header('WWW-Authenticate: Basic realm="My Private Stuff"'); 
header('HTTP/1.0 401 Unauthorized'); 
echo 'Authorization Required.'; 
exit; 
} else if ((isset($PHP_AUTH_USER)) && (isset($PHP_AUTH_PW))){ 
/* 变量中有值，检查它们是否正确*/ 
if (($PHP_AUTH_USER != "validname") || ($PHP_AUTH_PW != "goodpassword")) { 
/* 如果输入的用户名和口令中有一个不正确，则发送一个能够引发对话框出现的头部 */ 
header('WWW-Authenticate: Basic realm="My Private Stuff"'); 
header('HTTP/1.0 401 Unauthorized'); 
echo 'Authorization Required.'; 
exit; 
} else if (($PHP_AUTH_USER == "validname") || ($PHP_AUTH_PW == "goodpassword")) { 
/* 如果二个值都正确，显示成功的信息 */ 
echo "<P>You're authorized!</p>"; 
} 
} 
?> 



本文来自CSDN博客，转载请标明出处：http://blog.csdn.net/zhaojing2006/archive/2007/01/04/1473709.aspx