
<?php
function number3($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance)
{   
$num=0; 
$lengthleft=$lengthlarge;
$widthleft=$widthlarge; 

$linenumber=0;
$line=0;
$rownumber=0;
$row=0;
$side=$widthsamll+$lengthsmall+$distance;
 
 while($widthleft>=($side+$distance*2))
{
$row++;             
$lengthleft=$lengthlarge;  
     while($lengthleft>=($side+$distance*2))
     {   
       $linenumber++;  
      
       $lengthleft-=($side+$distance); 
        } 
$widthleft-=($side+$distance); 
}   
  $widthleft2= $widthleft;
  $lengthleft2=$lengthleft; 
  
 
  $numleft10=number1($lengthleft,$widthlarge,$lengthsmall,$widthsamll,$distance);
  $numleft11=number2($lengthleft,$widthlarge,$lengthsmall,$widthsamll,$distance); 
  
  $numleft20=number1($lengthlarge-$lengthleft,$widthleft,$lengthsmall,$widthsamll,$distance);
  $numleft21=number2($lengthlarge-$lengthleft,$widthleft,$lengthsmall,$widthsamll,$distance);
  
  
  $numleft30=number1($lengthleft,$widthlarge-$widthleft,$lengthsmall,$widthsamll,$distance);
  $numleft31=number2($lengthleft,$widthlarge-$widthleft,$lengthsmall,$widthsamll,$distance); 
  
  $numleft40=number1($lengthlarge,$widthleft,$lengthsmall,$widthsamll,$distance);
  $numleft41=number2($lengthlarge,$widthleft,$lengthsmall,$widthsamll,$distance);
  
   $condition=0; 
   
if((max($numleft10,$numleft11)+max($numleft20,$numleft21))>=(max($numleft30,$numleft31)+max($numleft40,$numleft41)))
  { 
  $condition=0;  
  
  $result=max($numleft10,$numleft11)+max($numleft20,$numleft21);
   
  } 
  else 
  { 
  $result=max($numleft30,$numleft31)+max($numleft40,$numleft41); 
  $condition=10; 
  } 
  
return $result+$linenumber*4; 
}   