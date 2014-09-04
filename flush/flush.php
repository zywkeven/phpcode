<?php


 ob_implicit_flush(true);
    for ($i=10; $i〉0; $i--)
    {
     echo $i;
     ob_flush();
     //sleep(1);
    }
    
    
    //or
     for ($i=10; $i〉0; $i--)
    {
     echo $i;
     ob_flush();
     flush();
     sleep(1);
    }
    
?>