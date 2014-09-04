<?php
function showtable($database,$table)
{
    $ss=mysql_list_fields("$database","$table");
    $count=mysql_num_fields($ss);
    echo '<table border=2 bgcolor=#f2e3e2><tr>';
    for($i=0;$i<$count;$i++)
    {
    $field[$i]= mysql_field_name($ss,$i);
    echo '<td align=center><b>'.mysql_field_name($ss,$i).'</b></td>';
    }
    echo '</tr>';
    $query="select * from $table";
    $result=mysql_query($query);
    while($row=mysql_fetch_array($result))
    {
        echo '<tr>';
        for($j=0;$j<$count;$j++)
        {
            if($row["$field[$j]"]==NULL)
            echo '<td width=150 align=center>&nbsp;</td>';
            else
            echo '<td align=center>'.$row["$field[$j]"].'</td>';
        }
        echo '</tr>'; 
    } 
    echo '</table>';
}  

mysql_connect("127.0.0.1","pgm2","pgm2");
mysql_select_db("pgm2");
showtable("pgm2","gbmember");

?>   