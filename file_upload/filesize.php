<?php 

function dir_size($dir){ 
    $handle=opendir($dir); //取得句柄 
    while(false!==($dirOrFile=readdir($handle))){//这是正确的遍历目录的方法 
        if($dirOrFile!="."&&$dirOrFile!=".."){ 
            if(is_dir("$dir/$dirOrFile")) 
                $size+=dir_size("$dir/$dirOrFile"); 
            else 
                $size+=filesize("$dir/$dirOrFile"); 
        } 
    } 
    closedir($handle); 
    return $size; 
} 

  echo dir_size('./new');


?>