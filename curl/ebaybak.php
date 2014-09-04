<meta charset='utf-8'> 
<?php    
$post_fields = array(); 
$post_fields['MfcISAPICommand'] = 'SignInWelcome';
$post_fields['bhid'] = 'DEF_CI';
$post_fields['UsingSSL'] = '1'; 
$post_fields['inputversion'] = '2';
$post_fields['lse'] = 'false'; 
$post_fields['lsv'] = '';
$post_fields['mid'] = 'AQAAASu8oqouAAUxMmJjZDg5OWY1Ni5hMDI2NjI0LjEzNWMxLmZmZDM0YzEwH5+/T0Vz6js8NWSQ2WIR3idTHBM*';  
$post_fields['kgver'] = '1';
$post_fields['kgupg'] = '1';
$post_fields['kgstate'] = '';
$post_fields['omid'] = '';
$post_fields['hmid'] = '';
$post_fields['siteid'] = '0';
$post_fields['co_partnerId'] = '2'; 
$post_fields['ru'] = 'http://my.ebay.com.hk/ws/eBayISAPI.dll?MyEbay&gbh=1';
$post_fields['pp'] = '';
$post_fields['pa1'] = ''; 
$post_fields['pa2'] = ''; 
$post_fields['pa3'] = '';
$post_fields['i1'] = '-1';
$post_fields['pageType'] = '-1';
$post_fields['rtmData'] = '';  
$post_fields['kgct'] = 'AQAAASu8oqouAAVORzNTOTJFMlJUeDVaMEdMaytWS2tzK3lRTmZGa1hCZUJBN0JWYVFyaTdzPWcMKh2SiB82xhxEfNiuO6pWbAxv';
$post_fields['userid'] = 'zyweleven';
$post_fields['pass'] = 'zyw52612'; 
$post_fields['sgnBt'] = '登入';
$post_fields['keepMeSignInOption'] = '1';
$post_fields['UsingSSL'] = '0';

//POST数据，获取COOKIE,cookie文件放在网站的temp目录下
$send_url="https://signin.ebay.com.hk/ws/eBayISAPI.dll?SignIn";
//$send_url="https://www.google.com/accounts/Login?hl=zh-cn"; 
//$login_url = "https://signin.ebay.com.hk/ws/eBayISAPI.dll?co_partnerId=2&siteid=201&UsingSSL=1";//登录页地址    
$login_url = "https://signin.ebay.com.hk/ws/eBayISAPI.dll?co_partnerId=2&siteid=201&UsingSSL=1";//登录页地址    
//$login_url = "http://my.ebay.com.hk/ws/eBayISAPI.dll?MyEbay&gbh=1";//登录页地址    
//$login_url="http://192.168.2.231/ebay/result.php";
$login_url="http://signin.ebay.com.hk/aw-cgi/eBayISAPI.dll?SignIn";
echo $login_url="http://signin.ebay.com.hk/aw-cgi/eBayISAPI.dll?SignIn&UsingSSL=0&pUserId=".$post_fields['userid']."&pass=".$post_fields['pass'];
$user_agent = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.2; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)";  
//$user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0";  

echo  $cookie_file= tempnam('./temp','ebay'); 
//$cookie_file=realpath('./temp/2eba1E9.tmp');
foreach($post_fields as $key => $value) { 
    $fields_string .=($key) . '=' . urlencode($value) . '&';  
}
echo $fields_string = rtrim($fields_string , '&'); 
$headers_login = array(
    'User-Agent' => $user_agent, 
    'Referer'    => $send_url
); 
// 


$ch = curl_init($login_url);   
curl_setopt($ch, CURLOPT_HEADER, true); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);  
//curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_REFERER, $send_url); //模拟地址
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);// 跳转  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string); 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
//$cookie_file=realpath('./temp/eba1AD.tmp');
curl_setopt($ch, COOKIEFILE, $cookie_file);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_login);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch, CURLOPT_USERAGENT,$user_agent); 

//curl_setopt($ch, CURLOPT_HEADER,1); 
//curl_setopt($ch, CURLOPT_FTPLISTONLY,1); 
echo '<br /><br /><br /><br />'; 
echo $content=curl_exec($ch);
echo '<br /><br /><br /><br />'; 
  /*
  preg_match_all( '/Set-Cookie:   (.+)=(.+)$/m ',   $rs,   $regs); 
foreach($regs[1]   as   $i=> $k) 
    echo   "$k   =>   {$regs[1][$i]} <br> ";
  
curl_setopt($ch,CURLOPT_URL,$send_url);
curl_setopt($ch,CURLOPT_COOKIEFILE,'/tmp/cookie');
echo curl_exec($ch);
   */    
curl_close($ch);  
/*
$headers_login = array(
    'User-Agent' => $user_agent
    ); 
     */
    echo $cookie_file;
    //$login_url=$send_url;
    
// $cookie_file=realpath('./temp/2eba1E9.tmp');


$show_url="http://signin.ebay.com.hk/aw-cgi/eBayISAPI.dll";
$ch = curl_init($show_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, true); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_login); 
//将之前保存的cookie信息，一起发送到服务器端 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
 
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);  
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
//curl_setopt($ch, CURLOPT_HEADER,1); 
//curl_setopt($ch, CURLOPT_FTPLISTONLY,1);  

$content=curl_exec($ch);
// unset($ch); 
echo '<br /><br />';
echo 'aaaaaaaaaaa<br><br>'.$content; 
echo 'bbbbbbbbbbbb';
curl_close($ch);  
//curl_close($ch); 
  
/*
post data
$post_data = array();
//帖子标题
$post_data['subject'] = 'test2';
//帖子内容
$post_data['message'] = 'test2';
$post_data['topicsubmit'] = "yes";
$post_data['extra'] = '';
//帖子标签
$post_data['tags'] = 'test';
//帖子的hash码，这个非常关键！假如缺少这个hash码，discuz会警告你来路的页面不正确
$post_data['formhash']=$formhash;


$ch = curl_init($send_url);
curl_setopt($ch, CURLOPT_REFERER, $send_url);       //伪装REFERER
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$contents = curl_exec($ch);
curl_close($ch);
    */
//清理cookie文件
//unlink($cookie_file);

//$url = 'http://signin.ebay.com.hk/ws/eBayISAPI.dll?co_partnerId=2&amp;siteid=201&amp;UsingSSL=1';
/*
$url = 'https://www.google.com/accounts/ServiceLogin?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F%3Fui%3Dhtml%26zy%3Dl&bsv=1k96igf4806cy&ss=1&ltmpl=default&ltmplcache=2';
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLOPT_USERAGENT,$user_agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE); // this line makes it work under https

$result=curl_exec ($ch);
echo("Results: 
".$result);
echo(curl_error($ch));
curl_close ($ch);
    */

 
?>