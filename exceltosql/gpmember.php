<?php

mysql_connect("127.0.0.1","pgm2","pgm2");
mysql_select_db("pgm2");  

$temp=file("member.csv");//连接EXCEL文件,格式为了.csv 

for ($i=0;$i<count($temp);$i++) 
{ 
$string=explode(",",$temp[$i]);  
 //通过循环得到EXCEL文件中每行记录的值 
 for($j=0;$j<11;$j++)
{ 
 while(($pos=strpos($string[$j],';')))
 {   
     $string[$j][$pos]=','; 
 }  
 $string[$j]=addslashes($string[$j]);
}
if($string[4]=='M')
$query_insert="insert into gbmember(CustomerNo,NameM,ChineseNameM,Item,MobileM,contractM,AddM,OccM,EmailM,Datejoin,DateWed) values('$string[2]','$string[0]','$string[1]','$string[3]','$string[5]','$string[6]','$string[7]','$string[8]','$string[9]','$string[10]','$string[11]')";
else
$query_insert="insert into gbmember(CustomerNo,NameF,ChineseNameF,Item,MobileF,contractF,AddF,OccF,EmailF,Datejoin,DateWed) values('$string[2]','$string[0]','$string[1]','$string[3]','$string[5]','$string[6]','$string[7]','$string[8]','$string[9]','$string[10]','$string[11]')";
 
mysql_query($query_insert) or die (mysql_error());

$stringnext=explode(",",$temp[$i+1]); 

if($stringnext[2]==$string[2])
{ 
     for($j=0;$j<11;$j++)
{ 
 while(($pos=strpos($stringnext[$j],';')))
 {   
     $stringnext[$j][$pos]=','; 
   
 }  
 $stringnext[$j]=addslashes($stringnext[$j]);
}  
    if($stringnext[4]=='M')
    {
        $query_update="update gbmember set NameM='$stringnext[0]',ChineseNameM='$stringnext[1]',MobileM='$stringnext[5]',contractM='$stringnext[6]',AddM='$stringnext[7]',OccM='$stringnext[8]',EmailM='$stringnext[9]' where CustomerNo='$string[2]'"; 
    }
    else
    {
         $query_update="update gbmember set NameF='$stringnext[0]',ChineseNameF='$stringnext[1]',MobileF='$stringnext[5]',contractF='$stringnext[6]',AddF='$stringnext[7]',OccF='$stringnext[8]',EmailF='$stringnext[9]' where CustomerNo='$string[2]'"; 
    }
 mysql_query($query_update) or die (mysql_error());  
 $i++; 
} 
unset($string); 
unset($stringnext);
} 

?> 


