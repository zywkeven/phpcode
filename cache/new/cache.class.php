<?php
class Cache{
    var $status    = true;     // 值为True表示开启缓存；值False表示关闭缓存功能。
   var $cacheDir  = 'cache/'; //存放缓存文件的默认目录
   var $cacheFile = '';       //缓存文件的真实文件名
   var $timeOut   = 1000;     // 内容被重复使用的最长时限
   var $startTime = 0;        // 程序执行的开始时间
   var $caching     = true;     // 是否需要对内容进行缓存；值为False表示直接读取缓存文件内容
    function getMicroTime() {
           list($usec, $sec) = explode(" ",microtime());
          return ((float)$usec + (float)$sec);
    }

     function startCache(){
      $this->startTime = $this->getMicroTime();
      ob_start();
      if ($this->status){ 
         $this->cacheFile = $this->cacheDir.urlencode( $_SERVER['REQUEST_URI'] );
         if ( (file_exists($this->cacheFile)) && 
              ((fileatime($this->cacheFile) + $this->timeOut) > time()) )
         {
            //从缓存文件中读取内容
            $handle = fopen($this->cacheFile , "r");
            $html   = fread($handle,filesize($this->cacheFile));
            fclose($handle);
          
            // 显示内容
            echo $html;

            // 显示程序执行时间           
           echo '<p>Total time: '
                 .round(($this->getMicroTime())-($this->startTime),4).'</p>';
            
            //退出程序
            exit();
          }
          else
          {
             //置缓存标志caching为true
             $this->caching = true;
          }
      }
    }


function endCache(){
      if ($this->status){
         if ( $this->caching )
         {
            //首先输出页面内容，然后将输出内容保存在缓存文件中
            $html = ob_get_clean();
            echo $html;
            $handle = fopen($this->cacheFile, 'w' );
            fwrite ($handle, $html );
            fclose ($handle);

            //显示页面执行时间            
            echo '<p>Total time: '.round(($this->getMicroTime()-$this->startTime),4).'</p>';
         }
      }       
    } 

     function cleanCache(){  
       if ($handle = opendir($this->cacheDir)) {
          while (false !== ($file = readdir($handle))) {
              
             if (is_file($this->cacheDir.$file)) unlink($this->cacheDir.$file);
          }

          closedir($handle);       
       }
    }
    }

?> 

  