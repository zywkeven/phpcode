<?php 
function listFile($dir,$str='')
{   
 $fileArray = array();
 $cFileNameArray = array();
 if($handle = opendir($dir))
 {
  while(($file = readdir($handle)) !== false)
  {
    if($file !="." && $file !="..")
   {
     if(is_dir($dir."/".$file))
    {      
    $cFileNameArray = listFile($dir."/".$file,$str.'/'.$file);  
        
      for($i=0;$i<count($cFileNameArray);$i++)
     {
      $fileArray[] = $cFileNameArray[$i];
     } 
     $fileArray[] = $str.'/'.$file;  
    } 
   }
  }  
  return $fileArray;
 }
    else
 {
  echo "文件夹不存在!";
 }
}

?>
<?php
  $aaa=listFile("C:/App/216/fileadmin/upfile/2");
  for($i=0;$i<sizeof($aaa);$i++)
  echo '<br>'.$aaa[$i];
  
?>