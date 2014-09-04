<meta charset='utf-8'>
<?php 
//    吴燕军
//   采集程序php100.com
set_time_limit(0); 

//cookie保存目录 
$cookie_jar = '/cookie.tmp'; 
//$cookie_jar = '/tmp/cookie.tmp'; 


/*函数 ------------------------------------------------------------------------------------------------------------*/ 

//模拟请求数据 
function request($url,$postfields,$cookie_jar,$referer){ 
$ch = curl_init(); 

$options = array(CURLOPT_URL => $url, 
      CURLOPT_HEADER => 0, 
      CURLOPT_NOBODY => 0, 
      CURLOPT_PORT => 80, 
      CURLOPT_POST => 1, 
      CURLOPT_POSTFIELDS => $postfields, 
      CURLOPT_RETURNTRANSFER => 1, 
      CURLOPT_FOLLOWLOCATION => 1, 
      CURLOPT_COOKIEJAR => $cookie_jar, 
      CURLOPT_COOKIEFILE => $cookie_jar, 
      CURLOPT_REFERER => $referer 
); 
curl_setopt_array($ch, $options); 
$code = curl_exec($ch); 
curl_close($ch); 
return $code; 
} 

// 获取帖子列表 
function getThreadsList($code){ 
    preg_match_all('/[.|\r|\n]*?<a href=\"viewthread.php\?tid=(\d+)/',$code,$threads); 
    return $threads[1]; 
} 

//判断该帖子是否存在 
function isExits($code){ 
preg_match('/ <p>指定的主题不存在或已被删除或正在被审核，请返回。 <\/p>/',$code,$error); 
return isset($error[0])?false:true; 
} 

//获取帖子标题 
function getTitle($code){ 
    preg_match('/<h1><font[^<]*<\//',$code,$title_tmp); 
    $title = $title_tmp[0]; 
    return $title; 
} 

//获取帖子作者: 
function getAuthor($code){
 
    preg_match('/<a[ ]*target=\"_blank\"[ ]*href=\"space\.php\?uid=[\d]+\"[ ]*style=[^>]*>.+/',$code,$author_tmp); 
    $author = strip_tags($author_tmp[0]); 
    return $author; 
} 

//获取楼主发 表的内容 
function getContents($code){ 
    preg_match('/<div class=\"t_msgfontfix\">.*?<\/div>/s',$code,$contents_tmp); 
    $contents=$contents_tmp[0];
    
    $contents = preg_replace('/images\//','http://gomm.boxav.us/images/',$contents_tmp[0]); 
    return $contents; 
} 

//打印帖子标题 
function printTitle($title){ 
echo " <strong> <h2>帖子标题: </h2> </strong>",strip_tags($title)," <br/> <br/>"; 
} 

//输出帖子作者 
function printAuthor($author){ 
echo " <strong> <h2>帖子作者: </h2> </strong>",strip_tags($author)," <br/> <br/>"; 
} 

// 打印帖子内容 
function printContents($contents){ 
echo " <strong> <h2>作者发表的内容: </h2>",($contents)," </strong> <br/>"; 
} 

//错误 
function printError(){ 
echo " <i>该帖子不存在! </i>"; 
} 

/*函数列表 end---------------------------------------------------------------------------------------------------*/ 


/*登录论坛 begin*/ 
$url = 'http://gomm.boxav.us/logging.php?action=login&loginsubmit=yes';        
$postfields='loginfield=username&username=zywkeven&password=5261261225&questionid=0&cookietime=2592000&referer=http://gomm.boxav.us/forumdisplay.php?tid=14573'; 
request($url,$postfields,$cookie_jar,''); 
unset($postfields,$url); 
/*登录论坛 end*/ 


/*获取帖子列表(位于第一页的帖子) begin*/ 
//$url = 'http://bbs.war3.cn/forumdisplay.php?fid=57'; 
$url = 'http://gomm.boxav.us/forumdisplay.php?fid=17'; 
$code = request($url,'',$cookie_jar,''); 
$threadsList = getThreadsList($code); 
/*获取帖子列表 end*/ 

//帖子序列 
$rows = 0; 
 ob_implicit_flush(true);   
/* 循环抓取所有帖子源代码 begin*/
 
foreach($threadsList as $list){ 
     $url = "http://gomm.boxav.us/viewthread.php?tid=$list"; 
 
if(isExits($code)){ 
    echo  $url;
    $code = request($url,'',$cookie_jar,''); 
    $color = $rows%2==0?'#00CCFF':'#FFFF33'; 
    echo " <div style='background-color:$color'>"; 
    echo " <h1>第",($rows+1),"贴: </h1> <br/>"; 
    $author = getAuthor($code); 
    printAuthor($author); 

    $title = getTitle($code); 
    printTitle($title); 

    $contents = getContents($code); 
    printContents($contents);  
    echo " </div>"; 
    ob_flush();//修改部分
    flush();
    $rows++; 
} 
else 
printError(); 

echo "----------------------------------------------------------------------------------------- <br/> <br/>"; 
} 

/*抓取源代码 end*/ 
?>

