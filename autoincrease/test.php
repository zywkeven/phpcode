<?php
function get_increasenumber($table){  
 
$sql = "show create table $table";    
   $query = mysql_query($sql);
      $arr= mysql_fetch_array($query);
      $b = strstr($arr[1],'AUTO_INCREMENT=');          
      $result = intval(substr($b,15)); 
      return   $result;  
 }  
   ?>
 <?php  
   
  mysql_connect('127.0.0.1','pgm2','pgm2')or die('不能连接到服务器');                         
      mysql_select_db('sphider'); 
      echo  get_increasenumber('networksearch');
 ?>