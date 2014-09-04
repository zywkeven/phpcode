<?php

function deleteDir($dir){
if(substr($dir,-1) != '/') $dir .= '/';
if(is_dir($dir)) {
if ($dp = opendir($dir)) {
while (($file=readdir($dp)) !== false) {
if (is_dir($dir.$file) && $file!='.' && $file!='..') {
deleteDir($dir.$file);
}else {
if (!is_dir($dir.$file)) {
unlink($dir.$file);
}
}
}
closedir($dp);
rmdir($dir);
}
}
}
?>

<?php
   return deleteDir("C:/App/216/fileadmin/upfile/11").'a';
?>