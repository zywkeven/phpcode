<?php
class Cache{
    var $status = true;
    var $cacheDir = 'cache/';
    var $cacheFile = '';
    var $timeOut = 1000;  
    var $caching = true;
    function  Cache($cachedir='cache/',$timeOut=1000){
        $this->cacheDir= $cachedir;   
        $this->$timeOut= $timeOut;   
    }     
    function startCache(){        
        ob_start();
        if ($this->status){
            $this->cacheFile = $this->cacheDir.urlencode($_SERVER['REQUEST_URI']);
            if ( (file_exists($this->cacheFile)) && (fileatime($this->cacheFile) + $this->timeOut)> time()){                
                $handle = fopen ($this->cacheFile,"r") ;
                $html = fread($handle,filesize($this->cacheFile));
                fclose($handle);
                
                echo $html;                 
                exit();              
            }else{
                $this->caching = true;
            }
        }
    }
    
    function endCache(){
        if ($this->status){
            if ($this->caching){
                $html = ob_get_clean();
                echo $html; 
                echo $this->cacheFile;
               // if (is_writable($this->cacheFile)){ 
                    $handle = fopen ($this->cacheFile,'w');                
                    fwrite ($handle,$html);
                    fclose ($handle); ;
                //}                                  
            }
        }
    }
    
    function cleanCache(){
        if ($handle = opendir ($this->cacheDir)){
            while (false !== ($file =readdir($handle))){
                if (is_file($this->cacheDir.$file)){                     
                    @unlink($this->cacheDir.$file);                                       
                }
            }
            closedir($handle);
        }
    }
}
?>