<?php


setcookie("cookie[用户名]",'Mr.s');
 setcookie("cookie[密码]",'123');
 foreach( $_COOKIE['cookie'] as $name=> $value)
 {
     echo $name.$value;  break;
 }



?>