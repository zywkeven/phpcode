<?php 
$lengthlarge=200;
$widthlarge=100;

$lengthsmall=20;
$widthsamll=10;

$distance=4;

function number1($lengthlarge,$widthlarge,$lentghsmall,$widthsamll,$distance)
{   
    
$num=0;
$lengthleft=$lengthlarge;
$widthleft=$widthlarge; 
$linenumber=0;
$line=0;
$rownumber=0;
$row=0;
while($lengthleft>=($lentghsmall+$distance*2))
{
  $lengthleft-=($lentghsmall+$distance);
  $linenumber++;   
}

while($widthleft>=($widthsamll+$distance*2))
{
    $line++;
    $widthleft-=($widthsamll+$distance);
}

while($lengthleft>=($widthsamll+$distance*2))
{
    $rownumber++;
    $lengthleft-=($widthsamll+$distance);
}

$widthleft=$widthlarge;
while($widthleft>=($lentghsmall+$distance*2))
{
    $row++;
    $widthleft-=($lentghsmall+$distance);
}

$num=$linenumber*$line+$rownumber*$row;

return $linenumber*$line+$rownumber*$row;
}  
 
$num1=number1($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance);
$num2=number1($widthlarge,$lengthlarge,$lengthsmall,$widthsamll,$distance);
 
echo "横向排是:".$num1."<br>"."纵向排是:".$num2."<br>";
if($num1>$num2)
echo "结果取横向排:".$num1;
else
if($num1==$num2)
echo "结果一样,均为:".$num2;  
else
echo "结果取纵向排:".$num2;  
echo "<br>";    
                              
?>