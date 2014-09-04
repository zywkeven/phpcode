<?php
 session_start();
 
 class download{
  var $debug=true;
  var $errormsg='';
  var $Filter=array();
  var $filename='';
 // var $mineType='text/plain';     
  //var $mineType='application/octet-stream;charset=utf-8';
  var $xlq_filetype=array();
 
  function download($fileFilter='',$isdebug=true)
  {
    $this->setFilter($fileFilter);
        $this->setdebug($isdebug);        
        $this->setfiletype();
  }
  
  function setFilter($fileFilter)
  {
    if(empty($fileFilter)) return ;
        $this->Filter=explode(',',strtolower($fileFilter));
  }
  function setdebug($debug)
  {
    $this->debug=$debug;
  }
  
  function setfilename($filename)
  {
    $this->filename=$filename;
  }
  
  function downloadfile($filename)
  {
      
    $this->setfilename($filename);
    if($this->filecheck()){
          $sql_setfilename="select * from detail where filepath='".$this->filename."'"; 
          $query_setfilename=mysql_query($sql_setfilename);  
          $rows_setfilename=mysql_fetch_array($query_setfilename);    
                    
          $fn = array_pop(explode( '/', strtr( $rows_setfilename['filename'], '\\', '/' ) ) ); 
        
 $ua = $_SERVER["HTTP_USER_AGENT"]; 

 
$encoded_filename = urlencode($fn);
$encoded_filename = str_replace("+", "%20", $encoded_filename);
header('Content-Type: application/octet-stream'); 
if (preg_match("/MSIE/", $ua)) {
    header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
} else if (preg_match("/Firefox/", $ua)) {
    header('Content-Disposition: attachment; filename*="utf8\'\'' . $fn . '"');
} else {
    header('Content-Disposition: attachment; filename="' . $fn . '"');
}      
          header( "Pragma: public" );
          header( "Expires: 0" ); // set expiration time               
          header( "Cache-Component: must-revalidate, post-check=0, pre-check=0" );
          header( "Content-type:".$this->mineType ."");
          header( "Content-Length: " . filesize( $this->filename ) );
          header( 'Content-Transfer-Encoding: binary' );   
          readfile( $this->filename );   
          return true; 
    }else{
        return false;
    } 
  }
  function geterrormsg()
  {
    return $this->errormsg;
  }
  
  function filecheck()
  {
    $filename=$this->filename;
        if(file_exists($filename))
        {
           $filetype=strtolower(array_pop(explode('.',$filename)));
           if(in_array($filetype,$this->Filter))
           {
             $this->errormsg.=$filename.'Not allowed to download!';
                 if($this->debug) exit($filename.'Not allowed to download!') ;
                 return false;
           }else
           {
             if ( function_exists( "mime_content_type" ) )
                 {
           $this->mineType = mime_content_type( $filename );
         }
                 if(empty($this->mineType))
                 {
                    if( isset($this->xlq_filetype[$filetype]) )  $this->mineType = $this->xlq_filetype[$filetype];
                 }
                 if(!empty($this->mineType))
                   return true;
                 else
                 {
                    $this->errormsg.='Get'.$filename.'When an error file type, or does not exist in the type of document is scheduled to';
                        if($this->debug) exit('Access to the file type error');
                        return false;
                 }
           } 
        }else
        {
          $this->errormsg.=$filename.'Does not exist!';
          if($this->debug) exit($filename.'Does not exist!') ;
          return false;
        }
  }
  
  function setfiletype()
  {
    $this->xlq_filetype['chm']='application/octet-stream';
    $this->xlq_filetype['ppt']='application/vnd.ms-powerpoint';
    $this->xlq_filetype['xls']='application/vnd.ms-excel';
    $this->xlq_filetype['doc']='application/msword';
    $this->xlq_filetype['exe']='application/octet-stream';
    $this->xlq_filetype['rar']='application/octet-stream';
    $this->xlq_filetype['js']="javascript/js";
    $this->xlq_filetype['css']="text/css";
    $this->xlq_filetype['hqx']="application/mac-binhex40";
    $this->xlq_filetype['bin']="application/octet-stream";
    $this->xlq_filetype['oda']="application/oda";
    $this->xlq_filetype['pdf']="application/pdf";
    $this->xlq_filetype['ai']="application/postsrcipt";
    $this->xlq_filetype['eps']="application/postsrcipt";
    $this->xlq_filetype['es']="application/postsrcipt";
    $this->xlq_filetype['rtf']="application/rtf";
    $this->xlq_filetype['mif']="application/x-mif";
    $this->xlq_filetype['csh']="application/x-csh";
    $this->xlq_filetype['dvi']="application/x-dvi";
    $this->xlq_filetype['hdf']="application/x-hdf";
    $this->xlq_filetype['nc']="application/x-netcdf";
    $this->xlq_filetype['cdf']="application/x-netcdf";
    $this->xlq_filetype['latex']="application/x-latex";
    $this->xlq_filetype['ts']="application/x-troll-ts";
    $this->xlq_filetype['src']="application/x-wais-source";
    $this->xlq_filetype['zip']="application/zip";
    $this->xlq_filetype['bcpio']="application/x-bcpio";
    $this->xlq_filetype['cpio']="application/x-cpio";
    $this->xlq_filetype['gtar']="application/x-gtar";
    $this->xlq_filetype['shar']="application/x-shar";
    $this->xlq_filetype['sv4cpio']="application/x-sv4cpio";
    $this->xlq_filetype['sv4crc']="application/x-sv4crc";
    $this->xlq_filetype['tar']="application/x-tar";
    $this->xlq_filetype['ustar']="application/x-ustar";
    $this->xlq_filetype['man']="application/x-troff-man";
    $this->xlq_filetype['sh']="application/x-sh";
    $this->xlq_filetype['tcl']="application/x-tcl";
    $this->xlq_filetype['tex']="application/x-tex";
    $this->xlq_filetype['texi']="application/x-texinfo";
    $this->xlq_filetype['texinfo']="application/x-texinfo";
    $this->xlq_filetype['t']="application/x-troff";
    $this->xlq_filetype['tr']="application/x-troff";
    $this->xlq_filetype['roff']="application/x-troff";
    $this->xlq_filetype['shar']="application/x-shar";
    $this->xlq_filetype['me']="application/x-troll-me";
    $this->xlq_filetype['ts']="application/x-troll-ts";
    $this->xlq_filetype['gif']="image/gif";
    $this->xlq_filetype['jpeg']="image/pjpeg";
    $this->xlq_filetype['jpg']="image/pjpeg";
    $this->xlq_filetype['jpe']="image/pjpeg";
    $this->xlq_filetype['ras']="image/x-cmu-raster";
    $this->xlq_filetype['pbm']="image/x-portable-bitmap";
    $this->xlq_filetype['ppm']="image/x-portable-pixmap";
    $this->xlq_filetype['xbm']="image/x-xbitmap";
    $this->xlq_filetype['xwd']="image/x-xwindowdump";
    $this->xlq_filetype['ief']="image/ief";
    $this->xlq_filetype['tif']="image/tiff";
    $this->xlq_filetype['tiff']="image/tiff";
    $this->xlq_filetype['pnm']="image/x-portable-anymap";
    $this->xlq_filetype['pgm']="image/x-portable-graymap";
    $this->xlq_filetype['rgb']="image/x-rgb";
    $this->xlq_filetype['xpm']="image/x-xpixmap";
    $this->xlq_filetype['txt']="text/plain";
    $this->xlq_filetype['c']="text/plain";
    $this->xlq_filetype['cc']="text/plain";
    $this->xlq_filetype['h']="text/plain";
    $this->xlq_filetype['html']="text/html";
    $this->xlq_filetype['htm']="text/html";
    $this->xlq_filetype['htl']="text/html";
    $this->xlq_filetype['rtx']="text/richtext";
    $this->xlq_filetype['etx']="text/x-setext";
    $this->xlq_filetype['tsv']="text/tab-separated-values";
    $this->xlq_filetype['mpeg']="video/mpeg";
    $this->xlq_filetype['mpg']="video/mpeg";
    $this->xlq_filetype['mpe']="video/mpeg";
    $this->xlq_filetype['avi']="video/x-msvideo";
    $this->xlq_filetype['qt']="video/quicktime";
    $this->xlq_filetype['mov']="video/quicktime";
    $this->xlq_filetype['moov']="video/quicktime";
    $this->xlq_filetype['movie']="video/x-sgi-movie";
    $this->xlq_filetype['au']="audio/basic";
    $this->xlq_filetype['snd']="audio/basic";
    $this->xlq_filetype['wav']="audio/x-wav";
    $this->xlq_filetype['aif']="audio/x-aiff";
    $this->xlq_filetype['aiff']="audio/x-aiff";
    $this->xlq_filetype['aifc']="audio/x-aiff";
    $this->xlq_filetype['swf']="application/x-shockwave-flash";
  }
} 
function get_client_ip()
{
if ($_SERVER['REMOTE_ADDR']) {
    $cip = $_SERVER['REMOTE_ADDR'];
} elseif (getenv("REMOTE_ADDR")) {
    $cip = getenv("REMOTE_ADDR");
} elseif (getenv("HTTP_CLIENT_IP")) {
    $cip = getenv("HTTP_CLIENT_IP");
} else {
    $cip = "unknown";
}
    return $cip;
}

    
include_once("../conn/conn.php");

