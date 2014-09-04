<?php
mysql_connect("127.0.0.1","pgm2","pgm2");
mysql_select_db("pgm2");
header("Content-type:text/html; charset=utf-8");
/*
$query_select="select messages,informationID from blg_recordsinformation ";
$result_select=mysql_query($query_select);
while ($row_select=mysql_fetch_array($result_select)) { 
    mysql_query("set names utf8");
    echo $query_update="update blg_recordsinformation set messages='".mysql_real_escape_string(iconv('gbk','utf-8',$row_select['messages']))."' where 
    informationID ='".$row_select['informationID']."'";
    $result_update=mysql_query($query_update);
    mysql_query("set names latin");   
}
*/ 
/*
$query_select="select blogTitle,successID from blg_recordsuccess ";
$result_select=mysql_query($query_select);
while ($row_select=mysql_fetch_array($result_select)) { 
    mysql_query("set names utf8");
    echo $query_update="update blg_recordsuccess set blogTitle='".mysql_real_escape_string(iconv('gbk','utf-8',$row_select['blogTitle']))."' where 
    successID ='".$row_select['successID']."'";
    $result_update=mysql_query($query_update);
    mysql_query("set names latin");   
}
 */
 /*
$query_select="select blogTitle,blogText,blogsID from blg_blogs ";
$result_select=mysql_query($query_select);
while ($row_select=mysql_fetch_array($result_select)) { 
    mysql_query("set names utf8");
    echo $query_update="update blg_blogs set 
    blogTitle='".mysql_real_escape_string(iconv('gbk','utf-8',$row_select['blogTitle']))."',  
    blogText='".mysql_real_escape_string(iconv('gbk','utf-8',$row_select['blogText']))."' where 
    blogsID ='".$row_select['blogsID']."'";
    $result_update=mysql_query($query_update);
    mysql_query("set names latin");   
}
*/
$query_select="testselect blogTitle,blogText,blogsID from blg_blogs ";
$result_select=mysql_query($query_select);
while ($row_select=mysql_fetch_array($result_select)) { 
    mysql_query("set names utf8");
    echo $query_update="update blg_blogs set 
    blogTitle='".mysql_real_escape_string(iconv('gbk','utf-8',$row_select['blogTitle']))."',  
    blogText='".mysql_real_escape_string(iconv('gbk','utf-8',$row_select['blogText']))."' where 
    blogsID ='".$row_select['blogsID']."'";
    $result_update=mysql_query($query_update);
    mysql_query("set names latin");   
}
?>