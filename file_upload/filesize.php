<?php 

function dir_size($dir){ 
    $handle=opendir($dir); //ȡ�þ�� 
    while(false!==($dirOrFile=readdir($handle))){//������ȷ�ı���Ŀ¼�ķ��� 
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