<?php
session_start(); 
$id=mysql_connect("127.0.0.1","pgm2","pgm2") or die("connect error".mysql_error());
$link=mysql_select_db("pgm2",$id); 
if($Submit=="提交")
{
    $array1=array();
    $array2=array();
    $i=1;
    
    while(list($name,$value)=each($_POST))
    {
        if($value!="提交"){
            $array1[$i]=$name;
            $array2[$i]=$value;
        }
            $i++;
    }
    $str=implode(",",$array1);
    $str1=implode(",",$array2);
    $str1="".$str1."";     
    
    $query="insert into city($str) values($str1)";
    $result=mysql_query($query);
    if($result)
    {
        echo "succeed!";
    }
    
    }

  
?>
