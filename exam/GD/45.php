<?php
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

 $lengthlarge=200;
$widthlarge=100; 

$lengthsmall=10;
$widthsmall=5; 

$distance=5; 

$image1 = Imagecreate($lengthlarge*3,$widthlarge*3); 
$color = ImageColorAllocate($image1,255,0,0); 
$white = ImageColorAllocate($image1,255,255,255); 
ImageFill($image1,0,0,$white);       
ImageRectangle($image1,0,0,$lengthlarge+1,$widthlarge+1,$color); 
$num1=number1image($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance,$image1,$color); 
imagestring($image1,6,5,$widthlarge+2,"TOTAL:".$num1,$color);  
 $green=ImageColorAllocate($image1,0,255,0); 
 
 $image2 = Imagecreate($lengthlarge+60,$widthlarge+60); 
$color = ImageColorAllocate($image2,255,0,0); 

$white = ImageColorAllocate($image2,255,255,255); 
ImageFill($image2,0,0,$white);       
ImageRectangle($image2,0,0,$lengthlarge+1,$widthlarge+1,$color); 
$num2=number2image($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance,$image2,$color); 
imagestring($image2,6,5,$widthlarge+2,"TOTAL:".$num2,$color); 
    
//ImageGIF($image1);   


 
//imagepolygon($image1,array(0,0,20,0,20,20,10,20),4,$color);
//imagegif ($image1,'45.png');





// echo  imagecolorstotal($image1);

//imagecopyresized ($image1,$image2,24,41,0,0,210,110,210,110);


ImageGIF($image1);

ImageDestroy($image1); 
?>