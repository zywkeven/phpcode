<?php  
$link=mysql_connect("127.0.0.1", "pgm2", "pgm2") or die('fail' . mysql_error());
 if (mysql_select_db("pgm2", $link))
    echo "";
else                            
    echo('fail error:' . mysql_error()); 
    //mysql_query("set names zyw_file"); 
    //echo $Submit;  
      echo   $filename; 
  
     if($Submit=="post")
{ 
    $data=date("Y.m.d");
      $file_name= $_FILES['file2']['name'] ; 
     
      echo "<br>".$file_name.'   kdlj';
      
      
    //$path="./$filename/".$_FILES['file2']['name']; 
       $path='c:/'.$_FILES['file2']['name'];  
       
    if(move_uploaded_file($_FILES['file2']['tmp_name'], $path) )
    {   
        echo  $file_name;  
     echo "<BR><BR>".$path."<br>"; 
        echo "<BR>upload succeed:<BR>";
    $query="insert into zyw_test1(username,password) values('$file_name','$path')";
    $result=mysql_query($query);
    if($result)
            {
            echo "data true"; 
        }  
        else
        {
            echo "data fail";
        } 
    } 
    else
    {
        echo "<br>upload failed";
    }
}
    //if($Submit1=="create file") 
    //{
        /* $filename=$file3;
         
        //mkdir("C:\\App\\210\\yiwen\\$filename", 0700);
          mkdir("./$filename", 0700);  
        echo "create succeed";           
    }
    else 
    {
        echo "create Failde!";
    }   */
       $filename=$file3;
         
        //mkdir("C:\\App\\210\\yiwen\\$filename", 0700);
          mkdir("./$filename", 0755);  
    echo "create succeed";           
    //}   
    
    
    
    
?> 


<?php
 /*
$_FILES['userfile']['name']
客户端机器文件的原名称。 

$_FILES['userfile']['type']
文件的 MIME 类型，如果浏览器提供此信息的话。一个例子是“image/gif”。不过此 MIME 类型在 PHP 端并不检查，因此不要想当然认为有这个值。 

$_FILES['userfile']['size']
已上传文件的大小，单位为字节。 

$_FILES['userfile']['tmp_name']
文件被上传后在服务端储存的临时文件名。 

$_FILES['userfile']['error']
和该文件上传相关的错误代码。此项目是在 PHP 4.2.0 版本中增加的。
*/

?>