<?php  
error_reporting(0);  
//邮箱用户名（不带@163.com后缀的）  
$user       = 'zywkeven';  
//邮箱密码  7  
$pass       = '5261261225';  
//目标邮箱  9 
//$mail_addr  = 'loki_wuxi@163.com';           
//登陆 12 
$url = 'http://reg.163.com/logins.jsp?type=1&url=http://g1a102.mail.163.com/js3/main.jsp?sid=aCsLOmlKnikJxwBDGdKKxwLLMKadozqm'; 
$ch = curl_init($url);  //创建一个用于存放cookie信息的临时文件 
$cookie   = tempnam('./temp','use'); 
$referer_login  = 'http://mail.163.com'; 
//返回结果存放在变量中，而不是默认的直接输出 18 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_REFERER, $referer_login); 
$fields_post = array( 
    'username'=> $user,
    'password'=> $pass, 
    'verifycookie'=>1, 
    'style'=>-1, 
    'product'=> 'mail163', 
    'selType'=>-1, 
    'secure'=>'on' 
    ); 
$headers_login = array(
    'User-Agent' => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0', 
    'Referer'     => 'http://www.163.com'  ); 
    $fields_string = ''; 
foreach($fields_post as $key => $value) { 
    $fields_string .= $key . '=' . $value . '&';  
} 
$fields_string = rtrim($fields_string , '&'); 
curl_setopt($ch, CURLOPT_COOKIESESSION, true); 
//关闭连接时，将服务器端返回的cookie保存在以下文件中 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_login); 
curl_setopt($ch, CURLOPT_POST, count($fields)); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string); 
echo $result= curl_exec($ch);

curl_close($ch);
 //跳转 
 $url='http://entry.mail.163.com/coremail/fcg/ntesdoor2?lightweight=1&verifycookie=1&language=-1&style=-1&username=loki_wuxi'; 
 $ch = curl_init($url); 
 $headers = array( 
 'User-Agent'=> 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0'  ); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HEADER, true); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
//将之前保存的cookie信息，一起发送到服务器端 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); 
$result = curl_exec($ch);
curl_close($ch); 
//取得sid 81 
preg_match('/sid=[^\"].*/', $result, $location); 
$sid = substr($location[0], 4, -1); 
 //file_put_contents('./result.txt', $sid); 
 //通讯录地址  
 $url='http://g4a30.mail.163.com/jy3/address/addrlist.jsp?sid='.$sid.'&gid=all'; 
 $ch = curl_init($url); 
 $headers = array('User-Agent'=> 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0'
  ); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HEADER, true); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
$result = curl_exec($ch);
curl_close($ch);
//file_put_contents('./result.txt', $result);
//unlink($cookie); 
//开始抓取内容107 
preg_match_all('/<td class="Ibx_Td_addrName"><a[^>]*>(.*?)<\/a><\/td><td class="Ibx_Td_addrEmail"><a[^>]*>(.*?)<\/a><\/td>/i', $result,$infos,PREG_SET_ORDER);
//1：姓名2：邮箱109 print_r($infos);110 111 /*112  * 下面就可以为所欲为了- -113  */114 
?>