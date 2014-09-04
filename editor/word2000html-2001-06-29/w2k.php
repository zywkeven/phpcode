
<?php
/*
    w2k
    Version 0.7
    Ryan Flynn (ryan@ryanflynn || DALnet->#php->pizza_milkshake)
    Friday, June 29 2001
    
    This little cmdline script converts ugly Microsoft Word 2000 HTML
    into relatively clean, browser-independent code. Anyone that's had to
    deal with converting Word HTML into REAL HTML can realize that this
    is worth having around.
    
    Todo: I want to set up mask-dependent (*.htm) batch functionailty
    so you can type: "w2k.php *.htm *.html" and convert all your .htm files
    to .html fiels with the same names. This would be a life-saver in certain
    situations.
    
    Note: This class requires my Word2000Html class, you can get it from
    phpclasses.upperdesign.com/ or sitetronics.com/~pizza

*/

    if($argc < 3){
        echo "Use: w2k.php <source filename> <destination filename>";
        die;
    }elseif(!is_file($argv[1])){
        echo "Error: {$argv[1]} does not exist";
        die;
    }else{
        $in=$argv[1];
        $out=$argv[2];
    }

require_once("class.word2000html.php");
$bob=new Word2000Html($in);

$str= "
<html>
<head>
	<title>{$bob->Title}</title>
    
    {$bob->Style}
    
</head>

{$bob->Body}

</html>";

$f=fopen($out, "w") or die("Error: could not open '{$out}'");
fputs($f, $str);
fclose($f);

echo "File '{$in}' scoured and sent to '{$out}' successfully";

?>
