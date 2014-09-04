<?php
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
  
 function number2($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance)
{   
    
$num=0;
$lengthleft=$lengthlarge;
$widthleft=$widthlarge; 
$linenumber=0;
$line=0;
$rownumber=0;
$row=0;  

while($widthleft>=($lengthsmall+$distance*2))
{
    $line++;   
    $lengthleft=$lengthlarge;
   while($lengthleft>=($widthsamll+$distance*2))
{        
      $linenumber++;  
  
     $lengthleft-=($widthsamll+$distance);
}
    $widthleft-=($lengthsmall+$distance);
}   


while($widthleft>=($widthsamll+$distance*2))
{
    $row++;  
$lengthleft=$lengthlarge;
while($lengthleft>=($lengthsmall+$distance*2))
{
    $rownumber++;
    
    $lengthleft-=($lengthsmall+$distance);
}
    $widthleft-=($widthsamll+$distance);
}
  
return $linenumber+$rownumber;
}  
       
function number1image($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color)
{  
$num=0;
$lengthleft=$lengthlarge;
$widthleft=$widthlarge; 
$linenumber=0;
$line=0;
$rownumber=0;
$row=0; 
 
 while($widthleft>=($widthsamll+$distance*2))
{
$row++;             
$lengthleft=$lengthlarge;  
     while($lengthleft>=($lengthsmall+$distance*2))
     {   
       $linenumber++; 
       ImageRectangle($image,($lengthlarge-$lengthleft)+$distance,($widthlarge-$widthleft+$distance),
       ($lengthlarge-$lengthleft+$lengthsmall+$distance),($widthlarge-$widthleft+$distance+$widthsamll),$color); 
        $lengthleft-=($lengthsmall+$distance); 
        } 
$widthleft-=($widthsamll+$distance); 
   }

 $widthleft2=$widthlarge; 
  
 $lengthleft2=$lengthleft;
 
while($widthleft2>=($lengthsmall+$distance*2))
{
   $line++; 
   $lengthleft=$lengthleft2; 
             
 while($lengthleft>=($widthsamll+$distance*2))
{
    $rownumber++;  
      ImageRectangle($image,$lengthlarge-$lengthleft+$distance,$widthlarge-$widthleft2+$distance,
       $lengthlarge-$lengthleft+$distance+$widthsamll,$widthlarge-$widthleft2+$distance+$lengthsmall,$color); 
    
    $lengthleft-=($widthsamll+$distance);
}  
    
    $widthleft2-=($lengthsmall+$distance); 
}       
return $linenumber+$rownumber;

}  

function number2image($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color)
{   
    
$num=0;
$lengthleft=$lengthlarge;
$widthleft=$widthlarge; 
$linenumber=0;
$line=0;
$rownumber=0;
$row=0;  

while($widthleft>=($lengthsmall+$distance*2))
{
    $line++;   
    $lengthleft=$lengthlarge;
   while($lengthleft>=($widthsamll+$distance*2))
{        
      $linenumber++; 

      ImageRectangle($image,($lengthlarge-$lengthleft)+$distance,($widthlarge-$widthleft+$distance),
      $lengthlarge-$lengthleft+$distance+$widthsamll,$widthlarge-$widthleft+$distance+$lengthsmall,$color); 
     
  
     $lengthleft-=($widthsamll+$distance);
}
    $widthleft-=($lengthsmall+$distance);
}   


while($widthleft>=($widthsamll+$distance*2))
{
    $row++;  
$lengthleft=$lengthlarge;
while($lengthleft>=($lengthsmall+$distance*2))
{
    $rownumber++;
    ImageRectangle($image,($lengthlarge-$lengthleft)+$distance,($widthlarge-$widthleft+$distance),
     ($lengthlarge-$lengthleft+$lengthsmall+$distance),($widthlarge-$widthleft+$distance+$widthsamll),$color); 
   
    $lengthleft-=($lengthsmall+$distance);
}
    $widthleft-=($widthsamll+$distance);
}
  
return $linenumber+$rownumber;
} 

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
  
  $numleft20=number1($lengthlarge-$lengthleft+$distance,$widthleft,$lengthsmall,$widthsamll,$distance);
  $numleft21=number2($lengthlarge-$lengthleft+$distance,$widthleft,$lengthsmall,$widthsamll,$distance);
  
  
  $numleft30=number1($lengthleft,$widthlarge-$widthleft+$distance,$lengthsmall,$widthsamll,$distance);
  $numleft31=number2($lengthleft,$widthlarge-$widthleft+$distance,$lengthsmall,$widthsamll,$distance); 
  
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
 
$lengthlarge=$_POST[lengthlarge];
$widthlarge=$_POST[widthlarge]; 

$lengthsmall=$_POST[lengthsmall];
$widthsamll=$_POST[widthsamll]; 

$distance=$_POST[distance];   
 
$numtotal1=number1($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance);
$numtotal2=number2($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance);
$numtotal3=number3($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance); 

if($numtotal1>=$numtotal2)
 { 
     if($numtotal3>=$numtotal1)
     {
         include("retangleexam2.php");
     }
     else{
$image = Imagecreate($lengthlarge+60,$widthlarge+60); 
$color = ImageColorAllocate($image,255,0,0); 
$white = ImageColorAllocate($image,255,255,255); 
ImageFill($image,0,0,$white);       
ImageRectangle($image,0,0,$lengthlarge+1,$widthlarge+1,$color); 
$num1=number1image($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color); 

imagestring($image,6,5,$widthlarge+2,"TOTAL:".$numtotal1,$color);  

    
ImageGIF($image);   
  
ImageDestroy($image); 
 }
 }
else

{ 
    if($numtotal3>$numtotal2)
     {
         include("retangleexam2.php"); 
     }
     else{
$image = Imagecreate($lengthlarge+60,$widthlarge+60); 
$color = ImageColorAllocate($image,255,0,0); 
$white = ImageColorAllocate($image,255,255,255); 

ImageFill($image,0,0,$white);       
ImageRectangle($image,0,0,$lengthlarge+1,$widthlarge+1,$color); 
$num2=number2image($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color);
                                                 

 imagestring($image,6,5,$widthlarge+2,"TOTAL:".$numtotal2,$color);   
 ImageGIF($image);   
  
ImageDestroy($image); 
 } 


}?>


