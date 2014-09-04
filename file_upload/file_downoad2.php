<?php 
include("../conn/conn.php"); 
  $query_down="select * from updownfile_table ";
   $query_list=mysql_query($query_down);
   echo '<table align=center>';
   while($row_list=mysql_fetch_array($query_list))
     {
         echo '<tr><td><a href="'.$row_list[path].'">'.$row_list[filename].'</a></td></tr>';
     }  
      echo '</table>'; 
?> 


