<meta charset='utf-8'>
<?php
function smssubstr($string, $length) {
    if(strlen($string) <= $length) {
        return $string;
    }
$strcut = '';
$lengthConter=0;
for($i = 0; $i < $length; $i++) {
    echo ord($string[$i]).'aaaaaaaaa'.$i.'<br>';
  $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i].$string[++$i] : $string[$i];
}
return $strcut;
}
echo  smssubstr('钟77;?.asdbasdf意6767头8村厅城城城dfdsfdsfsd',10);
?>