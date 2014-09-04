<?php
$host="news.163.com";
$get="/special/00013BQI/swine_flu.html";
//计算即可得到运算后的算法值
//urlhash=593102051
echo url2hash($host,$get);
function url2hash($host,$get){
 if(empty($get)){
  return 0;
 }
 $tmp=$host.$get;
 if(strstr($tmp,'?')){
  $tmp=substr($tmp,0,strpos($tmp,'?'));
 }
 $url=$tmp;
 $num=strlen($url);
 $hash=0;
 $j=0;
 for($i=0;$i<$num;$i++){
  if(($i%2)!=0){
   $hash^=(($hash<<7)^($url[$j])^($hash>>3));
   $j++;
  }else{
   $hash^=(~(($hash<<11)^($url[$j])^($hash>>5)));
   $j++;
  }
 }
 return $hash;
} // end func
echo md5("548rte");
?>