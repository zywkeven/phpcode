<?php 
include("../conn/conn.php"); 
     if($_POST[Submit]=="Upload")
{        
   $file_name= $_FILES['upfile']['name'];  
   
if(!file_exists($_FILES['upfile']['tmp_name']))
{
    echo "fiel is not exists !file upload failed"; 
}  
 else
 { 
   $adddate=date("Y-m-d H-i-s",time()+28800);
   $path='../upfiles/'.$_FILES['upfile']['name']; 
   $filename=$_POST[filename];
   
    $index=strpos($path,$file_name);
    $substr=substr($path,0,$index); 
    $path_save=$substr.$adddate.$file_name; 
       
    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $path_save))
    {   
        
        $query_insert="insert into updownfile_table(filename,path) values('$filename','$path_save')";
        if(mysql_query($query_insert))
        echo "upload succeed;"; 
    }      
}   

} 

  
  
?> 


