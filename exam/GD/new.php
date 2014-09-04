<?php
       
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

function numberrotate($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance)
{  
  
    static $numtotal=0; 
    
    if(($lengthlarge>=($lengthsmall+$distance*2)&&($widthlarge>=($widthsmall+$distance*2)))||
    $widthlarge>=($lengthsmall+$distance*2)&&($lengthlarge>=($widthsmall+$distance*2)))
    {
    
    
    $lengthleft1=$lengthlarge;
    $lengthleft2=$lengthlarge; 
    
    $widthleft1=$widthlarge;
    $widthleft2=$widthlarge;
   
    $lengthleftlast=$lengthlarge;
    $widthleftlast=$widthlarge; 
//-----------------------------------------------------------------------------------------------     
    if($widthleft1>=($lengthsmall+$distance*2)&&($lengthleft1>=($widthsmall+$distance*2)))
    {   
        $lengthleftlast-=$widthsmall+$distance;
        $lengthleft1-=($widthsmall+$distance);
        
    while($widthleft1>=($lengthsmall+$distance*2))
    {
        $numtotal+=1;
        $widthleft1-=($lengthsmall+$distance);    
    }  
    }
//--------------------------------------------------------------------------------------------------    
    if($widthleft1<$widthsmall+$distance*2)
        $lengthleft2-=$widthsmall+$distance; 
    
    if($lengthleft2>=($lengthsmall+$distance*2)&&$widthlarge>=($widthsmall+$distance*2))
    { 
        $widthleftlast-=$widthsmall+$distance;
        while($lengthleft2>=($lengthsmall+$distance*2))
    {
        $numtotal+=1;
        $lengthleft2-=($lengthsmall+$distance);    
    } 
    }

//----------------------------------------------------------------------------------------------------    
    
     if($lengthleft2<$widthsmall+$distance*2) 
     $widthleft2-=$widthsmall+$distance; 
     
     if($lengthleftlast>=($widthsmall+$distance*2)&&$widthleftlast>=($lengthsmall+$distance*2))
     {
         $lengthleftlast-=$widthsmall+$distance;
         
         while($widthleft2>=($lengthsmall+$distance*2))
         {
            $numtotal+=1; 
            $widthleft2-= $lengthsmall+$distance;
         }  
     }
//----------------------------------------------------------------------------------------------------     
     if($widthleft2<$widthsmall+$distance*2)
     $lengthleft1-=$lengthsmall+$distance;
     
     if($lengthleftlast>=($lengthsmall+$distance*2)&&$widthleftlast>=($widthsmall+$distance*2))
       {
           $widthleftlast-=$widthsmall+$distance;
            while($lengthleft1>=$lengthsmall+$distance*2)
            {
                $numtotal+=1;
                $lengthleft1-=$lengthsmall+$distance;
            }
       } 
       numberrotate($lengthleftlast,$widthleftlast,$lengthsmall,$widthsmall,$distance);  
    }
    else
   return   $numtotal;   
}

$lengthlarge=1000;
$widthlarge=1000;
$lengthsmall=10; 
$widthsamll=5;
$distance=5 ;
 
$num3=numberrotate($lengthlarge,$widthlarge,$lengthsmall,$widthsmall,$distance);

echo $num3;

?>