$query_downtf="select * from detail where detailorder='$_SESSION[detaildo]'";
$result_downtf=mysql_query($query_downtf);
$row_downtf=mysql_fetch_array($result_downtf);
   
if($row_downtf['downpass']==$_SESSION['downpassdo']&&$row_downtf['serisnodown']==$_SESSION['downiddo']){  
    $download=new download('',false);
    if(!$download->downloadfile($_SESSION['filepathdo'].$_SESSION['filenamedo'])){
        echo $download->geterrormsg(); 
    }else{ 
        $date=date("Y-m-d H:i:s",time()+28800);
        $query_insert="insert into downdetail(downdetail,downtime,downsetname)values('$_SESSION[detaildo]','$date','$_SESSION[onlynameuser]')";
        $result_insert=mysql_query($query_insert); 
        $query_upcount="update downset set downcount=(downcount-1) where detailorder='$_SESSION[detaildo]' and onlyname='$_SESSION[onlynameuser]'";
        $result_upcount=mysql_query($query_upcount); 
        
        $insert_eventlog="insert into eventlog(
                         eventuser,
                         eventtype,
                         eventaction,
                         detailorder
                         )values(
                         '".get_client_ip()."',
                         'download',
                         'download:$row_downtf[filename]',
                         '$_SESSION[detaildo]'
                         )";
        mysql_query($insert_eventlog);
    }
}  

 
?>

