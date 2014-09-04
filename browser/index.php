<meta charset='utf-8'>
<?php
//操作系统
function userOS(){ 
echo $user_OSagent = $_SERVER['HTTP_USER_AGENT'];

if(strpos($user_OSagent,"NT 5.1")) { 
$visitor_os ="Windows XP (SP2)"; 
} elseif(strpos($user_OSagent,"NT 5.2") && strpos($user_OSagent,"WOW64")){ 
$visitor_os ="Windows XP 64-bit Edition"; 
} elseif(strpos($user_OSagent,"NT 5.2")) { 
$visitor_os ="Windows 2003"; 
} elseif(strpos($user_OSagent,"NT 6.0")) { 
$visitor_os ="Windows Vista"; 
} elseif(strpos($user_OSagent,"NT 5.0")) { 
$visitor_os ="Windows 2000"; 
} elseif(strpos($user_OSagent,"4.9")) { 
$visitor_os ="Windows ME"; 
} elseif(strpos($user_OSagent,"NT 4")) { 
$visitor_os ="Windows NT 4.0"; 
} elseif(strpos($user_OSagent,"98")) { 
$visitor_os ="Windows 98"; 
} elseif(strpos($user_OSagent,"95")) { 
$visitor_os ="Windows 95"; 
} elseif(strpos($user_OSagent,"Mac")) { 
$visitor_os ="Mac"; 
} elseif(strpos($user_OSagent,"Linux")) { 
$visitor_os ="Linux"; 
} elseif(strpos($user_OSagent,"Unix")) { 
$visitor_os ="Unix"; 
} elseif(strpos($user_OSagent,"FreeBSD")) { 
$visitor_os ="FreeBSD"; 
} elseif(strpos($user_OSagent,"SunOS")) { 
$visitor_os ="SunOS"; 
} elseif(strpos($user_OSagent,"BeOS")) { 
$visitor_os ="BeOS"; 
} elseif(strpos($user_OSagent,"OS/2")) { 
$visitor_os ="OS/2"; 
} elseif(strpos($user_OSagent,"PC")) { 
$visitor_os ="Macintosh"; 
} elseif(strpos($user_OSagent,"AIX")) { 
$visitor_os ="AIX"; 
} elseif(strpos($user_OSagent,"IBM OS/2")) { 
$visitor_os ="IBM OS/2"; 
} elseif(strpos($user_OSagent,"BSD")) { 
$visitor_os ="BSD"; 
} elseif(strpos($user_OSagent,"NetBSD")) { 
$visitor_os ="NetBSD"; 
} else { 
$visitor_os ="其它"; 
} 
return $visitor_os; 
}   


//浏览器设置 
function userBrowser(){ 
$user_OSagent = $_SERVER['HTTP_USER_AGENT']; 
if(strpos($user_OSagent,"Maxthon") && strpos($user_OSagent,"MSIE")) { 
$visitor_browser ="Maxthon(Microsoft IE)"; 
}elseif(strpos($user_OSagent,"Maxthon 2.0")) { 
$visitor_browser ="Maxthon 2.0"; 
}elseif(strpos($user_OSagent,"Maxthon")) { 
$visitor_browser ="Maxthon"; 
}elseif(strpos($user_OSagent,"MSIE 7.0")) { 
$visitor_browser ="MSIE 7.0"; 
}elseif(strpos($user_OSagent,"MSIE 6.0")) { 
$visitor_browser ="MSIE 6.0"; 
} elseif(strpos($user_OSagent,"MSIE 5.5")) { 
$visitor_browser ="MSIE 5.5"; 
} elseif(strpos($user_OSagent,"MSIE 5.0")) { 
$visitor_browser ="MSIE 5.0"; 
} elseif(strpos($user_OSagent,"MSIE 4.01")) { 
$visitor_browser ="MSIE 4.01"; 
} elseif(strpos($user_OSagent,"NetCaptor")) { 
$visitor_browser ="NetCaptor"; 
} elseif(strpos($user_OSagent,"Netscape")) { 
$visitor_browser ="Netscape"; 
} elseif(strpos($user_OSagent,"Lynx")) { 
$visitor_browser ="Lynx"; 
} elseif(strpos($user_OSagent,"Opera")) { 
$visitor_browser ="Opera"; 
} elseif(strpos($user_OSagent,"Konqueror")) { 
$visitor_browser ="Konqueror"; 
} elseif(strpos($user_OSagent,"Mozilla/5.0")) { 
$visitor_browser ="Mozilla"; 
} elseif(strpos($user_OSagent,"U")) { 
$visitor_browser ="Firefox"; 
} else { 
$visitor_browser ="其它"; 
} 
return $visitor_browser; 
}   
$out_ieos ="您的操作系统以及浏览器信息：".userOS()." ".userBrowser(); 
echo $out_ieos; 
 ?>
