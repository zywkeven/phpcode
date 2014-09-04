<?php
$post = array(
"pic1"=>"@".realpath('tmp.txt')//这里是要上传的文件，key与后台处理文件对应
); 

echo $post['pic1'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://192.168.2.214/curl/upload.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0");
 
echo $a=curl_exec($ch);
//$cinfo=curl_getinfo($ch);
//print $a;
    
curl_close($ch);
?> 