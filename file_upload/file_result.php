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
�ͻ��˻����ļ���ԭ���ơ� 

$_FILES['userfile']['type']
�ļ��� MIME ���ͣ����������ṩ����Ϣ�Ļ���һ�������ǡ�image/gif���������� MIME ������ PHP �˲�����飬��˲�Ҫ�뵱Ȼ��Ϊ�����ֵ�� 

$_FILES['userfile']['size']
���ϴ��ļ��Ĵ�С����λΪ�ֽڡ� 

$_FILES['userfile']['tmp_name']
�ļ����ϴ����ڷ���˴������ʱ�ļ����� 

$_FILES['userfile']['error']
�͸��ļ��ϴ���صĴ�����롣����Ŀ���� PHP 4.2.0 �汾�����ӵġ�
*/

?>