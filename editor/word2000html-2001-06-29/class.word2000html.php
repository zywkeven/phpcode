<?php

/*
    Word2000Html
    Version 0.5
    Ryan Flynn (ryan@ryanflynn || DALnet->#php->pizza_milkshake)
    Thursday, June 28 2001

    This class was invented to save ordinary humans from having to deal
    with converting Word HTML to actual HTML, a job I once had and it
    nearly drove me insane... This class allows you to extract the
    3 most important chunks from a Word html doc: title, style and body
    sections, which you can then manipulate in whatever fashion you see fit.
    
	Tested:
		PHP 4.0.3 on Apache 1.3.14/Windows 98
		PHP 4.0.3 on MS IIS 4.?/Windows 2000
	
	So far:
		MSIE:	5-6 = flawless
		NN:		4.7 = good, 3.04 = ok
		Opera:	5.0 = good

//ok, here's how to use this class:
require_once("class.word2000html.php");
$bob=new Word2000Html("news.htm"); //path to Word 2000 HTML doc; this creates the object
echo $bob->Title;                   //self-explanatory
echo $bob->Style;
echo $bob->Body;

You can throw this code into HTML tags and convert Word docs on-the-fly. Have fun.
*/

$content_path=getenv("PATH_TRANSLATED");
$content_path=substr($content_path, 0, (strrpos($content_path, "\\")+1));

class Word2000Html{
	
	var $Title;
	var $Style;
	var $Body;
	
	function Word2000Html($file){
		
		global $PHP_SELF, $content_path;
		
		$file=$content_path.$file;
		
			if(!file_exists($file)){
				echo "
<pre>
If you see this message, please contact
flynn@wavecresttech.com
-------------------------------------
\"$file\" does not exist
--------------------------------------
PHP_SELF.......... $PHP_SELF
PATH_TRANSLATED... ".getenv("PATH_TRANSLATED")."
file.............. $file
content_path...... $content_path
--------------------------------------
</pre>
";
				exit;
			}
		
		$s=implode('', file($file));
		
		$title='/\<title.*\<\/title\>/i';
		
		$style='/\<style[\w\W]*?\<\/style\>/i';
		/*
		$style only gets the first, useless chunk of Word2000
		<style> code; it needs to get all
		*/
		
		$body='/\<body[\w\W]*?\<\/body\>/i';
		
		$if_crap='/<[^>]*![^>]*\[[^>]*\][^>]*>/i';
		
		//removes <v: blah blah/> tags
		$v_crap='/\<\/?v:[^>]*\>/i';
		$o_crap='/<\/?o:[^>]*\>/i';
		
			if(!preg_match($title, $s, $tmp)) echo 'no title, ';
		$tmp[0]=preg_replace('/\<(\/|)title\>/i', '', $tmp[0]);
		$this->Title=trim($tmp[0]);
		
			if(!preg_match_all($style, $s, $tmp)) echo 'no style, ';
		
		foreach($tmp as $a)
			foreach($a as $b)
				$this->Style.=trim($b)."\n";
		
			if(!preg_match($body, $s, $tmp)) echo 'no body';
		$tmp[0]=preg_replace($if_crap, '', $tmp[0]);
		
		$tmp[0]=str_replace('./', '', $tmp[0]);
		
		$tmp[0]=preg_replace('/\<(\/|)body(^>)*?\>/i', '', $tmp[0]);
		$tmp[0]=preg_replace($v_crap, '', $tmp[0]);
		$tmp[0]=preg_replace($o_crap, '', $tmp[0]);
		
		//remove <td width but doesn't affect the damn Word2000 HTML
		//$tmp[0]=preg_replace('/<td width=[\d]{0,5}\s/i', '<td ', $tmp[0]);
		
		$this->Body=trim($tmp[0]);
	}
}

?>