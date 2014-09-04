<?php
include("conn.php");
$largelength=intval($_POST[largelength]);
$largewidth=intval($_POST[largewidth]); 

$smalllength=$_POST[smalllength];  
$smallwidth=$_POST[smallwidth];
$account=$_POST[account];
echo  $smalllength[0].'lengt'; 
echo  $smalllength[1].'lefl'; 






$distance=intval($_POST[distance]);

$number=intval($_POST[totalnumber]);



   /*
//123
if($largelength<$largewidth)
{
     $middle=$largelength;
     $largelength=$largewidth;
     $largewidth=$middle;
}

for($i=0;$i<$number;$i++)
{
    if($smalllength[$i]<$smallwidth[$i])
    {
        $middle=$smalllength[$i];
        $smalllength[$i]=$smallwidth[$i];
        $smallwidth[$i]=$middle;
    }    
}
$sql="select * from db_print where largelength='$largelength' and largewidth='$largewidth' and  distance='$distance'";
$result=mysql_query($sql);
if($row=mysql_fetch_array($result))
{ 
    do{  
        $record=0;
          for($i=0;$i<$number;$i++)
          {   
              for($j=1;$j<=$number;$j++)
              {
                  if($smalllength[$i]==$row['smalllength'.$j]
                  &&$smallwidth[$i]==$row['smallwidth'.$j]
                  &&$account[$i]==$row['account'.$j])
                  {
                      $record++;
                      continue;
                  }
              }
          } 
            if($record==$number)
            {if($row['smalllength'.$number])
                {$insert_table=1;
                 break;}
             }      
    }while($row=mysql_fetch_array($result));
} 
///123
 if($insert_table){echo $row[result];}
 else
 { // 此处调用排序函数
 $str1='';
 $str2='';
  for($i=1;$i<=$number;$i++)
  { 
    $j=$i-1;
    $str1=$str1.",smalllength".$i.",smallwidth".$i.",account".$i;
    $str2=$str2.",'$smalllength[$j]','$smallwidth[$j]','$account[$j]'"; 
  }  
    $strinsert="insert into db_print(largelength,largewidth".$str1.",distance)
                values('$largelength','$largewidth'".$str2.",'$distance')";          
    mysql_query($strinsert);
 }   */
?>