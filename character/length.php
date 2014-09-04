<meta charset='utf-8'>
<?php
function smssubstr($string, $length) {
if(strlen($string) <= $length) {
  return $string;
}
$strcut = '';
for($i = 0; $i < $length; $i++) {
  $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i].$string[++$i] : $string[$i];
}
return $strcut;
}
echo  smssubstr('钟77;?.,.意6767头8村厅城城城dfdsfdsfsd',10);
?>