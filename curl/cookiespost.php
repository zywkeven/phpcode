<?php   
$cookie_file = dirname(__FILE__)."/cookie_".md5(basename(__FILE__)).".txt"; // 设置Cookie文件保存路径及文件名   
  
function vlogin($url,$data){ // 模拟登录获取Cookie函数   
    $curl = curl_init(); // 启动一个CURL会话   
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址               
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查   
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在   
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器   
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转   
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer   
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求   
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包   
    curl_setopt($curl, CURLOPT_COOKIEJAR, $GLOBALS['cookie_file']); // 存放Cookie信息的文件名称   
    curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']); // 读取上面所储存的Cookie信息   
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环   
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回   
    $tmpInfo = curl_exec($curl); // 执行操作   
    if (curl_errno($curl)) {   
       echo 'Errno'.curl_error($curl);   
    }   
    curl_close($curl); // 关闭CURL会话   
   return $tmpInfo; // 返回数据   
}   
  
function vget($url){ // 模拟获取内容函数   
    $curl = curl_init(); // 启动一个CURL会话   
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址               
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查   
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在   
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器   
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转   
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer   
    curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的Post请求   
    curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']); // 读取上面所储存的Cookie信息   
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环   
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回   
   $tmpInfo = curl_exec($curl); // 执行操作   
    if (curl_errno($curl)) {   
       echo 'Errno'.curl_error($curl);   
   }   
    curl_close($curl); // 关闭CURL会话   
    return $tmpInfo; // 返回数据   
}   
  
function vpost($url,$data){ // 模拟提交数据函数   
    $curl = curl_init(); // 启动一个CURL会话   
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址               
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查   
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在   
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器   
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转   
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer   
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求   
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包   
   curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']); // 读取上面所储存的Cookie信息   
   curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环   
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回   
   $tmpInfo = curl_exec($curl); // 执行操作   
    if (curl_errno($curl)) {   
      echo 'Errno'.curl_error($curl);   
   }   
    curl_close($curl); // 关键CURL会话   
    return $tmpInfo; // 返回数据   
}   
 
function delcookie($cookie_file){ // 删除Cookie函数   
@unlink($cookie_file); // 执行删除   
}   
  
// 使用实例
/*   
if(!file_exists($cookie_file)) { // 检测Cookie是否存在   
$str = vget('http://www.kalvin.cn/?action=login'); // 获取登录随机值   
preg_match("/name=\"formhash\" value=\"(.*?)\"/is",$str,$hash); // 提取登录随机值   
vlogin('http://www.kalvin.cn/post.php','action=dologin&formhash='.$hash[1].'&username=aaa&password=bbb&clientcode=ccc'); // ///获取Cookie   
}   
echo vget('http://www.kalvin.cn/'); */  
echo vget('http://www.baidu.com/');
?>  