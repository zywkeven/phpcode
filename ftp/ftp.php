<?php
$username="用户名";
$password="用户密码";
$server="主机名";
$cdir="上传目录名" ;
	  /*
function connect(){
　　global $server, $username, $password;
　　$conn = ftp_connect($server);
　　ftp_login($conn, $username, $password);
　　return $conn;
}

　　$result = connect();
　　if ($action == "上传")
　　{

　　ftp_chdir($result, $cdir);

　　$res_code = ftp_put($result, $upfile_name, $upfile, FTP_BINARY);

　if ($res_code == 1){
echo "上传成功!"; 
}
　　else{
echo "上传错误!";}
　　}

　　ftp_quit($result);

  */

include("../conn/conn.php");
include("../common/functions.php");
$query_admin="select * from `admin`";
$result_admin=mysql_query($query_admin);
$row_admin=mysql_fetch_array($result_admin);
$user=$row_admin['adminid'];
$date=date("Y-m-d H:i:s",time());
$query_ftpinfor="select * from ftpdownload where downStatus!='finish' and downStatus!='failed'";
$result_ftpinfor=mysql_query($query_ftpinfor);
while($row_ftpinfor=mysql_fetch_array($result_ftpinfor)){
	$serverName=$row_ftpinfor['serverName'];
	$portNumber=$row_ftpinfor['portNumber'];
	$loginName=$row_ftpinfor['loginName'];     
	$loginPassword=$row_ftpinfor['loginPassword'];      
	$downloadTime=$row_ftpinfor['downloadTime'];
	$retrySecond=$row_ftpinfor['retrySecond'];
	$fileOrDirectory=$row_ftpinfor['fileOrDirectory'];
	$fileName=$row_ftpinfor['fileName'];
	$tryTime=$row_ftpinfor['tryTime'];     
	if(!$tryTime){
		$newtryTime=date("Y-m-d H:i:s",time());         
		if($downloadTime>$newtryTime){
			exit();
		}
	}else{
		 $newtryTime=date("Y-m-d H:i:s",strtotime("$tryTime+$retrySecond seconds"));
		if($newtryTime>date("Y-m-d H:i:s",time())){
			exit();
		}
	}
	$my_connection=@ftp_connect($serverName,$portNumber,30);
	$login_result=@ftp_login($my_connection, $loginName, $loginPassword);
	if($fileOrDirectory=='file'){
		$localfilearray=explode("/",$fileName);
		$localfile=$localfilearray[sizeof($localfilearray)-1];
		$filepath="../upfile";
		$expendname=rand(100,999);
		$fname=foo(25).'.'.$expendname;                
		$query_existfname="select detailorder from detail where fname='".DB_escape_string($fname)."'";
		$result_existfname=mysql_query($query_existfname);
		while($row_existfname=mysql_fetch_array($result_existfname)){
			$fname=foo(25).'.'.$expendname;
			$query_existfname="select detailorder from detail where fname='".DB_escape_string($fname)."'";
			$result_existfname=mysql_query($query_existfname);    
		} 
		if(@ftp_get($my_connection,$filepath."/".$fname,$fileName,FTP_BINARY)){
			$query_updateftp="update ftpdownload set downStatus='finish',tryTime='$newtryTime'  
				where downloadID='".$row_ftpinfor['downloadID']."'";
			$result_updateftp=mysql_query($query_updateftp);
			$query_detail="insert into detail(filename,filepath,filesize,fname,upuser,updatetime,filedir,expires,remark) 
			values('".DB_escape_string($localfile)."',
			'".DB_escape_string($filepath."/".$fname)."',
			'".filesize($filepath."/".$fname)."',
			'".DB_escape_string($fname)."',
			'$user',
			'$date',
			'".DB_escape_string($filepath)."',
			'0000-00-00 00:00:00',
			'')"; 
			$result_detail=mysql_query($query_detail);
			$query_selectdetail="select * from detail where fname='$fname'";
			$result_selectdetail=mysql_query($query_selectdetail);  
			if($row_selectdetail=mysql_fetch_array($result_selectdetail)){
				$downdetail=$row_selectdetail['detailorder'];
				$query_downset="select * from downset where detailorder='$downdetail' and onlyname='$user'";
				$result_downset=mysql_query($query_downset); 
				if($row_downset=mysql_fetch_array($result_downset)){
					$query_down="update downset set downpass='',downcount='0',downunliminted='1'  
					where detailorder='$downdetail' and onlyname='$user'";
				}else{
					$query_down="insert into downset(detailorder,downpass,downcount,onlyname,downunliminted)
					values('$downdetail','','0','$user','1')";
				}   
				$result_down=mysql_query($query_down); 
				if($result_down){   
					$url_this ="http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF']; 
					$urlarr=explode('/',$url_this);
				   $urllast=$urlarr[sizeof($urlarr)-1];
				   $urllast2=$urlarr[sizeof($urlarr)-2];
				   $length=strlen($urllast)+strlen($urllast2)+1;
				   $seris=noproduct(64);  
				   $query_equal="select serisnodown from downset where serisnodown='$seris'";
				   $result_equal=mysql_query($query_equal);
				   while($row_equal=mysql_fetch_array($result_equal)){ 
					   $seris=noproduct(64); 
					   $result_equal=mysql_query($query_equal);
				   }
				   $url=substr($url_this,0,strlen($url_this)-$length)."download/down.php?id=$seris";
				   $query_insertno="update downset set serisnodown='$seris',settime='$date',
						linkpage='$url' where detailorder='$downdetail' and onlyname='$user'";
				   $result_insertno=mysql_query($query_insertno); 
				}  
			}                 
		}else{
			if(!$retrySecond){
				echo $query_updateftp="update ftpdownload set downStatus='failed',tryTime='$newtryTime' where downloadID='".$row_ftpinfor['downloadID']."'";
				$result_updateftp=mysql_query($query_updateftp);            
			}else{
				echo $query_updateftp="update ftpdownload set downStatus='retry',tryTime='$newtryTime'  
			where downloadID='".$row_ftpinfor['downloadID']."'";
				$result_updateftp=mysql_query($query_updateftp);   
			}  
		}
	}else{ 
		ftp_chdir($my_connection,$fileName);
		ftp_cdup($my_connection);       
		listFTPFile($my_connection,".");
		
		
	}
	@ftp_close($my_connection);  
}
function listFTPFile($my_connection,$directory){
	$directoryarray=ftp_rawlist($my_connection,$directory); 
	$filedetailarray=itemize_dir($directoryarray);
		
	$filedetailarray[0]['type'];
	foreach($filedetailarray as $value){
	echo $value['type'], $value['name'],'<br>';
	}

} 
function itemize_dir($contents)
 {
   foreach ($contents as $file) 
	{
	   if(ereg("([-dl][rwxstST-]+).* ([0-9]*) ([a-zA-Z0-9]+).* ([a-zA-Z0-9]+).* ([0-9]*) ([a-zA-Z]+[0-9: ]*[0-9])[ ]+(([0-9]{2}:[0-9]{2})|[0-9]{4}) (.+)", $file, $regs))
	 {
		   $type = (int) strpos("-dl", $regs[1]{0});
		   $tmp_array['line'] = $regs[0];
		   $tmp_array['type'] = $type;
		   $tmp_array['rights'] = $regs[1];
		   $tmp_array['number'] = $regs[2];
		   $tmp_array['user'] = $regs[3];
		   $tmp_array['group'] = $regs[4];
		   $tmp_array['size'] = $regs[5];
		   $tmp_array['date'] = date("y-m-d",strtotime($regs[6]));
		   $tmp_array['time'] = $regs[7];
		   $tmp_array['name'] = $regs[9];
	   }
	   $dir_list[] = $tmp_array;
   }
   return $dir_list;
}
?>
　　?>