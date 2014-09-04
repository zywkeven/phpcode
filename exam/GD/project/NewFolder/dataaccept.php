<?php
include("conn.php");
$largelength=intval($_POST[largelength]);
$largewidth=intval($_POST[largewidth]);

$distance=$_POST[distance];

$number=$_POST[totalnumber]; 

$smalllength_first=$_POST[smalllength];  
$smallwidth_first=$_POST[smallwidth];
$account_first=$_POST[account];

$len_smalllength=strlen($smalllength_first);
$len_smallwidth= strlen($smallwidth_first);
$len_account=strlen($account_first);  
 
 $smalllength=array();
 $smallwidth=array();
 $account=array();
 
 //smalllength-------------------
 for($i=0;$i<$number;$i++)
 {
     if($i<($number-1))
     {  
     $index=strpos($smalllength_first,','); 
     $smalllength[$i]=substr($smalllength_first,0,$index); 
   
     $smalllength_first=substr($smalllength_first,$index+1); 
    
     }
     else
     {  
 $smalllength[$i]=substr($smalllength_first,0); 
    
     }
 }  
  //smallwidt------------------- 
 
  for($i=0;$i<$number;$i++)
 {
     if($i<($number-1))
     {  
     $index=strpos($smallwidth_first,','); 
     $smallwidth[$i]=substr($smallwidth_first,0,$index); 
   
     $smallwidth_first=substr($smallwidth_first,$index+1); 
    
     }
     else
     {  
 $smallwidth[$i]=substr($smallwidth_first,0); 

     }
 }       
   
 //account-------------------  
 
   for($i=0;$i<$number;$i++)
 {
     if($i<($number-1))
     {  
     $index=strpos($account_first,','); 
     $account[$i]=substr($account_first,0,$index); 
   
     $account_first=substr($account_first,$index+1); 
    
     }
     else
     {  
 $account[$i]=substr($account_first,0); 

     }
 } 
 echo   $smalllength[0].' '. $smalllength[1].' '.  $smalllength[2] .' '. $smalllength[3] .' '.'<br>'; 
 echo   $smallwidth[0].' '. $smallwidth[1].' '.  $smallwidth[2] .' '. $smallwidth[3] .' '.'<br>';
 echo   $account[0].' '. $account[1].' '.  $account[2] .' '. $account[3] .' '.'<br>';    
   
      
     
    















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