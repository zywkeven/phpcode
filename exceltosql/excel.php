<?php
header("content-type:application/vnd.ms-excel; charset=utf-8");
header("content-disposition:filename=test.xls");

function showtable($database,$table)
{
    $ss=mysql_list_fields("$database","$table");
    $count=mysql_num_fields($ss);
   
    for($i=0;$i<$count;$i++)
    {
    $field[$i]= mysql_field_name($ss,$i);
    echo mysql_field_name($ss,$i)."\t";
    }
    echo "\r";
    $query="select * from $table group by telephone order by step1,step2,step3,ypcompanyID";
    $result=mysql_query($query);
    while($row=mysql_fetch_array($result))
    {
       
        for($j=0;$j<$count;$j++)
        {
            if(!$row["$field[$j]"])
            {
                echo " \t";
            }
            else
            {
                echo iconv("utf-8","gbk",$row["$field[$j]"])."\t";
            }
        }
        echo "\n"; 
    } 
}  
$conn=mysql_connect("127.0.0.1","pgm2","pgm2");
mysql_selectdb("pgm2");
showtable("pgm2","ypcompany");

?>
