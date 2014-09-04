<?php 

function number1imageleft($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthmove,$widthmove)
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
       ImageRectangle($image,$lengthmove+($lengthlarge-$lengthleft)+$distance,$widthmove+($widthlarge-$widthleft+$distance),
       ($lengthmove+$lengthlarge-$lengthleft+$lengthsmall+$distance),$widthmove+($widthlarge-$widthleft+$distance+$widthsamll),$color); 
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
   
ImageRectangle($image,$lengthmove+$lengthlarge-$lengthleft+$distance,$widthmove+$widthlarge-$widthleft2+$distance,
$lengthmove+$lengthlarge-$lengthleft+$distance+$widthsamll,$widthmove+$widthlarge-$widthleft2+$distance+$lengthsmall,$color); 
 
 
    $lengthleft-=($widthsamll+$distance);
}  
    
    $widthleft2-=($lengthsmall+$distance); 
}       
return $linenumber+$rownumber; 
}  

function number2imageleft($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthmove,$widthmove)
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

      ImageRectangle($image,($lengthlarge-$lengthleft)+$distance+$lengthmove,($widthlarge-$widthleft+$distance+$widthmove),
      $lengthlarge-$lengthleft+$distance+$widthsamll+$lengthmove,$widthlarge-$widthleft+$distance+$lengthsmall+$widthmove,$color); 
     
  
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
    ImageRectangle($image,($lengthlarge-$lengthleft)+$distance+$lengthmove,($widthlarge-$widthleft+$distance+$widthmove),
     ($lengthlarge-$lengthleft+$lengthsmall+$distance+$lengthmove),($widthlarge-$widthleft+$distance+$widthsamll+$widthmove),$color); 
   
    $lengthleft-=($lengthsmall+$distance);
}
    $widthleft-=($widthsamll+$distance);
}
  
return $linenumber+$rownumber;
}  
 
 function number3image($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color)
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
       
       ImageRectangle($image,$lengthlarge-$lengthleft+$distance,$widthlarge-$widthleft+$distance,
       $lengthlarge-$lengthleft+$distance+$lengthsmall,$widthlarge-$widthleft+$distance+$widthsamll,$color); 
        
       ImageRectangle($image,$lengthlarge-$lengthleft+$distance+$lengthsmall+$distance,$widthlarge-$widthleft+$distance,
       $lengthlarge-$lengthleft+$distance+$lengthsmall+$distance+$widthsamll,$widthlarge-$widthleft+$distance+$lengthsmall,$color); 
       
       ImageRectangle($image,$lengthlarge-$lengthleft+$distance,$widthlarge-$widthleft+$distance+$widthsamll+$distance,
       $lengthlarge-$lengthleft+$distance+$widthsamll,$widthlarge-$widthleft+$distance+$widthsamll+$distance+$lengthsmall,$color); 
       
       ImageRectangle($image,$lengthlarge-$lengthleft+$distance+$widthsamll+$distance,$widthlarge-$widthleft+$distance+$lengthsmall+$distance,
       $lengthlarge-$lengthleft+$distance+$widthsamll+$distance+$lengthsmall,$widthlarge-$widthleft+$distance+$lengthsmall+$distance+$widthsamll,$color); 
       
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
  
  if($numleft10>=$numleft11) 
{
    if($numleft20>=$numleft21)
    $condition+=1;
    else
    $condition+=2;
} 
else
{  
    if($numleft20>=$numleft21)
    $condition+=3;
    else
    $condition+=4;
}
  
 
switch ($condition)
{   
    case 1: 
  $numleft10=number1imageleft($lengthleft,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0); 
  $numleft20=number1imageleft($lengthlarge-$lengthleft+$distance,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);
     break; 
     
    case 2:
$numleft10=number1imageleft($lengthleft,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0);
$numleft20=number2imageleft($lengthlarge-$lengthleft+$distance,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);   
    break;
    case 3: 
   $numleft10=number2imageleft($lengthleft,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0); 
   $numleft20=number1imageleft($lengthlarge-$lengthleft+$distance,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);
    break;
    case 4:
    $numleft10=number2imageleft($lengthleft,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0);
    $numleft20=number2imageleft($lengthlarge-$lengthleft+$distance,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft); 
    break;
    
    case 11:
    $numleft10=number1imageleft($lengthleft,$widthlarge-$widthleft+$distance,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0); 
    $numleft20=number1imageleft($lengthlarge,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);
    
    break;
    case 12:
    $numleft10=number1imageleft($lengthleft,$widthlarge-$widthleft+$distance,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0); 
    $numleft20=number2imageleft($lengthlarge,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);
    
    break ;
    case 13:
    $numleft10=number2imageleft($lengthleft,$widthlarge-$widthleft+$distance,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0); 
    $numleft20=number1imageleft($lengthlarge,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);
    
    break;
    case 14:
    $numleft10=number2imageleft($lengthleft,$widthlarge-$widthleft+$distance,$lengthsmall,$widthsamll,$distance,$image,$color,$lengthlarge-$lengthleft,0); 
    $numleft20=number2imageleft($lengthlarge,$widthleft,$lengthsmall,$widthsamll,$distance,$image,$color,0,$widthlarge-$widthleft);
    
    break;
    default: 
    break; 

}  

      
$numleft=$numleft10+$numleft20; 
 
return $result+$linenumber*4; 
}              

 
$lengthlarge=$_POST[lengthlarge];
$widthlarge=$_POST[widthlarge]; 

$lengthsmall=$_POST[lengthsmall];
$widthsamll=$_POST[widthsamll]; 

$distance=$_POST[distance];   

$image = Imagecreate($lengthlarge+60,$widthlarge+60); 
$color = ImageColorAllocate($image,255,0,0); 
$white = ImageColorAllocate($image,255,255,255); 

ImageFill($image,0,0,$white);       
ImageRectangle($image,0,0,$lengthlarge+1,$widthlarge+1,$color); 
                                                                
$num5=number3image($lengthlarge,$widthlarge,$lengthsmall,$widthsamll,$distance,$image,$color);

imagestring($image,6,5,$widthlarge+2,"TOTAL:".$num5,$color);  

    
ImageGIF($image);   
  
ImageDestroy($image); 
   
?>


