<?php
      
$link=mysql_connect("127.0.0.1", "pgm2", "pgm2") or die('fail' . mysql_error());
 if (mysql_select_db("pgm2", $link))
    echo "connect succeed<BR>";
else                            
    echo('fail error:' . mysql_error());
    
    mysql_query("set names zyw_file"); 
    $file_name="df";
    $path="dkfh";
    $query="insert into zyw_test1(username,password) values('$file_name','$path')";
    $result=mysql_query($query);
    
?>
