<?php
function dir_size($dir) {
	if (!preg_match('#/$#', $dir)) {
	$dir .= '/'; 
	} 
	$totalsize = 0;        
	foreach (get_file_list($dir) as $name) {
	$totalsize += (is_dir($dir.$name) ? dir_size("$dir$name/") : filesize($dir.$name));   
	}
	return $totalsize; 
} 
function get_file_list($path){ 
	$f = $d = array(); 
	foreach (get_all_files($path) as $name) { 
		if (is_dir($path.$name)) {
			 $d[] = $name; 
		} else if (is_file($path.$name)) {
			$f[] = $name; 
		}    
	}   
	natcasesort($d);   
	natcasesort($f);    
	return array_merge($d, $f); 
} 
function get_all_files($path){ 
	$list = array();
	if (($hndl = opendir($path)) === false) { 
		return $list;    
	} 
	while (($file=readdir($hndl)) !== false) { 
	if ($file != '.' && $file != '..'){           
		$list[] = $file;        
	}    
	}    
	closedir($hndl);    
	return $list; 
}
?>