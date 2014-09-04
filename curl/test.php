<?php
//session_start();
//$_SESSION['a']='b';
    
$ch = curl_init();
//$url="http://www.baidu.com";
$url="http://www.baidu.com";
//$url="http://www.163.com";
//$url="http://www.google.com/";
//$url="http://www.facebook.com/";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //如果希望获得内容但不输出,使用该参数,并设为非0值
//curl_setopt($ch,CURLOPT_COOKIE,'USERID=1da04a2988624c8af0de3e39'); //
//curl_setopt($ch,CURLOPT_COOKIE,'B55A4CAAA48747B201D81D888940DCD1:FG=1'); //
//curl_setopt($ch, CURLOPT_COOKIEFILE, 'temp'); 
curl_setopt($ch,CURLOPT_COOKIE,'user=c613dc3a43dd386331d51bc78822'); //
//curl_setopt($ch,CURLOPT_COOKIE,'J_MY=1'); //
$re = curl_exec($ch);
curl_close($ch);
echo $re;

 
 
 
 function curl_get_content($url){
  $curl = curl_init();
// 设置你需要抓取的URL
curl_setopt($curl, CURLOPT_URL, $url);

// 设置header
curl_setopt($curl, CURLOPT_HEADER, 1);

// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// 运行cURL，请求网页
 $data = curl_exec($curl);

// 关闭URL请求
curl_close($curl);
return $data;
}    

?>