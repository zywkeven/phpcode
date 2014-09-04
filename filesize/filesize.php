<?php
function getFileSize($url){  
        $url = parse_url($url); 
        if($fp = @fsockopen($url['host'],empty($url['port'])?80:$url['port'],$error)){ 
                fputs($fp,"GET ".(empty($url[’path’])?'/':$url[’path’])." HTTP/1.1\r\n"); 
                fputs($fp,"Host:$url[host]\r\n\r\n"); 
                while(!feof($fp)){ 
                        $tmp = fgets($fp); 
                        if(trim($tmp) == ''){ 
                                break; 
                        }else if(preg_match('/Content-Length:(.*)/si',$tmp,$arr)){ 
                                return trim($arr[1]); 
                        } 
                } 
                return null; 
        }else{ 
                return null; 
        } 
} 
echo getFileSize("http://192.168.2.205/a.zip");
?>