<?php

// By Snt
// ICQ: 8322641
// e-mail: 8322641@gmail.com

// Contact me for work, study and money making solutions!

class array_storage {
  
	function Array2Txt($array,$compress=0,$fill='',$tab=1) {  
		if (!$fill) {  
			$txt_return='array(';  
		}  
		$n=rand();  
		$run[$n]=0;  
		for($i=0;$i<$tab;$i++) { 
			$t.="\t"; 
		}  
    		foreach ($array as $key => $value) {  
        		if (!$run[$n]) {  
				$c='';  
        		} else {  
				$c=', ';  
        		} 
        		$run[$n]++;  
        		if (is_array($value)) {  
				$txt_return.=$c."\n".$t.'\''.$key.'\' => array('.Array2Txt($value,$compress,1,$tab+1);  
				continue 1;  
        		}  
        		$txt_return.=$c."\n".$t.'\''.$key.'\' => \''.$value.'\'';  
    		}	  
    		if (!$fill) {  
        		$txt_return.=');'."\n";  
    		} else {  
        		$txt_return.=')';  
    		}  
    		if ($compress) {  
        		return gzcompress($txt_return, 9);  
    		} else {  
        		return $txt_return;  
    		}  
	}  

	function Txt2Array($arraytxt,$decompress=0) {
		if (!$arraytxt) {return array();}
		if ($decompress) {  
			eval('$return_array = '.gzuncompress($arraytxt));  
			return $return_array;  
		} else {  
			if (!eval('$return_array = '.$arraytxt)) {
				print '<h2>Txt2Array ERROR</h2>';
				print $arraytxt;exit;
			}
			return $return_array;  
		}  
	}  

// USAGE:
// require_once('array_storage.php');


}
$array_storage=new array_storage();

 $compress = 1; /*(0 or 1)*/
 $array_text = $array_storage->Array2Txt(array(1,2),$compress);

 $decompress = 1; /*(0 or 1)*/
 $array = $array_storage->Txt2Array($array_text,$decompress);
 print_r($array); 
 ?>
