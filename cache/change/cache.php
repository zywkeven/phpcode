<?php
require_once('cache.class.php');
$Cachemanager=new Cache();

$Cachemanager->startCache();
echo "Start Caceh example at :".date('H:i:s')."<br>";
sleep(2);
echo "End Caceh example at :".date('H:i:s')."<br>";
$Cachemanager->endCache();
?>