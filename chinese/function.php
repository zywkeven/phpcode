<META http-equiv="Content-Type" content="text/html;charset=utf-8">
<?php    

function chinesesubstr($str,$start,$len){   
    $chalen=strlen('有'); 
    $strlen=$start+$len;
    for($i=0;$i<$strlen;$i++){
      if(ord(substr($str,$i,1))>0xa0){   
        $tmpstr.=substr($str,$i,$chalen);
        $i+=$chalen-1;
      }else{
      $tmpstr.=substr($str,$i,1);
      }
    }return $tmpstr;
}
    $str="：Ldfsjf在震中百lsdflsd";
    echo chinesesubstr($str,0,16);


?>