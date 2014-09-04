<?php
 $filename="newaddress.txt"; 
 $contentarray=file($filename);
 $contentsize=sizeof($contentarray);
 $numberpreg=array();
 for($arraycounter=0;$arraycounter<$contentsize;$arraycounter++)
   {    
  $contentarray[$arraycounter]=str_replace("?","",$contentarray[$arraycounter]);  
   
   $pregtel='/([0123456789 ]{4,}.*)/i'; 
   unset($numberpreg);       
   preg_match($pregtel,$contentarray[$arraycounter],$numberpreg);
     $arraytel[$arraycounter]=$numberpreg[1];   
             
    $arraytotal=split("\t",$contentarray[$arraycounter]);   
    $arraycompany[$arraycounter]=$arraytotal[0];
    
    $indexbegin=strlen($arraytotal[0]);
     $indexend=strpos($contentarray[$arraycounter],$numberpreg[1]);
   if($numberpreg[1])
   {
    $arrayaddress[$arraycounter]=substr($contentarray[$arraycounter],$indexbegin,$indexend-$indexbegin);
   }else
   {
   $arrayaddress[$arraycounter]=substr($contentarray[$arraycounter],$indexbegin);
   }  
   }     
  header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:filename=test.xls");
 for($arraycounter=0;$arraycounter<$contentsize;$arraycounter++)
 {        
   echo str_replace("\t"," ",$arraycompany[$arraycounter]);
    echo "\t";
   
   echo  str_replace("\t"," ",$arrayaddress[$arraycounter]); 
    echo "\t";
   echo    str_replace("\t"," ",$arraytel[$arraycounter]);
     echo "\n";
 }   
?>