<meta charset='utf-8'> 
<?php    
function get_cookie_file(){
    global  $cookie_file,$login_url,$send_url,$headers_login,$user_agent;
    $ch = curl_init($login_url);   
    curl_setopt($ch, CURLOPT_HEADER, true); 
    //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);  
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_REFERER, $send_url); //模拟地址
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);// 跳转  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_POST, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string); 
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    curl_setopt($ch, COOKIEFILE, $cookie_file);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_login);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT,$user_agent); 
    curl_exec($ch);   
    curl_close($ch); 
} 
function get_page_conetent(){
    global  $post_fields,$headers_login,$cookie_file;
    foreach($post_fields as $key => $value) { 
        $fields_string .=($key) . '=' . urlencode($value) . '&';  
    }
    $fields_string = rtrim($fields_string , '&'); 
    //set the cookie file
    $show_url="http://signin.ebay.com.hk/aw-cgi/eBayISAPI.dll";
    $ch = curl_init($show_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //curl_setopt($ch, CURLOPT_HEADER, true); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); 
    curl_setopt($ch, CURLOPT_POST, true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_login); 
    //将之前保存的cookie信息，一起发送到服务器端 
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);  
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);  
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
    $content=curl_exec($ch);
    curl_close($ch); 
    return  $content;    
} 
$post_fields = array(); 
$post_fields['MfcISAPICommand'] = 'SignInWelcome';
$post_fields['bhid'] = 'DEF_CI';
$post_fields['inputversion'] = '2';
$post_fields['lse'] = 'false';   
$post_fields['mid'] = 'AQAAASu8oqouAAUxMmJjZDg5OWY1Ni5hMDI2NjI0LjEzNWMxLmZmZDM0YzEwH5+/T0Vz6js8NWSQ2WIR3idTHBM*';  
$post_fields['kgver'] = '1';
$post_fields['kgupg'] = '1'; 
$post_fields['siteid'] = '0';
$post_fields['co_partnerId'] = '2'; 
$post_fields['ru'] = 'http://my.ebay.com.hk/ws/eBayISAPI.dll?MyEbayBeta&View=WonNext&NewFilter=WaitPayment&SubmitAction.ChangeFilter=x&CurrentPage=MyeBayNextWon&ssPageName=STRK:ME:RMDR&f=f#myEbayFilter313'; 
$post_fields['i1'] = '-1';
$post_fields['pageType'] = '-1';  
$post_fields['kgct'] = 'AQAAASu8oqouAAVORzNTOTJFMlJUeDVaMEdMaytWS2tzK3lRTmZGa1hCZUJBN0JWYVFyaTdzPWcMKh2SiB82xhxEfNiuO6pWbAxv';
$post_fields['userid'] = 'zyweleven';
$post_fields['pass'] = 'zyw52612'; 
$post_fields['sgnBt'] = '登入';
$post_fields['keepMeSignInOption'] = '1';
$post_fields['UsingSSL'] = '0';
$send_url="http://signin.ebay.com.hk/aw-cgi/eBayISAPI.dll?SignIn"; 
$login_url="http://signin.ebay.com.hk/aw-cgi/eBayISAPI.dll?SignIn&UsingSSL=0&pUserId=".$post_fields['userid']."&pass=".$post_fields['pass'];
$user_agent = "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.2; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)";  
//$user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0"; 
$cookie_file= tempnam('./temp','ebay'); 
$headers_login = array(
    'User-Agent' => $user_agent, 
    'Referer'    => $send_url
);
//get cookies from login page; 
get_cookie_file(); 
$post_fields['ru']='http://my.ebay.com.hk/ws/eBayISAPI.dll?MyEbayBeta&View=WonNext&NewFilter=WaitPayment&SubmitAction.ChangeFilter=x&CurrentPage=MyeBayNextWon&ssPageName=STRK:ME:RMDR&f=f#myEbayFilter313';                  
echo $content=get_page_conetent();
$post_fields['ru']='http://stores.ebay.com.hk/';                  
echo $content=get_page_conetent(); 
?>